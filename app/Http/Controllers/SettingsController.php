<?php

namespace App\Http\Controllers;

use App\Services\LogService;
use App\Services\SettingsService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct(
        protected LogService $logService,
        protected SettingsService $settingsService
    ) {
    }

    /**
     * Firma ayarları sayfasını gösterir.
     */
    public function companySettings(Request $request): View
    {
        $response = $this->settingsService->getCompanySettingsPageData();
        $this->logService->record($request, 'setting.company-settings', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.settings.company-settings', $response);
    }

    /**
     * Firma ayarlarını kaydetme isteğini işler.
     */
    public function saveCompanySettings(Request $request): JsonResponse
    {
        $response = $this->settingsService->saveCompanySettings($request);
        $this->logService->record($request, 'setting.save-company-settings.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Sistem ayarları sayfasını gösterir.
     */
    public function systemSettings(Request $request): View
    {
        $response = $this->settingsService->getSystemSettingsPageData();
        $this->logService->record($request, 'setting.system-settings', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.settings.system-settings', $response);
    }

    /**
     * Sistem ayarlarını kaydetme isteğini işler.
     */
    public function saveSystemSettings(Request $request): JsonResponse
    {
        $response = $this->settingsService->saveSystemSettings($request);
        $this->logService->record($request, 'setting.save-system-settings.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Bildirim ayarları sayfasını gösterir.
     */
    public function notifications(Request $request): View
    {
        $response = $this->settingsService->getNotificationsPageData();
        $this->logService->record($request, 'setting.notifications', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.settings.notifications', $response);
    }

    /**
     * Bildirim ayarlarını kaydetme isteğini işler.
     */
    public function saveNotifications(Request $request): JsonResponse
    {
        $response = $this->settingsService->saveNotifications($request);
        $this->logService->record($request, 'setting.save-notifications.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * API ayarları sayfasını gösterir.
     */
    public function apiSettings(Request $request): View
    {
        $response = $this->settingsService->getApiSettingsPageData();
        $this->logService->record($request, 'setting.api-settings', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.settings.api-settings', $response);
    }

    /**
     * API ayarlarını kaydetme isteğini işler.
     */
    public function saveApiSettings(Request $request): JsonResponse
    {
        $response = $this->settingsService->saveApiSettings($request);
        $this->logService->record($request, 'setting.save-api-settings.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Sistem logları sayfasını gösterir.
     */
    public function logs(Request $request): View
    {
        $response = $this->settingsService->getLogsPageData();
        $this->logService->record($request, 'setting.logs', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.settings.system-settings', $response);
    }
}
