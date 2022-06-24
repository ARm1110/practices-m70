<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use App\Models\Station;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::select('id', 'name', 'description', 'status', 'updated_at')->paginate(5);
        // dd($stations);
        return view('stations.index', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStationRequest $request)
    {
        try {
            Station::create(
                [
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => false,
                ]

            );
            return redirect()->back()->with('message', 'Station Added successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {

        $station = Station::find(request()->id);

        // show the edit form and pass the service
        return View::make('stations.edit')
            ->with('station', $station);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStationRequest  $request
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStationRequest $request, Station $station)
    {
        if ($request->process == 'update_status') {
            try {

                $station::where('id', $request->id)->update(
                    [
                        'status' => !$request->status,
                    ]
                );

                return redirect()->back()->with('message', 'station updated successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
        if ($request->process == 'edit') {

            // validate
            $rules = array(
                'name'       => 'required|min:3|max:255',
                'description'       => 'required|string',
            );
            $validator = Validator::make($request->all(), $rules);

            // process the login
            if ($validator->fails()) {

                return Redirect::to('dashboard/station/' . $request->id . '/edit')
                    ->withErrors($validator)
                    ->withInput($request->except('password'))
                    ->with('error', 'Something went wrong');
            } else {
                // store
                $station = $station::find($request->id);
                $station->name       = $request->name;
                $station->description = $request->description;
                $station->status      = false;
                $station->save();

                // redirect
                return redirect()->back()->with('message', 'station Edit successfully');
            }
        }

        return redirect()->back()->with('error', 'Server side error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        try {
            $station::destroy(request()->id);
            return redirect()->back()->with('message', 'station deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function filter(Request $request)
    {

        $station = Station::select('*');

        // Search for a Station based on their name.
        if (request()->has('name') && request()->input('name') != '') {
            $station->whereName(request()->input('name'));
        }

        // Search for a Station based on their name.
        if (request()->has('description') && request()->input('description') != '') {
            $station->whereDescription(request()->input('description'));
        }


        if (request()->has('status') && request()->input('status') != '') {
            $station->where('status', '=', request()->input('status'));
        }



        $stations = $station->paginate(5);

        // Get the results and return them.

        return view('stations.index', compact('stations'));
    }
}
