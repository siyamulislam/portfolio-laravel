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
        $this->validate($request, [
            'title'=>'required |string',
            'logo_path' => 'required|image',
        ],
            [
                'logo_path.required' => 'image koi aaa?',
                'logo_path.image' => 'onno file ken den?'
            ]);
        Education::createOrUpdateEducation($request);
        return redirect()->back()->with('success', 'Degree created successfully.');
    }
    public function edit($id)
    {
        return view('admin.education.edit', [
            'degree' => Education::find($id),
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
            'logo_path' => 'image',
        ],
            [
                'logo_path.image' => 'give only Image?'
            ]);
        Education::createOrUpdateEducation($request, $id);
        return redirect()->route('education.index')->with('success', 'Degree updated successfully.');
    }
    public function destroy($id)
    {
        $education = Education::find($id);
        if (isset($education->logo_path)) {
            if (file_exists($education->logo_path)) {
                unlink($education->logo_path);
            }
        }
        $education->delete();
        return redirect()->back()->with('success','Degree deleted successfully.');
    }

    public function changeDegreeStatus($id)
    {
        $degree = Education::where('id', $id)->first();
        $degree->status == 0 ? $degree->status = 1 : $degree->status = 0;
        $degree->save();
        return redirect()->back()->with('success', 'Degree status changed successfully.');
    }
    public function show($id)
    {
        $degree = Education::find($id);
        $degree->starting_date=date('Y',strtotime($degree->starting_date));
        $degree->ending_date=date('Y',strtotime($degree->ending_date));
        return $degree;
    }
}
