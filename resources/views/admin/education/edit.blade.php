@extends('admin.master')
@section('parentPageTitle', 'Education')
@section('title','Edit Education')

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
                        <h5>Edit Education</h5>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <a href="{{route('education.index')}}" class="btn btn-primary float-right">Manage</a>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="{{route('education.update',['id'=>$degree->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="body">
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Institution</label>
                                        <div class="col-md-9">
                                            <input type="text" name="title" class="form-control"
                                                   value="{{$degree->title}}" placeholder="Enter Institution Name"/>
                                            @error('title') <span  class="text-danger">{{$errors->first('title')}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Degree</label>
                                        <div class="col-md-9">
                                            <input type="text" name="subtitle" class="form-control"
                                                   value="{{$degree->subtitle}}"   placeholder="Enter Degree Name"/>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Starting Date</label>
                                        <div class="col-md-9">
                                            <input type="date" name="starting_date" class="form-control"
                                                   value="{{$degree->starting_date}}"/>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Ending Date</label>
                                        <div class="col-md-9">
                                            <input type="date" name="ending_date" class="form-control"
                                                   value="{{$degree->ending_date}}"/>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Description</label>
                                        <div class="col-md-9">
                                            <textarea name="descriptions" id="" class="form-control" cols="30"
                                                      rows="3">{{$degree->descriptions}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Website</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="website_link"
                                                   placeholder="Enter Website link" value="{{$degree->website_link}}"/>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">institution Logo</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="logo_path"/>
                                            <br> @error('logo_path') <span class="text-danger">{{$message}}</span> @enderror
                                            <img src="{{asset($degree->logo_path)}}"   alt="" style="height: 70px" >
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info waves-effect m-t-20">Update Degree</button>
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
