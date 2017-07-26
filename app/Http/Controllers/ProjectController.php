<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @param Request $request
     */
    public function setTitle(Request $request) {
//        dd($request->all());
        //Get The Title and Image Data
        $project = new Project();
        //Set the title
        $project->title = $request['title'];
        //Add Image to storage
        $cover_image_data = $request['image'];
        $cover_image = new CoverImageController();
        $cover_image->uploadImage($cover_image_data);
        //Add url to db
        $cover_image->storeImageURL();
        //Save project title
        $project->save();
    }
}
