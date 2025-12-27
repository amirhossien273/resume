<?php

namespace Modules\Customer\App\Excel;

use Modules\Customer\App\Models\Business;
use Modules\Customer\App\Models\City;
use Modules\Customer\App\Models\Province;
use Modules\Excel\App\Contracts\Excelable;
use Modules\Customer\App\Models\Customer;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

class LeadExcelHandler implements Excelable
{
    public function query(): Builder
    {
        return Customer::lead()->with(['province:id,name', 'city:id,name', 'business:id,name']);
    }

    public function headers(): array
    {
        return [
            ' نام',
            'نام خانوادگی',
            'موبایل',
            'کدملی',
            'ایمیل',
            'نوع',
            'صنف',
            'نام شرکت',
            'تلفن شرکت',
            'استان',
            'شهر',
            'آدرس',
        ];
    }

    public function map($lead): array
    {
        return [
            $lead->firstname,
            $lead->lastname,
            $lead->mobile,
            $lead->national_code,
            $lead->email,
            $lead->type_label,
            $lead->business?->name,
            $lead->company,
            $lead->company_phone,
            $lead->province?->name,
            $lead->city?->name,
            $lead->address,

        ];
    }

    public function import(Collection $rows): void
    {
        $provinces = Province::pluck('id', 'name')->toArray();
        $cities = City::pluck('id', 'name')->toArray();
        $businesses = Business::pluck('id', 'name')->toArray();
        $types = array_flip(Customer::TYPES);

        foreach ($rows as $row) {
            if ($row->filter()->isEmpty()) continue;
            if (empty($row[0]) || empty($row[2])) continue;

            Customer::firstOrCreate(
                ['mobile' => $row[2]],
                [
                    'firstname'     => $row[0],
                    'lastname'      => $row[1] ?? null,
                    'national_code' => $row[3] ?? null,
                    'email'         => $row[4] ?? null,
                    'type'          => $types[$row[5] ?? ''] ?? 'person',
                    'business_id'   => $businesses[$row[6]] ?? null,
                    'address'       => $row[7] ?? null,
                    'company'       => $row[8] ?? null,
                    'company_phone' => $row[9] ?? null,
                    'province_id'   => $provinces[$row[10]] ?? null,
                    'city_id'       => $cities[$row[11]] ?? null,
                    'status'        => 'potential',
                ]
            );
        }
    }
}
