<div>
    @php
    $currentStepId = $transaction->flowable->current_step_id;
    @endphp

    <div style="width:400px;margin:auto" class="flow-tree">
        @foreach ($transaction->flowable->histories as $index => $step)
            @php
                if ($step->step_id == $currentStepId) {
                    $status = 'current';
                } else {
                    $status = 'completed';
                }

                $side = $index % 2 === 0 ? 'left' : 'right';
            @endphp

            <div class="step {{ $status }} {{ $side }}">
                {{ $step->step->name }}
            </div>

            @if (! $loop->last)
                <div class="connector"></div>
            @endif
        @endforeach
    </div>
</div>

<style>
    .flow-tree {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 40px;
    }

    .step {
    position: relative;
    width: 200px;
    padding: 10px 15px;
    margin: 15px 0;
    background-color: #f4f4f4;
    border-radius: 6px;
    border-left: 5px solid #ccc;
    }

    .step.completed {
    border-left-color: #4caf50;
    background-color: #e8f5e9;
    }

    .step.current {
    border-left-color: #2196f3;
    background-color: #e3f2fd;
    font-weight: bold;
    }

    .step.left {
    align-self: flex-start;
    border-left-width: 5px;
    }

    .step.right {
    align-self: flex-end;
    border-left-width: 0;
    border-right: 5px solid #ccc;
    border-radius: 6px;
    }

    .step.right.completed {
    border-right-color: #4caf50;
    }

    .step.right.current {
    border-right-color: #2196f3;
    }
    .connector {
    width: 2px;
    height: 30px;
    background: #ccc;
    position: relative;
    }

    .connector::before {
    content: '';
    position: absolute;
    width: 50px;
    height: 2px;
    background: #ccc;
    top: 50%;
    }


    .connector:nth-child(even)::before {
    left: 0;
    }

    .connector:nth-child(odd)::before {
    right: 0;
    }
</style>