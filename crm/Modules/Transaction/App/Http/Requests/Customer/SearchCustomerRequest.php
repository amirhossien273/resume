<?php

namespace Modules\Transaction\App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class SearchCustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'query' => 'required|string|min:2',
        ];
    }

    public function messages()
    {
        return [
            'query.required' => 'لطفاً نام مشتری را وارد کنید.',
            'query.string' => 'نام مشتری باید متن باشد.',
            'query.min' => 'نام مشتری باید حداقل دو حرف داشته باشد.',
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
