<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class Controller
{
    /**
     * Ortak yanıt yapısını üretir.
     *
     * @param array<string, mixed> $extra
     * @return array<string, mixed>
     */
    protected function buildResponse(
        string $type,
        string $message,
        bool $status,
        string $redirect,
        array $extra = []
    ): array {
        return array_merge([
            'type' => $type,
            'message' => $message,
            'status' => $status,
            'redirect' => $redirect,
        ], $extra);
    }

    /**
     * Blade sayfaları için ortak view yanıtını döndürür.
     *
     * @param array<string, mixed> $response
     * @param array<string, mixed> $data
     */
    protected function respondWithView(string $view, array $response, array $data = []): View
    {
        return view($view, array_merge($data, [
            'response' => $response,
        ]));
    }

    /**
     * İşlem tabanlı uçlar için ortak JSON yanıtını döndürür.
     *
     * @param array<string, mixed> $response
     */
    protected function respondWithJson(array $response): JsonResponse
    {
        return response()->json($response);
    }

    /**
     * Oturumdaki kullanıcı kimliğini güvenli biçimde çözümler.
     */
    protected function resolveUserId(Request $request): ?int
    {
        return $request->user()?->id;
    }

    /**
     * İstekten firma kimliğini güvenli biçimde çözümler.
     */
    protected function resolveCompanyId(Request $request): ?int
    {
        $companyId = $request->input('company_id');

        return is_numeric($companyId) ? (int) $companyId : null;
    }
}
