<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public $image,$images;
    public function create(){
        return view('admin.gallery.create');
    }
    public function index(){
        $this->images = Gallery::latest()->get();
        return view('admin.gallery.index', [
            'images' =>$this->images, ]);
    }
    public function store( Request $request){
        $this->validate($request, [
            'title' => 'required |string',
            'image' => 'required|image',
        ],
            [
                'title.required' => 'kisu lekhen vai',
                'image.required' => 'image koi aaa?',
                'image.image' => 'onno file ken den?'
            ]);
        Gallery::createOrUpdateGallery($request);
        return redirect()->back()->with('success', 'Image created successfully.');
    }

    public function edit($id)
    {
        return view('admin.gallery.edit', [
            'image' => Gallery::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required |string',
            'image' => 'image',
        ],
            [
                'image.image' => 'onno file ken den?'
            ]);
        Gallery::createOrUpdateGallery($request, $id);
        return redirect()->route('gallery.index')->with('success', 'Image updated successfully.');
    }
    public function destroy($id)
    {
        $this->image = Gallery::find($id);
        if (isset($this->image->image)) {
            if (file_exists($this->image->image)) {
                unlink($this->image->image);
            }
        }
        $this->image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    public function changeImageStatus(  $id){
        $this->image = Gallery::where('id', $id)->first();
        $this->image->status == 0 ? $this->image->status = 1 : $this->image->status = 0;
        $this->image->save();
        return redirect()->back()->with('success', 'image status changed successfully.');
    }
}
