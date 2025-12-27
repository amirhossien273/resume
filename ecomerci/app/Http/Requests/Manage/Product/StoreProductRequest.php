<?php

namespace App\Http\Requests\Manage\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title'       => 'required|string|max:255',
            // 'slug'        => 'required|string|max:255|unique:products,slug',
            'content'     => 'required|string',
            'intro'       => 'required|string',
            'show_order'  => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'gallery'     => 'sometimes|array',
            'gallery.*'   => 'file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
