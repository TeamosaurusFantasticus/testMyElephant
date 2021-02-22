<?php

namespace App\Http\Controllers;

use App\Models\Repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepositoryController extends Controller
{
    //show
    public function showRepositories(){
       $repositories =  Repo::all()->where(Auth::id_user_repo);
       return view('showUserRepositories', ["repositories = $repositories"]);
    }

    //create
//    public function storeRepository(Request $request)
//    {
//        $newRepo = new Repo();
//        $request->name = $newRepo->name;
//        $request->url = $newRepo->url;
//    }

    /*

      $profile_photo_path = '/img/imgIconeUser/'.time().'.'.$userRequest->profile_photo_path->extension();
            $userRequest->profile_photo_path->move(public_path('/img/imgIconeUser'), $profile_photo_path);
            id();
            string('name');
            string('url');
            string('scanRapport');
           timestamps();
        unsignedBigInteger('
    ');
          foreign('id_user_repo')->references('id')->on('users')->onDelete('cascade');
     */
}
