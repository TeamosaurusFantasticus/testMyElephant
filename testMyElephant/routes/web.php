<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrabberController;
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


Route::get('/',[GrabberController::class,'getTheGrabberGit'])->name("getTheGrabberGit");

Route::post('/',[GrabberController::class,'cloneRepo'])->name("cloneRepo");

Route::get('delete',[GrabberController::class,'getDeletter'])->name('getDeletter');

Route::delete('delete',[GrabberController::class,'deleteProject'])->name("deleteRepo");
