<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Support\Facades\URL;

class GalleryApiController extends Controller
{
    public function index()
    {
        return Gallery::latest()->where('status', 1)->get();
    }

    public function indexSingle($id)
    {
        $image = Gallery::where('id', $id)->where('status', 1)->first();
        if ($image == null) return [];
        else {
            $image->view_count = $image->view_count + 1;
            $image->save();
        }
        return $image;
    }

    public function pickRandom()
    {
        $images = Gallery::where('status', 1)->get('id');
        $total = count($images);
        if ($total == 0) return [];
        $randNum = rand(0, $total - 1);

        $winImage = Gallery::where('id', $images[$randNum]->id)->first();

        $winImage->view_count = $winImage->view_count + 1;
        $winImage->save();
        $winImage->image=URL::to('/'.$winImage->image);
        return $winImage;
    }
}
