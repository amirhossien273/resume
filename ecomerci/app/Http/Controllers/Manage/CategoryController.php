<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\Category\StoreCategoryRequest;
use App\Http\Requests\Manage\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Service\Media\MediaService;
use Module\Media\Src\MediaUploader;
use Module\Media\Src\Models\Media;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('manage.page.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.page.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {

        $category = new Category([
            'title'      => $request->get('title'),
            'slug'       => $request->get('title'),
            'content'    => $request->get('content'),
            'creator_id' => auth()->id(),
            'show_order' => $request->get('show_order'),
        ]);

        $category->save();

        if ($request->hasFile('image')) {
            $media = MediaUploader::source($request->file('image'))
            ->useName($category->title)
            ->useFileName(now()->timestamp)
            ->usePatch('category')
            ->useCollection('category')
            ->upload();

            $category->media()->syncWithPivotValues([$media->id], ["channel" => 'category']);
        }

        return redirect()->route('manage.categories.index')->with('success',  __('messages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('manage.page.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('manage.page.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {


        $category->update([
            'title'      => $request->get('title'),
            'slug'       => $request->get('slug'),
            'content'    => $request->get('content'),
            'show_order' => $request->get('show_order'),
        ]);

        if ($request->hasFile('image')) {
            $media = MediaUploader::source($request->file('image'))
            ->useName($category->title)
            ->useFileName(now()->timestamp)
            ->usePatch('category')
            ->useCollection('category')
            ->upload();

            $category->media()->syncWithPivotValues([$media->id], ["channel" => 'category']);
        }

        return redirect()->route('manage.categories.index')->with('success',  __('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('manage.categories.index')->with('success', __('messages.deleted'));
    }

    /**
     * Toggle the active status of the specified category.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function toggleActive(Category $category)
    {
        $category->is_active = !$category->is_active;
        $category->save();

        return redirect()->route('manage.categories.index')->with('success',  __('messages.status'));
    }
}
