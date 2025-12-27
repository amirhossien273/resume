<?php

namespace Module\Voucher\Src\Services;

use App\Models\Order;
use Module\Voucher\Src\Models\Voucher;

class VoucherValidatorService
{
    protected $orderModel;
    
    public function __construct()
    {
        $this->orderModel = config('voucher.order_model');
    }

    /**
     * Check if the voucher is valid
     * 
     * This method checks whether the voucher is valid or not
     * 
     * @param  mixed $voucher
     * @return bool
     */
    public function isValidVoucher($voucher)
    {
        return $voucher && $voucher->isValid();
    }

    /**
     * Check if the voucher is applicable for the first order
     * 
     * This method checks if the voucher can only be used for the first order,
     * and if so, it counts the user's orders to verify if it's the first order.
     * 
     * @param  mixed $voucher
     * @param  int $userId
     * @return bool
     */
    public function isFirstOrderApplicable($voucher, $userId)
    {
        if ($voucher->is_first_order) {
            $userOrderCount = Order::where('creator_id', $userId)->count();
            return $userOrderCount === 0; // Valid only if it's the first order
        }
        return true; // No restriction if it's not the first order
    }

    /**
     * Check if the voucher is reusable
     * 
     * This method checks if the voucher is reusable. If it's not reusable,
     * it checks how many times the voucher has been used by the given usage ID
     * and ensures the usage count is within the allowed limit.
     * 
     * @param  mixed $voucher
     * @param  int $usageId
     * @return bool
     */
    public function checkReusability(Voucher $voucher, $usageId)
    {
        if (!$voucher->is_reusable) {
            $usageCount = Order::where('creator_id', $usageId)
                ->where('voucher_id', $voucher->id)
                ->count();

            return $usageCount === 0; // Valid if the voucher hasn't been used yet
        }
        return true; // No restriction if the voucher is reusable
    }

    /**
     * Check if the voucher is related to a specific voucherable entity
     * 
     * This method checks if the voucher is linked to a specific voucherable entity
     * (e.g., a product, service, or other entity). It compares the type and ID of the entity.
     * 
     * @param  mixed $voucher
     * @param  int $voucherableId
     * @param  string $voucherableType
     * @return bool
     */
    public function checkVoucherRelation($voucher, $voucherableId, $voucherableType)
    {
        if ($voucher->voucherable_type && $voucher->voucherable_id) {
            if ($voucher->voucherable_type == $voucherableType && $voucherableId) {
                return $voucher->voucherable_id == $voucherableId;
            }
        }
        return true; // No relation required if no voucherable entity is set
    }

    /**
     * Check if the voucher usage limit has been exceeded
     * 
     * This method checks if the voucher has been used more times than the allowed usage limit.
     * 
     * @param  mixed $voucher
     * @return bool
     */
    public function isUsageLimitExceeded($voucher)
    {
        $usageCount = Order::where('voucher_id', $voucher->id)->count();
        return $usageCount >= $voucher->usage_limit; // Return true if the usage limit is exceeded
    }
}