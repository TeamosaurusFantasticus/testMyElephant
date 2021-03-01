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

// cloneRepo() clones a repository in a local directory named by the user then calls scanRepo()
    public function cloneRepo(Request $request){
        $path = "allRepo/".$request->repositoryName;
        GitRepository::cloneRepository($request->repositoryURL, $path);
        if(!empty(Auth::user()->id)){
            $newRepositoryController = new RepositoryController;
            $newRepositoryController->storeRepository($request);
            $newRepositoryController->showRepositories();
        }

        $this->scanRepo($path);
        return view("getTheGrabberGit");
    }

// scanRepo() provides an array of all security issues found by ProgPilot

    public function scanRepo($repositoryName){
         $path = "allRepo/$repositoryName";
        exec("./../vendor/bin/progpilot $path", $output);
        //$this->deleteRepo($path);
        return view("scanner", ["resultscan"=>$output]);

    }

// deleteRepo() suppress a local repository after scan
    public function deleteRepo($path){
        exec("rm -rf $path");
    }


    public function deleteProject(Request $request)
    {
        $dirname = 'allRepo/' . $request->repoToDelete;
        exec("rm -rf $dirname");
    }

//TODO processing ProgPilot report
//TODO create a class that calls every method needed for our repository scanning process called xxxService
}
