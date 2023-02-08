<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function create(){
        return view('admin.gallery.create');
    }
    public function index(){
        return view('admin.gallery.index');
    }
}
