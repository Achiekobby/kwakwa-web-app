<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ServiceCategoriesComponent ;
use App\Http\Livewire\ServicesByCategoryComponent ;
use App\Http\Livewire\ServiceDetailsComponent;
use App\Http\Livewire\ChangeLocationComponent;
use App\Http\Livewire\ContactComponent;

use App\Http\Controllers\SearchController;

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesComponent;
use App\Http\Livewire\Admin\AdminAddServiceComponent;
use App\Http\Livewire\Admin\AdminEditServiceComponent;
use App\Http\Livewire\Admin\AdminServicesByCategoryComponent;

use App\Http\Livewire\Admin\AdminSliderComponent;
use App\Http\Livewire\Admin\AdminAddSliderComponent;
use App\Http\Livewire\Admin\AdminEditSliderComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminServiceProvidersComponent;

use App\Http\Livewire\ServiceProvider\ServiceProviderDashboardComponent;
use App\Http\Livewire\ServiceProvider\ServiceProviderProfileComponent;
use App\Http\Livewire\ServiceProvider\ServiceProviderEditProfileComponent;


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
    Route::get('service-provider/profile/edit',ServiceProviderEditProfileComponent::class)->name('s-provider.edit_profile');
    Route::get('service-provider/profile', ServiceProviderProfileComponent::class)->name('s-provider.profile');
    Route::get('/service-provider/dashboard',ServiceProviderDashboardComponent::class)->name('s-provider.dashboard');
});

// FOR ADMIN
Route::middleware(['auth:sanctum', 'verified','isAdmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');

    // Route for the Services
    Route::get('/admin/services',AdminServicesComponent::class)->name('admin.services');
    Route::get('/admin/{category_slug}/services',AdminServicesByCategoryComponent::class)->name('admin.services_by_category');
    Route::get('/admin/service/add', AdminAddServiceComponent::class)->name('admin.service_add');
    Route::get('/admin/service/edit/{service_slug}', AdminEditServiceComponent::class)->name('admin.service_edit');

    // Routes for the service categories
    Route::get('/admin/edit-service-category/{category_id}',AdminEditServiceCategoryComponent::class)->name('admin.edit-service-category');
    Route::get('/admin/add-service-categories',AdminAddServiceCategoryComponent::class)->name('admin.add-service-category');
    Route::get('/admin/service-categories',AdminServiceCategoryComponent::class)->name('admin.service-categories');

    //Routes for the admin sliders
    Route::get('admin/slider/{slide_id}/edit', AdminEditSliderComponent::class)->name('admin.edit_slide');
    Route::get('/admin/slider/add', AdminAddSliderComponent::class)->name('admin.add_slide');
    Route::get('admin/slider', AdminSliderComponent::class)->name('admin.slider');

    //Route for the admin contact us functionality
    Route::get('admin/contact-us',AdminContactComponent::class)->name('admin.contact_us');

    //Route for the admin service providers
    Route::get('admin/service-providers', AdminServiceProvidersComponent::class)->name('admin.service_providers');

});


Route::get('/',HomeComponent::class)->name('home');
Route::get('/service-categories',ServiceCategoriesComponent::class)->name('home.service-categories');
Route::get('/{category_slug}/services', ServicesByCategoryComponent::class)->name('home.services_by_category');
Route::get('/service/{service_slug}', ServiceDetailsComponent::class)->name('home.service_details');


Route::get('/autocomplete',[SearchController::class, "autocomplete"])->name('autocomplete');

Route::get('/change-location',ChangeLocationComponent::class)->name('home.change_location');

Route::get('/contact-us', ContactComponent::class)->name('home.contact_us');

