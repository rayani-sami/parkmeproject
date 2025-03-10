<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from vora.dexignlab.com/codeigniter/demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2024 03:37:03 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="Vora - Saas CodeIgniter Admin Dashboard Template" />
	<meta property="og:title" content="Vora - Saas CodeIgniter Admin Dashboard Template" />
	<meta property="og:description" content="Vora - Saas CodeIgniter Admin Dashboard Template" />
	<meta property="og:image" content="../social-image.png" />
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title> Admin </title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href= https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map></script>

    <link rel="icon" type="image/png" sizes="16x16" href="{{url('admin/images/favicon.png')}}">

    <link href="{{url('admin/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{url('admin/vendor/chartist/css/chartist.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('admin/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{url('admin/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{url('admin/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{url('admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{url('admin/css/style.css')}}" rel="stylesheet" type="text/css"/>


</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

	<!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

		<!--**********************************
    Nav header start
***********************************-->
<div class="nav-header">
    <img src="{{url('admin/images/images.png')}}" style="width: 280px;height:80px;"  class="brand-logo">


    </img>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->		<!--**********************************
	Chat box start
***********************************-->

<!--**********************************
	Chat box End
***********************************-->        <!--**********************************
	Header start
***********************************-->
@include('admin.layout.header')
<!--**********************************
	Header end
***********************************-->        <!--**********************************
    Sidebar start
***********************************-->
@include('admin.layout.sidebar')
<!--**********************************
    Sidebar end
***********************************-->
<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<!-- row -->
	@yield('content')
</div>


<!--**********************************
	Content body end
***********************************-->
        <!--**********************************
    Footer start
***********************************-->
@include('admin.layout.footer')
<!--**********************************
    Footer end
***********************************-->

	</div>
    <script src="{{url('admin/vendor/global/global.min.js')}}"></script>

    <script src="{{url('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>

    <script src="{{url('admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>



    <script src="{{url('admin/vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <script src="{{url('admin/vendor/owl-carousel/owl.carousel.js')}}"></script>

    <script src="{{url('admin/vendor/peity/jquery.peity.min.js')}}"></script>

    <script src="{{url('admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

    <script src="{{url('admin/vendor/apexchart/apexchart.js')}}"></script>

    <script src="{{url('admin/js/dashboard/dashboard-1.js')}}"></script>

    <script src="{{url('admin/js/custom.min.js')}}"></script>

    <script src="{{url('admin/js/plugins-init/datatables.init.js')}}"></script>

    <script src="{{url('admin/js/dlabnav-init.js')}}"></script>
    <script src="{{url('admin/js/demo.js')}}"></script>
    <script src="{{url('admin/js/styleSwitcher.js')}}"></script>



    <script src="{{url('admin/js/newcustom.js')}}"></script>





    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>

<!-- Mirrored from vora.dexignlab.com/codeigniter/demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2024 03:37:29 GMT -->
</html>
