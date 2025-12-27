<?php
namespace App\Http\Requests\Manage\City;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'show_order' => 'nullable|integer',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'phone_code' => 'nullable|string|max:10',
            'province_id' => 'required|exists:provinces,id',
            'payload' => 'nullable|string',
        ];
    }
}