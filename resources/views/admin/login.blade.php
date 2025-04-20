<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from vora.dexignlab.com/codeigniter/demo/page-login by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2024 03:37:36 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
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

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('admin/images/favicon.png')}}">
    <link href="{{url('admin/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
    <link href="{{url('admin/css/style.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href= https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
</head>
<body class="body  h-100" style="background-image: url('admin/images/login-bg-1.html'); background-size:cover;">
	<div class="container h-100">
		<div class="row h-100 align-items-center justify-contain-center">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body p-0">
						<div class="row m-0">
							<div class="col-xl-6 col-md-6 sign text-center">
								<div>
									<div class="text-center my-5">
										<a href=""><img src="{{url('admin/images/images.png')}}" alt=""></a>
									</div>
									<img src="{{url('admin/images/images.png')}}" class="img-fix bitcoin-img sd-shape7"></img>
								</div>
							</div>
							<div class="col-xl-6 col-md-6">
								<div class="sign-in-your py-4 px-2">
									<h4 class="fs-20">Sign in your account</h4>
									<span>Welcome back! Login with your data that you entered</span>
                                    @if (session()->has('error_message'))
                                    <script>
                                      toastr.error("{{Session::get('error_message');}}")
                                    </script>
                                     @endif

                                     @if (session()->has('success_message'))
                                     <script>
                                       toastr.success("{{Session::get('success_message');}}")
                                     </script>
                                      @endif

									<form action="{{url('admin/login')}}" method="post">@csrf
										<div class="mb-3">
											<label class="mb-1"><strong>Email</strong></label>
											<input type="email" class="form-control"name="email" id="email"   required>
										</div>
										<div class="mb-3">
											<label class="mb-1"><strong>Password</strong></label>
											<input type="password" class="form-control"   name="password" id="password" required>
										</div>


										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{url('admin/vendor/global/global.min.js')}}"></script>
<script src="{{url('admin/js/custom.min.js')}}"></script>
<script src="{{url('admin/js/dlabnav-init.js')}}"></script>
<script src="{{url('admin/js/styleSwitcher.js')}}"></script>
</body>


</html>
