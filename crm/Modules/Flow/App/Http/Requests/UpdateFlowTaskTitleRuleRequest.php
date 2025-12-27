<?php

namespace Modules\Flow\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Flow\App\Models\FlowTaskTitleRule;

class UpdateFlowTaskTitleRuleRequest extends FormRequest
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

            $ruleId  = $this->route('rule')?->id
                ?? $this->route('flow_task_title_rule')?->id
                ?? $this->route('id');



            $flowId  = $this->input('flow_id');
            $titleId = $this->input('task_title_id');
            $fromId  = $this->input('from_step_id');

            $query = FlowTaskTitleRule::query()
                ->where('flow_id', $flowId)
                ->where('task_title_id', $titleId);

            if (!empty($ruleId)) {
                $query->where('id', '!=', $ruleId);
            }

            if ($fromId === null) {
                $existsGeneral = (clone $query)
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

            $existsSpecific = (clone $query)
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
