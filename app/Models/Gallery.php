<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'status',
        'view_count',
        'like_count'
    ];

    public static function createOrUpdateGallery($request, $id = null)
    {
        Gallery::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'image' =>Helper:: uploadFile($request->file('image'),'gallery',isset($id)?Gallery::find($id)->image:null),
        ]);
    }
}
