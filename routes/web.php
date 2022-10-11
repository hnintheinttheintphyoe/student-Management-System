<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

Route::redirect('/', 'loginPage');

    Route::middleware(['admin_auth'])->group(function () {
        Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
        Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');
    });


Route::middleware([
    'auth'])->group(function () {


      Route::get('/home',[StudentController::class,'studentList'])->name('students#home');
      Route::get('/createPage',[StudentController::class,'createPage'])->name('students#createPage');
      Route::post('/create',[StudentController::class,'create'])->name('student#create');
      Route::get('/delete/{id}',[StudentController::class,'delete'])->name('student#delete');
      Route::get('/editPage/{id}',[StudentController::class,'editPage'])->name('student#editPage');
      Route::post('/edit',[StudentController::class,'edit'])->name('student#edit');





});

