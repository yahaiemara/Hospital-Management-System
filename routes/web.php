<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

Route::get('/Home',[HomeController::class,'Home']);
Route::get('/',[HomeController::class,'index']);
Route::get('add_doctor',[AdminController::class,'add']);
Route::post('Add',[AdminController::class,'Add_Doctor']);
Route::post('appointment',[HomeController::class,'appointment']);
Route::get('myappointment',[HomeController::class,'myappointment']);
Route::get('cancel/{id}',[HomeController::class,'cancel']);
Route::get('show_appoint',[AdminController::class,'show_appoint']);
Route::get('approved/{id}',[AdminController::class,'approved']);
Route::get('cancelled/{id}',[AdminController::class,'cancelled']);
Route::get('show_doctor',[AdminController::class,'show_doctor']);
Route::get('delete/{id}',[AdminController::class,'delete']);
Route::get('updatedoctor/{id}',[AdminController::class,'update']);
Route::post('edit/{id}',[AdminController::class,'edit']);
