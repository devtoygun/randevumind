<?php

namespace App\Http\Controllers;

use App\Services\LogService;
use App\Services\SupportService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected LogService $logService,
        protected SupportService $supportService
    ) {
    }

    /**
     * Yardım sayfasını gösterir.
     */
    public function help(Request $request): View
    {
        $response = $this->supportService->getHelpPageData();
        $this->logService->record($request, 'support.help', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.support.help', $response);
    }

    /**
     * Destek talepleri sayfasını gösterir.
     */
    public function tickets(Request $request): View
    {
        $response = $this->supportService->getTicketsPageData();
        $this->logService->record($request, 'support.tickets', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.support.ticket', $response);
    }

    /**
     * Destek talep detay sayfasını gösterir.
     */
    public function ticketDetail(Request $request): View
    {
        $response = $this->supportService->getTicketDetailPageData();
        $this->logService->record($request, 'support.ticket-detail', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.support.ticket-detail', $response);
    }

    /**
     * Yeni destek talebi sayfasını gösterir.
     */
    public function newTicket(Request $request): View
    {
        $response = $this->supportService->getNewTicketPageData();
        $this->logService->record($request, 'support.new-ticket', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.support.ticket', $response);
    }

    /**
     * Yeni destek talebi oluşturma isteğini işler.
     */
    public function newTicketPost(Request $request): JsonResponse
    {
        $response = $this->supportService->createTicket($request);
        $this->logService->record($request, 'support.new-ticket.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Destek talebi cevaplama isteğini işler.
     */
    public function answerTicket(Request $request): JsonResponse
    {
        $response = $this->supportService->answerTicket($request);
        $this->logService->record($request, 'support.answer-ticket.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Destek talebi kapatma isteğini işler.
     */
    public function closeTicket(Request $request): JsonResponse
    {
        $response = $this->supportService->closeTicket($request);
        $this->logService->record($request, 'support.close-ticket.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }
}
