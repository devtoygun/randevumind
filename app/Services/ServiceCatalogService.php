<?php

namespace App\Services;

use Illuminate\Http\Request;

class ServiceCatalogService extends BaseService
{
    /**
     * Hizmet listesi sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getListPageData(): array
    {
        return $this->buildResponse('info', 'Hizmet listesi sayfası yüklendi.', true, '/service/list');
    }

    /**
     * Hizmet düzenleme sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getEditPageData(): array
    {
        return $this->buildResponse('info', 'Hizmet düzenleme sayfası yüklendi.', true, '/service/edit');
    }

    /**
     * Hizmet kategori düzenleme sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getEditCategoryPageData(): array
    {
        return $this->buildResponse('info', 'Hizmet kategori düzenleme sayfası yüklendi.', true, '/service/edit-category');
    }

    /**
     * Yeni hizmet sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getNewPageData(): array
    {
        return $this->buildResponse('info', 'Yeni hizmet sayfası yüklendi.', true, '/service/new');
    }

    /**
     * Yeni hizmet kategori sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getNewCategoryPageData(): array
    {
        return $this->buildResponse('info', 'Yeni hizmet kategori sayfası yüklendi.', true, '/service/new-category');
    }

    /**
     * Yeni hizmet oluşturma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function createService(Request $request): array
    {
        return $this->buildResponse('success', 'Yeni hizmet oluşturma işlemi servis katmanına yönlendirildi.', true, '/service/list');
    }

    /**
     * Hizmet güncelleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function updateService(Request $request): array
    {
        return $this->buildResponse('success', 'Hizmet güncelleme işlemi servis katmanına yönlendirildi.', true, '/service/list');
    }

    /**
     * Hizmet silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function deleteService(Request $request): array
    {
        return $this->buildResponse('warning', 'Hizmet silme işlemi servis katmanına yönlendirildi.', true, '/service/list');
    }

    /**
     * Yeni hizmet kategorisi oluşturma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function createCategory(Request $request): array
    {
        return $this->buildResponse('success', 'Yeni hizmet kategorisi işlemi servis katmanına yönlendirildi.', true, '/service/edit-category');
    }

    /**
     * Hizmet kategorisi güncelleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function updateCategory(Request $request): array
    {
        return $this->buildResponse('success', 'Hizmet kategorisi güncelleme işlemi servis katmanına yönlendirildi.', true, '/service/edit-category');
    }

    /**
     * Hizmet kategorisi silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function deleteCategory(Request $request): array
    {
        return $this->buildResponse('warning', 'Hizmet kategorisi silme işlemi servis katmanına yönlendirildi.', true, '/service/edit-category');
    }
}
