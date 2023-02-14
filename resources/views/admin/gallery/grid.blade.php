@extends('admin.master')
@section('parentPageTitle', 'Gallery')
@section('title',' Image')

@push('page-style')
@endpush
@section('content')
    <div class="row clearfix file_manager">
        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs pl-0 pr-0">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#a2023">ALL</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#b2019">Active</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#b2018">Deactivate</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="a2023">
                        <div class="row clearfix">
                            @foreach($images as $image)
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="image">
                                                <img src="{{asset($image->image)}}" alt="img" class="img-fluid" style="height: 150px;display: block;margin: 0 auto">
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">{{$image->title}}</p>
                                                <small> Size: 2MB <span class="date">Dec 11, 2019</span></small>
{{--                                                <small>{{\Illuminate\Support\Facades\Storage::size(asset($image->image))}} Size: 2MB <span class="date">Dec 11, 2019</span></small>--}}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane" id="b2019">
                        <div class="row clearfix">
                            @foreach($activeImages as $image)
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="image">
                                                <img src="{{asset($image->image)}}" alt="img" class="img-fluid" style="height: 150px;display: block;margin: 0 auto">
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">{{$image->title}}</p>
                                                <small> Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                                {{--                                                <small>{{\Illuminate\Support\Facades\Storage::size(asset($image->image))}} Size: 2MB <span class="date">Dec 11, 2019</span></small>--}}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane" id="b2018">
                        <div class="row clearfix">
                            @foreach($deactivateImages as $image)
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="image">
                                                <img src="{{asset($image->image)}}" alt="img" class="img-fluid" style="height: 150px;display: block;margin: 0 auto">
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">{{$image->title}}</p>
                                                <small> Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                                {{--                                                <small>{{\Illuminate\Support\Facades\Storage::size(asset($image->image))}} Size: 2MB <span class="date">Dec 11, 2019</span></small>--}}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

        @push('page-script')




    @endpush


