<?php

namespace Modules\Customer\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Customer\App\Models\Customer;

class CustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|min:20|max:255',
            'company' => 'nullable|string|max:255',
            'company_phone' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'business_id' => 'required|exists:businesses,id',
            'type' => 'required|in:' . implode(',', array_keys(Customer::getTypes())),
            'customer_type' => 'required|in:' . implode(',', array_keys(Customer::getCustomerTypes())),
        ];

        // unique برای mobile و national_code فقط روی رکوردهای حذف نشده
        if ($this->isMethod('POST')) {
            $rules['mobile'] = [
                'required',
                'regex:/^09\d{9}$/',
                'max:20',
                Rule::unique('customers')->whereNull('deleted_at')
            ];
            $rules['national_code'] = [
                'nullable',
                'regex:/^\d{10}$/',
                'max:10',
                Rule::unique('customers')->whereNull('deleted_at')
            ];
        }

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {

            $customerId = $this->route('customer');

            $rules['mobile'] = [
                'required',
                'regex:/^09\d{9}$/',
                'max:20',
                Rule::unique('customers')->ignore($customerId)->whereNull('deleted_at')
            ];

            $rules['national_code'] = [
                'nullable',
                'regex:/^\d{10}$/',
                'max:10',
                Rule::unique('customers')->ignore($customerId)->whereNull('deleted_at')
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            // Firstname
            'firstname.required' => 'نام الزامی است.',
            'firstname.string' => 'نام باید به صورت متن باشد.',
            'firstname.max' => 'نام نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            // Lastname
            'lastname.required' => 'نام خانوادگی الزامی است.',
            'lastname.string' => 'نام خانوادگی باید به صورت متن باشد.',
            'lastname.max' => 'نام خانوادگی نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            // Email
            'email.email' => 'ایمیل وارد شده معتبر نیست.',
            'email.max' => 'ایمیل نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            // Address
            'address.string' => 'آدرس باید به صورت متن باشد.',
            'address.min' => 'آدرس باید حداقل ۲۰ کاراکتر باشد.',
            'address.max' => 'آدرس نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            // Company
            'company.string' => 'نام شرکت باید به صورت متن باشد.',
            'company.max' => 'نام شرکت نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            // Company phone
            'company_phone.string' => 'شماره تلفن شرکت باید به صورت متن باشد.',
            'company_phone.max' => 'شماره تلفن شرکت نباید بیشتر از ۱۰۰ کاراکتر باشد.',

            // Postal code
            'postal_code.string' => 'کد پستی باید به صورت متن باشد.',
            'postal_code.max' => 'کد پستی نباید بیشتر از ۲۰ کاراکتر باشد.',

            // Province
            'province_id.required' => 'استان الزامی است.',
            'province_id.exists' => 'استان انتخاب شده معتبر نیست.',

            // City
            'city_id.required' => 'شهر الزامی است.',
            'city_id.exists' => 'شهر انتخاب شده معتبر نیست.',

            // Business
            'business_id.required' => 'کسب‌وکار الزامی است.',
            'business_id.exists' => 'کسب‌وکار انتخاب شده معتبر نیست.',

            // Type
            'type.required' => 'نوع مشتری الزامی است.',
            'type.in' => 'نوع مشتری انتخاب شده معتبر نیست.',

            // Customer type
            'customer_type.required' => 'نوع شخصیت مشتری الزامی است.',
            'customer_type.in' => 'نوع شخصیت مشتری معتبر نیست.',

            // Mobile
            'mobile.required' => 'شماره موبایل الزامی است.',
            'mobile.unique' => 'این شماره موبایل قبلاً ثبت شده است.',
            'mobile.regex' => 'فرمت شماره موبایل صحیح نیست. شماره باید با 09 شروع شده و 11 رقم باشد.',
            'mobile.max' => 'شماره موبایل نباید بیشتر از ۲۰ کاراکتر باشد.',

            // National code
            'national_code.unique' => 'این کد ملی قبلاً ثبت شده است.',
            'national_code.regex' => 'فرمت کد ملی صحیح نیست.',
            'national_code.max' => 'کد ملی باید دقیقاً ۱۰ رقم باشد.',
        ];
    }
}
