<?php

namespace App\Services;

use Illuminate\Http\Request;

class AuthService extends BaseService
{
    /**
     * Giriş sayfası için başlangıç verisini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getLoginPageData(): array
    {
        return $this->buildResponse('info', 'Giriş sayfası yüklendi.', true, '/login');
    }

    /**
     * Kayıt sayfası için başlangıç verisini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getRegisterPageData(): array
    {
        return $this->buildResponse('info', 'Kayıt sayfası yüklendi.', true, '/register');
    }

    /**
     * Şifre sıfırlama sayfası için başlangıç verisini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getResetPasswordPageData(): array
    {
        return $this->buildResponse('info', 'Şifre sıfırlama sayfası yüklendi.', true, '/reset-password');
    }

    /**
     * Kullanıcı giriş isteğini işler.
     *
     * @return array<string, mixed>
     */
    public function login(Request $request): array
    {
        return $this->buildResponse('warning', 'Giriş işlemi henüz tema ve doğrulama akışına bağlanmadı.', false, '/login');
    }

    /**
     * Yeni kullanıcı kayıt isteğini işler.
     *
     * @return array<string, mixed>
     */
    public function register(Request $request): array
    {
        return $this->buildResponse('warning', 'Kayıt işlemi henüz tema ve doğrulama akışına bağlanmadı.', false, '/register');
    }

    /**
     * Şifre sıfırlama talebini işler.
     *
     * @return array<string, mixed>
     */
    public function resetPassword(Request $request): array
    {
        return $this->buildResponse('warning', 'Şifre sıfırlama işlemi henüz aktif değil.', false, '/reset-password');
    }

    /**
     * E-posta tabanlı sıfırlama kodu gönderimini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function sendResetCode(Request $request): array
    {
        return $this->buildResponse('info', 'Sıfırlama kodu gönderim akışı hazırlanacak.', true, '/reset-password');
    }

    /**
     * E-posta doğrulama kodu gönderimini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function sendEmailVerificationCode(Request $request): array
    {
        return $this->buildResponse('info', 'E-posta doğrulama kodu gönderim akışı hazırlanacak.', true, '/register');
    }

    /**
     * Telefon doğrulama kodu gönderimini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function sendPhoneVerificationCode(Request $request): array
    {
        return $this->buildResponse('info', 'Telefon doğrulama kodu gönderim akışı hazırlanacak.', true, '/register');
    }

    /**
     * Kullanıcı çıkış işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function logout(Request $request): array
    {
        return $this->buildResponse('success', 'Çıkış işlemi tamamlandı.', true, '/login');
    }
}
