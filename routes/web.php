<?php

use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminKeywordController;
use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Namespace_;

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
    return 'hello world';
});




/* ROUTE ADMIN   */

Route::group(['prefix' => 'api-admin', 'namespace' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index']);


    /* ROUTE ADMIN-DANH MUC */
    Route::group(['prefix' => 'category'], function () {
        Route::get('', [AdminCategoryController::class, 'index'])->name('admin.category.index');

        Route::get('create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
        Route::post('create', [AdminCategoryController::class, 'store'])->name('admin.category.store');

        Route::get('update/{id}', [AdminCategorycontroller::class, 'edit'])->name('admin.category.edit');
        Route::post('update/{id}', [AdminCategoryController::class, 'update'])->name('admin.category.update');

        Route::get('status/{id}', [AdminCategoryController::class, 'status'])->name('admin.category.status');
        Route::get('hot/{id}', [AdminCategoryController::class, 'hot'])->name('admin.category.hot');
        Route::get('delete/{id}', [AdmincategoryController::class, 'delete'])->name('admin.category.delete');
    });


    // /* ROUTE ADMIN-TU KHOA */
    Route::group(['prefix' => 'keyword'], function () {
        Route::get('', [AdminKeywordController::class, 'index'])->name('admin.keyword.index');

        Route::get('create', [AdminKeywordController::class, 'create'])->name('admin.keyword.create');
        Route::post('create', [AdminKeywordController::class, 'store'])->name('admin.keyword.store');

        Route::get('update/{id}', [AdminKeywordController::class, 'edit'])->name('admin.keyword.edit');
        Route::post('update/{id}', [AdminKeywordController::class, 'update'])->name('admin.keyword.update');

        Route::get('hot/{id}', [AdminKeywordController::class, 'hot'])->name('admin.keyword.hot');
        Route::get('delete/{id}', [AdminKeywordController::class, 'delete'])->name('admin.keyword.delete');
    });
});



/* ROUTE FRONTEND */