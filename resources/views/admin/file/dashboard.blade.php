@extends('admin.master')
@section('parentPageTitle', 'File Manager')
@section('title','Dashboard')
@section('menu-btn')
    <a href="{{route('storage.file')}}">
        <button class="btn btn-success btn-icon float-right" type="button"><i class="zmdi zmdi-folder-star"></i>
        </button>
    </a>
    <a href="#showModal" data-attr="{{route('storage.dir')}}" id="fileUploadBtn">
        <button class="btn btn-success btn-icon float-right" type="button"><i class="zmdi zmdi-file-plus"></i></button>
    </a>
@endsection

@push('page-style')
    {{--toastr--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
          integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="{{asset('/')}}admin/assets/plugins/footable-bootstrap/css/footable.bootstrap.min.css"/>
    <link rel="stylesheet"
          href="{{asset('/')}}admin/assets/plugins/footable-bootstrap/css/footable.standalone.min.css"/>

@endpush
@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2">
                    <div class="body big_icon storage">
                        <h6>Storage</h6>
                        <h2> {{$storage->freeSpace}}GB <small class="info">of {{$storage->totalSpace}}GB</small></h2>
                        <div class="progress m-t-10">
                            <div class="progress-bar l-green" role="progressbar"
                                 aria-valuenow="{{($storage->usedSpace/$storage->totalSpace)*100}}" aria-valuemin="0"
                                 aria-valuemax="100"
                                 style="width: {{($storage->usedSpace/$storage->totalSpace)*100}}%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2">
                    <div class="body big_icon documents">
                        <h6>Documents</h6>
                        <h2>2GB <small class="info">of 1Tb</small></h2>
                        <div class="progress m-t-10">
                            <div class="progress-bar l-blush" role="progressbar" aria-valuenow="12" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 12%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2">
                    <div class="body big_icon images">
                        <h6>Images</h6>
                        <h2>20GB <small class="info">of 1Tb</small></h2>
                        <div class="progress m-t-10">
                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="89" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 89%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2">
                    <div class="body big_icon media_w">
                        <h6>Media</h6>
                        <h2>10GB <small class="info">of 1Tb</small></h2>
                        <div class="progress m-t-10">
                            <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 39%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs pl-0 pr-0">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#list_view">List
                                View</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#grid_view">Grid View</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="list_view">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 c_table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th data-breakpoints="xs">Owner</th>
                                        <th data-breakpoints="xs sm md">Last Modified</th>
                                        <th data-breakpoints="xs">File size</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><span><i class="zmdi zmdi-folder w25"></i> My Projects</span></td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">Mar 26, 2019</span></td>
                                        <td><span class="size">-</span></td>
                                    </tr>
                                    <tr>
                                        <td><span><i class="zmdi zmdi-folder w25"></i> Sample Website proposals</span>
                                        </td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">Apr 09, 2019</span></td>
                                        <td><span class="size">-</span></td>
                                    </tr>
                                    <tr>
                                        <td><span><i class="zmdi zmdi-folder w25"></i> WordPress | Codester</span></td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">Dec 19, 2016</span></td>
                                        <td><span class="size">-</span></td>
                                    </tr>
                                    <tr>
                                        <td><span><i class="zmdi zmdi-folder w25"></i> VueJs Projects for client</span>
                                        </td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">Apr 22, 2018</span></td>
                                        <td><span class="size">-</span></td>
                                    </tr>
                                    <tr>
                                        <td><span><i class="zmdi zmdi-folder w25"></i> Angular Website proposals</span>
                                        </td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">Feb 11, 2018</span></td>
                                        <td><span class="size">-</span></td>
                                    </tr>
                                    <tr>
                                        <td><span><i class="zmdi zmdi-folder w25"></i> Dribbble | Website</span></td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">Aug 13, 2018</span></td>
                                        <td><span class="size">-</span></td>
                                    </tr>
                                    <tr>
                                        <td><span><i class="zmdi zmdi-file-text w25 text-amber"></i> Document of Understanding</span>
                                        </td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">Apr 26, 2018</span></td>
                                        <td><span class="size">67Kb</span></td>
                                    </tr>
                                    <tr>
                                        <td><span><i class="zmdi zmdi-chart w25 text-green"></i> Report2016.xls</span>
                                        </td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">Apr 26, 2018</span></td>
                                        <td><span class="size">25KB</span></td>
                                    </tr>
                                    <tr>
                                        <td><span><i class="zmdi zmdi-collection-pdf w25 text-blush"></i> asdf  hhkj.pdf</span>
                                        </td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">Apr 26, 2018</span></td>
                                        <td><span class="size">1MB</span></td>
                                    </tr>
                                    <tr>
                                        <td><span><i class="zmdi zmdi-collection-pdf w25 text-blush"></i> asdf  hhkj.pdf</span>
                                        </td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">Sept 14, 2018</span></td>
                                        <td><span class="size">1MB</span></td>
                                    </tr>
                                    <tr>
                                        <td><span><i class="zmdi zmdi-file-text w25 text-amber"></i> Document of Understanding</span>
                                        </td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">Apr 26, 2018</span></td>
                                        <td><span class="size">15KB</span></td>
                                    </tr>
                                    <tr>
                                        <td><span><i class="zmdi zmdi-chart w25 text-green"></i> Report2016.xls</span>
                                        </td>
                                        <td><span class="owner">Me</span></td>
                                        <td><span class="date">Oct 17, 2018</span></td>
                                        <td><span class="size">08KB</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane file_manager" id="grid_view">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-collection-video"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">Jee Le Zara Song.mpg4</p>
                                                <small>Size: 32MB <span class="date">Oct 11, 2016</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="image">
                                                <img src="assets/images/image-gallery/3.jpg" alt="img"
                                                     class="img-fluid">
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                                <small>Size: 2MB <span class="date">Nov 11, 2018</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-collection-folder-image"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">hellonew.mkv</p>
                                                <small>Size: 720MB <span class="date">Feb 16, 2016</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-chart"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">Report2018.xls</p>
                                                <small>Size: 103KB <span class="date">Jan 24, 2016</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="image">
                                                <img src="assets/images/image-gallery/2.jpg" alt="img"
                                                     class="img-fluid">
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                                <small>Size: 2MB <span class="date">Dec 11, 2018</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">Document_2018.doc</p>
                                                <small>Size: 42KB <span class="date">Nov 02, 2018</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="image">
                                                <img src="assets/images/image-gallery/1.jpg" alt="img"
                                                     class="img-fluid">
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                                <small>Size: 2MB <span class="date">Dec 11, 2018</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-collection-folder-image"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">hellonew.mkv</p>
                                                <small>Size: 720MB <span class="date">Dec 08, 2018</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-playlist-audio"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">newsong.mp3</p>
                                                <small>Size: 8MB <span class="date">Dec 11, 2018</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-collection-pdf"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">asdf hhkj.pdf</p>
                                                <small>Size: 3MB <span class="date">Aug 18, 2018</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-chart"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">Report2016.xls</p>
                                                <small>Size: 68KB <span class="date">Dec 12, 2016</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">Document_2018.doc</p>
                                                <small>Size: 89KB <span class="date">Dec 15, 2018</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-collection-folder-image"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">hellonew.mkv</p>
                                                <small>Size: 720MB <span class="date">Dec 08, 2018</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-playlist-audio"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">newsong.mp3</p>
                                                <small>Size: 8MB <span class="date">Dec 11, 2018</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="image">
                                                <img src="assets/images/image-gallery/8.jpg" alt="img"
                                                     class="img-fluid">
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">img21545ds.jpg</p>
                                                <small>Size: 2MB <span class="date">Dec 11, 2018</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-collection-pdf"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">asdf hhkj.pdf</p>
                                                <small>Size: 3MB <span class="date">Aug 18, 2018</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-chart"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">Report2016.xls</p>
                                                <small>Size: 68KB <span class="date">Dec 12, 2016</span></small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card">
                                        <a href="javascript:void(0);" class="file">
                                            <div class="hover">
                                                <button type="button"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                            <div class="icon">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">Document_2018.doc</p>
                                                <small>Size: 89KB <span class="date">Dec 15, 2018</span></small>
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
    </div>
    {{--    fileUploadModal--}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body " id="showMDBody" style="text-align: center"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-round waves-effect" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-script')
    @include('admin.includes.custom-toastr');
    <script src="{{asset('/')}}admin/assets/bundles/footable.bundle.js"></script>
    <script src="{{asset('/')}}admin/assets/js/pages/tables/footable.js"></script>

    {{--    fileUpload modal--}}
    <script>
        $(document).on('click', '#fileUploadBtn', function () {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            let element = '';
            $.ajax({
                url: href,
                dataType: 'json',
                contentType: 'application/json',
                beforeSend: function () {
                    // $('.page-loader-wrapper').show();
                    $('#showModal').modal('show');
                    element = `<div class="d-flex justify-content-center"><div class="spinner-border text-primary" role="status"> <span class="sr-only">Loading...</span> </div> </div> `;
                    document.getElementById("showMDBody").innerHTML = element;
                },
                success: function (data) {
                    console.log(data);

                    let baseURL = window.location.origin + '/';
                    let url = baseURL + data.image;
                    // $('#showModal').modal('show');
                    element = `
                    <ul style="">
                    ${
                        data.map(function(item) {
                            // console.log(item)
                            return `<li style="list-style-type: none; text-align: start;background-color: #f0f0f0;
                                                margin-bottom: 5px;padding-left: 5px"
                                        > <a href="#"><i class="zmdi zmdi-folder"> </i> ${item}</a> </li>`
                    }).join('')
                    }
                    </ul>
                    `;

                    // data.map(function(item) {
                    // console.log(item)
                    //     element += ` `+item+``;
                    // });
                    document.getElementById("showMDBody").innerHTML = element;
                },
                complete: function () {
                    // $('.page-loader-wrapper').hide();
                },
                error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page" + href + "cannot open. Error:" + error);
                }
            });
        });
    </script>

@endpush


