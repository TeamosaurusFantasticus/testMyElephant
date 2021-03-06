<?php

namespace App\Http\Controllers;

use App\Models\Repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Rules\isGit;


class RepositoryController extends Controller
{
    //show repositories owned by a user
    public function showRepositories()
    {
        $target =  Auth::id();
        $repositories =  DB::table("repos")->where("id_user_repo",$target)->get();
        return view("showUserRepositories", ["repositories" => $repositories]);

    }


    //register a Repository in DB
    public function registerRepositoryInDB(Request $request )
    {
            $rules = [
                "repositoryName" => "required|min:4|max:30|alpha_dash",
                "repositoryURL" => ["required", "url", new isGit]
            ];

        $request->validate($rules);

            $newRepo = new Repo();
            $newRepo->name =  $request->repositoryName;
            $newRepo->url = $request->repositoryURL;
            $newRepo->id_user_repo =  Auth::user()->id;
            $newRepo->save();

            return $this->showRepositories();
    }

    //delete repository line in DB
    public function deleteRepository($id){


            $repoRef = DB::Table("repos")->where("id",$id)->get();
            $userRef = DB::Table("users")->where("id",Auth::id())->get();
            if (!empty($repoRef[0]->id_user_repo)){

                $repoid = $repoRef[0]->id_user_repo;
                $userid = $userRef[0]->id;
                if($repoid == $userid ) {

                    Repo::where("id", $id)->firstorfail()->delete();
                    return back();

                }
            }
            else{
                return redirect()->back();
            }

    }
}
