<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'logo_path',
        'certificate_link',
        'color_code',
    ];
    public static function createOrUpdateCertification($request, $id = null)
    {
        Certification::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'logo_path' =>Helper:: uploadFile($request->file('logo_path'),'certification',isset($id)?Certification::find($id)->logo_path:null),
            'certificate_link' => $request->certificate_link,
            'color_code' => $request->color_code,
        ]);
    }
}
