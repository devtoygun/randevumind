<?php

namespace App\Http\Controllers;

use App\Services\CouponService;
use App\Services\LogService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct(
        protected LogService $logService,
        protected CouponService $couponService
    ) {
    }

    /**
     * Kupon listesi sayfasını gösterir.
     */
    public function list(Request $request): View
    {
        $response = $this->couponService->getListPageData();
        $this->logService->record($request, 'coupon.list', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.coupons.list-coupons', $response);
    }

    /**
     * Yeni kupon sayfasını gösterir.
     */
    public function newCoupon(Request $request): View
    {
        $response = $this->couponService->getNewCouponPageData();
        $this->logService->record($request, 'coupon.new-coupon', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.coupons.list-coupons', $response);
    }

    /**
     * Yeni kupon oluşturma isteğini işler.
     */
    public function newCouponPost(Request $request): JsonResponse
    {
        $response = $this->couponService->createCoupon($request);
        $this->logService->record($request, 'coupon.new-coupon.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Kupon silme isteğini işler.
     */
    public function deleteCoupon(Request $request): JsonResponse
    {
        $response = $this->couponService->deleteCoupon($request);
        $this->logService->record($request, 'coupon.delete-coupon.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }
}
