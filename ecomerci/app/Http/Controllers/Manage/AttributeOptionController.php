<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\AttributeOption\StoreAttributeOptionRequest;
use App\Http\Requests\Manage\AttributeOption\UpdateAttributeOptionRequest;
use App\Models\Attribute;
use App\Models\AttributeOption;
use Illuminate\Http\Request;

class AttributeOptionController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Attribute $attribute)
    {
        $attributeOptions = AttributeOption::where('attribute_id', $attribute->id)
        ->with('attribute', 'creator')->get();
        return view('manage.page.attribute_options.index', compact('attributeOptions', 'attribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.page.attribute_options.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttributeOptionRequest $request)
    {

        $attributeOption = new AttributeOption([
            'title' => $request->get('title'),
            'attribute_id' => $request->get('attribute_id'),
            'show_order' => $request->get('show_order'),
            'creator_id' => auth()->id(),
        ]);

        $attributeOption->save();

        return redirect()->route('manage.attribute_options.index', $attributeOption->attribute_id)->with('success',  __('messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttributeOption  $attributeOption
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeOption $attributeOption)
    {
        return view('manage.page.attribute_options.show', compact('attributeOption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributeOption  $attributeOption
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeOption $attributeOption)
    {
        return view('manage.page.attribute_options.edit', compact('attributeOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttributeOption  $attributeOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeOptionRequest $request, AttributeOption $attributeOption)
    {
        $attributeOption->update([
            'title' => $request->get('title'),
            'attribute_id' => $request->get('attribute_id'),
            'show_order' => $request->get('show_order'),
        ]);

        return redirect()->route('manage.attribute_options.index', $attributeOption->attribute_id)->with('success',  __('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeOption  $attributeOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeOption $attributeOption)
    {
        $attributeOption->delete();
        return redirect()->route('manage.attribute_options.index', $attributeOption->attribute_id)->with('success', __('messages.deleted'));
    }

    /**
     * Toggle the active status of the specified attribute option.
     *
     * @param  \App\Models\AttributeOption  $attributeOption
     * @return \Illuminate\Http\Response
     */
    public function toggleActive(AttributeOption $attributeOption)
    {
        $attributeOption->is_active = !$attributeOption->is_active;
        $attributeOption->save();

        return redirect()->route('manage.attribute_options.index', $attributeOption->attribute_id)->with('success', __('messages.status'));
    }
}
