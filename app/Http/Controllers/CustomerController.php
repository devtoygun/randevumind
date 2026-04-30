<?php

namespace App\Http\Controllers;

use App\Services\CustomerPortalService;
use App\Services\LogService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(
        protected LogService $logService,
        protected CustomerPortalService $customerPortalService
    ) {
    }

    /**
     * Müşteri listesi sayfasını gösterir.
     */
    public function list(Request $request): View
    {
        $response = $this->customerPortalService->getListPageData();
        $this->logService->record($request, 'customer.list', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.customers.list-customer', $response);
    }

    /**
     * Müşteri düzenleme sayfasını gösterir.
     */
    public function editCustomer(Request $request): View
    {
        $response = $this->customerPortalService->getEditPageData();
        $this->logService->record($request, 'customer.edit', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.customers.edit-customer', $response);
    }

    /**
     * Yeni müşteri sayfasını gösterir.
     */
    public function newCustomer(Request $request): View
    {
        $response = $this->customerPortalService->getNewPageData();
        $this->logService->record($request, 'customer.new', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.customers.new-customer', $response);
    }

    /**
     * Müşteri profil sayfasını gösterir.
     */
    public function profile(Request $request): View
    {
        $response = $this->customerPortalService->getProfilePageData();
        $this->logService->record($request, 'customer.profile', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithView('layout.app.customers.customer-profile', $response);
    }

    /**
     * Müşteri silme isteğini işler.
     */
    public function deleteCustomer(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->deleteCustomer($request);
        $this->logService->record($request, 'customer.delete.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteri düzenleme isteğini işler.
     */
    public function editCustomerPost(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->updateCustomer($request);
        $this->logService->record($request, 'customer.edit.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Yeni müşteri oluşturma isteğini işler.
     */
    public function newCustomerPost(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->createCustomer($request);
        $this->logService->record($request, 'customer.new.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteriye ödeme ekleme isteğini işler.
     */
    public function addPayment(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->addPayment($request);
        $this->logService->record($request, 'customer.add-payment.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteriye hizmet ekleme isteğini işler.
     */
    public function addService(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->addService($request);
        $this->logService->record($request, 'customer.add-service.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteriye ürün ekleme isteğini işler.
     */
    public function addProduct(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->addProduct($request);
        $this->logService->record($request, 'customer.add-product.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteriye not ekleme isteğini işler.
     */
    public function addNote(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->addNote($request);
        $this->logService->record($request, 'customer.add-note.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteriye randevu ekleme isteğini işler.
     */
    public function addAppointment(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->addAppointment($request);
        $this->logService->record($request, 'customer.add-appointment.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteri dosya yükleme isteğini işler.
     */
    public function uploadFile(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->uploadFile($request);
        $this->logService->record($request, 'customer.upload-file.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteri ödeme silme isteğini işler.
     */
    public function removePayment(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->removePayment($request);
        $this->logService->record($request, 'customer.remove-payment.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteri hizmet silme isteğini işler.
     */
    public function removeService(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->removeService($request);
        $this->logService->record($request, 'customer.remove-service.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteri ürün silme isteğini işler.
     */
    public function removeProduct(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->removeProduct($request);
        $this->logService->record($request, 'customer.remove-product.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteri not silme isteğini işler.
     */
    public function removeNote(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->removeNote($request);
        $this->logService->record($request, 'customer.remove-note.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteri randevu silme isteğini işler.
     */
    public function removeAppointment(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->removeAppointment($request);
        $this->logService->record($request, 'customer.remove-appointment.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }

    /**
     * Müşteri dosya silme isteğini işler.
     */
    public function removeFile(Request $request): JsonResponse
    {
        $response = $this->customerPortalService->removeFile($request);
        $this->logService->record($request, 'customer.remove-file.post', $this->resolveCompanyId($request), $this->resolveUserId($request));

        return $this->respondWithJson($response);
    }
}
