<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\MenuItemOrder;
use App\Models\Order;
use App\Models\User;
use Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = MenuItemOrder::whereRelation('menuItem', 'user_id', auth()->user()->id)
            ->with('user')
            ->with('menuItem')
            ->where('status', 'ordered')
            ->paginate(10);



        $data = [
            'orders' => $orders,
        ];

        return view('dashboard.orders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function reject(Request $request)
    {
        try {
            //code...

            // transfer wallet to user wallet
            $user = User::find(auth()->user()->id);

            $MenuItemOrder = MenuItemOrder::select('*')
                ->where('id', request()->menuItem)
                ->where('order_id', request()->order_id)
                ->where('status', 'ordered')->first();

            if (!($MenuItemOrder)) {
                return response()->json([
                    'success' => false,
                    'message' => request()->all(),


                ], 500, []);
            }
            $customer_id = $MenuItemOrder->user_id;
            $find_user = User::find($customer_id);
            $MenuItemOrder_price =   $MenuItemOrder->total_price;


            $user->transfer($find_user, $MenuItemOrder_price);
            //update status order
            $MenuItemOrder->status = 'rejected';
            $MenuItemOrder->save();
            return back()->with('message', 'Order rejected successfully');
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => request()->menuItem,
                'message' => $th->getMessage()

            ], 500, []);
        }
    }

    public function accept(Request $request)
    {
        try {
            //accept


            MenuItemOrder::select('*')
                ->where('id', request()->menuItem)
                ->where('order_id', request()->order_id)
                ->where('status', 'ordered')->update(['status' => 'delivered']);

            return back()->with('message', 'order accepted');
        } catch (\Throwable $th) {

            return back()->with('error', 'order not accepted');
        }
    }
    public function archive()
    {
        $orders = MenuItemOrder::whereRelation('menuItem', 'user_id', auth()->user()->id)
            ->with('user')
            ->with('menuItem')
            ->paginate(10);



        $data = [
            'orders' => $orders,
        ];

        return view('dashboard.orders.archive', compact('data'));
    }
}
