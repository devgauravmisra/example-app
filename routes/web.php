<?php
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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PaymentController;
Route::get('/payment/success', [FormController::class, 'success'])->name('payment.success');
Route::post('/submit-form', [FormController::class, 'submit'])->name('form.submit');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/example', function () {
    return view('example');
});



Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');

