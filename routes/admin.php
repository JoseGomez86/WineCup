<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductControler;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesControllers;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReceptiongoodsController;
use App\Http\Controllers\Admin\SubcategoriesController;
use App\Http\Controllers\Admin\SupplierController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('permissions', PermissionController::class)->names('admin.permissions');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('products', ProductsController::class)->names('admin.products');

//para subir imagenes de productos
Route::post('products/files', [ProductControler::class, 'files'])->name('admin.products.files');

Route::resource('categories', CategoriesControllers::class)->names('admin.categories');

Route::resource('subcategories', SubcategoriesController::class)->names('admin.subcategories');

Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');

Route::resource('suppliers', SupplierController::class)->names('admin.suppliers');

Route::resource('receptiongoods', ReceptiongoodsController::class )->names('admin.receptiongoods');