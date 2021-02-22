<?php

namespace App\Http\Controllers;

use Cz\Git\GitRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Filesystem\Filesystem;
use App\Http\Controllers\RepositoryController;

class GrabberController extends Controller
{
    public function getTheGrabberGit(){

        return view("getTheGrabberGit");
    }

    public function cloneRepo(Request $request){
        $path = "allRepo/".$request->repositoryName;
        $repo = GitRepository::cloneRepository($request->repositoryURL, $path);
        if(!empty(Auth::user()->id)){
            $newRepositoryController = new RepositoryController;
            $newRepositoryController->storeRepository($request);
            $newRepositoryController->showRepositories();
        }
        return view("getTheGrabberGit");
    }


    public function getDeletter(){
        return view('getDeletter');
    }


    public function deleteProject(Request $request)
    {
        $dirname = 'allRepo/' . $request->repoToDelete;
        exec("rm -rf $dirname");
    }
}
