<?php

namespace App\Services;

use Illuminate\Http\Request;

class CalendarService extends BaseService
{
    /**
     * Bugün görünümü için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getTodayPageData(): array
    {
        return $this->buildResponse('info', 'Bugün görünümü yüklendi.', true, '/calendar/today');
    }

    /**
     * Randevu listesi görünümü için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getAppointmentsPageData(): array
    {
        return $this->buildResponse('info', 'Randevular sayfası yüklendi.', true, '/calendar/appointments');
    }

    /**
     * Belirli tarih görünümü için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getDatePageData(string $date): array
    {
        return $this->buildResponse('info', 'Tarih bazlı takvim görünümü yüklendi.', true, '/calendar/date/'.$date);
    }

    /**
     * Takvim ana görünümü için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getCalendarPageData(): array
    {
        return $this->buildResponse('info', 'Takvim sayfası yüklendi.', true, '/calendar/calendar');
    }

    /**
     * Yeni etkinlik oluşturma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function createEvent(Request $request): array
    {
        return $this->buildResponse('success', 'Yeni etkinlik işlemi servis katmanına yönlendirildi.', true, '/calendar/appointments');
    }

    /**
     * Etkinlik güncelleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function updateEvent(Request $request): array
    {
        return $this->buildResponse('success', 'Etkinlik güncelleme işlemi servis katmanına yönlendirildi.', true, '/calendar/appointments');
    }

    /**
     * Etkinlik silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function deleteEvent(Request $request): array
    {
        return $this->buildResponse('warning', 'Etkinlik silme işlemi servis katmanına yönlendirildi.', true, '/calendar/appointments');
    }
}
