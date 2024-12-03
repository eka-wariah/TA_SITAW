<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministratorsController;
use App\Http\Controllers\ScopeCategoriesController;
use App\Http\Controllers\TrashCategoriesController;
use App\Http\Controllers\PaymentCategoriesController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/master',function(){
    return view('admin.profile.content');
});

Route::get('/login2',function(){
    return view('auth.login2');
});

Route::get('/register2',function(){
    return view('auth.register2');
});

Route::get('/admin/administrator', [AdministratorsController::class, 'index'])->name('administrator');


Route::get('/admin/scope_category', [ScopeCategoriesController::class, 'index'])->name('scope_category');
Route::get('/admin/scope_category/create', [ScopeCategoriesController::class, 'create'])->name('scope_category.create');
Route::post('/admin/scope_category/create', [ScopeCategoriesController::class, 'store'])->name('scope_category.store');
Route::get('/admin/scope_category/{id}/edit',[ScopeCategoriesController::class, 'edit'])->name('scope_category.edit');
Route::post('/admin/scope_category/{id}/edit',[ScopeCategoriesController::class, 'update'])->name('scope_category.update');
Route::delete('/admin/scope_category/{id}/destroy',[ScopeCategoriesController::class, 'destroy'])->name('scope_category.destroy');


Route::get('/admin/trash_category', [TrashCategoriesController::class, 'index'])->name('trash_category');
Route::get('/admin/trash_category/create', [TrashCategoriesController::class, 'create'])->name('trash_category.create');
Route::post('/admin/trash_category/create', [TrashCategoriesController::class, 'store'])->name('trash_category.store');
Route::get('/admin/trash_category/{id}/edit',[TrashCategoriesController::class, 'edit'])->name('trash_category.edit');
Route::post('/admin/trash_category/{id}/edit',[TrashCategoriesController::class, 'update'])->name('trash_category.update');
Route::delete('/admin/trash_category/{id}/destroy',[TrashCategoriesController::class, 'destroy'])->name('trash_category.destroy');

Route::get('/admin/payment_category', [PaymentCategoriesController::class, 'index'])->name('payment_category');
Route::get('/admin/payment_category/create', [PaymentCategoriesController::class, 'create'])->name('payment_category.create');
Route::post('/admin/payment_category/create', [PaymentCategoriesController::class, 'store'])->name('payment_category.store');
Route::get('/admin/payment_category/{id}/edit',[PaymentCategoriesController::class, 'edit'])->name('payment_category.edit');
Route::post('/admin/payment_category/{id}/edit',[PaymentCategoriesController::class, 'update'])->name('payment_category.update');
Route::delete('/admin/payment_category/{id}/destroy',[PaymentCategoriesController::class, 'destroy'])->name('payment_category.destroy');
