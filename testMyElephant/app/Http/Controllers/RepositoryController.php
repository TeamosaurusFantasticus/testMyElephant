<?php

namespace App\Http\Controllers;

use App\Models\Repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepositoryController extends Controller
{
    //show
    public function showRepositories(){
       $repositories =  Repo::all()->where(Auth::user()->id_user_repo);
       ddd($repositories);
       return view('showUserRepositories', ["repositories" => $repositories]);
    }

    //create
    public function storeRepository(Request $request)
    {
        $newRepo = new Repo();
        $newRepo->name =  $request->repositoryName ;
        $newRepo->url = $request->repositoryURL;
        $newRepo->scanRapport = $request->scanRapport;
        $newRepo->id_user_repo =  Auth::user()->id;
        $newRepo->save();
    }

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
