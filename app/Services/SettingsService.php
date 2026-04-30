<?php

namespace App\Services;

use Illuminate\Http\Request;

class SettingsService extends BaseService
{
    /**
     * Firma ayarları sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getCompanySettingsPageData(): array
    {
        return $this->buildResponse('info', 'Firma ayarları sayfası yüklendi.', true, '/setting/company-settings');
    }

    /**
     * Firma ayarlarını kaydetme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function saveCompanySettings(Request $request): array
    {
        return $this->buildResponse('success', 'Firma ayarları kaydetme işlemi servis katmanına yönlendirildi.', true, '/setting/company-settings');
    }

    /**
     * Sistem ayarları sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getSystemSettingsPageData(): array
    {
        return $this->buildResponse('info', 'Sistem ayarları sayfası yüklendi.', true, '/setting/system-settings');
    }

    /**
     * Sistem ayarlarını kaydetme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function saveSystemSettings(Request $request): array
    {
        return $this->buildResponse('success', 'Sistem ayarları kaydetme işlemi servis katmanına yönlendirildi.', true, '/setting/system-settings');
    }

    /**
     * Bildirim ayarları sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getNotificationsPageData(): array
    {
        return $this->buildResponse('info', 'Bildirim ayarları sayfası yüklendi.', true, '/setting/notifications');
    }

    /**
     * Bildirim ayarlarını kaydetme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function saveNotifications(Request $request): array
    {
        return $this->buildResponse('success', 'Bildirim ayarları kaydetme işlemi servis katmanına yönlendirildi.', true, '/setting/notifications');
    }

    /**
     * API ayarları sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getApiSettingsPageData(): array
    {
        return $this->buildResponse('info', 'API ayarları sayfası yüklendi.', true, '/setting/api-settings');
    }

    /**
     * API ayarlarını kaydetme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function saveApiSettings(Request $request): array
    {
        return $this->buildResponse('success', 'API ayarları kaydetme işlemi servis katmanına yönlendirildi.', true, '/setting/api-settings');
    }

    /**
     * Sistem logları sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getLogsPageData(): array
    {
        return $this->buildResponse('info', 'Sistem logları sayfası yüklendi.', true, '/setting/logs');
    }
}
