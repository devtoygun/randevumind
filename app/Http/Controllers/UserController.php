<?php

namespace App\Http\Controllers;

use App\Services\LogService;
use App\Services\UserManagementService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected LogService $logService,
        protected UserManagementService $userManagementService
    ) {
    }

    /**
     * Kullanıcı listesi sayfasını gösterir.
     */
    public function list(Request $request): View
    {
        $response = $this->userManagementService->getListPageData();
        $this->logService->record($request, 'user.list', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.users.list-users', $response);
    }

    /**
     * Yeni kullanıcı sayfasını gösterir.
     */
    public function newUser(Request $request): View
    {
        $response = $this->userManagementService->getNewPageData();
        $this->logService->record($request, 'user.new', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.users.new-user', $response);
    }

    /**
     * Yeni kullanıcı oluşturma isteğini işler.
     */
    public function newUserPost(Request $request): JsonResponse
    {
        $response = $this->userManagementService->createUser($request);
        $this->logService->record($request, 'user.new.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Kullanıcı düzenleme sayfasını gösterir.
     */
    public function edit(Request $request): View
    {
        $response = $this->userManagementService->getEditPageData();
        $this->logService->record($request, 'user.edit', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.users.edit-user', $response);
    }

    /**
     * Kullanıcı güncelleme isteğini işler.
     */
    public function editPost(Request $request): JsonResponse
    {
        $response = $this->userManagementService->updateUser($request);
        $this->logService->record($request, 'user.edit.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Kullanıcı profil sayfasını gösterir.
     */
    public function profile(Request $request): View
    {
        $response = $this->userManagementService->getProfilePageData();
        $this->logService->record($request, 'user.profile', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.users.user-profile', $response);
    }
}
