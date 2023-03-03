@extends('admin.master')
@section('parentPageTitle', 'Education')
@section('title','Manage Education')

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
<<<<<<< HEAD
                                <h5>All Degrees</h5>
=======
                                <h5>All Images</h5>
>>>>>>> 73d5fe7d49dcc5ff8a5cc2f84d53db7c55abeaf8
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-12">
                                <a href="{{route('education.create')}}" class="btn btn-primary float-right">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive" id="tableDIV">
                        <table id="galleryTable"
                               class="table c_table table-striped dt-responsive table-hover nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>Institute</th>
                                <th>Degree</th>
                                <th>Duration</th>
                                <th>Website</th>
                                <th>Status</th>
                                <th class="">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($educations as $degree)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{asset($degree->logo_path)}}" alt="" style="width: 100%">  </td>
                                    <td>{{\Illuminate\Support\Str::limit($degree->title,12)}}</td>
                                    <td>{{ $degree->subtitle }}</td>

                                    <td>{{ date('Y', strtotime($degree->starting_date)) .' - '. date('Y', strtotime($degree->ending_date))}}</td>
                                    <td>{{ $degree->website_link}}</td>
                                    <td>{{ $degree->status==1?"Show":"Hide" }}</td>
                                    <td class=" ">
                                        <a href="#statusModal" data-toggle="modal"
                                           data-route="{{route('degree.status',['id'=>$degree->id])}}"
                                           class="btn btn-sm {{ $degree->status == 1 ? 'btn-secondary' : 'btn-warning' }}"
                                           title="Change Image Status ">
                                            <i class="{{ $degree->status == 1 ? 'zmdi zmdi-long-arrow-up' : 'zmdi zmdi-long-arrow-down' }}"></i></a>

                                        <a href="#showModal" data-attr="{{route('degree.show',['id'=>$degree->id])}}" id="showBtn"
                                           class="btn btn-primary btn-sm">
                                            <i class="zmdi zmdi-eye"></i></a>
                                        <a href="{{route('education.edit',$degree->id)}}" class="btn btn-success btn-sm">
                                            <i class="zmdi zmdi-edit"></i></a>
                                        <a href="#deleteModal" data-route="{{route('education.destroy',$degree->id)}}"
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
   @include('admin/includes/modals/delete')
    <!-- statusModal -->
    @include('admin/includes/modals/status')

    {{--    showModal_image--}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Details Degree</h5>
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
    {{--    delete modal --}}
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

    {{--updateStatusModal--}}
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
                    let baseURL = window.location.origin + '/';
                    let url = baseURL + data.image;
                    // $('#showModal').modal('show');
                    element= `
                     <img src='${baseURL+data.logo_path}' alt='${data.title}'   style='height: 120px'>
                    <p>Institute: ${data.title}</p>
                    <p>Degree: ${data.subtitle}</p>
                    <p>Duration: ${data.starting_date} - ${data.ending_date}</p>
                    <p>Descriptions:<br> ${data.descriptions}</p>

                    <p>Website: <a href="//${data.website_link}" target="_blank">${data.website_link}</a></p>

                    `;

                    document.getElementById("showMDBody").innerHTML = element;
                },
                complete: function () {
                },
                error: function (jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page" + href + "cannot open. Error:" + error);
                }
            });
        });
    </script>

@endpush


