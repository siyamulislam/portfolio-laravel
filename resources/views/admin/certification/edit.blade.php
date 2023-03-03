@extends('admin.master')
@section('parentPageTitle', 'Certification')
@section('title','Edit Certification')

@push('page-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
          integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush
@section('content')
    <section class="content ">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h5>Edit Certification</h5>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <a href="{{route('certifications.index')}}" class="btn btn-primary float-right">Manage</a>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="{{route('certifications.update',['certification'=>$certificate->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="body">
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Certificate</label>
                                        <div class="col-md-9">
                                            <input type="text" name="title" class="form-control"
                                                   value="{{$certificate->title}}" placeholder="Enter Certificate Name"/>
                                            @error('title') <span  class="text-danger">{{$errors->first('title')}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">certificate</label>
                                        <div class="col-md-9">
                                            <input type="text" name="subtitle" class="form-control"
                                                   value="{{$certificate->subtitle}}"   placeholder="Enter Certificate Name"/>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Website</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="certificate_link"
                                                   placeholder="Enter Certificate link" value="{{$certificate->certificate_link}}"/>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Color pick</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="color_code"
                                                   placeholder="Pick a color" value="{{$certificate->color_code}}"/>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Certificate Logo</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="logo_path"/>
                                            <br> @error('logo_path') <span class="text-danger">{{$message}}</span> @enderror
                                            <img src="{{asset($certificate->logo_path)}}"   alt="" style="height: 70px" >
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info waves-effect m-t-20">Update Certificate</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-script')
    @include('admin.includes.custom-toastr')
@endpush
