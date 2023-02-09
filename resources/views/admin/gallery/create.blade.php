@extends('admin.master')
@section('parentPageTitle', 'Gallery')
@section('title','Add Image')

@push('page-style')
@endpush
@section('content')
    <section class="content blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h5>Upload a Image</h5>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <a href="{{route('gallery.index')}}" class="btn btn-primary float-right">Manage</a>
{{--                        <button  class="btn btn-primary float-right " type="button"> Manage</button>--}}
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="#" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="body">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Enter Image title" />
                                    @error('title') <span class="text-danger">{{$errors->first('title')}}</span> @enderror

                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image" />
                                    <br> @error('image') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info waves-effect m-t-20">Save Image</button>
{{--                                <input type="submit" class="btn btn-info waves-effect m-t-20 " value="Save Image"/>--}}
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('page-script')

@endpush
