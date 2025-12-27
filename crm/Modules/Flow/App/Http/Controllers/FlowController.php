<?php

namespace Modules\Flow\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Flow\App\Models\Flow;
use Modules\Flow\App\Models\FlowStep;

class FlowController extends Controller
{
    public function index()
    {
        $flows = Flow::with('steps')->latest()->paginate(20);

        return view('flow::index', compact('flows'));
    }

    public function create()
    {
        return view('flow::create');
    }
    public function edit($id)
    {
        $flow = Flow::findOrFail($id);

        return view('flow::edit', compact('flow'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'steps' => 'required|array',
            'steps.*' => 'required|string',
            'slug' => 'required|in:sale,transaction,customer-service'

        ]);

        $flow = Flow::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => auth()->id(),
            'slug'=>$request->slug
        ]);

        foreach($request->steps as $index => $stepName){
            $flow->steps()->create([
                'name' => $stepName,
                'order' => $index + 1
            ]);
        }

        return redirect()
            ->route('flows.index')   // ← ری‌دایرکت به صفحه لیست
            ->with('success', 'فرآیند با موفقیت ثبت شد.');
    }


    public function show($id)
    {
        return Flow::with('steps')->findOrFail($id);
    }
    public function destroy($id)
    {
        $flow= Flow::findOrFail($id);
        $flow->delete();

        return redirect()
            ->route('flows.index')
            ->with('success', 'فرآیند با موفقیت حذف شد.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'steps' => 'required|array',
            'steps.*' => 'required|string',
            'slug' => 'required|in:sale,transaction,customer-service'

        ]);

        $flow = Flow::findOrFail($id);
        $flow->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug'=>$request->slug
        ]);

        $flow->steps()->delete();

        foreach($request->steps as $index => $stepName){
            $flow->steps()->create([
                'name' => $stepName,
                'order' => $index + 1
            ]);
        }

        return redirect()
            ->route('flows.index')
            ->with('success', 'فرآیند با موفقیت بروزرسانی شد.');
    }
}
