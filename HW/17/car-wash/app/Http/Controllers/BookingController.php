<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\json_decode;
use function Ramsey\Uuid\v1;
use function Symfony\Component\String\b;

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
        return  view(
            'booking.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {

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
        //check if time 9:00 am- 9:00pm 
        // == '9:00 am- 9:00pm'
        if ($request->input('time')) {
            $timeInput = strtotime($request->input('date') . $request->input('time'));
            $openTime = strtotime($request->input('date') . ' 9:00 Am');
            $closeTime = strtotime($request->input('date') . ' 9:00 Pm');
            if ($timeInput < $openTime || $timeInput > $closeTime) {
                return response()->json(
                    [
                        'status' => 'error',
                        'body' =>  'Time is not valid',
                    ],
                );
            }
        }

        //find user
        $user = User::select('id')->where('email', $request->email)->get();
        if (empty($user)) {
            return response()->json([
                'status' => 'error',
                'body' => 'User not found',

            ]);
        }

        //check active services

        $services = Booking::select('*')->where('user_id', '=', ($user->first()->id))
            ->where('status', '=', '1')
            ->get();


        if ($services->isEmpty() != true) {
            return response()->json([
                'status' => 'error',
                'body' => 'you are active service   '

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

        //check time is not in the past
        if ((strtotime($from) < time())) {
            return response()->json(
                [
                    'status' => 'error',
                    'body' =>  'Time is not valid :the past',
                ],
            );
        }


        //check if time is free
        $sta = [1, 2];
        for ($i = 1; $i < count($sta); $i++) {


            $child = Booking::where('station', '=', $i)
                ->where('status', '=', '1')
                ->where(function ($query) use ($from, $to) {
                    $query->whereBetween('start_time', [$from, $to])
                        ->orWhereBetween('end_time', [$from, $to]);
                })
                ->get();
            if (($child->isEmpty())) {
                break;
            }
        }
        if (($child->isEmpty()) != true) {
            return response()->json([
                'status' => 'error',
                'body' => 'Booking not available ',
            ]);
        }








        //saved date after check
        //generated token for user 

        try {
            Booking::create(
                [
                    'start_time' => $from,
                    'end_time' => $to,
                    'service' => $type,
                    'price' => $price,
                    'user_id' => $user->first()->id,
                    'status' => 1,
                    'token_reserve' => rand(1000, 9999),
                    'station' => $i
                ]
            );
            return response()->json([
                'status' => 'success',
                'body' => 'Booking success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'body' => 'Booking failed' . $e
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $needle = request()->token;
        $booking = Booking::has('user')->where('token_reserve', $needle)->where('status', '=', ' 1')->get();
        if ($booking->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'body' => 'Booking errors',
            ]);
        }

        return view(
            'booking.show',
            [
                'booking' => $booking->first(),
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        // TODO: Implement edit() method.
        $needle = request()->token;
        $booking = Booking::has('user')->select('start_time', 'service')->where('token_reserve', $needle)->where('status', '=', ' 1')->get();
        // return view('booking.edit', compact('company'));
        return response()->json([
            'status' => 'success',
            'body' => $booking,
        ]);
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
        return response()->json([
            'status' => 'success',
            'body' => 'Booking updated',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking, UpdateBookingRequest $request)
    {
        $booking = Booking::where("token_reserve", $request->token);

        $booking->where('start_time', '<', date('Y-m-d H:i:s', time()))->update(
            [
                'status' => 0,
            ]
        );
        return redirect('/booking');
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

    public function showCard()
    {
        return view('booking.show');
    }
}
