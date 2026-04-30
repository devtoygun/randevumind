<?php

namespace App\Services;

use Illuminate\Http\Request;

class ProductCatalogService extends BaseService
{
    /**
     * Ürün listesi sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getListPageData(): array
    {
        return $this->buildResponse('info', 'Ürün listesi sayfası yüklendi.', true, '/product/list');
    }

    /**
     * Ürün düzenleme sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getEditPageData(): array
    {
        return $this->buildResponse('info', 'Ürün düzenleme sayfası yüklendi.', true, '/product/edit');
    }

    /**
     * Ürün kategori düzenleme sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getEditCategoryPageData(): array
    {
        return $this->buildResponse('info', 'Ürün kategori düzenleme sayfası yüklendi.', true, '/product/edit-category');
    }

    /**
     * Yeni ürün sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getNewPageData(): array
    {
        return $this->buildResponse('info', 'Yeni ürün sayfası yüklendi.', true, '/product/new');
    }

    /**
     * Yeni ürün kategori sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getNewCategoryPageData(): array
    {
        return $this->buildResponse('info', 'Yeni ürün kategori sayfası yüklendi.', true, '/product/new-category');
    }

    /**
     * Ürün güncelleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function updateProduct(Request $request): array
    {
        return $this->buildResponse('success', 'Ürün güncelleme işlemi servis katmanına yönlendirildi.', true, '/product/list');
    }

    /**
     * Yeni ürün oluşturma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function createProduct(Request $request): array
    {
        return $this->buildResponse('success', 'Yeni ürün oluşturma işlemi servis katmanına yönlendirildi.', true, '/product/list');
    }

    /**
     * Ürün silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function deleteProduct(Request $request): array
    {
        return $this->buildResponse('warning', 'Ürün silme işlemi servis katmanına yönlendirildi.', true, '/product/list');
    }

    /**
     * Yeni ürün kategorisi oluşturma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function createCategory(Request $request): array
    {
        return $this->buildResponse('success', 'Yeni ürün kategorisi işlemi servis katmanına yönlendirildi.', true, '/product/edit-category');
    }

    /**
     * Ürün kategorisi güncelleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function updateCategory(Request $request): array
    {
        return $this->buildResponse('success', 'Ürün kategorisi güncelleme işlemi servis katmanına yönlendirildi.', true, '/product/edit-category');
    }

    /**
     * Ürün kategorisi silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function deleteCategory(Request $request): array
    {
        return $this->buildResponse('warning', 'Ürün kategorisi silme işlemi servis katmanına yönlendirildi.', true, '/product/edit-category');
    }
}
