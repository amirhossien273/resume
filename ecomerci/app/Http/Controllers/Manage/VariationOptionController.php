<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\VariationOption\StoreVariationOptionRequest;
use App\Http\Requests\Manage\VariationOption\UpdateVariationOptionRequest;
use App\Models\Variation;
use App\Models\VariationOption;
use Illuminate\Http\Request;

class VariationOptionController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Variation $variation)
    {
        $variationOptions = VariationOption::where('variation_id' , $variation->id)
        ->with('variation', 'creator')->get();
        return view('manage.page.variation_options.index', compact('variationOptions', 'variation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.page.variation_options.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVariationOptionRequest $request)
    {

        $variationOption = new VariationOption([
            'title' => $request->get('title'),
            'variation_id' => $request->get('variation_id'),
            'show_order' => $request->get('show_order'),
            'creator_id' => auth()->id(),
        ]);

        $variationOption->save();

        return redirect()->route('manage.variation_options.index', $variationOption->variation_id)->with('success',  __('messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VariationOption  $variationOption
     * @return \Illuminate\Http\Response
     */
    public function show(VariationOption $variationOption)
    {
        return view('manage.page.variation_options.show', compact('variationOption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VariationOption  $variationOption
     * @return \Illuminate\Http\Response
     */
    public function edit(VariationOption $variationOption)
    {
        return view('manage.page.variation_options.edit', compact('variationOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VariationOption  $variationOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVariationOptionRequest $request, VariationOption $variationOption)
    {
        $variationOption->update([
            'title' => $request->get('title'),
            'variation_id' => $request->get('variation_id'),
            'show_order' => $request->get('show_order'),
        ]);

        return redirect()->route('manage.variation_options.index', $variationOption->variation_id)->with('success', __('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VariationOption  $variationOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(VariationOption $variationOption)
    {
        $variationOption->delete();
        return redirect()->route('manage.variation_options.index', $variationOption->variation_id)->with('success', __('messages.deleted'));
    }

    /**
     * Toggle the active status of the specified variation option.
     *
     * @param  \App\Models\VariationOption  $variationOption
     * @return \Illuminate\Http\Response
     */
    public function toggleActive(VariationOption $variationOption)
    {
        $variationOption->is_active = !$variationOption->is_active;
        $variationOption->save();

        return redirect()->route('manage.variation_options.index', $variationOption->variation_id)->with('success',  __('messages.status'));
    }
}
