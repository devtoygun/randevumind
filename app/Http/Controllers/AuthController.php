<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Services\LogService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected LogService $logService,
        protected AuthService $authService
    ) {
    }

    /**
     * Giriş sayfasını gösterir.
     */
    public function login(Request $request): View
    {
        $response = $this->authService->getLoginPageData();
        $this->logService->record($request, 'auth.login.page');

        return $this->respondWithView('layout.auth.login', $response);
    }

    /**
     * Kayıt sayfasını gösterir.
     */
    public function register(Request $request): View
    {
        $response = $this->authService->getRegisterPageData();
        $this->logService->record($request, 'auth.register.page');

        return $this->respondWithView('layout.auth.register', $response);
    }

    /**
     * Şifre sıfırlama sayfasını gösterir.
     */
    public function resetPassword(Request $request): View
    {
        $response = $this->authService->getResetPasswordPageData();
        $this->logService->record($request, 'auth.reset-password.page');

        return $this->respondWithView('layout.auth.reset-password', $response);
    }

    /**
     * Kullanıcı giriş isteğini işler.
     */
    public function loginPost(Request $request): JsonResponse
    {
        $response = $this->authService->login($request);
        $this->logService->record($request, 'auth.login.post');

        return $this->respondWithJson($response);
    }

    /**
     * Kullanıcı kayıt isteğini işler.
     */
    public function registerPost(Request $request): JsonResponse
    {
        $response = $this->authService->register($request);
        $this->logService->record($request, 'auth.register.post');

        return $this->respondWithJson($response);
    }

    /**
     * Şifre sıfırlama isteğini işler.
     */
    public function resetPasswordPost(Request $request): JsonResponse
    {
        $response = $this->authService->resetPassword($request);
        $this->logService->record($request, 'auth.reset-password.post');

        return $this->respondWithJson($response);
    }

    /**
     * Şifre sıfırlama kodu gönderimini işler.
     */
    public function sendResetCode(Request $request): JsonResponse
    {
        $response = $this->authService->sendResetCode($request);
        $this->logService->record($request, 'auth.send-reset-code.post');

        return $this->respondWithJson($response);
    }

    /**
     * E-posta doğrulama kodu gönderimini işler.
     */
    public function sendEmailVerificationCode(Request $request): JsonResponse
    {
        $response = $this->authService->sendEmailVerificationCode($request);
        $this->logService->record($request, 'auth.send-email-verification-code.post');

        return $this->respondWithJson($response);
    }

    /**
     * Telefon doğrulama kodu gönderimini işler.
     */
    public function sendPhoneVerificationCode(Request $request): JsonResponse
    {
        $response = $this->authService->sendPhoneVerificationCode($request);
        $this->logService->record($request, 'auth.send-phone-verification-code.post');

        return $this->respondWithJson($response);
    }

    /**
     * Kullanıcı çıkış işlemini tamamlar.
     */
    public function logout(Request $request): JsonResponse
    {
        $response = $this->authService->logout($request);
        $this->logService->record($request, 'auth.logout');

        return $this->respondWithJson($response);
    }
}
