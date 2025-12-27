<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Service\Media\MediaService;
use Illuminate\Http\Request;
use Module\Media\Src\MediaUploader;

class BannerController extends Controller
{
    /**
     * Display a listing of the banners.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $banners = Banner::with('media')->get();
        return view('manage.page.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new banner.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('manage.page.banners.create');
    }

    /**
     * Store a newly created banner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $banner = Banner::create([
            'title' => $request->title,
            'link' => $request->link,
        ]);

        if ($request->hasFile('image')) {
            $media = MediaUploader::source($request->file('image'))
            ->useName($banner->title)
            ->useFileName(now()->timestamp)
            ->usePatch('banner')
            ->useCollection('banner')
            ->upload();

            $banner->media()->syncWithPivotValues([$media->id], ["channel" => 'banner']);
        }

        return redirect()->route('manage.banners.index')->with('success',  __('messages.created'));
    }

    /**
     * Display the specified banner.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\View\View
     */
    public function show(Banner $banner)
    {
        return view('manage.page.banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified banner.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\View\View
     */
    public function edit(Banner $banner)
    {
        return view('manage.page.banners.edit', compact('banner'));
    }

    /**
     * Update the specified banner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Banner $banner)
    {

        $banner->title = $request->title;
        $banner->link = $request->link;
        $banner->save();

        if ($request->hasFile('image')) {
            $media = MediaUploader::source($request->file('image'))
            ->useName($banner->title)
            ->useFileName(now()->timestamp)
            ->usePatch('banner')
            ->useCollection('banner')
            ->upload();

            $banner->media()->syncWithPivotValues([$media->id], ["channel" => 'banner']);
        }

        return redirect()->route('manage.banners.index')->with('success',  __('messages.updated'));
    }

    /**
     * Remove the specified banner from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('manage.banners.index')->with('success', __('messages.deleted'));
    }

    /**
     * Toggle the active status of the specified banner.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleActive(Banner $banner)
    {
        $banner->is_active = !$banner->is_active;
        $banner->save();

        return redirect()->route('manage.banners.index')->with('success',  __('messages.status'));
    }
}
