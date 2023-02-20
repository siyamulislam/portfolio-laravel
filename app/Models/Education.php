<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'logo_path',
        'starting_date',
        'ending_date',
        'descriptions',
        'website_link',
    ];
    public static function createOrUpdateEducation($request, $id = null)
    {
        Education::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'logo_path' =>Helper:: uploadFile($request->file('logo_path'),'education',isset($id)?Education::find($id)->logo_path:null),
            'starting_date' => $request->starting_date,
            'ending_date' => $request->ending_date,
            'descriptions' => $request->descriptions,
            'website_link' => $request->website_link,
        ]);
    }
}
