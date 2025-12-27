<?php

namespace Modules\Task\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\App\Models\User;
use Modules\Task\App\Models\Task;
use Modules\Task\App\Models\TaskAssignee;
use Modules\Transaction\App\Models\Transaction;
use Modules\Task\App\Http\Requests\UpdateTaskDateTimeRequest;

class TaskController extends Controller
{
    // لیست همه تسک‌ها
    public function index()
    {
        $tasks = Task::with(['assignees.user','src'])->get();
        $users = User::all();
        return view('task::index', compact('tasks','users'));
    }

    public function create()
    {
        $transactions = Transaction::all();
        $users = User::all();
        return view('task::create', compact('transactions', 'users'));
    }

    public function edit(Task $task)
    {
        $transactions = Transaction::all();
        $users = User::all();
        $task->load('assignees'); // برای نمایش کاربران اساین شده
        return view('task::edit', compact('task', 'transactions', 'users'));
    }


    // نمایش یک تسک
    public function show($id)
    {
        $task = Task::with('assignees')->findOrFail($id);
        return response()->json($task);
    }

    // ایجاد تسک جدید
    public function store(Request $request)
    {
        $request->validate([
            'src_id' => 'required|integer',
            'src_type' => 'required|string',
            'title_id' => 'required|exists:task_titles,id',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,finished,canceled,done',
            'due_date' => 'nullable|string',
            'assignees' => 'required|array',
            'assignees.*' => 'exists:users,id',
            'task_time' => 'nullable',
            'files' => 'nullable|array',
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf|max:10240',        ]);

        $task = Task::create([
            'src_id' => $request->src_id,
            'src_type' => $request->src_type,
            'title_id' => $request->title_id,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'task_time' => $request->task_time,
        ]);

        foreach ($request->assignees as $userId) {
            $task->assignees()->create([
                'user_id' => $userId,
                'task_id' => $task->id,
                'assigned_at' => now(),
            ]);
        }

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $task->uploadMedia($file, 'tasks');
            }
        }


        $redirect = $request->input('redirect'); 
        return redirect($redirect)->with('success', 'تسک با موفقیت ایجاد شد.');


    }
    // بروزرسانی تسک
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'src_id' => 'nullable|integer',
            'src_type' => 'nullable|string',
            'title_id' => 'required|exists:task_titles,id',
            'description' => 'nullable|string',
            'status' => 'nullable|in:pending,in_progress,finished,canceled,done',
            'due_date' => 'nullable|string',
            'task_time' => 'nullable',
            'files' => 'nullable|array',
            'files.*' => 'file|mimes:jpg,jpeg,png,pdf|max:10240',        ]);

        $task->update($request->only(['src_id', 'src_type','title_id','description','status','due_date','task_time']));

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $task->uploadMedia($file, 'tasks');
            }
        }
        $redirect = $request->input('redirect'); 
        return redirect($redirect)->with('success', 'تسک با موفقیت بروزرسانی شد.');

    }

    // حذف تسک (soft delete)
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json([
            'message' => 'Task deleted successfully'
        ]);
    }


    public function assign(Request $request, $taskId)
    {
        $task = Task::findOrFail($taskId);

        $request->validate([
            'assignees' => 'required|array',
            'assignees.*' => 'exists:users,id',
        ]);

        // حذف اساین‌های قبلی تسک (اختیاری)
        $task->assignees()->delete();

        // اضافه کردن اساین‌های جدید
        foreach ($request->assignees as $userId) {
            $task->assignees()->create([
                'user_id' => $userId,
                'task_id' => $task->id,
                'assigned_at' => now(),
                'assigned_by' => auth()->id(),
            ]);
        }

        return redirect()->route('tasks.index')->with('success', 'کارشناسان با موفقیت اساین شدند.');
    }


    // حذف Assignee
    public function removeAssignee($taskId, $assigneeId)
    {
        $task = Task::findOrFail($taskId);
        $assignee = $task->assignees()->findOrFail($assigneeId);
        $assignee->delete();

        return response()->json([
            'message' => 'Assignee removed successfully'
        ]);
    }

    public function calendar()
    {
        $tasks = Task::with('src')->get()->toArray();
        return view('task::calendar', compact('tasks'));
    }

    public function updateDateTime(UpdateTaskDateTimeRequest $request, Task $task)
    {
        $task->update($request->validated());

        return response()->json([
            'success' => true,
            'id' => $task->id,
            'due_date' => $task->due_date,
            'task_time' => $task->task_time,
        ]);
    }
}
