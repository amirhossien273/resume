<?php

namespace Modules\Transaction\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Transaction\App\Http\Requests\Customer\SearchCustomerRequest;
use Modules\Customer\App\Models\Customer;

class CustomerController extends Controller
{
    public function search(SearchCustomerRequest $request)
    {
        $query = $request->input('query');

        $customer = Customer::customer()->where('mobile', 'like', "%{$query}%")
            ->orWhere('firstname', 'like', "%{$query}%")
            ->orWhere('lastname', 'like', "%{$query}%")
            ->first();

        if (!$customer) {
            return response()->json([
                'error' => 'مشتری یافت نشد.'
            ], 404);
        }


        return response()->json([
            'id'            => $customer->id,
            'firstname'     => $customer->firstname,
            'lastname'      => $customer->lastname,
            'mobile'        => $customer->mobile,
            'address'       => $customer->address,
            'city_id'       => $customer->city_id,
            'city_name'     => $customer->city?->name,
            'province_id'   => $customer->province_id,
            'province_name' => $customer->province?->name,
            'type'          => $customer->type,
            'company'       => $customer->company,
            'company_phone' => $customer->company_phone,
            'business_id'   => $customer->business_id,
            'business_name' => $customer->business?->name,
            'customer_type' => $customer->customer_type,
            'customer_type_label' => $customer->customer_type_label,
            'type_label' => $customer->type_label,
        ]);
    }
}
