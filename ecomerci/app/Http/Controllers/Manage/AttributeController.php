<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\Attribute\StoreAttributeRequest;
use App\Http\Requests\Manage\Attribute\UpdateAttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::all();
        return view('manage.page.attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.page.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttributeRequest $request)
    {

        $attribute = new Attribute([
            'title'      => $request->get('title'),
            'show_order' => $request->get('show_order'),
            'creator_id' => auth()->id(),
        ]);

        $attribute->save();

        return redirect()->route('manage.attributes.index')->with('success', __('messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        return view('manage.page.attribute.show', compact('attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return view('manage.page.attribute.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {

        $attribute->update([
            'title'      => $request->get('title'),
            'show_order' => $request->get('show_order'),
            'creator_id' => auth()->id(),
        ]);

        return redirect()->route('manage.attributes.index')->with('success', __('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return redirect()->route('manage.attributes.index')->with('success',  __('messages.deleted'));
    }

    /**
     * Toggle the active status of the specified attribute.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function toggleActive(Attribute $attribute)
    {
        $attribute->is_active = !$attribute->is_active;
        $attribute->save();

        return redirect()->route('manage.attributes.index')->with('success', __('messages.status'));
    }
}
