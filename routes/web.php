<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Models\Category;

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


Route::get('/', [HomeController::class, 'index']);

Route::get('/products/{product}', [HomeController::class, 'show'])->name('home.show');

Route::get('/categories', function () {
  return view('categories.index', [
    'categories' => Category::all()
  ]);
});

Route::post('/transaction/store', [TransactionController::class, 'store'])->name('transaction.store');

Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index']);

  Route::resource('/categories', CategoryController::class);
  Route::resource('suppliers', SupplierController::class);
  Route::get('/products/{product}/stock/', [ProductController::class, 'indexStock'])->name('stock.index');
  Route::put('/products/{product}/stock/', [ProductController::class, 'updateStock'])->name('stock.update');

  Route::get('/products/import_excel', [ProductController::class, 'excelIndex'])->name('products.import.index');
  Route::post('/products/import_excel', [ProductController::class, 'importExcel'])->name('products.import');
  Route::resource('products', ProductController::class);

  Route::get('/transactions/filter', [TransactionController::class, 'filter'])->name('transactions.filter');
  Route::resource('/transactions', TransactionController::class);
});
