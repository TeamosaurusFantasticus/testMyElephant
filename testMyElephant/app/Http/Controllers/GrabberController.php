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
        ddd($repo);
    }


    public function getDeletter(){
        return view('getDeletter');
    }


    public function deleteProject(Request $request){
     //   $files = glob($dirname.'/*');
     /*     foreach($files as $file) {
            if(is_file($file))
                // Delete the given file
                unlink($file);
        }*/

        $dirname =   'public/allRepo/'.$request->repoToDelete;

        $cmd = "rmdir /s /q ";

        shell_exec('rmdir /s /q "public/allRepo/hellow"');


//       if(  ){
//            echo "succes";
//        }
//        else
//        {
//           echo "fail";
//        }

    }
}
