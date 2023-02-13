@extends('admin.master')
@section('parentPageTitle', 'Gallery')
@section('title','Grid Image')
@section('contentName','file_manager')

@push('page-style')
@endpush
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs pl-0 pr-0">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#a2018">2018</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#b2019">2019</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#b2016">2016</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="a2018">
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

                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/2.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/11.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2016</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/10.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2016</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/3.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/4.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/5.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/8.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/9.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="b2019">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/6.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2016</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/7.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2016</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/4.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/5.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/8.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2019</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/11.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2016</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/10.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2016</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="javascript:void(0);" class="file">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                        <div class="image">
                                            <img src="assets/images/image-gallery/14.jpg" alt="img" class="img-fluid">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                            <small>Size: 2MB <span class="date">Dec 11, 2016</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

        @push('page-script')




    @endpush


