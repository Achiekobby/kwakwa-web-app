<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ServiceCategoriesComponent ;
use App\Http\Livewire\ServicesByCategoryComponent ;

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesComponent;
use App\Http\Livewire\Admin\AdminServicesByCategoryComponent;

use App\Http\Livewire\ServiceProvider\ServiceProviderDashboardComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// FOR CUSTOMER
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
});

// FOR SERVICE PROVIDER
Route::middleware(['auth:sanctum', 'verified','isServiceProvider'])->group(function () {
    Route::get('/service-provider/dashboard',ServiceProviderDashboardComponent::class)->name('s-provider.dashboard');
});

// FOR ADMIN
Route::middleware(['auth:sanctum', 'verified','isAdmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    // Route for the Services
    Route::get('/admin/services',AdminServicesComponent::class)->name('admin.services');
    Route::get('/admin/{category_slug}/services',AdminServicesByCategoryComponent::class)->name('admin.services_by_category');
    // Routes for the service categories
    Route::get('/admin/edit-service-category/{category_id}',AdminEditServiceCategoryComponent::class)->name('admin.edit-service-category');
    Route::get('/admin/add-service-categories',AdminAddServiceCategoryComponent::class)->name('admin.add-service-category');
    Route::get('/admin/service-categories',AdminServiceCategoryComponent::class)->name('admin.service-categories');



});


Route::get('/',HomeComponent::class)->name('home');
Route::get('/service-categories',ServiceCategoriesComponent::class)->name('home.service-categories');
Route::get('/{category_slug}/services', ServicesByCategoryComponent::class)->name('home.services_by_category');

