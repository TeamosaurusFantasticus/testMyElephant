<?php

namespace App\Http\Controllers;

use App\Models\Repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RepositoryController extends Controller
{
    //show repositories owned by a user
    public function showRepositories()
    {
        $target =  Auth::id();
        $repositories =  DB::table("repos")->where('id_user_repo',$target)->get();
        return view('showUserRepositories', ["repositories" => $repositories]);
    }


    //register a Repository in DB
    public function registerRepositoryInDB(Request $request )
    {

            $newRepo = new Repo();
            $newRepo->name =  $request->repositoryName;
            $newRepo->url = $request->repositoryURL;
            $newRepo->id_user_repo =  Auth::user()->id;
            $newRepo->save();
            return $this->showRepositories();
    }

    //delete repository line in DB
    public function deleteRepository($id){
         Repo::where('id',$id)->firstorfail()->delete();
         return back();
    }
}
