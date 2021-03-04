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
        $repoRef = DB::Table("repos")->where("id",$id)->get();
        $userRef = DB::Table("users")->where("id",Auth::id())->get();

        if (!empty($repoRef[0]->id_user_repo)){

            $repoid = $repoRef[0]->id_user_repo;
            $userid = $userRef[0]->id;
            if($repoid == $userid ) {
                //catch an array containing all repositories matching with $id
                $repositoryToClone = DB::table("repos")->where("id", $id)->get();
                //only index 0 of $repositoryToClone is of interest as the id is set as unique
                $repositoryToClone = $repositoryToClone[0];

                $url = $repositoryToClone->url;
                $path = "temporaryRepoStorage/" . $repositoryToClone->name;

                //Clone the repository locally using czProject library
                GitRepository::cloneRepository($url, $path);
                return $this->scanRepo($path);
            }
            else{
                return redirect()->back();
            }

        }
        else{
            return redirect()->back();
        }
    }

// scanRepo() provides an array of all security issues found by ProgPilot
    public function scanRepo($path){
        exec("./../vendor/bin/progpilot $path", $output);
        $this->deleteRepo($path);
        return $this->processProgPilotOutput($output);
    }

// process ProgPilot's output
    public function processProgPilotOutput($output){
        $resultInJSON = "";
        foreach($output as $value){
            $resultInJSON .= $value;
        }
        $result = json_decode($resultInJSON);
        return view("scanner", ["finalResult"=>$result]);
    }

// deleteRepo() suppress a local repository after scan
    public function deleteRepo($path){
        exec("rm -rf $path");
    }


    public function about(){

        return view("about");
    }
}
