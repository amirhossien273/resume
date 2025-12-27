<?php

namespace Modules\Transaction\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Transaction\App\Enums\ResponsibleStatusEnum;
use Modules\Transaction\App\Models\Responsible;

class ResponsibleController extends Controller
{
    public function accept(Responsible $responsible)
    {
        abort_if($responsible->model_id !== auth()->id(), 403);

        $responsible->forceFill([
            'status' => ResponsibleStatusEnum::ACCEPTED->value,
        ])->save();

        return response()->json([
            'success' => true,
            'status'  => $responsible->status,
        ]);
    }

    public function reject(Responsible $responsible)
    {
        abort_if($responsible->model_id !== auth()->id(), 403);

        $responsible->forceFill([
            'status' => ResponsibleStatusEnum::REJECTED->value,
        ])->save();

        return response()->json([
            'success' => true,
            'status'  => $responsible->status,
        ]);
    }
}
