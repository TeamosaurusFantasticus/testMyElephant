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


//route to home page
Route::get('/',[GrabberController::class,'getTheGrabberGit'])->name("getTheGrabberGit");

//Register a repository in DB
Route::post('/showUserRepositories', [RepositoryController::class, 'registerRepositoryInDB'])->name('registerRepositoryInDB');

//Show one's repositories
Route::get('/showUserRepositories', [RepositoryController::class, 'showRepositories'])->name('showUserRepositories');

//Delete one's repository in DB
Route::delete('/showUserRepositories/{id}',[RepositoryController::class, 'deleteRepository'] )->name('deleteRepository');

//Clone a repository locally
Route::post('/scanner/{id}',[GrabberController::class,'cloneRepo'])->name("cloneRepo");

//Scan a repository
//Route::post('/scanner', [GrabberController::class, 'scanRepo'])->name("scanner");
Route::post('/scanner', [GrabberController::class, 'processProgPilotOutput'])->name("scanner");


///*Route::get('login',[Authentification::class,'login'])->name("login");*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



