<?php

namespace App\Http\Controllers;

use App\Models\Repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RepositoryController extends Controller
{
    //show
    public function showRepositories()
    {
        $target =  Auth::id();
        $repositories =  DB::table("repos")->where('id_user_repo',$target)->get();
        return view('showUserRepositories', ["repositories" => $repositories]);
    }

    //create
//    TODO ceinture de sécurité soit la création marche en DB ET local soit elle est abort (=suppression)
    public function storeRepository(Request $request)
    {
        $newRepo = new Repo();
        $newRepo->name =  $request->repositoryName ;
        $newRepo->url = $request->repositoryURL;
//        TODO ne pas créer automatiquement un scanRapport au clonage d'un repo
        $newRepo->scanRapport = $request->scanRapport;
        $newRepo->id_user_repo =  Auth::user()->id;
        $newRepo->save();
    }


    //delete
//    TODO suppression APRÈS scan et envoie du rapport

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
