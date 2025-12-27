<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manage\Voucher\StoreVoucherRequest;
use App\Http\Requests\Manage\Voucher\UpdateVoucherRequest;
use Carbon\Carbon;
use Module\Voucher\Src\Models\Voucher;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return view('manage.page.vouchers.index', compact('vouchers'));
    }
    public function store(StoreVoucherRequest $request)
    {
        Voucher::create([
            'title'            => $request->title,
            'content'          => $request->content,
            'code'             => $request->code,
            'start_at'         => $request->start_at,
            'end_at'           => $request->end_at,
            'discount_price'   => $request->discount_price,
            'discount_percent' => $request->discount_percent,
            'usage_limit'      => $request->usage_limit,
            'min_cart_price'   => $request->min_cart_price,
            'max_discount'     => $request->max_discount,
            'is_reusable'      => $request->has('is_reusable') ? 1 : 0,
            'is_first_order'   => $request->has('is_first_order') ? 1 : 0,
            'creator_id'       => auth()->id(),
        ]);

        return redirect()->route('manage.vouchers')->with('success', 'تخفیف با موفقیت ایجاد شد.');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.page.vouchers.create');
    }

    public function edit(Voucher $voucher)
    {
        return view('manage.page.vouchers.edit', compact('voucher'));
    }

    public function update(UpdateVoucherRequest $request, Voucher $voucher)
    {
        $voucher->update([
            'title'            => $request->title,
            'content'          => $request->content,
            'start_at'         => $request->start_at,
            'end_at'           => $request->end_at,
            'discount_price'   => $request->discount_price ?? 0,
            'discount_percent' => $request->discount_percent ?? 0,
            'usage_limit'      => $request->usage_limit,
            'min_cart_price'   => $request->min_cart_price ?? 0,
            'max_discount'     => $request->max_discount ?? 0,
            'is_reusable'      => $request->has('is_reusable'),
            'is_first_order'   => $request->has('is_first_order'),
        ]);

        return redirect()->route('manage.vouchers')->with('success', 'تخفیف با موفقیت ویرایش شد.');
    }

    public function toggleActive(Voucher $voucher)
    {
        $voucher->update(['is_active' => !$voucher->is_active]);

        return redirect()->back()->with('success', 'وضعیت تخفیف با موفقیت تغییر کرد.');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return redirect()->back()->with('success', 'تخفیف با موفقیت حذف شد.');
    }
}
