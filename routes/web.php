<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BreedsController;
use App\Http\Controllers\GoatsController;
use App\Http\Controllers\GoatProfilesController;
use App\Http\Controllers\BreedingEventsController;
use App\Http\Controllers\DiseasesController;
use App\Http\Controllers\HealthRecordsController;
use App\Http\Controllers\VaccinationsController;
use App\Http\Controllers\CostsController;
use App\Http\Controllers\GeneralCostsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
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

Route::get('/w', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //Breed Administration
    Route::get('/breed/view', [BreedsController::class, 'BreedView'])->name('breed.view');
    Route::get('/breed/create', [BreedsController::class, 'BreedCreate'])->name('breed.create');
    Route::post('/breed/store', [BreedsController::class, 'BreedStore'])->name('breed.store');
    Route::get('/breed/edit/{id}', [BreedsController::class, 'BreedEdit'])->name('breed.edit');
    Route::post('/breed/update', [BreedsController::class, 'BreedUpdate'])->name('breed.update');
    Route::get('/breed/delete/{id}', [BreedsController::class, 'BreedDelete'])->name('breed.delete');

    //Goat Administration
    Route::get('/sheep/names/view', [GoatsController::class, 'GoatView'])->name('goat.view');
    Route::get('/sheep/create/name', [GoatsController::class, 'GoatCreate'])->name('goat.create');
    Route::post('/sheep/store/name', [GoatsController::class, 'GoatStore'])->name('goat.store');
    Route::get('/sheep/edit/name/{id}', [GoatsController::class, 'GoatEdit'])->name('goat.edit');
    Route::post('/sheep/name/update', [GoatsController::class, 'GoatUpdate'])->name('goat.update');
    Route::get('/sheep/name/delete/{id}', [GoatsController::class, 'GoatDelete'])->name('goat.delete');

    //Goat Profile
    Route::get('/sheep/view/sheep/profiles', [GoatProfilesController::class, 'GoatProfilesView'])->name('goat-profiles');
    Route::get('/sheep/profile/create', [GoatProfilesController::class, 'GoatProfileCreate'])->name('goat-profile-create');
    Route::post('/sheep/profile/store', [GoatProfilesController::class, 'GoatProfileStore'])->name('goat-profile-store');
    Route::get('/sheep/profile/edit/{id}', [GoatProfilesController::class, 'GoatProfileEdit'])->name('goat-profile-edit');
    Route::post('/sheep/profile/update', [GoatProfilesController::class, 'GoatProfileUpdate'])->name('goat-profile-update');
    Route::post('/sheep/profile/image/update', [GoatProfilesController::class, 'GoatProfileImageUpdate'])->name('goat-profile-image-update');
    Route::get('/sheep/profile/delete/{id}', [GoatProfilesController::class, 'GoatProfileDelete'])->name('goat-profile-delete');
    Route::get('/sheep/profile/details/{id}', [GoatProfilesController::class, 'GoatProfileDetails'])->name('goat-profile-details');

    // Breeding Module
    Route::get('/sheep/view/breeding/events', [BreedingEventsController::class, 'BreedingEventView'])->name('breeding-events');
    Route::get('/sheep/breeding/events/create', [BreedingEventsController::class, 'BreedingEventCreate'])->name('breeding-events-create');
    Route::post('/sheep/breeding/event/store', [BreedingEventsController::class, 'BreedingEventStore'])->name('breeding-event-store');
    Route::get('/sheep/breeding/event/edit/{id}', [BreedingEventsController::class, 'BreedingEventEdit'])->name('breeding-event-edit');
    Route::post('/sheep/breeding/event/update', [BreedingEventsController::class, 'BreedingEventUpdate'])->name('breeding-event-update');
    Route::get('/sheep/breeding/event/details/{id}', [BreedingEventsController::class, 'BreedingEventDetails'])->name('breeding-event-details');
    Route::get('/sheep/breeding/event/delete/{id}', [BreedingEventsController::class, 'BreedingEventDelete'])->name('breeding-event-delete');
    Route::get('/sheep/breeding/event/done/{id}', [BreedingEventsController::class, 'BreedingEventActive'])->name('breeding-event-active');
    Route::get('/sheep/breeding/event/incomplete/{id}', [BreedingEventsController::class, 'BreedingEventInactive'])->name('breeding-event-inactive');

    // Disease Module
    Route::get('/disease/create', [DiseasesController::class, 'DiseaseCreate'])->name('disease.create');
    Route::post('/disease/store', [DiseasesController::class, 'DiseaseStore'])->name('disease.store');
    Route::get('/disease/edit/{id}', [DiseasesController::class, 'DiseaseEdit'])->name('disease.edit');
    Route::post('/disease/update', [DiseasesController::class, 'DiseaseUpdate'])->name('disease.update');
    Route::get('/disease/delete/{id}', [DiseasesController::class, 'DiseaseDelete'])->name('disease.delete');

    // Vaccination
    
    Route::get('/vaccine/schedule/create', [VaccinationsController::class, 'VaccinationCreate'])->name('vaccination.create');
    Route::post('/vaccine/schedule/store', [VaccinationsController::class, 'VaccinationStore'])->name('vaccination.store');
    Route::get('/vaccine/schedule/edit/{id}', [VaccinationsController::class, 'VaccinationEdit'])->name('vaccination.edit');
    Route::post('/vaccine/schedule/update', [VaccinationsController::class, 'VaccinationUpdate'])->name('vaccination.update');
    Route::get('/vaccine/schedule/delete{id}', [VaccinationsController::class, 'VaccinationDelete'])->name('vaccination.delete');
    Route::get('/vaccine/schedule/done/{id}', [VaccinationsController::class, 'VaccinationActive'])->name('vaccine-active');
    Route::get('/vaccine/schedule/incomplete/{id}', [VaccinationsController::class, 'VaccinationInactive'])->name('vaccine-inactive');
     Route::get('/vaccine/schedule/details/{id}', [VaccinationsController::class, 'VaccinationDetails'])->name('vaccination-details');

     // Health Record Module
     
    Route::get('/sheep/health/record/create', [HealthRecordsController::class, 'HealthRecordCreate'])->name('health-record-create');
    Route::post('/sheep/health/record/store', [HealthRecordsController::class, 'HealthRecordStore'])->name('health-record-store');
    Route::get('/sheep/health/record/edit/{id}', [HealthRecordsController::class, 'HealthRecordEdit'])->name('health-record-edit');
    Route::post('/sheep/health/record/update', [HealthRecordsController::class, 'HealthRecordUpdate'])->name('health-record-update');
    Route::get('/sheep/health/record/details/{id}', [HealthRecordsController::class, 'HealthRecordDetails'])->name('health-record-details');
    Route::get('/sheep/health/record/delete/{id}', [HealthRecordsController::class, 'HealthRecordDelete'])->name('health-record-delete');
    Route::get('/sheep/health/record/done/{id}', [HealthRecordsController::class, 'HealthRecordActive'])->name('health-record-active');
    Route::get('/sheep/health/record/incomplete/{id}', [HealthRecordsController::class, 'HealthRecordInactive'])->name('health-record-inactive');

    // Cost Module
    Route::get('/sheep/cost/create', [CostsController::class, 'CostCreate'])->name('cost.create');
    Route::post('/sheep/cost/store', [CostsController::class, 'CostStore'])->name('cost.store');
    Route::get('/sheep/cost/edit/{id}', [CostsController::class, 'CostEdit'])->name('cost.edit');
    Route::post('/sheep/cost/update', [CostsController::class, 'CostUpdate'])->name('cost.update');
    Route::get('/sheep/cost/details/{id}', [CostsController::class, 'CostDetails'])->name('cost.details');
    Route::get('/sheep/cost/delete/{id}', [CostsController::class, 'CostDelete'])->name('cost.delete');
    

    // General Cost Module
    Route::get('/sheep/general/cost/create', [GeneralCostsController::class, 'GeneralCostCreate'])->name('general.create');
    Route::post('/sheep/general/cost/store', [GeneralCostsController::class, 'GeneralCostStore'])->name('general.store');
    Route::get('/sheep/general/cost/edit/{id}', [GeneralCostsController::class, 'GeneralCostEdit'])->name('general.edit');
    Route::post('/sheep/general/cost/update', [GeneralCostsController::class, 'GeneralCostUpdate'])->name('general.update');
    Route::get('/sheep/general/cost/details/{id}', [GeneralCostsController::class, 'GeneralCostDetails'])->name('general.details');
    Route::get('/sheep/general/cost/delete/{id}', [GeneralCostsController::class, 'GeneralCostDelete'])->name('general.delete');
    
    // Cost Module
    Route::get('/sheep/sales/create', [SalesController::class, 'SaleCreate'])->name('sale.create');
    Route::post('/sheep/sales/store', [SalesController::class, 'SaleStore'])->name('sale.store');
    Route::get('/sheep/sales/edit/{id}', [SalesController::class, 'SaleEdit'])->name('sale.edit');
    Route::post('/sheep/sales/update', [SalesController::class, 'SaleUpdate'])->name('sale.update');
    Route::get('/sheep/sales/details/{id}', [SalesController::class, 'SaleDetails'])->name('sale.details');
    Route::get('/sheep/sales/delete/{id}', [SalesController::class, 'SaleDelete'])->name('sale.delete');
    Route::get('/sheep/view/sales/', [SalesController::class, 'SalesView'])->name('sale.view');
    Route::get('sheep/sales/generate/receipt/{id}', [SalesController::class, 'SaleGenerateReceipt'])->name('sale.receipt');

    //User Management
    Route::get('/admin/create/user', [UserController::class, 'CreateUser'])->name('create-user');
    Route::post('/admin/store/user', [UserController::class, 'StoreUser'])->name('store-user');
    Route::get('/admin/view/user', [UserController::class, 'ViewUser'])->name('view-user');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'EditUser'])->name('edit-user');
    Route::post('/admin/user/update/{id}', [UserController::class, 'UpdateUser'])->name('update-user');
    Route::get('/admin/user/delete/{id}', [UserController::class, 'DeleteUser'])->name('delete-user');

    //Change Password
    Route::get('/change/user/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/update/user/password', [UserController::class, 'UserUpdatePassword'])->name('update-user-password');

});

require __DIR__.'/auth.php';
