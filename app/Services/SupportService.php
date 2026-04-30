<?php

namespace App\Services;

use Illuminate\Http\Request;

class SupportService extends BaseService
{
    /**
     * Yardım sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getHelpPageData(): array
    {
        return $this->buildResponse('info', 'Yardım sayfası yüklendi.', true, '/support/help');
    }

    /**
     * Destek talepleri listesi sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getTicketsPageData(): array
    {
        return $this->buildResponse('info', 'Destek talepleri sayfası yüklendi.', true, '/support/tickets');
    }

    /**
     * Destek talep detay sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getTicketDetailPageData(): array
    {
        return $this->buildResponse('info', 'Destek talep detay sayfası yüklendi.', true, '/support/ticket-detail');
    }

    /**
     * Yeni destek talebi sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getNewTicketPageData(): array
    {
        return $this->buildResponse('info', 'Yeni destek talebi sayfası yüklendi.', true, '/support/new-ticket');
    }

    /**
     * Yeni destek talebi oluşturma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function createTicket(Request $request): array
    {
        return $this->buildResponse('success', 'Yeni destek talebi işlemi servis katmanına yönlendirildi.', true, '/support/tickets');
    }

    /**
     * Destek talebi cevaplama işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function answerTicket(Request $request): array
    {
        return $this->buildResponse('success', 'Destek talebi cevaplama işlemi servis katmanına yönlendirildi.', true, '/support/ticket-detail');
    }

    /**
     * Destek talebi kapatma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function closeTicket(Request $request): array
    {
        return $this->buildResponse('warning', 'Destek talebi kapatma işlemi servis katmanına yönlendirildi.', true, '/support/tickets');
    }
}
