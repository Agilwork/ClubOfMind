<?php

namespace App\Http\Controllers;

use App\Photo;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();

        return response()->json($photos);
    }
}
