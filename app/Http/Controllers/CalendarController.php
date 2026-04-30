<?php

namespace App\Http\Controllers;

use App\Services\CalendarService;
use App\Services\LogService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct(
        protected LogService $logService,
        protected CalendarService $calendarService
    ) {
    }

    /**
     * Bugün görünümünü gösterir.
     */
    public function today(Request $request): View
    {
        $response = $this->calendarService->getTodayPageData();
        $this->logService->record($request, 'calendar.today', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.calendar.today', $response);
    }

    /**
     * Randevular sayfasını gösterir.
     */
    public function appointments(Request $request): View
    {
        $response = $this->calendarService->getAppointmentsPageData();
        $this->logService->record($request, 'calendar.appointments', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.calendar.appointments', $response);
    }

    /**
     * Belirli tarih görünümünü gösterir.
     */
    public function date(Request $request, string $date): View
    {
        $response = $this->calendarService->getDatePageData($date);
        $this->logService->record($request, 'calendar.date', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.calendar.calendar', $response, [
            'selectedDate' => $date,
        ]);
    }

    /**
     * Takvim ana sayfasını gösterir.
     */
    public function calendar(Request $request): View
    {
        $response = $this->calendarService->getCalendarPageData();
        $this->logService->record($request, 'calendar.calendar', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.calendar.calendar', $response);
    }

    /**
     * Yeni etkinlik oluşturma isteğini işler.
     */
    public function newEvent(Request $request): JsonResponse
    {
        $response = $this->calendarService->createEvent($request);
        $this->logService->record($request, 'calendar.new-event.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Etkinlik güncelleme isteğini işler.
     */
    public function editEvent(Request $request): JsonResponse
    {
        $response = $this->calendarService->updateEvent($request);
        $this->logService->record($request, 'calendar.edit-event.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Etkinlik silme isteğini işler.
     */
    public function deleteEvent(Request $request): JsonResponse
    {
        $response = $this->calendarService->deleteEvent($request);
        $this->logService->record($request, 'calendar.delete-event.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }
}
