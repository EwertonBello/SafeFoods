<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\CompanyController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('dashboard', [CompanyController::class, 'dashboard'])->name('dashboard');
    Route::get('user/company', [CompanyController::class, 'myCompany'])->name('company');
    Route::resource('/company', CompanyController::class)->only(['edit', 'update']);
});

Route::resource('/company', CompanyController::class)->only(['index', 'show']);
Route::get('/company/delivery/{company}', [CompanyController::class, 'delivery'])->name('delivery');
