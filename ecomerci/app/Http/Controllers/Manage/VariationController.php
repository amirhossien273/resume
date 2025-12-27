<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\Variation\StoreVariationRequest;
use App\Http\Requests\Manage\Variation\UpdateVariationRequest;
use App\Models\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variations = Variation::all();
        return view('manage.page.variation.index', compact('variations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.page.variation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVariationRequest $request)
    {

        $variation = new Variation([
            'title'      => $request->get('title'),
            'show_order' => $request->get('show_order'),
            'creator_id' => auth()->id(),
        ]);

        $variation->save();

        return redirect()->route('manage.variations.index')->with('success',  __('messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function show(Variation $variation)
    {
        return view('manage.page.variation.show', compact('variation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function edit(Variation $variation)
    {
        return view('manage.page.variation.edit', compact('variation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVariationRequest $request, Variation $variation)
    {

        $variation->update([
            'title'      => $request->get('title'),
            'show_order' => $request->get('show_order'),
            'creator_id' => auth()->id(),
        ]);

        return redirect()->route('manage.variations.index')->with('success',  __('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variation $variation)
    {
        $variation->delete();
        return redirect()->route('manage.variations.index')->with('success', __('messages.deleted'));
    }

    /**
     * Toggle the active status of the specified variation.
     *
     * @param  \App\Models\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function toggleActive(Variation $variation)
    {
        $variation->is_active = !$variation->is_active;
        $variation->save();

        return redirect()->route('manage.variations.index')->with('success',  __('messages.status'));
    }
}
