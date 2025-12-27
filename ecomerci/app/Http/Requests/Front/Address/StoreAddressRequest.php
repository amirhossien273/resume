<?php

namespace App\Http\Requests\Front\Address;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:191',
            'city_id'     => 'required|exists:cities,id',
            'latitude'    => 'nullable|numeric',
            'longitude'   => 'nullable|numeric',
            'content'     => 'required|string',
            'no'          => 'nullable|integer',
            'unit'        => 'nullable|string|max:191',
            'postal_code' => 'required|string|max:191',
            'first_name'  => 'required|string|max:191',
            'last_name'   => 'required|string|max:191',
            'phone'       => 'nullable|string|max:191',
            'mobile'      => 'required|string|max:191',
        ];
    }
}
