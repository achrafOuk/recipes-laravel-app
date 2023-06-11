<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[MealController::class,'index'])->name('index');

Route::group(['prefix'=>'recipes'],function(){
    Route::get('details/{slug}',[MealController::class,'show'])->name('show-meal');
    Route::get('search',[MealController::class,'search'])->name('seach-meals');
    Route::get('random',[MealController::class,'random'])->name('random-meal');
});

Route::group(['prefix'=>'area'],function(){
    Route::get('/{area}',[AreaController::class,'show'])->name('meals-by-area');
});

Route::group(['prefix'=>'category'],function(){
    Route::get('/{category}',[CategoryController::class,'show'])->name('meals-by-category');
});

Route::group(['prefix'=>'favorites','middleware'=>'auth'],function(){
    Route::get('',[FavoriteController::class,'index'])->name('show-favorites-recipes');
    Route::get('search',[FavoriteController::class,'search'])->name('seach-favorite-meals');
    Route::post('add/{id}',[FavoriteController::class,'store'])->name('add-favorite');
    Route::post('remove/{id}',[FavoriteController::class,'delete'])->name('remove-favorite');
});


Route::group(['prefix'=>'dashboard','middleware'=>['auth','admin']],function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('search',[DashboardController::class,'search'])->name('seach-meals-dashboard');

    Route::group(['prefix'=>'recipes'],function(){
        Route::get('create',[MealController::class,'create'])->name('create-meal');
        Route::post('create',[MealController::class,'store'])->name('store-meal');
        Route::get('edit/{slug}',[MealController::class,'edit'])->name('edit-meal');
        Route::post('edit/{slug}',[MealController::class,'update'])->name('update-meal');
        Route::post('delete/{slug}',[MealController::class,'delete'])->name('delete-meal');
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
