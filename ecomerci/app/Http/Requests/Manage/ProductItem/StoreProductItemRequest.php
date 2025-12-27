<?php

namespace App\Http\Requests\Manage\ProductItem;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductItemRequest extends FormRequest
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
            'reject_reason'    => 'nullable|string',
            'price'            => 'required|integer',
            'quantity'         => 'nullable|integer',
            'consign_quantity' => 'nullable|integer',
            'total_quantity'   => 'nullable|integer',
            'max_basket_limit' => 'nullable|integer',
            'is_available'     => 'boolean',
            'is_special'       => 'boolean',
            'is_new'           => 'boolean',
            'is_best_seller'   => 'boolean',
            'is_on_sale'       => 'boolean',
            'box'              => 'nullable|string',
            'show_order'       => 'integer',
        ];
    }
}
