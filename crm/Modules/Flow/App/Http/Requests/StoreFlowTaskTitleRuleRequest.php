<?php

namespace Modules\Flow\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Flow\App\Models\FlowTaskTitleRule;

class StoreFlowTaskTitleRuleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'flow_id'       => ['required', 'integer', 'exists:flows,id'],
            'task_title_id' => ['required', 'integer', 'exists:task_titles,id'],
            'from_step_id'  => ['nullable', 'integer', 'exists:flow_steps,id'],
            'to_step_id'    => ['required', 'integer', 'exists:flow_steps,id'],
            'is_active'     => ['sometimes', 'boolean'],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {

            $flowId  = $this->input('flow_id');
            $titleId = $this->input('task_title_id');
            $fromId  = $this->input('from_step_id');

            if ($fromId === null) {
                $existsGeneral = FlowTaskTitleRule::query()
                    ->where('flow_id', $flowId)
                    ->where('task_title_id', $titleId)
                    ->whereNull('from_step_id')
                    ->exists();

                if ($existsGeneral) {
                    $validator->errors()->add(
                        'from_step_id',
                        'برای این عنوان، یک Rule عمومی قبلاً ثبت شده است.'
                    );
                }

                return;
            }

            $existsSpecific = FlowTaskTitleRule::query()
                ->where('flow_id', $flowId)
                ->where('task_title_id', $titleId)
                ->where('from_step_id', $fromId)
                ->exists();

            if ($existsSpecific) {
                $validator->errors()->add(
                    'from_step_id',
                    'برای این مرحله، قبلاً یک Rule ثبت شده است.'
                );
            }
        });
    }
}
