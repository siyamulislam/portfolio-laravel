@extends('admin.master')
@section('parentPageTitle', 'Gallery')
@section('title','Manage Image')

@push('page-style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    {{--toastr--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <div class="card-body table-responsive">
                        <table id="galleryTable" class="table c_table table-striped dt-responsive table-hover nowrap w-100">
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
                                        <a href="{{route('image.status',['id'=>$image->id])}}"
                                           class="btn btn-sm {{ $image->status == 1 ? 'btn-secondary' : 'btn-warning' }}"
                                           title="Change Image Status ">
                                            <i class="{{ $image->status == 1 ? 'zmdi zmdi-long-arrow-up' : 'zmdi zmdi-long-arrow-down' }}"></i></a>

                                        <a href="#"
                                           class="btn btn-primary btn-sm">
                                            <i class="zmdi zmdi-eye"></i></a>
                                        <a href="{{route('gallery.edit',$image->id)}}"
                                           class="btn btn-success btn-sm">
                                            <i class="zmdi zmdi-edit"></i></a>
                                        <form action="{{route('gallery.destroy',$image->id)}}"
                                              method="post" style="display: inline-block"
                                              onsubmit="return confirm('Are you sure to delete this ?')">
{{--                                              onsubmit="return openModal()">--}}
                                            @csrf
                                            @method('delete')
{{--                                            <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#smallModal">--}}
                                            <button type="submit" class="btn btn-danger btn-sm"  >
                                                <i class="zmdi zmdi-delete"></i></button>
                                        </form>
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
    <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#smallModal">MODAL - SMALL SIZE</button>
    <!-- Small Size -->
    <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="smallModalLabel">Deleting Image!</h4>
                </div>
                <div class="modal-body">
                   <p> Are you confirm to delete this file?</p>
{{--                    <small class=" text-warning "> deleted image can't be recovered!</small>--}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-round waves-effect">Delete</button>
                    <button type="button" class="btn btn-info  btn-round  waves-effect" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-script')
    @include('admin.includes.custom-toastr')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#galleryTable').DataTable({
                scrollX: true,
            });
        });
    </script>
    <script>
        async function  openModal() {
           // if(2<1)return true;
           // else return false;
            // return false;


            await $("#smallModal").on("click",".btn-danger", function(){
                console.log('fired');
                $('#smallModal').modal('hide');
                return true;
            });
            await $("#smallModal").on("click",".btn-info", function(){
                console.log('cancel');

                return false;
            });
            return false;
        }
    </script>
@endpush


