<?php

namespace Modules\Task\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskDateTimeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'due_date' => [
                'required',
                'regex:/^\d{4}-\d{2}-\d{2}$/',
            ],
            'task_time' => [
                'required',
                'date_format:H:i:s',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'due_date.required' => 'تاریخ الزامی است',
            'due_date.regex' => 'فرمت تاریخ معتبر نیست',
            'task_time.required' => 'ساعت الزامی است',
            'task_time.date_format' => 'فرمت ساعت معتبر نیست',
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
