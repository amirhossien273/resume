<div>
    <h3 class="font-bold mb-4 font-nunito">جزئیات معاملات </h3>
    <div class="panel grid grid-cols-2 gap-4 text-sm">
        <div class="box-edit">
            <button @click="isAddTransactionEditModal = true" class="text-success" x-tooltip="ویرایش معامله">
                <svg style="width: 25px;height: 25px;" width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-4.5 h-4.5">
                    <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"/>
                    <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"/>
                </svg>
            </button>
        </div>
        <div class="p-2"><strong class="text-gray-500">نام معامله:</strong> <strong>{{ $transaction->name }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">استان:</strong> <strong>{{ $transaction->customer->city->name }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">شهر:</strong> <strong>{{ $transaction->customer->city->name }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">مبلغ:</strong> <strong class="bg-[#DBE7FF] p-2">{{ number_format($transaction->amount) }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">میلغ پیشنهادی:</strong> <strong>{{ number_format($transaction->approximate_amount) }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">روش پرداخت:</strong> <strong>{{ $transaction->payment_method }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">نوع آشنایی:</strong> <strong>{{ $transaction->transactionType->name }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">وضعیت معامله:</strong> <strong class="px-3 py-1 rounded {{ $transaction->status_color }}">{{ $transaction->status_key }}</strong></div>
        <div class="flex flex-row p-2"><strong class="text-gray-500">تاریخ  پیشنهادی:</strong> <strong>{{ $transaction->deal_closed_at }}</strong></div>
        <div class="flex flex-row p-2"><strong class="text-gray-500">تاریخ ایجاد:</strong> <strong>{{ $transaction->created_at_shamsi }}</strong></div>
    </div>
    <h3 class="font-bold mb-4 font-nunito mt-3">جزئیات مشتری </h3>
    <div class="panel grid grid-cols-2 gap-4 text-sm pt-4 relative ">
        <div class="box-edit">
            <button @click="isCustomerEditModal = true" class="text-success" x-tooltip="ویرایش مشتری">
                <svg style="width: 25px;height: 25px;" width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-4.5 h-4.5">
                    <path d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z" stroke="currentColor" stroke-width="1.5"/>
                    <path opacity="0.5" d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015" stroke="currentColor" stroke-width="1.5"/>
                </svg>
            </button>
        </div>
        <div class="p-2"><strong class="text-gray-500">نام مشتری:</strong> <strong class="bg-[#DBE7FF] p-2">{{ $transaction->customer->firstname }} {{ $transaction->customer->lastname }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">موبایل:</strong> <strong class="bg-[#DBE7FF] p-2">{{ $transaction->customer->mobile }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">کد ملی:</strong> <strong>{{ $transaction->customer->national_code ?? 'ندارد' }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">ایمیل:</strong> <strong>{{ $transaction->customer->email ?? 'ندارد' }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">شرکت / مغازه:</strong> <strong>{{ $transaction->customer->company ?? 'ندارد' }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">وضعیت مشتری:</strong> <strong>{{ $transaction->customer->status }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">استان:</strong> <strong>{{ $transaction->customer->province->name }}</strong></div>
        <div class="p-2"><strong class="text-gray-500">شهر:</strong> <strong>{{ $transaction->customer->city->name }}</strong></div>
        <div style="  width: 416px;" class="w-full "><strong class="text-gray-500">آدرس:</strong> <strong>{{ $transaction->customer->address }}</strong></div>

    </div>
</div>
