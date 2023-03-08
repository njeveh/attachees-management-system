<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome.page');
Route::get('/registration-successful', function () {
    return view('notifications.registration-success');
})->name('registration.success');

Route::get('/dashboard',[DashboardController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*------------------------------------------
--------------------------------------------
All Attachee Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:attachee', 'prevent-back-history'])->group(function () {
  
    Route::get('/attachee/home', [HomeController::class, 'attacheeHome'])->name('attachee.home');
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
Route::middleware(['auth', 'user-access:department_admin',  'prevent-back-history'])->group(function () {
  
    Route::get('/departments/home', [HomeController::class, 'departmentHome'])->name('departments.home');
    Route::get('/departments/create-new-advert', [AdvertController::class, 'create'])->name('departments.new_advert_form');
    Route::post('/departments/create-new-advert', [AdvertController::class, 'store'])->name('departments.new_advert_create');
    Route::get('/departments/view-adverts', [AdvertController::class, 'showDepartmentAdverts'])->name('departments.view_adverts');
    Route::get('/departments/view-advert/{id}', [AdvertController::class, 'showDepartmentAdvert'])->name('departments.view_advert');

});
  
/*------------------------------------------
--------------------------------------------
All Central services Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:central_services_admin', 'prevent-back-history'])->group(function () {
  
    Route::get('/central-services/home', [HomeController::class, 'centralServicesHome'])->name('central_services.home');
});