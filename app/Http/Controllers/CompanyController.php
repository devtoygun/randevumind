<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use App\Services\LogService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(
        protected LogService $logService,
        protected CompanyService $companyService
    ) {
    }

    /**
     * Firma profil sayfasını gösterir.
     */
    public function index(Request $request): View
    {
        $response = $this->companyService->getCompanyProfilePageData();
        $this->logService->record($request, 'company.index', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.company.company-profile', $response);
    }

    /**
     * Firma kayıt veya güncelleme isteğini işler.
     */
    public function save(Request $request): JsonResponse
    {
        $response = $this->companyService->saveCompany($request);
        $this->logService->record($request, 'company.save.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Firma üyeleri sayfasını gösterir.
     */
    public function members(Request $request): View
    {
        $response = $this->companyService->getMembersPageData();
        $this->logService->record($request, 'company.members', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.users.list-users', $response);
    }

    /**
     * Yeni firma üyesi sayfasını gösterir.
     */
    public function newMember(Request $request): View
    {
        $response = $this->companyService->getNewMemberPageData();
        $this->logService->record($request, 'company.new-member', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.users.new-user', $response);
    }

    /**
     * Yeni firma üyesi oluşturma isteğini işler.
     */
    public function newMemberPost(Request $request): JsonResponse
    {
        $response = $this->companyService->createMember($request);
        $this->logService->record($request, 'company.new-member.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Firma üyesi silme isteğini işler.
     */
    public function deleteMember(Request $request): JsonResponse
    {
        $response = $this->companyService->deleteMember($request);
        $this->logService->record($request, 'company.delete-member.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }
}
