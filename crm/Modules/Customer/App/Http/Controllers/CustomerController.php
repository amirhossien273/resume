<?php

namespace Modules\Customer\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Auth\App\Models\User;
use Modules\Customer\App\Http\Requests\CustomerRequest;
use Modules\Customer\App\Models\Business;
use Modules\Customer\App\Models\City;
use Modules\Customer\App\Models\Customer;
use Modules\Customer\App\Models\Province;
use Modules\Notification\App\Events\NotificationRequested;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::customer()->with('province','city')->latest()->paginate(20);
        $users = User::select('id', 'first_name', 'last_name')->get();

        return view('customer::customer.index', compact('customers','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();
        $businesses = Business::all();
        return view('customer::customer.create', compact('provinces','businesses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['status'] = 'actual';

        Customer::create($data);

        return redirect()
            ->route('customer.index')
            ->with('success', 'مشتری با موفقیت ایجاد شد.');
    }
    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $customer = Customer::customer()->findOrFail($id);

        return view('customer::customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::customer()->findOrFail($id);
        $provinces = Province::all();
        $cities = City::all();
        $businesses = Business::all();
        return view('customer::customer.edit', compact('customer', 'provinces','cities','businesses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, $id): RedirectResponse
    {

        $customer = Customer::customer()->findOrFail($id);
        $data = $request->validated();

        if ($customer->type === 'company' && $data['type'] === 'person') {
            $data['company'] = null;
            $data['company_phone'] = null;
        }

        $customer->update($data);


        $redirect = $request->input('redirect'); 
        return redirect($redirect)->with('success', 'مشتری با موفقیت بروزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::customer()->findOrFail($id);
        $customer->delete();

        return redirect()
            ->route('customer.index')
            ->with('success', 'مشتری با موفقیت حذف شد.');
    }

    public function attachToUser(Request $request): RedirectResponse
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'user_id'     => 'required|exists:users,id',
        ]);

        $customer = Customer::customer()->findOrFail($request->customer_id);
        $user = User::findOrFail($request->user_id);

        $customer->userable()->associate($user);
        $customer->save();

        //notification
        event(new NotificationRequested(
            $customer,
            $customer->userable_id,
            [
                'title' => 'مشتری جدید',
                'message' => ' یک مشتری به شما اساین شد',
                'url' => route('customer.edit', $customer),
            ]
        ));

        return redirect()
            ->back()
            ->with('success', 'مشتری با موفقیت به کاربر (userable) الصاق شد.');
    }
}
