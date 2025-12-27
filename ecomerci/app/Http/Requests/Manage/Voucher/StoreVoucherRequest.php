<?php

namespace App\Http\Requests\Manage\Voucher;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoucherRequest extends FormRequest
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
            'title'            => 'required|string|max:255',
            'content'          => 'nullable|string',
            'code'             => 'required|string|unique:vouchers,code',
            'start_at'         => 'required|date',
            'end_at'           => 'required|date|after_or_equal:start_at',
            'discount_price'   => 'nullable|numeric',
            'discount_percent' => 'nullable|integer|min:0|max:100',
            'usage_limit'      => 'nullable|integer|min:1',
            'min_cart_price'   => 'nullable|numeric',
            'max_discount'     => 'nullable|numeric',
            'is_reusable'      => 'boolean',
            'is_first_order'   => 'boolean',
        ];
    }
}
