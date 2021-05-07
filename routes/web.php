<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SiteController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SiteStatController;

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
    return view('welcome');
})->name('/');

Route::resource('/dashboard/site', SiteController::class)->only([
    'create',
    'store',
    'destroy'
])->middleware('auth');

Route::resource('/dashboard/site_stat', SiteStatController::class)->only([
    'show',
    'store',
    'destroy'
])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard.index');


require __DIR__ . '/auth.php';
