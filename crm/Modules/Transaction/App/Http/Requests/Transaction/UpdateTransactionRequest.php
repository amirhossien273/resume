<?php

namespace Modules\Transaction\App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'approximate_amount' => ['nullable', 'numeric'],
            'deal_closed_at'     => ['nullable', 'date'],
            'status'             => ['required', 'in:running,success,failed'],
            'description'        => ['nullable', 'string'],
            'responsibles' => ['nullable', 'array'],
            'responsibles.*.user_id' => [
                'required_with:responsibles.*.share_value',
                'nullable',
                'exists:users,id',
            ],

            'responsibles.*.share_type' => [
                'nullable',
                'in:percentage',
            ],
            'responsibles.*.share_value' => [
                'required_with:responsibles.*.user_id',
                'nullable',
                'numeric',
                'min:1',
                'max:100',
            ],

        ];
    }

    public function messages()
    {
        return [
            'status.in' => 'وضعیت انتخاب‌شده معتبر نیست.',

            'responsibles.*.user_id.exists'         => 'همکار انتخاب شده معتبر نیست.',
            'responsibles.*.share_value.numeric'    => 'میزان سهم باید عدد باشد.',
            'responsibles.*.share_value.min'        => 'میزان سهم باید بزرگتر از صفر باشد.',

            'responsibles.*.share_value.required_with' => 'میزان سهم الزامی است.',
            'responsibles.*.user_id.required_with'     => 'وقتی میزان سهم وارد می‌شود، انتخاب همکار الزامی است.',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
