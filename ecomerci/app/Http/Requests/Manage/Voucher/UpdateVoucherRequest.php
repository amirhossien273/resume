<?php

namespace App\Http\Requests\Manage\Voucher;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoucherRequest extends FormRequest
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
            // 'code'             => 'required|string|max:50|unique:vouchers,code,' . $this->route('voucher'),
            'content'          => 'nullable|string',
            'start_at'         => 'required|date',
            'end_at'           => 'required|date|after_or_equal:start_at',
            'discount_price'   => 'nullable|numeric|min:0',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'usage_limit'      => 'required|integer|min:1',
            'min_cart_price'   => 'nullable|numeric|min:0',
            'max_discount'     => 'nullable|numeric|min:0',
            'is_reusable'      => 'nullable|boolean',
            'is_first_order'   => 'nullable|boolean',
        ];
    }
}
