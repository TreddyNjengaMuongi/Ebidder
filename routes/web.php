<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SubcategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.layouts.dashboard');
});

Route::get('/vendor/addproducts', function () {
    return view('vendors.addproducts');
});



Route::get('/admin/category', function () {
    return view('admin.category');
})->name("category.create");

Route::get('/admin/subcategory', function () {
    return view('admin.subcategory');
})->name("subcategory.create");


Route::get('/admin/subcategory', [SubcategoryController::class, 'getCategory'])->name('subcategory.getSubcategory');
Route::get('/vendor/addproducts', [ProductsController::class, 'getCategory'])->name('products.getCategory');
//Route::get('/vendor/addproducts', [ProductsController::class, 'getSubCategory'])->name('products.getSubCategory');

Route::post("admin/category", [CategoryController::class, 'store'])->name("category.store");
Route::post("admin/subcategory", [SubcategoryController::class, 'store'])->name("subcategory.store");

// Route::get('/vendor/products', function () {
//     return view('vendor.products');
// })->name("products.list");

Route::get('/vendor/products', [ProductsController::class, 'getProductsTable'])->name("products.list");

Route::delete('/vendor/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');

Route::post("vendor/addproducts/", [ProductsController::class, 'store']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get("/dashboard", [ProductsController::class, 'getProducts'])->name("products.getProducts");

Route::get('/dashboard', [ProductsController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
