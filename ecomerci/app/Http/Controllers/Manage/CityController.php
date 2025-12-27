<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\City\StoreCityRequest;
use App\Http\Requests\Manage\City\UpdateCityRequest;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::with('province')->get();
        return view('manage.page.cities.index', compact('cities'));
    }

    public function create()
    {
        $provinces = Province::all();
        return view('manage.page.cities.create', compact('provinces'));
    }

    public function store(StoreCityRequest $request)
    {
        $city = new City($request->validated());
        $city->save();

        return redirect()->route('manage.cities.index')->with('success', __('messages.created'));
    }

    public function show(City $city)
    {
        return view('manage.page.cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        $provinces = Province::all();
        return view('manage.page.cities.edit', compact('city', 'provinces'));
    }

    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());
        return redirect()->route('manage.cities.index')->with('success', __('messages.updated'));
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('manage.cities.index')->with('success', __('messages.deleted'));
    }

    public function toggleActive(City $city)
    {
        $city->is_active = !$city->is_active;
        $city->save();

        return redirect()->route('manage.cities.index')->with('success', __('messages.status'));
    }
}
