<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->controller(AppController::class)->group(function (): void {
    Route::get('/', 'index')->name('app.index');
    Route::get('/dashboard', 'index')->name('app.dashboard');
});

Route::middleware('guest')->controller(AuthController::class)->group(function (): void {
    Route::get('/login', 'login')->name('auth.login');
    Route::get('/register', 'register')->name('auth.register');
    Route::get('/reset-password', 'resetPassword')->name('auth.reset-password');

    Route::post('/login', 'loginPost')->name('auth.login.post');
    Route::post('/register', 'registerPost')->name('auth.register.post');
    Route::post('/reset-password', 'resetPasswordPost')->name('auth.reset-password.post');
    Route::post('/send-reset-code', 'sendResetCode')->name('auth.send-reset-code');
    Route::post('/send-email-verification-code', 'sendEmailVerificationCode')->name('auth.send-email-verification-code');
    Route::post('/send-phone-verification-code', 'sendPhoneVerificationCode')->name('auth.send-phone-verification-code');
});

Route::middleware('auth')->match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->prefix('company')->controller(CompanyController::class)->group(function (): void {
    Route::get('/', 'index')->name('company.index');
    Route::post('/save', 'save')->name('company.save');
    Route::get('/members', 'members')->name('company.members');
    Route::get('/new-member', 'newMember')->name('company.new-member');
    Route::post('/new-member', 'newMemberPost')->name('company.new-member.post');
    Route::post('/delete-member', 'deleteMember')->name('company.delete-member');
});

Route::middleware('auth')->prefix('brand')->controller(BrandController::class)->group(function (): void {
    Route::get('/subscription', 'subscription')->name('brand.subscription');
    Route::get('/subscription-plans', 'subscriptionPlans')->name('brand.subscription-plans');
    Route::get('/purchase-history', 'purchaseHistory')->name('brand.purchase-history');
    Route::get('/payments', 'payments')->name('brand.payments');
    Route::get('/invoices', 'invoices')->name('brand.invoices');
    Route::get('/notification-packages', 'notificationPackages')->name('brand.notification-packages');
    Route::get('/additional-packages', 'additionalPackages')->name('brand.additional-packages');

    Route::post('/start-subscription', 'startSubscription')->name('brand.start-subscription');
    Route::post('/stop-subscription', 'stopSubscription')->name('brand.stop-subscription');
    Route::post('/new-package', 'newPackage')->name('brand.new-package');
    Route::post('/new-notification', 'newNotification')->name('brand.new-notification');
});

Route::middleware('auth')->prefix('coupon')->controller(CouponController::class)->group(function (): void {
    Route::get('/list', 'list')->name('coupon.list');
    Route::get('/new-coupon', 'newCoupon')->name('coupon.new-coupon');
    Route::post('/new-coupon', 'newCouponPost')->name('coupon.new-coupon.post');
    Route::post('/delete-coupon', 'deleteCoupon')->name('coupon.delete-coupon');
});

Route::middleware('auth')->prefix('customer')->controller(CustomerController::class)->group(function (): void {
    Route::get('/list', 'list')->name('customer.list');
    Route::get('/edit-customer', 'editCustomer')->name('customer.edit');
    Route::get('/new-customer', 'newCustomer')->name('customer.new');
    Route::get('/profile', 'profile')->name('customer.profile');

    Route::post('/delete-customer', 'deleteCustomer')->name('customer.delete');
    Route::post('/edit-customer', 'editCustomerPost')->name('customer.edit.post');
    Route::post('/new-customer', 'newCustomerPost')->name('customer.new.post');
    Route::post('/add-payment', 'addPayment')->name('customer.add-payment');
    Route::post('/add-service', 'addService')->name('customer.add-service');
    Route::post('/add-product', 'addProduct')->name('customer.add-product');
    Route::post('/add-note', 'addNote')->name('customer.add-note');
    Route::post('/add-appointment', 'addAppointment')->name('customer.add-appointment');
    Route::post('/upload-file', 'uploadFile')->name('customer.upload-file');
    Route::post('/remove-payment', 'removePayment')->name('customer.remove-payment');
    Route::post('/remove-service', 'removeService')->name('customer.remove-service');
    Route::post('/remove-product', 'removeProduct')->name('customer.remove-product');
    Route::post('/remove-note', 'removeNote')->name('customer.remove-note');
    Route::post('/remove-appointment', 'removeAppointment')->name('customer.remove-appointment');
    Route::post('/remove-file', 'removeFile')->name('customer.remove-file');
});

Route::middleware('auth')->prefix('product')->controller(ProductController::class)->group(function (): void {
    Route::get('/list', 'list')->name('product.list');
    Route::get('/edit', 'edit')->name('product.edit');
    Route::get('/edit-category', 'editCategory')->name('product.edit-category');
    Route::get('/new', 'newProduct')->name('product.new');
    Route::get('/new-category', 'newCategory')->name('product.new-category');

    Route::post('/edit', 'editPost')->name('product.edit.post');
    Route::post('/new', 'newProductPost')->name('product.new.post');
    Route::post('/delete', 'delete')->name('product.delete');
    Route::post('/new-category', 'newCategoryPost')->name('product.new-category.post');
    Route::post('/edit-category', 'editCategoryPost')->name('product.edit-category.post');
    Route::post('/delete-category', 'deleteCategory')->name('product.delete-category');
});

Route::middleware('auth')->prefix('service')->controller(ServiceController::class)->group(function (): void {
    Route::get('/list', 'list')->name('service.list');
    Route::get('/edit', 'edit')->name('service.edit');
    Route::get('/edit-category', 'editCategory')->name('service.edit-category');
    Route::get('/new', 'newService')->name('service.new');
    Route::get('/new-category', 'newCategory')->name('service.new-category');

    Route::post('/new', 'newServicePost')->name('service.new.post');
    Route::post('/edit', 'editPost')->name('service.edit.post');
    Route::post('/delete', 'delete')->name('service.delete');
    Route::post('/new-category', 'newCategoryPost')->name('service.new-category.post');
    Route::post('/edit-category', 'editCategoryPost')->name('service.edit-category.post');
    Route::post('/delete-category', 'deleteCategory')->name('service.delete-category');
});

Route::middleware('auth')->prefix('setting')->controller(SettingsController::class)->group(function (): void {
    Route::get('/company-settings', 'companySettings')->name('setting.company-settings');
    Route::post('/save-company-settings', 'saveCompanySettings')->name('setting.save-company-settings');
    Route::get('/system-settings', 'systemSettings')->name('setting.system-settings');
    Route::post('/save-system-settings', 'saveSystemSettings')->name('setting.save-system-settings');
    Route::get('/notifications', 'notifications')->name('setting.notifications');
    Route::post('/save-notifications', 'saveNotifications')->name('setting.save-notifications');
    Route::get('/api-settings', 'apiSettings')->name('setting.api-settings');
    Route::post('/save-api-settings', 'saveApiSettings')->name('setting.save-api-settings');
    Route::get('/logs', 'logs')->name('setting.logs');
});

Route::middleware('auth')->prefix('support')->controller(SupportController::class)->group(function (): void {
    Route::get('/help', 'help')->name('support.help');
    Route::get('/tickets', 'tickets')->name('support.tickets');
    Route::get('/ticket-detail', 'ticketDetail')->name('support.ticket-detail');
    Route::get('/new-ticket', 'newTicket')->name('support.new-ticket');
    Route::post('/new-ticket', 'newTicketPost')->name('support.new-ticket.post');
    Route::post('/answer-ticket', 'answerTicket')->name('support.answer-ticket');
    Route::post('/close-ticket', 'closeTicket')->name('support.close-ticket');
});

Route::middleware('auth')->prefix('user')->controller(UserController::class)->group(function (): void {
    Route::get('/list', 'list')->name('user.list');
    Route::get('/new', 'newUser')->name('user.new');
    Route::post('/new', 'newUserPost')->name('user.new.post');
    Route::get('/edit', 'edit')->name('user.edit');
    Route::post('/edit', 'editPost')->name('user.edit.post');
    Route::get('/profile', 'profile')->name('user.profile');
});

Route::middleware('auth')->prefix('calendar')->controller(CalendarController::class)->group(function (): void {
    Route::get('/today', 'today')->name('calendar.today');
    Route::get('/appointments', 'appointments')->name('calendar.appointments');
    Route::get('/date/{date}', 'date')->name('calendar.date');
    Route::get('/calendar', 'calendar')->name('calendar.calendar');
    Route::post('/new-event', 'newEvent')->name('calendar.new-event');
    Route::post('/edit-event', 'editEvent')->name('calendar.edit-event');
    Route::post('/delete-event', 'deleteEvent')->name('calendar.delete-event');
});
