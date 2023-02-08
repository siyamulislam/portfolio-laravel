@extends('admin.master')
@section('parentPageTitle', 'Gallery')
@section('title','Add Image')

@push('page-style')
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/plugins/charts-c3/plugin.css"/>
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/plugins/morrisjs/morris.min.css" />
@endpush
@section('content')
    <div class="row clearfix">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon traffic">
                <div class="body">
                    <h6>Traffic</h6>
                    <h2>20 <small class="info">of 1Tb</small></h2>
                    <small>2% higher than last month</small>
                    <div class="progress">
                        <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0"
                             aria-valuemax="100" style="width: 45%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon sales">
                <div class="body">
                    <h6>Sales</h6>
                    <h2>12% <small class="info">of 100</small></h2>
                    <small>6% higher than last month</small>
                    <div class="progress">
                        <div class="progress-bar l-blue" role="progressbar" aria-valuenow="38" aria-valuemin="0"
                             aria-valuemax="100" style="width: 38%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon email">
                <div class="body">
                    <h6>Email</h6>
                    <h2>39 <small class="info">of 100</small></h2>
                    <small>Total Registered email</small>
                    <div class="progress">
                        <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39" aria-valuemin="0"
                             aria-valuemax="100" style="width: 39%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card widget_2 big_icon domains">
                <div class="body">
                    <h6>Domains</h6>
                    <h2>8 <small class="info">of 10</small></h2>
                    <small>Total Registered Domain</small>
                    <div class="progress">
                        <div class="progress-bar l-green" role="progressbar" aria-valuenow="89" aria-valuemin="0"
                             aria-valuemax="100" style="width: 89%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-script')
    <script src="{{asset('/')}}admin/assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
    <script src="{{asset('/')}}admin/assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
    <script src="{{asset('/')}}admin/assets/bundles/c3.bundle.js"></script>

    <script src="{{asset('/')}}admin/assets/js/pages/index.js"></script>
@endpush
