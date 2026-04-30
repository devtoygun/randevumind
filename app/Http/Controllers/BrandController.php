<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use App\Services\LogService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(
        protected LogService $logService,
        protected BrandService $brandService
    ) {
    }

    /**
     * Abonelik sayfasını gösterir.
     */
    public function subscription(Request $request): View
    {
        $response = $this->brandService->getSubscriptionPageData();
        $this->logService->record($request, 'brand.subscription', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.brand.subscription', $response);
    }

    /**
     * Abonelik planları sayfasını gösterir.
     */
    public function subscriptionPlans(Request $request): View
    {
        $response = $this->brandService->getSubscriptionPlansPageData();
        $this->logService->record($request, 'brand.subscription-plans', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.brand.subscription-plans', $response);
    }

    /**
     * Satın alma geçmişi sayfasını gösterir.
     */
    public function purchaseHistory(Request $request): View
    {
        $response = $this->brandService->getPurchaseHistoryPageData();
        $this->logService->record($request, 'brand.purchase-history', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.brand.purchase_history', $response);
    }

    /**
     * Ödemeler sayfasını gösterir.
     */
    public function payments(Request $request): View
    {
        $response = $this->brandService->getPaymentsPageData();
        $this->logService->record($request, 'brand.payments', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.brand.payments', $response);
    }

    /**
     * Faturalar sayfasını gösterir.
     */
    public function invoices(Request $request): View
    {
        $response = $this->brandService->getInvoicesPageData();
        $this->logService->record($request, 'brand.invoices', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.brand.invoices', $response);
    }

    /**
     * Bildirim paketleri sayfasını gösterir.
     */
    public function notificationPackages(Request $request): View
    {
        $response = $this->brandService->getNotificationPackagesPageData();
        $this->logService->record($request, 'brand.notification-packages', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.brand.notification_packages', $response);
    }

    /**
     * Ek paketler sayfasını gösterir.
     */
    public function additionalPackages(Request $request): View
    {
        $response = $this->brandService->getAdditionalPackagesPageData();
        $this->logService->record($request, 'brand.additional-packages', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.brand.additional_packages', $response);
    }

    /**
     * Abonelik başlatma isteğini işler.
     */
    public function startSubscription(Request $request): JsonResponse
    {
        $response = $this->brandService->startSubscription($request);
        $this->logService->record($request, 'brand.start-subscription.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Abonelik durdurma isteğini işler.
     */
    public function stopSubscription(Request $request): JsonResponse
    {
        $response = $this->brandService->stopSubscription($request);
        $this->logService->record($request, 'brand.stop-subscription.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Yeni paket isteğini işler.
     */
    public function newPackage(Request $request): JsonResponse
    {
        $response = $this->brandService->createPackage($request);
        $this->logService->record($request, 'brand.new-package.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Yeni bildirim paketi isteğini işler.
     */
    public function newNotification(Request $request): JsonResponse
    {
        $response = $this->brandService->createNotification($request);
        $this->logService->record($request, 'brand.new-notification.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }
}
