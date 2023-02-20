<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function create()
    {
        return view('admin.education.create');
    }

    public function index()
    {
        $education= Education::latest()->get();
        return view('admin.education.index', [
            'educations' => $education,]);
    }
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'course_category_id'=>'required |numeric',
//            'course_sub_category_id'=>'required |numeric',
////            'title'=>'required |string|Alpha',
//            'image' => 'required|image',
//        ],
//            [
//                'image.required' => 'image koi aaa?',
//                'image.image' => 'onno file ken den?'
//            ]);
        Education::createOrUpdateEducation($request);
        return redirect()->back()->with('success', 'Degree created successfully.');
    }
    public function destroy($id)
    {
        $education = Education::find($id);
        if (isset($$education->image)) {
            if (file_exists($education->image)) {
                unlink($education->image);
            }
        }
        $education->delete();
        return redirect()->back()->with('success','Degree deleted successfully.');
    }
}
