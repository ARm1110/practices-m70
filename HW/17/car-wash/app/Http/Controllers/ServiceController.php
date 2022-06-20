<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Input\Input;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::select('id', 'name', 'time', 'price', 'status', 'updated_at')->paginate(5);

        return view('services.index', compact('services'));
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
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        dd('store');
        $service = Service::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'name' => $request->name,
                'time' => $request->time,
                'price' => $request->price,
                'status' => $request->status,
            ]

        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service, Request $request)
    {

        $service->where('name', 'LIKE', '%' . $request->search . '%')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {

        $service = Service::find(request()->id);

        // show the edit form and pass the service
        return View::make('services.edit')
            ->with('service', $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        if ($request->process == 'update_status') {
            try {

                $service::where('id', $request->id)->update(
                    [
                        'status' => !$request->status,
                    ]
                );

                return redirect()->back()->with('message', 'Service updated successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
        if ($request->process == 'edit') {

            // validate
            $rules = array(
                'name'       => 'required|min:3|max:255',
                'time'      => 'required|numeric',
                'price' => 'required|numeric'
            );
            $validator = Validator::make($request->all(), $rules);

            // process the login
            if ($validator->fails()) {

                return Redirect::to('dashboard/service/' . $request->id . '/edit')
                    ->withErrors($validator)
                    ->withInput($request->except('password'))
                    ->with('error', 'Something went wrong');
            } else {
                // store
                $service = $service::find($request->id);
                $service->name       = $request->name;
                $service->time       = $request->time;
                $service->price      = $request->price;
                $service->save();

                // redirect
                return redirect()->back()->with('message', 'Service Edit successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }

    public function filter(Request $request, Service $service)
    {
        $services = $service->newQuery();

        // Search for a service based on their name.
        if (request()->has('name') && request()->input('name') != '') {

            $services->where('name', 'LIKE', request()->input('name'));
        }

        // Search for a service time.
        if (request()->has('time') && request()->input('time') != '') {

            $services->where('time', '=', request()->input('time'));
            dd($services->get(), request()->all());
        }


        // Search for a service price.
        if (request()->has('price') && request()->input('price') != '') {
            $services->where('price', '= ', request()->input('price'));
        }


        if (request()->has('status') && request()->input('status') != '') {
            $services->where('status', '= ', request()->input('status'));
        }
        // dd($services->get());

        // Get the results and return them.
        return $services->get();
    }
}
