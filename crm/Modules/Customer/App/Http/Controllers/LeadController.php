<?php

namespace Modules\Customer\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Auth\App\Models\User;
use Modules\Customer\App\Excel\LeadExcelHandler;
use Modules\Customer\App\Models\Business;
use Modules\Customer\App\Models\City;
use Modules\Customer\App\Models\Customer;
use Modules\Customer\App\Http\Requests\LeadRequest;
use Modules\Customer\App\Models\Province;
use Modules\Excel\App\Services\ExcelService;


class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Customer::lead()->with('province','city')->latest()->paginate(20);
        $users = User::select('id', 'first_name', 'last_name')->get();

        return view('customer::lead.index', compact('leads','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();
        $businesses = Business::all();
        return view('customer::lead.create', compact('provinces','businesses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeadRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['status'] = 'potential';

        Customer::create($data);

        return redirect()
            ->route('lead.index')
            ->with('success', 'لید با موفقیت ایجاد شد.');
    }
    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $lead = Customer::lead()->findOrFail($id);

        return view('customer::lead.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lead = Customer::lead()->findOrFail($id);
        $provinces = Province::all();
        $cities = City::all();
        $businesses = Business::all();
        return view('customer::lead.edit', compact('lead', 'provinces','cities','businesses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeadRequest $request, $id): RedirectResponse
    {

        $lead = Customer::lead()->findOrFail($id);
        $data = $request->validated();
        if ($lead->type === 'company' && $data['type'] === 'person') {
            $data['company'] = null;
            $data['company_phone'] = null;
        }
        $lead->update($data);

        return redirect()
            ->route('lead.index')
            ->with('success', 'لید با موفقیت بروزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lead = Customer::lead()->findOrFail($id);
        $lead->delete();

        return redirect()
            ->route('lead.index')
            ->with('success', 'لید با موفقیت حذف شد.');
    }

    public function attachToUser(Request $request): RedirectResponse
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'user_id'     => 'required|exists:users,id',
        ]);

        $lead = Customer::lead()->findOrFail($request->customer_id);
        $user = User::findOrFail($request->user_id);

        $lead->userable()->associate($user);
        $lead->save();

        return redirect()
            ->back()
            ->with('success', 'لید با موفقیت به کاربر (userable) الصاق شد.');
    }

    public function export(ExcelService $excel)
    {
        return $excel->export(
            new LeadExcelHandler(),
            'leads.xlsx'
        );
    }

    public function import(Request $request, ExcelService $excel)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);
        $uploadedFile = $request->file('file');
        // ذخیره فایل موقت با پسوند صحیح
        $tempPath = $uploadedFile->storeAs('temp', $uploadedFile->getClientOriginalName());

        // مسیر کامل فایل روی storage/app
        $fullPath = storage_path('app/' . $tempPath);

        // فراخوانی سرویس با مسیر فایل
        $excel->import(new LeadExcelHandler(), $fullPath);

        return back()->with('success', 'Import done');
    }

}
