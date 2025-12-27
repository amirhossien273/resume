<?php

namespace App\Http\Requests\Manage\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            // 'slug'        => 'required|string|max:255|unique:products,slug,' . $product->id,
            'content'     => 'required|string',
            'intro'       => 'required|string',
            'state_enum'  => 'required|in:DRAFT,PENDING,APPROVED,REJECTED',
            'show_order'  => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }
}
