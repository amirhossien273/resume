<?php

namespace App\Http\Requests\Manage\AttributeOption;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAttributeOptionRequest extends FormRequest
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
            'title'        => 'required|string|max:255',
            'attribute_id' => 'required|exists:attributes,id',
            'show_order'   => 'required|integer',
        ];
    }
}
