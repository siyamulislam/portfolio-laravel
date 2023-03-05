@extends('admin.master')
@section('parentPageTitle', 'Gallery')
@section('title','Magic Image')

@push('page-style')
@endpush
@section('content')
    <div class="content" style="min-height: 75vh">
        <div class="text-center">
            <h5 id="titleID">reload to next!  </h5>
            <i class="zmdi zmdi-refresh" onclick="reloadIMG()"></i>
            <br>
            <img src="" alt="" id="imgID" height="300px">

        </div>
    </div>
@endsection

@push('page-script')
    <script>

        loadImage();
        function reloadIMG() {
            loadImage();
        }

        function loadImage() {
            let href = window.location.origin + '/api/who';
            // let baseURL = window.location.origin + '/';
            $.ajax({
                url: href,
                beforeSend: function () {
                    document.getElementById("titleID").innerText = 'fetching data..';
                    document.getElementById("imgID").src = '';
                },
                success: function (data) {
                    // console.log(data.image);
                    document.getElementById("imgID").src =  data.image;
                    document.getElementById("titleID").innerText = data.title;
                    // location.reload(true);
                },
                complete: function () {
                    // console.log('done');
                },
                error: function (jqXHR, testStatus, error) {
                    document.getElementById("titleID").innerText = "" +jqXHR.status+ " "+jqXHR.statusText+ "! Please try later...";
                }
            });
        }

    </script>



@endpush


