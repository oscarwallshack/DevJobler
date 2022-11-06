<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOfferRequest;
use App\Models\Offer;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function list(): View
    {
        return view('home', [
            'offers' => Offer::paginate(10)
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index(): View
    {
        return view('offers.index', [
            'offers' => Offer::paginate(10)
        ]);
    }

    /**
     * Display a listing of the resource.
     * @param Offer $offer
     * @return View
     */
    public function offer($id): View
    {
        $offer = Offer::find($id);
        return view('offer', compact('offer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('offers.createOffer');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateOfferRequest  $request
     * @param  Offer  $offer
     * @return RedirectResponse
     */
    public function store(CreateOfferRequest $request, 
    Offer $offer): RedirectResponse
    {
        try {
            //pobieranie zwalidowanych danych
            $validated = $request->validated(); 
            $offer = new Offer;
            $offer->fill($validated);
            $offer->offer_requirements = 
            implode(' ', $request->request->get('offer_requirements'));
            $offer->save();
        } catch (Exception $e) {
            dd($e);
        }
        return redirect(route('offers.index'))->with('status', 'Oferta dodana!');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  Request  $request
    //  * @return RedirectResponse
    //  */
    // public function store(Request $request): RedirectResponse
    // {
    //     try {
    //         $offer = new Offer;
    //         $offer = implode(',', array_values($request));
    //         $offer->save();
    //         // dd($offer);
    //     } catch (Exception $e) {
    //         dd($e);
    //     }


    //     return redirect(route('offers.index'))->with('status', 'Oferta dodana!');
    // }

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
     * @param  Offer  $offer
     * @return View
     */
    public function edit(Offer $offer): View
    {
        return view('offers.editOffer', [
            'offer' => $offer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateOfferRequest  $request
     * @param  Offer  $offer
     * @return RedirectResponse
     */
    public function update(CreateOfferRequest $request, Offer $offer): RedirectResponse
    {
        $offer->fill($request->all());
        $offer->offer_requirements = implode(' ', $request->request->get('offer_requirements'));
        $offer->save();
        return redirect(route('offers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Offer  $offer
     * @return JsonResponse
     */
    public function destroy(Offer $offer): JsonResponse
    {
        try {
            $offer->delete();
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
            ])->setStatusCode(500);
        }
    }
}
