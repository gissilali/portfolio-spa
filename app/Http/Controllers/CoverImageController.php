<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class CoverImageController extends Controller
{
    function uploadImage(Request $request) {
        $data = $request->input('image');
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $image_name = time().'.png';
        $path = public_path('cover_pics/');
        if(!file_exists($path)){
            mkdir($path, 0755, true);
        }
        file_put_contents($path.$image_name, $data);
        $image_url = 'cover_pics/'.$image_name;
        $this->storeImageURL();
    }
    function  storeImageURL(){

    }
}
