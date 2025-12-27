<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'فیلد :attribute باید پذیرفته شود.',
    'accepted_if' => 'فیلد :attribute باید پذیرفته شود وقتی :other برابر :value باشد.',
    'active_url' => 'فیلد :attribute باید یک URL معتبر باشد.',
    'after' => 'فیلد :attribute باید یک تاریخ بعد از :date باشد.',
    'after_or_equal' => 'فیلد :attribute باید یک تاریخ بعد یا برابر :date باشد.',
    'alpha' => 'فیلد :attribute فقط باید شامل حروف باشد.',
    'alpha_dash' => 'فیلد :attribute فقط باید شامل حروف، اعداد، خط فاصله و زیرخط باشد.',
    'alpha_num' => 'فیلد :attribute فقط باید شامل حروف و اعداد باشد.',
    'array' => 'فیلد :attribute باید یک آرایه باشد.',
    'ascii' => 'فیلد :attribute باید فقط شامل کاراکترهای الفبایی-عددی تک بایتی و نمادها باشد.',
    'before' => 'فیلد :attribute باید یک تاریخ قبل از :date باشد.',
    'before_or_equal' => 'فیلد :attribute باید یک تاریخ قبل یا برابر :date باشد.',
    'between' => [
        'array' => 'فیلد :attribute باید بین :min و :max آیتم داشته باشد.',
        'file' => 'فیلد :attribute باید بین :min و :max کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید بین :min و :max باشد.',
        'string' => 'فیلد :attribute باید بین :min و :max کاراکتر باشد.',
    ],
    'boolean' => 'فیلد :attribute باید true یا false باشد.',
    'can' => 'فیلد :attribute شامل یک مقدار غیرمجاز است.',
    'confirmed' => 'تایید فیلد :attribute مطابقت ندارد.',
    'current_password' => 'گذرواژه اشتباه است.',
    'date' => 'فیلد :attribute باید یک تاریخ معتبر باشد.',
    'date_equals' => 'فیلد :attribute باید یک تاریخ برابر با :date باشد.',
    'date_format' => 'فیلد :attribute باید با قالب :format مطابقت داشته باشد.',
    'decimal' => 'فیلد :attribute باید :decimal رقم اعشار داشته باشد.',
    'declined' => 'فیلد :attribute باید رد شود.',
    'declined_if' => 'فیلد :attribute باید رد شود وقتی :other برابر :value باشد.',
    'different' => 'فیلد :attribute و :other باید متفاوت باشند.',
    'digits' => 'فیلد :attribute باید :digits رقم باشد.',
    'digits_between' => 'فیلد :attribute باید بین :min و :max رقم باشد.',
    'dimensions' => 'فیلد :attribute ابعاد تصویر نامعتبر دارد.',
    'distinct' => 'فیلد :attribute مقدار تکراری دارد.',
    'doesnt_end_with' => 'فیلد :attribute نباید با یکی از موارد زیر خاتمه یابد: :values.',
    'doesnt_start_with' => 'فیلد :attribute نباید با یکی از موارد زیر شروع شود: :values.',
    'email' => 'فیلد :attribute باید یک ایمیل معتبر باشد.',
    'ends_with' => 'فیلد :attribute باید با یکی از موارد زیر خاتمه یابد: :values.',
    'enum' => 'فیلد انتخاب شده :attribute نامعتبر است.',
    'exists' => 'فیلد انتخاب شده :attribute نامعتبر است.',
    'extensions' => 'فیلد :attribute باید یکی از پسوندهای زیر را داشته باشد: :values.',
    'file' => 'فیلد :attribute باید یک فایل باشد.',
    'filled' => 'فیلد :attribute باید دارای مقدار باشد.',
    'gt' => [
        'array' => 'فیلد :attribute باید بیش از :value آیتم داشته باشد.',
        'file' => 'فیلد :attribute باید بزرگتر از :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید بزرگتر از :value باشد.',
        'string' => 'فیلد :attribute باید بزرگتر از :value کاراکتر باشد.',
    ],
    'gte' => [
        'array' => 'فیلد :attribute باید حداقل :value آیتم یا بیشتر داشته باشد.',
        'file' => 'فیلد :attribute باید بزرگتر یا برابر :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید بزرگتر یا برابر :value باشد.',
        'string' => 'فیلد :attribute باید بزرگتر یا برابر :value کاراکتر باشد.',
    ],
    'hex_color' => 'فیلد :attribute باید یک رنگ هگزا دسیمال معتبر باشد.',
    'image' => 'فیلد :attribute باید یک تصویر باشد.',
    'in' => 'فیلد انتخاب شده :attribute نامعتبر است.',
    'in_array' => 'فیلد :attribute باید در :other وجود داشته باشد.',
    'integer' => 'فیلد :attribute باید یک عدد صحیح باشد.',
    'ip' => 'فیلد :attribute باید یک آدرس IP معتبر باشد.',
    'ipv4' => 'فیلد :attribute باید یک آدرس IPv4 معتبر باشد.',
    'ipv6' => 'فیلد :attribute باید یک آدرس IPv6 معتبر باشد.',
    'json' => 'فیلد :attribute باید یک رشته JSON معتبر باشد.',
    'list' => 'فیلد :attribute باید یک لیست باشد.',
    'lowercase' => 'فیلد :attribute باید با حروف کوچک باشد.',
    'lt' => [
        'array' => 'فیلد :attribute باید کمتر از :value آیتم داشته باشد.',
        'file' => 'فیلد :attribute باید کمتر از :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید کمتر از :value باشد.',
        'string' => 'فیلد :attribute باید کمتر از :value کاراکتر باشد.',
    ],
    'lte' => [
        'array' => 'فیلد :attribute نباید بیشتر از :value آیتم داشته باشد.',
        'file' => 'فیلد :attribute باید کمتر یا برابر :value کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید کمتر یا برابر :value باشد.',
        'string' => 'فیلد :attribute باید کمتر یا برابر :value کاراکتر باشد.',
    ],
    'mac_address' => 'فیلد :attribute باید یک آدرس MAC معتبر باشد.',
    'max' => [
        'array' => 'فیلد :attribute نباید بیشتر از :max آیتم داشته باشد.',
        'file' => 'فیلد :attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute نباید بزرگتر از :max باشد.',
        'string' => 'فیلد :attribute نباید بزرگتر از :max کاراکتر باشد.',
    ],
    'max_digits' => 'فیلد :attribute نباید بیش از :max رقم داشته باشد.',
    'mimes' => 'فیلد :attribute باید یک فایل از نوع: :values باشد.',
    'mimetypes' => 'فیلد :attribute باید یک فایل از نوع: :values باشد.',
    'min' => [
        'array' => 'فیلد :attribute باید حداقل :min آیتم داشته باشد.',
        'file' => 'فیلد :attribute باید حداقل :min کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید حداقل :min باشد.',
        'string' => 'فیلد :attribute باید حداقل :min کاراکتر باشد.',
    ],
    'min_digits' => 'فیلد :attribute باید حداقل :min رقم داشته باشد.',
    'missing' => 'فیلد :attribute باید حذف شده باشد.',
    'missing_if' => 'فیلد :attribute باید حذف شده باشد وقتی :other برابر :value باشد.',
    'missing_unless' => 'فیلد :attribute باید حذف شده باشد مگر اینکه :other برابر :value باشد.',
    'missing_with' => 'فیلد :attribute باید حذف شده باشد وقتی :values حاضر است.',
    'missing_with_all' => 'فیلد :attribute باید حذف شده باشد وقتی :values حاضر هستند.',
    'multiple_of' => 'فیلد :attribute باید مضربی از :value باشد.',
    'not_in' => 'فیلد انتخاب شده :attribute نامعتبر است.',
    'not_regex' => 'قالب فیلد :attribute نامعتبر است.',
    'numeric' => 'فیلد :attribute باید یک عدد باشد.',
    'password' => [
        'letters' => 'فیلد :attribute باید حداقل شامل یک حرف باشد.',
        'mixed' => 'فیلد :attribute باید حداقل شامل یک حرف بزرگ و یک حرف کوچک باشد.',
        'numbers' => 'فیلد :attribute باید حداقل شامل یک عدد باشد.',
        'symbols' => 'فیلد :attribute باید حداقل شامل یک نماد باشد.',
        'uncompromised' => 'فیلد :attribute ارائه شده در یک نشت داده پیدا شده است. لطفا یک :attribute دیگر انتخاب کنید.',
    ],
    'present' => 'فیلد :attribute باید حاضر باشد.',
    'present_if' => 'فیلد :attribute باید حاضر باشد وقتی :other برابر :value باشد.',
    'present_unless' => 'فیلد :attribute باید حاضر باشد مگر اینکه :other برابر :value باشد.',
    'present_with' => 'فیلد :attribute باید حاضر باشد وقتی :values حاضر است.',
    'present_with_all' => 'فیلد :attribute باید حاضر باشد وقتی :values حاضر هستند.',
    'prohibited' => 'فیلد :attribute ممنوع است.',
    'prohibited_if' => 'فیلد :attribute ممنوع است وقتی :other برابر :value باشد.',
    'prohibited_unless' => 'فیلد :attribute ممنوع است مگر اینکه :other در :values باشد.',
    'prohibits' => 'فیلد :attribute :other را از حضور منع می‌کند.',
    'regex' => 'قالب فیلد :attribute نامعتبر است.',
    'required' => 'فیلد :attribute الزامی است.',
    'required_array_keys' => 'فیلد :attribute باید شامل ورودی‌هایی برای: :values باشد.',
    'required_if' => 'فیلد :attribute الزامی است وقتی :other برابر :value باشد.',
    'required_if_accepted' => 'فیلد :attribute الزامی است وقتی :other پذیرفته شود.',
    'required_if_declined' => 'فیلد :attribute الزامی است وقتی :other رد شود.',
    'required_unless' => 'فیلد :attribute الزامی است مگر اینکه :other در :values باشد.',
    'required_with' => 'فیلد :attribute الزامی است وقتی :values حاضر است.',
    'required_with_all' => 'فیلد :attribute الزامی است وقتی :values حاضر هستند.',
    'required_without' => 'فیلد :attribute الزامی است وقتی :values حاضر نیست.',
    'required_without_all' => 'فیلد :attribute الزامی است وقتی هیچکدام از :values حاضر نیستند.',
    'same' => 'فیلد :attribute و :other باید مطابق باشند.',
    'size' => [
        'array' => 'فیلد :attribute باید شامل :size آیتم باشد.',
        'file' => 'فیلد :attribute باید :size کیلوبایت باشد.',
        'numeric' => 'فیلد :attribute باید :size باشد.',
        'string' => 'فیلد :attribute باید :size کاراکتر باشد.',
    ],
    'starts_with' => 'فیلد :attribute باید با یکی از موارد زیر شروع شود: :values.',
    'string' => 'فیلد :attribute باید یک رشته باشد.',
    'timezone' => 'فیلد :attribute باید یک منطقه زمانی معتبر باشد.',
    'unique' => 'فیلد :attribute قبلا گرفته شده است.',
    'uploaded' => 'بارگذاری فیلد :attribute شکست خورد.',
    'uppercase' => 'فیلد :attribute باید با حروف بزرگ باشد.',
    'url' => 'فیلد :attribute باید یک URL معتبر باشد.',
    'ulid' => 'فیلد :attribute باید یک ULID معتبر باشد.',
    'uuid' => 'فیلد :attribute باید یک UUID معتبر باشد.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'پیام سفارشی',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];