<?php

namespace App\Http\Requests\Manage\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'      => 'required|string|max:255',
            // 'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'content'    => 'nullable',
            'show_order' => 'required|integer',
        ];
    }
}
