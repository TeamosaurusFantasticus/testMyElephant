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
        $path = "temporaryRepoStorage/".$repositoryToClone->name;

        //Clone the repository locally using czProject library
        GitRepository::cloneRepository($url, $path);
        return $this->scanRepo($path);
    }

// scanRepo() provides an array of all security issues found by ProgPilot
    public function scanRepo($path){
        exec("./../vendor/bin/progpilot $path", $output);
        $this->deleteRepo($path);
        return $this->processProgPilotOutput($output);
    }

// process ProgPilot's output
    public function processProgPilotOutput($output){
        $resultToTurnIntoJSON = '';
        foreach($output as $value){
            $resultToTurnIntoJSON .= $value;
        }
        $resultInJSON = json_decode($resultToTurnIntoJSON);
        return view("scanner", ["finalResult"=>$resultInJSON]);
    }

// deleteRepo() suppress a local repository after scan
    public function deleteRepo($path){
        exec("rm -rf $path");
    }

//TODO create a class that calls every method needed for our repository scanning process called xxxService
}
