<?php

namespace App\Services;

use Illuminate\Http\Request;

class UserManagementService extends BaseService
{
    /**
     * Kullanıcı listesi sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getListPageData(): array
    {
        return $this->buildResponse('info', 'Kullanıcı listesi sayfası yüklendi.', true, '/user/list');
    }

    /**
     * Yeni kullanıcı sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getNewPageData(): array
    {
        return $this->buildResponse('info', 'Yeni kullanıcı sayfası yüklendi.', true, '/user/new');
    }

    /**
     * Yeni kullanıcı oluşturma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function createUser(Request $request): array
    {
        return $this->buildResponse('success', 'Yeni kullanıcı oluşturma işlemi servis katmanına yönlendirildi.', true, '/user/list');
    }

    /**
     * Kullanıcı düzenleme sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getEditPageData(): array
    {
        return $this->buildResponse('info', 'Kullanıcı düzenleme sayfası yüklendi.', true, '/user/edit');
    }

    /**
     * Kullanıcı güncelleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function updateUser(Request $request): array
    {
        return $this->buildResponse('success', 'Kullanıcı güncelleme işlemi servis katmanına yönlendirildi.', true, '/user/list');
    }

    /**
     * Kullanıcı profil sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getProfilePageData(): array
    {
        return $this->buildResponse('info', 'Kullanıcı profil sayfası yüklendi.', true, '/user/profile');
    }
}
