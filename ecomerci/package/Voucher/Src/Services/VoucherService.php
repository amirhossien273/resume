<?php

namespace Module\Voucher\Src\Services;

use Module\Voucher\Src\Models\Voucher;

class VoucherService
{
    protected $voucherValidator;
    protected $voucher;

    public function __construct(VoucherValidatorService $voucherValidator, Voucher $voucher)
    {
        $this->voucherValidator = $voucherValidator;
        $this->voucher = $voucher;
    }
    /**
     * Apply a voucher to the cart
     * 
     * This method validates and applies a voucher to the user's cart. 
     * It checks if the voucher is valid, if it can be used for the user's first order, 
     * if it is reusable, if it matches the conditions, if the cart total meets the minimum requirement,
     * and if the usage limit has been exceeded.
     *
     * @param  string $code            The voucher code
     * @param  float  $cartTotal       The total amount of the cart
     * @param  int    $userId          The ID of the user applying the voucher
     * @param  int    $vocharable_id   The ID of the entity the voucher is being applied to (optional)
     * @param  string $vocharable_type The type of the entity the voucher is being applied to (optional)
     * @return array                   The status and message indicating the result of the voucher application
     */
    public function applyVoucher(string $code, $cartTotal, int $userId, $vocharable_id = null, $vocharable_type = null)
    {
        $voucher = $this->voucher->where('code', $code)->first();

        if (!$this->voucherValidator->isValidVoucher($voucher)) {
            return ['status' => false, 'message' => 'کد تخفیف معتبر نیست'];
        }

        if (!$this->voucherValidator->isFirstOrderApplicable($voucher, $userId)) {
            return ['status' => false, 'message' => 'این کد تخفیف فقط برای اولین سفارش قابل استفاده است'];
        }

        if (!$this->voucherValidator->checkReusability($voucher, $userId)) {
            return ['status' => false, 'message' => 'این کد تخفیف قابل استفاده مجدد نیست'];
        }

        if (!$this->voucherValidator->checkVoucherRelation($voucher, $vocharable_id, $vocharable_type)) {
            return ['status' => false, 'message' => 'این کد تخفیف با شرایط انتخاب شده مطابقت ندارد'];
        }

        if ($voucher->min_cart_price && $cartTotal < $voucher->min_cart_price) {
            return ['status' => false, 'message' => 'حداقل مبلغ خرید رعایت نشده است'];
        }

        if ($this->voucherValidator->isUsageLimitExceeded($voucher)) {
            return ['status' => false, 'message' => 'تعداد دفعات استفاده از کد تخفیف به پایان رسیده است'];
        }

        return ['status' => true];
    }
}