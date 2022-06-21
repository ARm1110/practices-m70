<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Station;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
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
        $services = Service::select('id', 'name')->where('status', '1')->get();
        return view('booking.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        //check if time 9:00 am- 9:00pm 
        // == '9:00 am- 9:00pm'
        if ($request->input('time')) {
            $timeInput = strtotime($request->input('date') . $request->input('time'));
            $openTime = strtotime($request->input('date') . ' 9:00 Am');
            $closeTime = strtotime($request->input('date') . ' 9:00 Pm');
            if ($timeInput < $openTime || $timeInput > $closeTime) {
                return redirect()->back()->with('info', 'time select is not valid');
            }
        }
        //check active services
        $services = Booking::select('*')->where('user_id', '=', (auth()->id()))
            ->where('status', '=', '1')
            ->get();
        if ($services->isEmpty() != true) {
            return redirect()->back()->with('error', 'you are not access any service ');
        }
        //service find by id
        $service = DB::table('services')
            ->select('*')
            ->where('id', '=', $request->input('service'))
            ->get();
        if ($service->isEmpty() == true) {
            return redirect()->back()->with('error', 'broken input service');
        }



        // $type = $request->input('service');
        $result = $service->first()->time;
        $dateFrom = $request->input('date');
        // $price =  $result['price'];

        //check if fast service select
        if ($request->input('fastService') != true || $request->input('fastService') != 'true') {
            $start_time = $request->input('time');
        } else {
            $start_time = date('H:i', time());
        }

        //set from and to best formatters
        $from = $dateFrom . ' ' . $start_time;
        $to = $dateFrom . ' ' . date('H:i', strtotime($start_time) + $result);

        //check time is not in the past
        if ((strtotime($from) < time())) {
            return redirect()->back()->with('warning', 'you are select time in the past');
        }


        //check if time is free
        $station = Station::select('*')
            ->where('status', '=', '1')
            ->get();

        //search for free time 
        foreach ($station->pluck('id') as $id) {
            $child = Booking::has('station')
                ->where('station_id', '=', $id)
                ->where(function ($query) use ($from, $to) {
                    $query->whereBetween('start_time', [$from, $to])
                        ->orWhereBetween('end_time', [$from, $to]);
                })
                ->get();
            if (($child->isEmpty())) {
                break;
            }
        }
        //booking error print
        if (($child->isEmpty()) != true) {
            return redirect()->back()->with('warning', 'booking not available');
        }

        //saved date after check
        //dd($from, $to, $service->first()->id, auth()->id(), $id, rand(1000, 9999));
        try {
            Booking::create(
                [
                    'start_time' => $from,
                    'end_time' => $to,
                    'service_id' => $service->first()->id,
                    'user_id' => auth()->id(),
                    'station_id' => $id,
                    'status' => 1,
                    'token_reserve' => rand(1000, 9999),

                ]
            );
            return redirect()->back()->with('message', 'reserved time successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        };
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
        if ($request->process == 'update_status') {
            try {

                $booking::where('id', $request->id)->update(
                    [
                        'status' => !$request->status,
                    ]
                );

                return redirect()->back()->with('message', 'booking updated successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
        if ($request->process == 'user_action') {
            try {

                $booking::where('id', $request->id)->update(
                    [
                        'status' => 0,
                    ]
                );

                return redirect()->back()->with('message', 'booking updated successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }

        return redirect()->back()->with('error', 'Server side error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking, UpdateBookingRequest $request)
    {
        try {
            $booking::destroy(request()->id);
            return redirect()->back()->with('message', 'booking deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
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


    public function showAll()
    {

        $bookings = Booking::with('user')->with('service')->with('station')->paginate(5);

        //return response()->json($bookings);

        return view('booking.showAll', compact('bookings'));
    }

    public function filter(Request $request)
    {

        // ->with('service')->with('station')
        $bookings = Booking::select('*');

        // Search for a  username.
        if (request()->has('username') && request()->input('username') != '') {
            $bookings =  $bookings->with('user', function ($bookings) {
                return $bookings->where('name', 'like', '%' . request()->input('username') . '%');
            });
        }

        // Search for a  service.
        if (request()->has('service') && request()->input('service') != '') {
            $bookings->with('service', function ($bookings) {
                return $bookings->where('name', 'like', '%' . request()->input('service') . '%');
            });
        }
        // Search for a service station.
        if (request()->has('station') && request()->input('station') != '') {
            $bookings->with('station', function ($bookings) {
                return $bookings->where('name', 'like', '%' . request()->input('station') . '%');
            });
        }
        if (request()->has('token') && request()->input('token') != '') {
            $bookings->where('token_reserve', '=', request()->input('token'));
        }
        if (request()->has('status') && request()->input('status') != '') {
            $bookings->where('status', '=', request()->input('status'));
        }

        // TODO: check
        $bookings = $bookings->paginate(5);
        // dd($bookings);
        //return response()->json($bookings);
        // Get the results and return them.

        return view('booking.showAll', compact('bookings'));
    }
}
