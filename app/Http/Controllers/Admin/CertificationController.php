<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
      */
    public function index()
    {
        $certificates= Certification::latest()->get();
        return view('admin.certification.index', [
            'certificates' => $certificates,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.certification.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     */
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
        Certification::createOrUpdateCertification($request);
        return redirect()->back()->with('success', 'Certificate created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certificate = Certification::find($id);
        $certificate->starting_date=date('Y',strtotime($certificate->starting_date));
        $certificate->ending_date=date('Y',strtotime($certificate->ending_date));
        return $certificate;
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        return view('admin.certification.edit', [
            'certificate' => Certification::find($id),
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
        Certification::createOrUpdateCertification($request, $id);
        return redirect()->route('certifications.index')->with('success', 'Certificate updated successfully.');
    }

    public function destroy($id)
    {
        $certificate = Certification::find($id);
        if (isset($certificate->logo_path)) {
            if (file_exists($certificate->logo_path)) {
                unlink($certificate->logo_path);
            }
        }
        $certificate->delete();
        return redirect()->back()->with('success','Certificate deleted successfully.');
    }
    public function changeCertificateStatus($id)
    {
        $certificate = Certification::where('id', $id)->first();
        $certificate->status == 0 ? $certificate->status = 1 : $certificate->status = 0;
        $certificate->save();
        return redirect()->back()->with('success', 'Certificate status changed successfully.');
    }
}
