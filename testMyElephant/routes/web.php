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

//route to about page
Route::get('/about',[GrabberController::class,'about'])->name("about");

//Register a repository in DB
Route::post('/showUserRepositories', [RepositoryController::class, 'registerRepositoryInDB'])->name('registerRepositoryInDB');

//Show one's repositories
Route::get('/showUserRepositories', [RepositoryController::class, 'showRepositories'])->name('showUserRepositories');

//Delete one's repository in DB
Route::delete('/showUserRepositories/{id}',[RepositoryController::class, 'deleteRepository'] )->name('deleteRepository');

//Clone a repository locally and start the sequence clone, scan and delete local repository
Route::post('/scanner/{id}',[GrabberController::class,'cloneRepo'])->name("cloneRepo");


Route::middleware(['auth:sanctum', 'verified'])->get('/getTheGrabberGit', function () {
    return view('/getTheGrabberGit');
})->name('/dashboard');



