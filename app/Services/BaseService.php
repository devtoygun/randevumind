<?php

namespace App\Services;

class BaseService
{
    /**
     * Servis katmanında ortak yanıt yapısını üretir.
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
}
