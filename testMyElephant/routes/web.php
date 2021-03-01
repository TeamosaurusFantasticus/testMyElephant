<?php

use App\Http\Controllers\RepositoryController;
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

//Scan a repository
Route::post('/showUserRepositories/{repositoryName}', [GrabberController::class, 'scanRepo'])->name("scanRepo");

///*Route::get('login',[Authentification::class,'login'])->name("login");*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Show one's repositories
Route::get('/showUserRepositories', [RepositoryController::class, 'showRepositories'])->name('showUserRepositories');

//Delete one's repository in DB
Route::delete('/showUserRepositories/{id}',[RepositoryController::class, 'deleteRepository'] )->name('deleteRepository');

