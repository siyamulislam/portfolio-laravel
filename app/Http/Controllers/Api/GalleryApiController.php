<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryApiController extends Controller
{
    public function index()
    {
        return Gallery::latest()->where('status',1)->get();
    }




    public function indexSingle($id)
    {
        $images=Gallery::where('id',$id)->where('status',1)->first();
        if($images==null) return[];
        else {$images->view_count= $images->view_count+1;
            $images->save();}

        return $images;
    }
    public function pickRandom()
    {
//        const randomNu
//        $images=Gallery::where('id',$id)->where('status',1)->first();
//        if($images==null) return[];
//        else {$images->view_count= $images->view_count+1;
//            $images->save();}
//
//        return $images;
    }
}
