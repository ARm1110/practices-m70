<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return  view(
            'booking.index'
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        // dd($request->all());
        Validator::make(
            $request->all(),
            [
                'email' => ['required'],
                'date' => ['required'],
                'service' => ['required'],
                'time' => ['required'],
                'fastService' => ['required'],
            ]
        )->validate();
        //find user
        $user = User::select('id')->where('email', $request->email)->first();
        if (empty($user)) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',

            ]);
        }

        //service find and set time

        $timeAndPrice = BookingController::timeAndPrice();
        $type = $request->input('service');
        $result = $timeAndPrice[$type];


        $dateFrom = $request->input('date');
        $price =  $result['price'];


        if ($request->input('fastService') != true || $request->input('fastService') != 'true') {
            $start_time = $request->input('time');
        } else {
            $start_time = date('H:i', time());
        }

        $from = $dateFrom . ' ' . $start_time;
        $to = $dateFrom . ' ' . date('H:i', strtotime($start_time) + $result['time']);
        // return response()->json($to);


        //check if time is free
        $sta = [1, 2];
        $child = Booking::where('station', '=', '1')
            ->where('status', '=', '1')
            ->where(function ($query) use ($from, $to) {
                $query->whereBetween('start_time', [$from, $to])
                    ->orWhereBetween('end_time', [$from, $to]);
            })
            ->get();
        if (($child->isEmpty() != true)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Booking not available',

            ]);
        }

        //saved date after check
        Booking::create(
            [
                'start_time' => $from,
                'end_time' => $to,
                'service' => $type,
                'price' => $price,
                'user_id' => $user->id,
                'status' => 1,
                'station' => 1
            ]
        );






        return response()->json([
            'status' => 'success',
            'message' => 'Booking created',

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public static function timeAndPrice()
    {
        $data = [
            'basic' => [
                'time' => strtotime('+15 minutes', time()) - time(),
                'price' => 250000
            ],
            'internal_washing' => [
                'time' => strtotime('+20 minutes', time()) - time(),
                'price' => 300000
            ],
            'full_washing' => [
                'time' => strtotime('+60 minutes', time()) - time(),
                'price' => 800000
            ],
        ];
        return $data;
    }
}
