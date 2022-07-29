<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\StoreRequest;
use App\Http\Requests\Cart\UpdateRequest;
use App\Http\Resources\API\CartResource;
use App\Models\MenuItem;
use App\Models\MenuItemOrder;
use App\Models\Offer;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        // show all the items in the cart

        $items = MenuItemOrder::where('user_id', auth()->user()->id)->where('status', 'pending')->get();
        if (!($items->count() > 0)) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have not any cart items',
            ], 404);
        }

        return  response()->json(CartResource::collection($items));
    }

    public function add(storeRequest $request)
    {


        try {

            // Get offer price 
            $menuItem = (MenuItem::with('offers')->where('id', $request->menu_item_id)->first()['offers']);


            if ($menuItem->isEmpty()) {
                $offer_price = 0;
            } else {
                foreach ($menuItem as $offer) {
                    $offer_price = $offer->discount;
                }
            }



            // Get data for create MenuItemOrder 
            $menuItem = MenuItem::find($request['menu_item_id']);

            // Get data for validate MenuItemOrder if exists
            $menuItemOrder = MenuItemOrder::where('menu_item_id', $request['menu_item_id'])->where('user_id', auth()->user()->id)->where('status', 'pending')->first();

            // check if the item is already in the cart
            if ($menuItemOrder == null) {
                $before_discount = $menuItem->price;
                $after_discount = $menuItem->price - ($menuItem->price * $offer_price / 100);
                $quantity = $request['quantity'];

                $cart = MenuItemOrder::create([

                    'menu_item_id' => $menuItem->id,
                    'user_id' => auth()->user()->id,
                    'order_id' => null,
                    'quantity' => $quantity,
                    'before_discount' => $before_discount,
                    'after_discount' => $after_discount,
                    'total_price' => $after_discount * $quantity,
                    'discount' => $offer_price,
                ]);
            } else {
                // print error message
                return response()->json([
                    'status' => 'error',
                    'message' => 'Already exist in cart , return to cart page',
                    'url' => route('carts.list'),

                ], 404);
            }
            // set massage for API
            $msg = [
                'status' => 'success',
                'message' => 'Successfully added to cart',
                'data' => $cart,
            ];
            return response()->json($msg);
        } catch (\Throwable $th) {
            // print error side query or database or server program  error 
            return response()->json([
                'status' => 'error',
                'message' => 'Error',
                'errors' => $th->getMessage(),
            ], 500);
        }
    }

    public function delete(array $request)
    {

        try {
            $menuItemOrder = MenuItemOrder::find($request['id']);
            $menuItemOrder->delete();
            $msg = [
                'status' => 'success',
                'message' => 'Successfully deleted from cart',
                'data' => $menuItemOrder,
            ];
            return response()->json($msg);
        } catch (\Throwable $th) {
            // print error side query or database or server program  error 
            return response()->json([
                'status' => 'error',
                'message' => 'Error',
                'errors' => $th->getMessage(),
            ], 500);
        }
    }

    public function show(Request $request)
    {

        try {
            $items = MenuItemOrder::find($request->cart_id)->where('user_id', auth()->user()->id)->where('status', 'pending')->get()->first();
            // check if the menu item order is exists
            if (!($items->count() > 0)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json(new CartResource($items));
        } catch (\Throwable $th) {
            // print error side query or database or server program  error 
            return response()->json([
                'status' => 'error',
                'message' => 'Error',
                'errors' => $th->getMessage(),
            ], 500);
        }
    }




    public function update(UpdateRequest $request)

    {
        try {
            // get cartItem
            $items = MenuItemOrder::where('user_id', auth()->id())->where('menu_item_id', $request->menuId)->where('status', 'pending')->get();
            if (!($items->count() > 0)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Not found',
                ], 404);
            }
            // check if quantity is greater than 0
            if ($request->quantity > 0) {
                // update quantity
                $items->first()->update([
                    'quantity' => $request->quantity,
                    'total_price' => $items->first()->after_discount * $request->quantity,
                ]);
                // massage for api
                $msg = [
                    'status' => 'success',
                    'message' => 'Successfully updated',
                    'data' => $items,
                ];
            } else {

                // delete by method delete

                return $this->delete([
                    'id' => $items->first()->id,
                ]);
            }
        } catch (\Throwable $th) {
            // print error side query or database or server program  error 
            return response()->json([
                'status' => 'error',
                'message' => 'Error',
                'errors' => $th->getMessage(),
            ], 500);
        }
        return response()->json($msg);
    }


    public function clear()
    {


        // delete all cart 
        $items = MenuItemOrder::where('user_id', auth()->id())->where('status', 'pending')->get();
        if (!($items->count() > 0)) {
            return response()->json([
                'status' => 'error',
                'message' => 'cart already cleared ',
            ], 404);
        }

        foreach ($items as $item) {
            $item->delete();
        }
        $msg = [
            'status' => 'success',
            'message' => 'Successfully cleared',
        ];
        return response()->json($msg);
    }



    public function continue()
    {
        try {
            //code...
            // get all cart 
            $items = MenuItemOrder::where('user_id', auth()->id())->where('status', 'pending')->get();
            if (!($items->count() > 0)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You have not any cart items',
                ], 404);
            }
            // create table orders
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'status' => 'pending',
                'total_price' => $items->sum('total_price'),
            ]);

            //update cart items
            foreach ($items as $item) {
                $item->update([
                    'order_id' => $order->id,
                ]);
                $item->update([
                    'status' => 'ordered',
                ]);
            }

            $msg = [
                'status' => 'success',
                'message' => 'Successfully created order',
                'data' => $order,
                'payment_url' => route('orders.payment', $order->id),
            ];

            return response()->json($msg);
        } catch (\Throwable $th) {
            // print error side query or database or server program  error 
            return response()->json([
                'status' => 'error',
                'message' => 'Error',
                'errors' => $th->getMessage(),
            ], 500);
        }
    }
}
