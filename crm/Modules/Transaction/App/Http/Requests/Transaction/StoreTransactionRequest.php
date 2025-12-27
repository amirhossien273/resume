<?php

namespace Modules\Transaction\App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\Customer\App\Models\Customer;
use Modules\Transaction\App\Enums\ShareTypeEnum;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */

    public function rules(): array
    {
        return [
            'name'               => 'required|string|max:255',
            'approximate_amount' => 'nullable|numeric|min:0',
            'type_id'            => 'nullable|exists:transaction_types,id',
            'description'        => 'nullable|string',
            'deal_closed_at'     => 'nullable|string',
            'product_id'         => 'required|exists:products,id',

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


            'creator_type'      => 'required|string',
            'product_type'      => 'required|string',
            'responsible_type'  => 'required|string',
            'customer_type'     => 'required|string',

            'customer_id'       => 'nullable|exists:customers,id',
            'firstname'         => 'required_without:customer_id|string|max:255',
            'lastname'          => 'required_without:customer_id|string|max:255',
            'mobile' => [
                Rule::requiredIf(!$this->filled('customer_id')),
                'regex:/^09\d{9}$/',
                'max:20',
                Rule::unique('customers')
                    ->whereNull('deleted_at')
                    ->ignore($this->customer_id, 'id'),
            ],
            'province_id'       => 'required_without:customer_id|exists:provinces,id',
            'city_id'           => 'required_without:customer_id|exists:cities,id',
            'address'           => 'required_without:customer_id|string|max:500',
            'company'           => ['nullable', 'string', 'max:255', 'required_if:type,company',],
            'company_phone'     => 'nullable|string|max:100',
            'business_id'       => 'required|exists:businesses,id',
            'type'              => 'required|in:' . implode(',', array_keys(Customer::getTypes())),
            'customers_type'    => 'required|in:' . implode(',', array_keys(Customer::getCustomerTypes())),
        ];
    }


    public function messages(): array
    {
        return [
            'name.required'                => 'وارد کردن نام تراکنش الزامی است.',
            'name.string'                  => 'نام تراکنش باید متن باشد.',
            'name.max'                     => 'نام تراکنش نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',
            'approximate_amount.numeric'   => 'مبلغ احتمالی باید عدد باشد.',
            'approximate_amount.min'       => 'مبلغ احتمالی نمی‌تواند منفی باشد.',
            'type_id.exists'               => 'نوع آشنایی انتخاب شده معتبر نیست.',
            'description.string'           => 'توضیحات باید متن باشد.',
            'deal_closed_at.string'        => 'تاریخ پیشنهادی خاتمه معتبر نیست.',
            'product_id.required'          => 'انتخاب محصول الزامی است.',
            'product_id.integer'           => 'محصول انتخاب شده معتبر نیست.',
            'product_id.exists'            => 'محصول انتخاب شده در سیستم وجود ندارد.',
            'responsibles.array'           => 'همکاران باید به صورت آرایه انتخاب شوند.',
            'responsibles.*.exists'        => 'همکار انتخاب شده معتبر نیست.',

            'creator_type.required'        => 'نوع سازنده تراکنش مشخص نشده است.',
            'product_type.required'        => 'نوع محصول مشخص نشده است.',
            'responsible_type.required'    => 'نوع مسئول مشخص نشده است.',
            'customer_type.required'    => 'نوع مسئول مشخص نشده است.',

            'customer_id.exists'           => 'مشتری انتخاب شده معتبر نیست.',
            'firstname.required_without'   => 'وارد کردن نام مشتری الزامی است.',
            'firstname.string'             => 'نام مشتری باید متن باشد.',
            'firstname.max'                => 'نام مشتری نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',
            'lastname.required_without'    => 'وارد کردن نام خانوادگی مشتری الزامی است.',
            'lastname.string'              => 'نام خانوادگی مشتری باید متن باشد.',
            'lastname.max'                 => 'نام خانوادگی مشتری نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',
            'mobile.required'              => 'وارد کردن شماره موبایل مشتری الزامی است.',
            'mobile.unique'                => 'این شماره موبایل قبلاً ثبت شده است.',
            'mobile.regex'                 => 'فرمت شماره موبایل صحیح نیست. شماره باید با 09 شروع شده و 11 رقم باشد.',
            'mobile.max'                   => 'شماره موبایل نباید بیشتر از ۲۰ کاراکتر باشد.',
            'province_id.required_without' => 'انتخاب استان مشتری الزامی است.',
            'province_id.exists'           => 'استان انتخاب شده معتبر نیست.',
            'city_id.required_without'     => 'انتخاب شهر مشتری الزامی است.',
            'city_id.exists'               => 'شهر انتخاب شده معتبر نیست.',
            'address.required_without'     => 'وارد کردن آدرس مشتری الزامی است.',
            'address.string'               => 'آدرس باید متن باشد.',
            'address.max'                  => 'آدرس نمی‌تواند بیش از ۵۰۰ کاراکتر باشد.',
            'business_id.required'         => 'کسب‌وکار الزامی است.',
            'business_id.exists'           => 'کسب‌وکار انتخاب شده معتبر نیست.',
            'type.required'                => 'نوع مشتری الزامی است.',
            'type.in'                      => 'نوع مشتری انتخاب شده معتبر نیست.',
            'company.required_if'          => 'در صورت انتخاب مشتری حقوقی، وارد کردن نام شرکت الزامی است.',
            'company.string'               => 'نام شرکت باید به صورت متن باشد.',
            'company.max'                  => 'نام شرکت نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'company_phone.string'         => 'شماره تلفن شرکت باید به صورت متن باشد.',
            'company_phone.max'            => 'شماره تلفن شرکت نباید بیشتر از ۱۰۰ کاراکتر باشد.',
            'customers_type.required'      => 'نوع شخصیت مشتری الزامی است.',
            'customers_type.in'            => 'نوع شخصیت مشتری معتبر نیست.',

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
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $responsibles = $this->responsibles ?? [];
            $shareType = $this->share_type;

            // بررسی تکراری بودن کاربران
            $userIds = array_column($responsibles, 'user_id');
            if(count($userIds) !== count(array_unique($userIds))) {
                $validator->errors()->add('responsibles', 'هر کاربر فقط یک‌بار می‌تواند سهم داشته باشد.');
            }

            // بررسی مجموع درصد
            if($shareType === 'percent') {
                $totalPercent = array_sum(array_column($responsibles, 'share_value'));
                if($totalPercent > 100) {
                    $validator->errors()->add('responsibles', 'مجموع سهم‌ها نمی‌تواند بیشتر از 100٪ باشد.');
                }
            }
        });
    }

}
