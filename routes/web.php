<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministratorsController;
use App\Http\Controllers\ScopeCategoriesController;

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

Route::get('/admin/administrator', [AdministratorsController::class, 'index'])->name('administrator');


Route::get('/admin/scope_category', [ScopeCategoriesController::class, 'index'])->name('scope_category');
Route::get('/admin/scope_category/create', [ScopeCategoriesController::class, 'create'])->name('scope_category.create');
Route::post('/admin/scope_category/create', [ScopeCategoriesController::class, 'store'])->name('scope_category.store');
Route::get('/admin/scope_category/{id}/edit',[ScopeCategoriesController::class, 'edit'])->name('scope_category.edit');
Route::post('/admin/scope_category/{id}/edit',[ScopeCategoriesController::class, 'update'])->name('scope_category.update');
Route::get('/admin/scope_category/{id}/destroy',[ScopeCategoriesController::class, 'destroy'])->name('scope_category.destroy');