<?php

namespace App\Http\Controllers;

use App\Services\LogService;
use App\Services\ProductCatalogService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected LogService $logService,
        protected ProductCatalogService $productCatalogService
    ) {
    }

    /**
     * Ürün listesi sayfasını gösterir.
     */
    public function list(Request $request): View
    {
        $response = $this->productCatalogService->getListPageData();
        $this->logService->record($request, 'product.list', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.products.list-products', $response);
    }

    /**
     * Ürün düzenleme sayfasını gösterir.
     */
    public function edit(Request $request): View
    {
        $response = $this->productCatalogService->getEditPageData();
        $this->logService->record($request, 'product.edit', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.products.edit-product', $response);
    }

    /**
     * Ürün kategori düzenleme sayfasını gösterir.
     */
    public function editCategory(Request $request): View
    {
        $response = $this->productCatalogService->getEditCategoryPageData();
        $this->logService->record($request, 'product.edit-category', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.products.edit-product-category', $response);
    }

    /**
     * Yeni ürün sayfasını gösterir.
     */
    public function newProduct(Request $request): View
    {
        $response = $this->productCatalogService->getNewPageData();
        $this->logService->record($request, 'product.new', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.products.new-product', $response);
    }

    /**
     * Yeni ürün kategori sayfasını gösterir.
     */
    public function newCategory(Request $request): View
    {
        $response = $this->productCatalogService->getNewCategoryPageData();
        $this->logService->record($request, 'product.new-category', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.products.new-product-category', $response);
    }

    /**
     * Ürün güncelleme isteğini işler.
     */
    public function editPost(Request $request): JsonResponse
    {
        $response = $this->productCatalogService->updateProduct($request);
        $this->logService->record($request, 'product.edit.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Yeni ürün oluşturma isteğini işler.
     */
    public function newProductPost(Request $request): JsonResponse
    {
        $response = $this->productCatalogService->createProduct($request);
        $this->logService->record($request, 'product.new.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Ürün silme isteğini işler.
     */
    public function delete(Request $request): JsonResponse
    {
        $response = $this->productCatalogService->deleteProduct($request);
        $this->logService->record($request, 'product.delete.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Yeni ürün kategorisi oluşturma isteğini işler.
     */
    public function newCategoryPost(Request $request): JsonResponse
    {
        $response = $this->productCatalogService->createCategory($request);
        $this->logService->record($request, 'product.new-category.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Ürün kategorisi güncelleme isteğini işler.
     */
    public function editCategoryPost(Request $request): JsonResponse
    {
        $response = $this->productCatalogService->updateCategory($request);
        $this->logService->record($request, 'product.edit-category.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Ürün kategorisi silme isteğini işler.
     */
    public function deleteCategory(Request $request): JsonResponse
    {
        $response = $this->productCatalogService->deleteCategory($request);
        $this->logService->record($request, 'product.delete-category.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }
}
