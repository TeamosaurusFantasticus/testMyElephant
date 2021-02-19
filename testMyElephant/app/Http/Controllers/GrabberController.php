<?php

namespace App\Http\Controllers;

use Cz\Git\GitRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Filesystem\Filesystem;
class GrabberController extends Controller
{
    public function getTheGrabberGit(){

        return view("getTheGrabberGit");
    }

    public function cloneRepo(Request $request){
        $path = "allRepo/".$request->namerepo;
        $repo = GitRepository::cloneRepository($request->repo, $path);

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
