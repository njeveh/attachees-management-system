<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationResponseController;
use App\Http\Controllers\AttacheeBiodataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneratePDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomePageController;
use App\Http\Livewire\Attachee\Apply;
use App\Http\Livewire\Attachee\AttacheeNotifications;
use App\Http\Livewire\Attachee\AttacheeNotificationView;
use App\Http\Livewire\Attachee\Notifications;
use App\Http\Livewire\Attachee\NotificationView;
use App\Http\Livewire\Attachee\ViewApplication;
use App\Http\Livewire\CentralServices\AdvertView;
use App\Http\Livewire\CentralServices\EditAdvert;
use App\Http\Livewire\Departments\AdvertApplications;
use App\Http\Livewire\Departments\AttacheeDismissal;
use App\Http\Livewire\Departments\AttacheeReporting;
use App\Http\Livewire\Departments\DepartmentAdvertView;
use App\Http\Livewire\Departments\DepartmentEditAdvert;
use App\Http\Livewire\Departments\DepartmentNotifications;
use App\Http\Livewire\Departments\ViewApplicantBiodata;
use App\Http\Livewire\Departments\ViewApplicationDetails;
use App\Http\Livewire\HomePage;
use App\Models\Advert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/test', function () {
    return (view('test'));
});
Route::get('/pdf', [GeneratePDFController::class, 'generatePdf']);
Route::get('/', HomePage::class)->name('welcome.page');
Route::get('/adverts/{id}', [WelcomePageController::class, 'show'])->name('guest.view_advert');
Route::get('/registration-successful', function () {
    return view('notifications.registration-success');
})->name('registration.success');

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
// Route::post(
//     '/broadcasting/custom-auth',
//     function () {
//         return auth()->user();
//     }
// );

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------------------------------
--------------------------------------------
All Attachee Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:attachee', 'prevent-back-history'])->group(function () {

    Route::get('/attachee/home', [HomeController::class, 'attacheeHome'])->name('attachee.home');
    Route::get('/adverts/{id}/apply', [ApplicationController::class, 'create']);
    Route::get('/adverts/{id}/apply', [ApplicationController::class, 'create']);
    Route::get('/attachee/biodata', [AttacheeBiodataController::class, 'create'])->name('attachee.biodata');
    Route::get('/attachee/my-applications', [ApplicationController::class, 'getAttacheeApplications'])->name('attachee.applications');
    Route::get('/attachee/my-applications/{id}/view-application', ViewApplication::class);
    Route::get('/attachee/notifications/', AttacheeNotifications::class)->name('attachee.notifications');
    Route::get('/attachee/notifications/{id}', AttacheeNotificationView::class)->name('attachee.notification');
    Route::get('/attachee/application-response-letter/{id}', [ApplicationResponseController::class, 'generateApplicationResponseLetter']);
    Route::get('/attachee/offer-acceptance-form/{id}', [ApplicationResponseController::class, 'generateOfferAcceptanceForm']);
    Route::get('/attachee/offer-acceptance-form-upload-page/{id}', [ApplicationResponseController::class, 'showOfferAcceptanceFormUploadPage']);
    Route::post('/attachee/offer-acceptance-form-upload/{id}', [ApplicationResponseController::class, 'uploadOfferAcceptanceForm']);
    // Route::get('/application/uploads/success', function(){
    //     return view('attachee.application-success');
    // })->name('application_uploads.success');
});

/*------------------------------------------
--------------------------------------------
All Dipca Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:dipca_admin', 'prevent-back-history'])->group(function () {

    Route::get('/dipca/home', [HomeController::class, 'dipcaHome'])->name('dipca.home');
});

/*------------------------------------------
--------------------------------------------
All Departments Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:department_admin', 'prevent-back-history'])->group(function () {

    Route::get('/departments/home', [HomeController::class, 'departmentHome'])->name('departments.home');
    Route::get('/departments/create-new-advert', [AdvertController::class, 'create'])->name('departments.new_advert_form');
    Route::post('/departments/create-new-advert', [AdvertController::class, 'store'])->name('departments.new_advert_create');
    Route::get('/departments/view-adverts', [AdvertController::class, 'showDepartmentAdverts'])->name('departments.view_adverts');
    Route::get('/departments/applicable-adverts', [AdvertController::class, 'getDepartmentApplicableAdverts'])->name('departments.applicable_adverts');
    Route::get('/departments/view-advert/{id}', DepartmentAdvertView::class)->name('departments.view_advert');
    Route::get('/departments/edit-advert/{id}', DepartmentEditAdvert::class)->name('departments.edit_advert');
    Route::get('/departments/applicable-adverts/{id}/applications', AdvertApplications::class)->name('departments.advert_applications');
    Route::get('/departments/view-application-details/{id}', ViewApplicationDetails::class)->name('departments.view_application_details');
    Route::get('/departments/view-applicant-biodata/{id}', ViewApplicantBiodata::class)->name('departments.view_applicant_biodata');
    Route::get('/departments/attachee-reporting', AttacheeReporting::class)->name('departments.attachee_reporting');
    Route::get('/departments/attachee-dismissal', AttacheeDismissal::class)->name('departments.attachee_dismissal');
    Route::get('/departments/notifications/', DepartmentNotifications::class)->name('departments.notifications');
    //Route::get('/departments/notifications/{id}', DepartmentNotificationView::class)->name('departments.notification');


    // Route::get('/departments/applicable-adverts/{id}/applications', DepartmentEditAdvert::class)->name('departments.edit_advert');

});

/*------------------------------------------
--------------------------------------------
All Central services Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:central_services_admin', 'prevent-back-history'])->group(function () {

    Route::get('/central-services/home', [HomeController::class, 'centralServicesHome'])->name('central_services.home');
    Route::get('/central-services/view-adverts', [AdvertController::class, 'showCentralServicesAdvertsView'])->name('central_services.view_adverts');
    Route::get('/central-services/view-advert/{id}', AdvertView::class)->name('central_services.view_advert');
    Route::get('/central-services/edit-advert/{id}', EditAdvert::class)->name('central_services.edit_advert');
});