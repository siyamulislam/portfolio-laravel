@yield('before-script')
<!-- Jquery Core Js -->
<script src="{{asset('/')}}admin/assets/bundles/libscripts.bundle.js"></script>
<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{asset('/')}}admin/assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('/')}}admin/assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('/')}}admin/assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('/')}}admin/assets/bundles/c3.bundle.js"></script>

<script src="{{asset('/')}}admin/assets/bundles/mainscripts.bundle.js"></script>
<script src="{{asset('/')}}admin/assets/js/pages/index.js"></script>


@yield('after-script')
