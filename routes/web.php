<?php

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

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


Route::get('/', [LandingController::class, 'index'])->name('landing_page');
Route::get('/detail/{no_polisi}', [LandingController::class, 'detail']);


Route::get('/register', [CustomerController::class, 'register']);
Route::post('/register', [CustomerController::class, 'register_customer'])->name('customer.register');

Route::get('/login', [CustomerController::class, 'index'])->name('login-page')->middleware('guest.customer');
Route::post('/login', [CustomerController::class, 'login_customer'])->name('login_customer');
Route::post('/logoutCustomer', [CustomerController::class, 'logout'])->name('logout_customer');


//auth LoginAdmin
Route::get('/administrator', [AdminController::class, 'index'])->name('login')->middleware('guest');
Route::post('/administrator', [AdminController::class, 'loginAdmin']);





//Admin Panel
Route::middleware(['auth:web'])->group(function () {
    Route::get('/admin/dashboard/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/datacustomer/', [DashboardController::class, 'dataCustomer']);
    Route::resource('admin/datamobil', CarController::class);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // Route::get('/admin/transaksi/', [TransactionController::class, 'showTransaction_admin'])->name('admin.transaction');
    Route::get('/admin/pembayaran/', [PaymentController::class, 'index'])->name('pembayaran');
    Route::post('/admin/pembayaran/{id}/confirm', [TransactionController::class, 'confirmPayment'])->name('pembayaran.confirm');
});

//Customer Panel
Route::middleware(['auth.customer'])->group(function () {
    Route::get('/customer/dashboard/', [CustomerController::class, 'dashboard'])->name('customer-dashboard');
    Route::get('/customer/sewa/{id}', [CustomerController::class, 'sewa'])->name('customer-sewa');

    //Transaksi
    Route::get('/transaksi/create/{carId}', [TransactionController::class, 'create'])->name('transaksi');
    Route::post('/transaksi/store/{carId}', [TransactionController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{id}', [TransactionController::class, 'show'])->name('transaksi.show');
    Route::post('/transaksi/pay/{id}', [TransactionController::class, 'pay'])->name('transaksi.pay');
    Route::delete('/transaksi/delete/{id}', [TransactionController::class, 'destroy'])->name('transaksi.destroy');
});
