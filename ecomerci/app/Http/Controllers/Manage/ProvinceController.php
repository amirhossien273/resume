<?php
namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\Province\StoreProvinceRequest;
use App\Http\Requests\Manage\Province\UpdateProvinceRequest;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        return view('manage.page.provinces.index', compact('provinces'));
    }

    public function create()
    {
        return view('manage.page.provinces.create');
    }

    public function store(StoreProvinceRequest $request)
    {
        $province = new Province($request->validated());
        $province->save();

        return redirect()->route('manage.provinces.index')->with('success', __('messages.created'));
    }

    public function show(Province $province)
    {
        return view('manage.page.provinces.show', compact('province'));
    }

    public function edit(Province $province)
    {
        return view('manage.page.provinces.edit', compact('province'));
    }

    public function update(UpdateProvinceRequest $request, Province $province)
    {
        $province->update($request->validated());
        return redirect()->route('manage.provinces.index')->with('success', __('messages.updated'));
    }

    public function destroy(Province $province)
    {
        $province->delete();
        return redirect()->route('manage.provinces.index')->with('success', __('messages.deleted'));
    }

    public function toggleActive(Province $province)
    {
        $province->is_active = !$province->is_active;
        $province->save();

        return redirect()->route('manage.provinces.index')->with('success', __('messages.status'));
    }
}
