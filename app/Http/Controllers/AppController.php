<?php

namespace App\Http\Controllers;

use App\Services\AppPageService;
use App\Services\LogService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class AppController extends Controller
{
    public function __construct(
        protected LogService $logService,
        protected AppPageService $appPageService
    ) {
    }

    /**
     * Ana uygulama girişini dashboard görünümüne yönlendirir.
     */
    public function index(Request $request): View
    {
        $response = $this->appPageService->getDashboardData();
        $this->logService->record($request, 'app.index', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.dashboard', $response);
    }
}
