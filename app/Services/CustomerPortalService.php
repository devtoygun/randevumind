<?php

namespace App\Services;

use Illuminate\Http\Request;

class CustomerPortalService extends BaseService
{
    /**
     * Müşteri listesi sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getListPageData(): array
    {
        return $this->buildResponse('info', 'Müşteri listesi sayfası yüklendi.', true, '/customer/list');
    }

    /**
     * Müşteri düzenleme sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getEditPageData(): array
    {
        return $this->buildResponse('info', 'Müşteri düzenleme sayfası yüklendi.', true, '/customer/edit-customer');
    }

    /**
     * Yeni müşteri sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getNewPageData(): array
    {
        return $this->buildResponse('info', 'Yeni müşteri sayfası yüklendi.', true, '/customer/new-customer');
    }

    /**
     * Müşteri profil sayfası için veriyi hazırlar.
     *
     * @return array<string, mixed>
     */
    public function getProfilePageData(): array
    {
        return $this->buildResponse('info', 'Müşteri profil sayfası yüklendi.', true, '/customer/profile');
    }

    /**
     * Müşteri silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function deleteCustomer(Request $request): array
    {
        return $this->buildResponse('warning', 'Müşteri silme işlemi servis katmanına yönlendirildi.', true, '/customer/list');
    }

    /**
     * Müşteri güncelleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function updateCustomer(Request $request): array
    {
        return $this->buildResponse('success', 'Müşteri güncelleme işlemi servis katmanına yönlendirildi.', true, '/customer/edit-customer');
    }

    /**
     * Yeni müşteri oluşturma işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function createCustomer(Request $request): array
    {
        return $this->buildResponse('success', 'Yeni müşteri oluşturma işlemi servis katmanına yönlendirildi.', true, '/customer/list');
    }

    /**
     * Müşteri ödeme ekleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function addPayment(Request $request): array
    {
        return $this->buildResponse('success', 'Ödeme ekleme işlemi servis katmanına yönlendirildi.', true, '/customer/profile');
    }

    /**
     * Müşteri hizmet ekleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function addService(Request $request): array
    {
        return $this->buildResponse('success', 'Hizmet ekleme işlemi servis katmanına yönlendirildi.', true, '/customer/profile');
    }

    /**
     * Müşteri ürün ekleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function addProduct(Request $request): array
    {
        return $this->buildResponse('success', 'Ürün ekleme işlemi servis katmanına yönlendirildi.', true, '/customer/profile');
    }

    /**
     * Müşteri not ekleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function addNote(Request $request): array
    {
        return $this->buildResponse('success', 'Not ekleme işlemi servis katmanına yönlendirildi.', true, '/customer/profile');
    }

    /**
     * Müşteri randevu ekleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function addAppointment(Request $request): array
    {
        return $this->buildResponse('success', 'Randevu ekleme işlemi servis katmanına yönlendirildi.', true, '/customer/profile');
    }

    /**
     * Müşteri dosya yükleme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function uploadFile(Request $request): array
    {
        return $this->buildResponse('success', 'Dosya yükleme işlemi servis katmanına yönlendirildi.', true, '/customer/profile');
    }

    /**
     * Müşteri ödeme silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function removePayment(Request $request): array
    {
        return $this->buildResponse('warning', 'Ödeme silme işlemi servis katmanına yönlendirildi.', true, '/customer/profile');
    }

    /**
     * Müşteri hizmet silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function removeService(Request $request): array
    {
        return $this->buildResponse('warning', 'Hizmet silme işlemi servis katmanına yönlendirildi.', true, '/customer/profile');
    }

    /**
     * Müşteri ürün silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function removeProduct(Request $request): array
    {
        return $this->buildResponse('warning', 'Ürün silme işlemi servis katmanına yönlendirildi.', true, '/customer/profile');
    }

    /**
     * Müşteri not silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function removeNote(Request $request): array
    {
        return $this->buildResponse('warning', 'Not silme işlemi servis katmanına yönlendirildi.', true, '/customer/profile');
    }

    /**
     * Müşteri randevu silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function removeAppointment(Request $request): array
    {
        return $this->buildResponse('warning', 'Randevu silme işlemi servis katmanına yönlendirildi.', true, '/customer/profile');
    }

    /**
     * Müşteri dosya silme işlemini hazırlar.
     *
     * @return array<string, mixed>
     */
    public function removeFile(Request $request): array
    {
        return $this->buildResponse('warning', 'Dosya silme işlemi servis katmanına yönlendirildi.', true, '/customer/profile');
    }
}
