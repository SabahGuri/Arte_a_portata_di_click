<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostumerController;

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
//!route della homepage
Route::get('/',[HomeController::class,'index'])
->name('home.index');

//! rotte per i quadri

Route::get('/quadri',[PictureController::class,'index'])
->name('pictures.index');

Route::get('/quadri/aggiungi',[PictureController::class,'create'])
->name('pictures.create')
->middleware(['auth','verified']);

Route::post('/quadri/aggiungi',[PictureController::class,'store'])
->name('pictures.store')
->middleware(['auth','verified']);

Route::get('/quadri/modifica/{id}',[PictureController::class,'edit'])
->name('pictures.edit')
->middleware(['auth','verified']);

Route::put('/quadri/modifica/{id}',[PictureController::class,'update'])
->name('pictures.update')
->middleware(['auth','verified']);

Route::delete('/quadri/elimina/{id}',[PictureController::class,'destroy'])
->name('pictures.destroy')
->middleware(['auth','verified']);

Route::get('/quadri/checkout/{id}',[PictureController::class,'check_out'])
->name('pictures.check-out');

Route::post('/quadri/checkout/{id}',[PictureController::class,'performCheckout'])
->name('pictures.performCheckout');

Route::get('/quadri/dettaglio/{id}',[PictureController::class,'show'])
->name('pictures.show');

Route::get('/quadri/categoria/{id}',[CategoryController::class,'show'])
->name('categories.show');



//! rotte per gli utenti iscritti

Route::get('/user/profile',[UserController::class,'profile'])
->name('user.profile')
->middleware(['auth','verified']);

Route::get('/user/pictures',[UserController::class,'pictures'])
->name('user.pictures')
->middleware(['auth','verified']);

Route::get('/user/costumers',[UserController::class,'costumers'])
->name('user.costumers')
->middleware(['auth','verified']);




//!rotte categorie

Route::get('/categorie',[CategoryController::class,'index'])
->name('categories.index');

