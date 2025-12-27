<?php

namespace App\Http\Requests\Manage\ProductItem;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductItemRequest extends FormRequest
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
            'product_id'       => 'required|exists:products,id',
            'price'            => 'required|integer',
            'quantity'         => 'required|integer',
            'consign_quantity' => 'nullable|integer',
            'total_quantity'   => 'nullable|integer',
            'max_basket_limit' => 'nullable|integer',
            'is_available'     => 'boolean',
            'is_special'       => 'boolean',
            'is_new'           => 'boolean',
            'is_best_seller'   => 'boolean',
            'is_on_sale'       => 'boolean',
            'state_enum'       => 'required|in:DRAFT,PENDING,APPROVED,REJECTED',
            'box'              => 'nullable|string',
            'show_order'       => 'nullable|integer',
            // 'variation_ids'    => 'nullable|array',
            // 'variation_ids.*'  => 'exists:variations,id',
        ];
    }
}
