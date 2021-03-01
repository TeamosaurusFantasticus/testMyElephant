<?php

namespace App\Http\Controllers;

use App\Models\Repo;
use Cz\Git\GitRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function cloneRepo($id){
        //catch an array containing all repositories matching with $id
        $repositoryToClone = DB::table('repos')->where('id', $id)->get();
        //only index 0 of $repositoryToClone is of interest as the id is set as unique
        $repositoryToClone = $repositoryToClone[0];

        $url = $repositoryToClone->url;
        $path = "allRepo/".$repositoryToClone->name;

        //Clone the repository locally using czProject library
        GitRepository::cloneRepository($url, $path);
        //$this->scanRepo($path);
        return view("getTheGrabberGit");
    }

// scanRepo() provides an array of all security issues found by ProgPilot
    public function scanRepo($path){
        //$path = "allRepo/$repositoryName";
        exec("./../vendor/bin/progpilot $path", $output);
        $this->deleteRepo($path);
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
