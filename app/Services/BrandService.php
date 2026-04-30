<?php

namespace App\Services;

use Illuminate\Http\Request;

class BrandService extends BaseService
{
    /**
     * Abonelik sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getSubscriptionPageData(): array
    {
        return $this->buildResponse('info', 'Abonelik sayfası yüklendi.', true, '/brand/subscription');
    }

    /**
     * Abonelik planları sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getSubscriptionPlansPageData(): array
    {
        return $this->buildResponse('info', 'Abonelik planları sayfası yüklendi.', true, '/brand/subscription-plans');
    }

    /**
     * Satın alma geçmişi sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getPurchaseHistoryPageData(): array
    {
        return $this->buildResponse('info', 'Satın alma geçmişi sayfası yüklendi.', true, '/brand/purchase-history');
    }

    /**
     * Ödeme sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getPaymentsPageData(): array
    {
        return $this->buildResponse('info', 'Ödemeler sayfası yüklendi.', true, '/brand/payments');
    }

    /**
     * Faturalar sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getInvoicesPageData(): array
    {
        return $this->buildResponse('info', 'Faturalar sayfası yüklendi.', true, '/brand/invoices');
    }

    /**
     * Bildirim paketleri sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getNotificationPackagesPageData(): array
    {
        return $this->buildResponse('info', 'Bildirim paketleri sayfası yüklendi.', true, '/brand/notification-packages');
    }

    /**
     * Ek paketler sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getAdditionalPackagesPageData(): array
    {
        return $this->buildResponse('info', 'Ek paketler sayfası yüklendi.', true, '/brand/additional-packages');
    }

    /**
     * Abonelik başlatma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function startSubscription(Request $request): array
    {
        return $this->buildResponse('success', 'Abonelik başlatma işlemi servis katmanına yönlendirildi.', true, '/brand/subscription');
    }

    /**
     * Abonelik durdurma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function stopSubscription(Request $request): array
    {
        return $this->buildResponse('warning', 'Abonelik durdurma işlemi servis katmanına yönlendirildi.', true, '/brand/subscription');
    }

    /**
     * Yeni paket satın alma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function createPackage(Request $request): array
    {
        return $this->buildResponse('success', 'Yeni paket işlemi servis katmanına yönlendirildi.', true, '/brand/additional-packages');
    }

    /**
     * Yeni bildirim paketi satın alma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function createNotification(Request $request): array
    {
        return $this->buildResponse('success', 'Yeni bildirim paketi işlemi servis katmanına yönlendirildi.', true, '/brand/notification-packages');
    }
}
