<?php

namespace App\Services;

class AppPageService extends BaseService
{
    /**
     * Ana sayfa görünümü için başlangıç verisini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getIndexData(): array
    {
        return $this->buildResponse('info', 'Ana sayfa yüklendi.', true, '/');
    }

    /**
     * Dashboard görünümü için başlangıç verisini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getDashboardData(): array
    {
        return $this->buildResponse('info', 'Dashboard sayfası yüklendi.', true, '/dashboard');
    }
}
