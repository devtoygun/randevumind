<?php

namespace App\Services;

use Illuminate\Http\Request;

class CouponService extends BaseService
{
    /**
     * Kupon listesi sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getListPageData(): array
    {
        return $this->buildResponse('info', 'Kupon listesi sayfası yüklendi.', true, '/coupon/list');
    }

    /**
     * Yeni kupon oluşturma sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getNewCouponPageData(): array
    {
        return $this->buildResponse('info', 'Yeni kupon sayfası yüklendi.', true, '/coupon/new-coupon');
    }

    /**
     * Yeni kupon oluşturma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function createCoupon(Request $request): array
    {
        return $this->buildResponse('success', 'Kupon oluşturma işlemi servis katmanına yönlendirildi.', true, '/coupon/list');
    }

    /**
     * Kupon silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function deleteCoupon(Request $request): array
    {
        return $this->buildResponse('warning', 'Kupon silme işlemi servis katmanına yönlendirildi.', true, '/coupon/list');
    }
}
