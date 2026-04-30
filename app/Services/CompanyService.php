<?php

namespace App\Services;

use Illuminate\Http\Request;

class CompanyService extends BaseService
{
    /**
     * Firma profil sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getCompanyProfilePageData(): array
    {
        return $this->buildResponse('info', 'Firma profil sayfası yüklendi.', true, '/company');
    }

    /**
     * Firma kayıt veya güncelleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function saveCompany(Request $request): array
    {
        return $this->buildResponse('success', 'Firma kayıt işlemi servis katmanına yönlendirildi.', true, '/company');
    }

    /**
     * Firma üye listesi sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getMembersPageData(): array
    {
        return $this->buildResponse('info', 'Firma üyeleri sayfası yüklendi.', true, '/company/members');
    }

    /**
     * Yeni firma üyesi oluşturma sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getNewMemberPageData(): array
    {
        return $this->buildResponse('info', 'Yeni firma üyesi sayfası yüklendi.', true, '/company/new-member');
    }

    /**
     * Yeni firma üyesi ekleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function createMember(Request $request): array
    {
        return $this->buildResponse('success', 'Yeni firma üyesi oluşturma işlemi servis katmanına yönlendirildi.', true, '/company/members');
    }

    /**
     * Firma üyesi silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function deleteMember(Request $request): array
    {
        return $this->buildResponse('warning', 'Firma üyesi silme işlemi servis katmanına yönlendirildi.', true, '/company/members');
    }
}
