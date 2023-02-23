@extends('admin.master')
@section('parentPageTitle', 'Certification')
@section('title','Add Certification')

@push('page-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
          integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush
@section('content')
    <section class="content blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h5>Add Certification</h5>
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
                            <form action="{{route('certifications.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="body">
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Certificate Title</label>
                                        <div class="col-md-9">
                                            <input type="text" name="title" class="form-control"
                                                   placeholder="Enter Certificate Name"/>
                                            @error('title') <span
                                                class="text-danger">{{$errors->first('title')}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Certificate info</label>
                                        <div class="col-md-9">
                                            <input type="text" name="subtitle" class="form-control"
                                                   placeholder="Enter Certification info"/>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Certification Link</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="certificate_link"
                                                   placeholder="Enter Website link"/>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                            <label for="" class="col-md-3">Color Code </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="color_code"
                                                       placeholder="pick from color picker"/>
                                            </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-3">Certification Logo</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="logo_path"/>
                                            <br> @error('logo_path') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info waves-effect m-t-20">Save Certificate</button>
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
