<?php

use App\Http\Controllers\PaypalController;
use Illuminate\Support\Facades\Route;

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
});



route::get('createpaypal', [PaypalController::class, 'createpaypal'])->name('createpaypal');

route::get('processPaypal', [PaypalController::class, 'processPaypal'])->name('processPaypal');

route::get('processSuccess', [PaypalController::class, 'processSuccess'])->name('processSuccess');

route::get('processCancel', [PaypalController::class, 'processCancel'])->name('processCancel');
