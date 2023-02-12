@extends('admin.master')
@section('parentPageTitle', 'Gallery')
@section('title','Grid Image')

@push('page-style')
    {{--toastr--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
          integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endpush
@section('content')
    <div class="content">
        <div class="text-center">
            <h4>Implement Grid here!</h4>
            <img src="" alt=""  height="300px">
        </div>
    </div>
    @endsection

        @push('page-script')
        @include('admin.includes.custom-toastr')

        </script>
    {{--    delete modal ajax--}}



    @endpush


