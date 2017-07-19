<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function setTitle(Request $request) {
        $project = new Project();
        $project->title = $request['title'];
        $project->save();
        $project_cover = new CoverImageController();
        $project_cover->uploadImage($project->id);
    }
}
