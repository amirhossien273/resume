<?php

namespace Modules\Ticket\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'subject'        => 'required|string|max:255',
            'description'    => 'nullable|string',
            'status'         => 'required|in:open,in_progress,closed',
            'priority'       => 'required|in:low,medium,high',
            'ticketable_id'  => 'nullable|integer',
            'ticketable_type'=> 'nullable|string',
            'assigned_to'    => 'nullable|exists:users,id',
            'file'           => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ];
    }

    public function messages(): array
    {
        return [
            'subject.required'         => 'عنوان تیکت الزامی است.',
            'subject.string'           => 'عنوان باید یک متن باشد.',
            'subject.max'              => 'عنوان نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'description.string'       => 'توضیحات باید متن باشد.',
            'status.required'          => 'وضعیت تیکت الزامی است.',
            'status.in'                => 'وضعیت انتخاب شده معتبر نیست.',
            'priority.required'        => 'اولویت تیکت الزامی است.',
            'priority.in'              => 'اولویت انتخاب شده معتبر نیست.',
            'ticketable_id.integer'    => 'شناسه مورد مرتبط معتبر نیست.',
            'ticketable_type.string'   => 'نوع مورد مرتبط معتبر نیست.',
            'assigned_to.exists'       => 'کاربر انتخاب شده معتبر نیست.',
            'file.mimes'               => 'فرمت فایل فقط میتواند jpg، png، jpeg، یا pdf باشد.',
        ];
    }
}
