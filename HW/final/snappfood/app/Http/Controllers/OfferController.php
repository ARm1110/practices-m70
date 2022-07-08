<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::select('*')->paginate(5);
        $trash = Offer::onlyTrashed()->select('*')->get();
        $data = [
            'offers' => $offers,
            'trash' => $trash
        ];
        return view('dashboard.offer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfferRequest $request)
    {
        try {

            Offer::create(
                [
                    'name' => $request->offer_name,
                    'discount' => $request->offer_price,
                ]
            );
            return redirect()->back()->with('message', 'Offer created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfferRequest  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfferRequest  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Offer $offer)
    {

        try {
            $offer->where('id', request()->id)->update(
                [
                    'is_active' => !request()->status
                ]
            );
            return redirect()->back()->with('message', 'Offer updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong !' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer, $id)
    {
        try {
            Offer::onlyTrashed()->where('id', request()->id)->forceDelete();
            return redirect()->back()->with('warning', 'Offer permanently deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function trash()
    {
        $offers = Offer::onlyTrashed()->select('*')->paginate(5);
        $data = [
            'trashed' => $offers
        ];
        return view('dashboard.offer.trash', compact('data'));
    }

    public function restore($id)
    {
        try {
            Offer::onlyTrashed()->where('id', $id)->restore();
            return redirect()->back()->with('info', 'Offer restored successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function delete(Offer $offer)
    {
        try {
            Offer::withoutTrashed()->where('id', request()->id)->delete();


            return redirect()->back()->with('warning', 'Offer  deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
