@extends('admin.master')
@section('parentPageTitle', 'Gallery')
@section('title','Manage Image')

@push('page-style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    {{--toastr--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
          integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-7 col-md-6 col-sm-12">
                                <h5>All Images</h5>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <a href="{{route('gallery.create')}}" class="btn btn-primary float-right">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive" id="tableDIV">
                        <table id="galleryTable"
                               class="table c_table table-striped dt-responsive table-hover nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>View</th>
                                <th>Like</th>
                                <th>Status</th>
                                <th class="">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($images as $image)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{asset($image->image)}}" alt="" style="height: 70px;width: 70px">
                                    </td>
                                    <td>{{\Illuminate\Support\Str::limit($image->title,12)}}</td>
                                    <td>{{ $image->view_count }}</td>
                                    <td>{{ $image->like_count }}</td>

                                    <td>{{ $image->status==1?"Show":"Hide" }}</td>
                                    <td class=" ">
                                        <a href="#statusModal" data-toggle="modal"
                                           data-route="{{route('image.status',['id'=>$image->id])}}"
                                           class="btn btn-sm {{ $image->status == 1 ? 'btn-secondary' : 'btn-warning' }}"
                                           title="Change Image Status ">
                                            <i class="{{ $image->status == 1 ? 'zmdi zmdi-long-arrow-up' : 'zmdi zmdi-long-arrow-down' }}"></i></a>

                                        <a href="#showModal" data-attr="{{route('gallery.show',['id'=>$image->id])}}"id="showBtn"
                                           class="btn btn-primary btn-sm">
                                            <i class="zmdi zmdi-eye"></i></a>
                                        <a href="{{route('gallery.edit',$image->id)}}" class="btn btn-success btn-sm">
                                            <i class="zmdi zmdi-edit"></i></a>

                                        {{--                                        <form action="{{route('gallery.destroy',$image->id)}}"--}}
                                        {{--                                              method="post" style="display: inline-block"--}}
                                        {{--                                              onsubmit="return confirm('Are you sure to delete this ?')">--}}
                                        {{--                                            @csrf--}}
                                        {{--                                            @method('delete')--}}
                                        {{--                                             <button type="submit" class="btn btn-danger btn-sm">--}}
                                        {{--                                                <i class="zmdi zmdi-delete"></i></button>--}}
                                        {{--                                        </form>--}}

                                        <a href="#deleteModal" data-route="{{route('gallery.destroy',$image->id)}}"
                                           data-toggle="modal" class="btn btn-danger btn-sm">
                                            <i class="zmdi zmdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- deleteModal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Are you confirm to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-round waves-effect" data-dismiss="modal">Cancel
                    </button>
                    <form id="deleteForm" action=""
                          method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary btn-round waves-effect" id="btnMdDelete">Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- statusModal -->
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Are you confirm to update this status?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-round waves-effect" data-dismiss="modal">Cancel
                    </button>
                    <a type="button" href="" class="btn btn-primary btn-round waves-effect" id="btnMdUpdate">Update</a>
                </div>
            </div>
        </div>
    </div>
    {{--    showModal_image--}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Details Image</h5>
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
    @include('admin.includes.custom-toastr')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    {{--    data-table--}}
    <script>
        $(document).ready(function () {
            $('#galleryTable').DataTable({
                scrollX: true,
            });
        });
    </script>
    {{--    delete modal ajax--}}
    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            let actionURL = button.data('route') // Extract info from data-* attributes
            document.getElementById("deleteForm").action = actionURL;

            $("#deleteModal").on("click", "#btnMdDelete", function () {
                $('#deleteModal').modal('hide');
            });
        })
    </script>
    {{--updateStatusModal ajax--}}
    <script>
        $('#statusModal2').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            let href = button.data('route') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            // var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            // modal.find('.modal-body input').val(recipient)

            $("#statusModal").on("click", "#btnMdUpdate", function () {
                $.ajax({
                    url: href,
                    beforeSend: function () {
                        console.log('starting');
                    },
                    complete: function () {
                        console.log('done');
                        $('#statusModal').modal('hide');
                        location.reload(true);
                        // $("#tableDIV").load(location.href+"# tableDIV*","");
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        })
    </script>

    {{--updateStatusModal 2--}}
    <script>
        $('#statusModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            // let id = button.data('id') // Extract info from data-* attributes
            // let route=`\{\{route('image.status',['id'=>`+id+`])\}\}`;
            let updateURL = button.data('route')
            // alert(updateURL)
            document.getElementById("btnMdUpdate").href = updateURL;

            $("#statusModal").on("click", "#btnMdUpdate", function () {
                $('#statusModal').modal('hide');
            });
        })
    </script>

    {{--    show modal--}}
    <script>
        $(document).on('click', '#showBtn', function () {
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
                    // let baseURL='http://127.0.0.1:8000/';
                    let baseURL = window.location.origin + '/';
                    let url = baseURL + data.image;
                    // $('#showModal').modal('show');
                    element = `<p>Title:` + data.id + `</p> <img src='` + baseURL + data.image + `' alt=` + data.title + ` style="height: 320px"> `;
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


