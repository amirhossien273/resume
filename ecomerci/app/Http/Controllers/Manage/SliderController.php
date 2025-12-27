<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\Slider\StoreSliderRequest;
use App\Http\Requests\Manage\Slider\UpdateSliderRequest;
use App\Models\Media;
use App\Models\Slider;
use App\Service\Media\MediaService;
use Illuminate\Http\Request;
use Module\Media\Src\MediaUploader;

class SliderController extends Controller
{
        /**
     * Display a listing of the sliders.
     *
     * @route GET /sliders
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('manage.page.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new slider.
     *
     * @route GET /sliders/create
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('manage.page.sliders.create');
    }

    /**
     * Store a newly created slider in the database.
     *
     * @route POST /sliders
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $slider = Slider::create([
            'title' => $request->title,
            'intro' => $request->intro,
            'url' => $request->url,
        ]);

        if ($request->hasFile('image')) {
            $media = MediaUploader::source($request->file('image'))
            ->useName($slider->title)
            ->useFileName(now()->timestamp)
            ->usePatch('slider')
            ->useCollection('slider')
            ->upload();

            $slider->media()->syncWithPivotValues([$media->id], ["channel" => 'slider']);
        }

        return redirect()->route('manage.sliders.index')->with('success',  __('messages.created'));
    }

    /**
     * Show the form for editing the specified slider.
     *
     * @route GET /sliders/{id}/edit
     * @param  Slider $slider
     * @return \Illuminate\View\View
     */
    public function edit(Slider $slider)
    {
        return view('manage.page.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified slider in the database.
     *
     * @route PUT /sliders/{id}
     * @param  \Illuminate\Http\Request  $request
     * @param  Slider $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {

        $slider->title = $request->title;
        $slider->intro = $request->intro;
        $slider->url = $request->url;
        $slider->save();
        if ($request->hasFile('image')) {
            $media = MediaUploader::source($request->file('image'))
            ->useName(now()->timestamp)
            ->useFileName(now()->timestamp)
            ->usePatch('slider')
            ->useCollection('slider')
            ->upload();

            $slider->media()->syncWithPivotValues([$media->id], ["channel" => 'slider']);
        }

        return redirect()->route('manage.sliders.index')->with('success',  __('messages.updated'));
    }

    /**
     * Remove the specified slider from the database.
     *
     * @route DELETE /sliders/{id}
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('manage.sliders.index')->with('success', __('messages.deleted'));
    }
}
