@extends('admin.master')
@section('parentPageTitle', 'Gallery')
@section('title','Image')

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
                                                <form action="{{route('gallery.download')}}" method="get"
                                                      style="display: inline-block">
                                                    <input type="hidden" name="image" value="{{$image->image}}">
                                                    <input type="hidden" name="title" value="{{$image->title}}">
                                                    <button type="submit"class="btn btn-icon btn-icon-mini btn-round btn-success"><i
                                                            class="zmdi zmdi-download"></i></button>
                                                </form>

                                                <button data-terget="#deleteModal" data-route="{{route('gallery.destroy',$image->id)}}"
                                                        data-toggle="modal"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger ddd"><i
                                                        class="zmdi zmdi-delete"></i></button>

{{--                                                delete by form--}}
{{--                                                <form action="{{route('gallery.destroy',$image->id)}}" method="post"--}}
{{--                                                      style="display: inline-block"> @csrf @method('delete')--}}
{{--                                                    <button type="submit" data-terget="#deleteModal" data-toggle="modal"--}}
{{--                                                            class="btn btn-icon btn-icon-mini btn-round btn-danger"><i--}}
{{--                                                            class="zmdi zmdi-delete"></i></button>--}}
{{--                                                </form>--}}
{{--                                                delete by a--}}
{{--                                                    <a href="#deleteModal" data-route="{{route('gallery.destroy',$image->id)}}"--}}
{{--                                                       data-toggle="modal" class="btn btn-danger btn-sm">--}}
{{--                                                        <i class="zmdi zmdi-delete"></i></a>--}}

                                            </div>
                                            <div class="image">
                                                <img src="{{asset($image->image)}}" alt="{{$image->title}}"
                                                     class="img-fluid"
                                                     style="height: 150px;display: block;margin: 0 auto">
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">{{$image->title}}</p>
                                                <small>Size: {{\App\Http\Controllers\Admin\GalleryController::getImageSize($image->image)}}
                                                    <span
                                                        class="date">{{$image->created_at->format('M d, Y')}}</span></small>
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
                                                <form action="{{route('gallery.download')}}" method="get"
                                                      style="display: inline-block">
                                                    <input type="hidden" name="image" value="{{$image->image}}">
                                                    <input type="hidden" name="title" value="{{$image->title}}">
                                                    <button type="submit"class="btn btn-icon btn-icon-mini btn-round btn-success"><i
                                                            class="zmdi zmdi-download"></i></button>
                                                </form>

                                                <button data-terget="#deleteModal" data-route="{{route('gallery.destroy',$image->id)}}"
                                                        data-toggle="modal"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger ddd"><i
                                                        class="zmdi zmdi-delete"></i></button>
                                            </div>
                                            <div class="image">
                                                <img src="{{asset($image->image)}}" alt="img" class="img-fluid"
                                                     style="height: 150px;display: block;margin: 0 auto">
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">{{$image->title}}</p>
                                                <small>Size: {{\App\Http\Controllers\Admin\GalleryController::getImageSize($image->image)}}
                                                    <span
                                                        class="date">{{$image->created_at->format('M d, Y')}}</span></small>
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
                                                <form action="{{route('gallery.download')}}" method="get"
                                                      style="display: inline-block">
                                                    <input type="hidden" name="image" value="{{$image->image}}">
                                                    <input type="hidden" name="title" value="{{$image->title}}">
                                                    <button type="submit"class="btn btn-icon btn-icon-mini btn-round btn-success"><i
                                                            class="zmdi zmdi-download"></i></button>
                                                </form>

                                                <button data-terget="#deleteModal" data-route="{{route('gallery.destroy',$image->id)}}"
                                                        data-toggle="modal"
                                                        class="btn btn-icon btn-icon-mini btn-round btn-danger ddd"><i
                                                        class="zmdi zmdi-delete"></i></button>
                                            </div>
                                            <div class="image">
                                                <img src="{{asset($image->image)}}" alt="img" class="img-fluid"
                                                     style="height: 150px;display: block;margin: 0 auto">
                                            </div>
                                            <div class="file-name">
                                                <p class="m-b-5 text-muted">{{$image->title}}</p>
                                                <small>Size: {{\App\Http\Controllers\Admin\GalleryController::getImageSize($image->image)}}
                                                    <span
                                                        class="date">{{$image->created_at->format('M d, Y')}}</span></small>
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
    <!-- deleteModal -->
    @include('admin/includes/modals/delete')
@endsection
@push('page-script')
    {{--    delete modal --}}
    <script>
        $('.ddd').click(function () {
            $('#deleteModal').modal('show');
            document.getElementById("deleteForm").action =  $(this).data('route');
        });
        $("#deleteModal").on("click", "#btnMdDelete", function () {
            $('#deleteModal').modal('hide');
        });

        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            let actionURL = button.data('route') // Extract info from data-* attributes
            document.getElementById("deleteForm").action = actionURL;
            $("#deleteModal").on("click", "#btnMdDelete", function () {
                $('#deleteModal').modal('hide');
            });
        })
    </script>

@endpush
