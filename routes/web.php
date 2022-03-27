<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ServiceCategoriesComponent ;
use App\Http\Livewire\Admin\AdminDashboardComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class)->name('home');
Route::get('/service-categories',ServiceCategoriesComponent::class)->name('home.service-categories');

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
});


