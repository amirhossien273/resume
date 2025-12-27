<?php

namespace Modules\Flow\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Flow\App\Models\Flow;
use Modules\Flow\App\Models\FlowStep;
use Modules\Flow\App\Models\Flowable;
use Modules\Flow\App\Models\FlowableHistory;

class FlowSeeder extends Seeder
{
    public function run()
    {
        // === ایجاد Flow نمونه ===
        $flow = Flow::create([
            'name'        => 'Transaction Approval Flow',
            'description' => 'Flow for approving transactions step-by-step',
            'slug'        => 'transaction',
            'created_by'  => 1, // اگر ندارید 1 بزنید
        ]);

        // === ایجاد Step‌ها ===
        $steps = [
            ['name' => 'ثبت اولیه', 'order' => 1, 'type' => 'start'],
            ['name' => 'بررسی کارشناس', 'order' => 2, 'type' => 'review'],
            ['name' => 'تایید مدیر', 'order' => 3, 'type' => 'approve'],
            ['name' => 'پایان', 'order' => 4, 'type' => 'end'],
        ];

        foreach ($steps as $step) {
            FlowStep::create([
                'flow_id' => $flow->id,
                'name'    => $step['name'],
                'order'   => $step['order'],
                'type'    => $step['type'],
            ]);
        }

        // === گرفتن step اول برای اینکه Flowable در آن قرار بگیرد ===
        $firstStep = FlowStep::where('flow_id', $flow->id)->orderBy('order')->first();

        $flowable = Flowable::create([
            'flow_id'         => $flow->id,
            'current_step_id' => $firstStep->id,
            'status'          => 'pending',


            'src_type'        => 'App\Models\Transaction',
            'src_id'          => 1,
        ]);

        // === اگر خواستی History هم بسازی ===
        FlowableHistory::create([
            'flowable_id' => $flowable->id,
            'step_id'     => $firstStep->id,
            'user_id'     => 1,
            'comment'     => 'Flow started successfully (seed)',
        ]);
    }
}
