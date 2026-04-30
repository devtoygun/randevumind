<?php

namespace App\Http\Controllers;

use App\Services\LogService;
use App\Services\ServiceCatalogService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(
        protected LogService $logService,
        protected ServiceCatalogService $serviceCatalogService
    ) {
    }

    /**
     * Hizmet listesi sayfasını gösterir.
     */
    public function list(Request $request): View
    {
        $response = $this->serviceCatalogService->getListPageData();
        $this->logService->record($request, 'service.list', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.services.list-services', $response);
    }

    /**
     * Hizmet düzenleme sayfasını gösterir.
     */
    public function edit(Request $request): View
    {
        $response = $this->serviceCatalogService->getEditPageData();
        $this->logService->record($request, 'service.edit', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.services.edit-service', $response);
    }

    /**
     * Hizmet kategori düzenleme sayfasını gösterir.
     */
    public function editCategory(Request $request): View
    {
        $response = $this->serviceCatalogService->getEditCategoryPageData();
        $this->logService->record($request, 'service.edit-category', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.services.edit-service-category', $response);
    }

    /**
     * Yeni hizmet sayfasını gösterir.
     */
    public function new(Request $request): View
    {
        $response = $this->serviceCatalogService->getNewPageData();
        $this->logService->record($request, 'service.new', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.services.new-service', $response);
    }

    /**
     * Yeni hizmet kategori sayfasını gösterir.
     */
    public function newCategory(Request $request): View
    {
        $response = $this->serviceCatalogService->getNewCategoryPageData();
        $this->logService->record($request, 'service.new-category', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.services.new-service-category', $response);
    }

    /**
     * Yeni hizmet oluşturma isteğini işler.
     */
    public function newPost(Request $request): JsonResponse
    {
        $response = $this->serviceCatalogService->createService($request);
        $this->logService->record($request, 'service.new.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Hizmet güncelleme isteğini işler.
     */
    public function editPost(Request $request): JsonResponse
    {
        $response = $this->serviceCatalogService->updateService($request);
        $this->logService->record($request, 'service.edit.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Hizmet silme isteğini işler.
     */
    public function delete(Request $request): JsonResponse
    {
        $response = $this->serviceCatalogService->deleteService($request);
        $this->logService->record($request, 'service.delete.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Yeni hizmet kategorisi oluşturma isteğini işler.
     */
    public function newCategoryPost(Request $request): JsonResponse
    {
        $response = $this->serviceCatalogService->createCategory($request);
        $this->logService->record($request, 'service.new-category.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Hizmet kategorisi güncelleme isteğini işler.
     */
    public function editCategoryPost(Request $request): JsonResponse
    {
        $response = $this->serviceCatalogService->updateCategory($request);
        $this->logService->record($request, 'service.edit-category.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Hizmet kategorisi silme isteğini işler.
     */
    public function deleteCategory(Request $request): JsonResponse
    {
        $response = $this->serviceCatalogService->deleteCategory($request);
        $this->logService->record($request, 'service.delete-category.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }
}
