<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\MenuItemOrder;
use App\Models\Order;
use App\Models\User;
use Cache;
use DB;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function addToCard()
    {
        $deposit = request('deposit');
        $user = User::find(auth()->user()->id);
        $user->deposit($deposit);
        $user->balance;
        return response()->json([
            'success' => true,
            'data' => $user->balance,
            'message' => 'wallet proses success'
        ], 200, []);
    }

    public function withdrawCard()
    {
        $user = User::find(auth()->user()->id);
        $withdraw = request('withdraw');
        $user->withdraw($withdraw);
        $user->balance;
        return response()->json([
            'success' => true,
            'data' => $user->balance,
            'message' => 'wallet add success'
        ], 200, []);
    }

    public function getBalance()
    {
        $user = User::find(auth()->user()->id);
        $user->balance;
        return response()->json([
            'success' => true,
            'data' => $user->balance,
            'message' => 'wallet proses success'
        ], 200, []);
    }
    public function transfer(Request $request)
    {
        //TODO fix bug if many restaurant in one user_id
        try {
            $user = User::find(auth()->user()->id);
            $order = Order::with('menuItems.restaurant')
                ->where('id', $request->order_id)
                ->where('status', 'pending')
                ->get();
            if (!($order->count() > 0)) {
                return response()->json([
                    'success' => false,
                    'message' => 'order not found'
                ], 404, []);
            }
            $data = [];
            //check if wallet is enough
            if ($user->balance < $order->first()->total_price) {
                return response()->json([
                    'success' => false,
                    'data' => [
                        'order' => $order->first()->total_price,
                        'url_wallet_charge' => route('wallet.add')
                    ],
                    'message' => 'wallet is not enough'
                ], 402, []);
            }
            //payment
            //find restaurant user id


            foreach ($order->first()->menuItems->pluck('id') as $value) {
                $data['menu_item_id'][] = $value;
                $data['restaurant_user_id'][]  = MenuItem::select('user_id')->where('id', $value)->first();
                $data['total_price'][] = MenuItemOrder::select('total_price')->where('user_id', auth()->user()->id)->where('menu_item_id', $value)->first();
            }


            foreach ($data['restaurant_user_id'] as $value) {


                for ($j = 0; $j < count($data['restaurant_user_id']); $j++) {
                    $to[] = User::find($data['restaurant_user_id'][$j])->first();
                }

                for ($i = 0; $i < count($data['total_price']); $i++) {

                    $user->transfer($to[$i], (int) $data['total_price'][$i]->total_price);
                }
            }
            //payment ech cart 
            DB::table('orders')
                ->where('id', $request->order_id)
                ->update(['status' => "ordered"]);
            return response()->json([
                'success' => true,
                'data' => $user->balance,
                'message' => 'wallet proses success'
            ], 200, []);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'balance' => $user->balance,
                'message' => $e->getMessage()
            ], 400, []);
        }
    }



    public function transactions()
    {
        $user = User::find(auth()->user()->id);
        $transactions = $user->transactions->toQuery()->paginate(10);
        $data = [
            'transactions' => $transactions,
        ];
        // return response()->json($data, 200, []);
        return view('dashboard.wallet.transactions', compact('data'));
    }
}
