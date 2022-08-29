<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/dashtremev3/pages-user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Jul 2020 09:42:03 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <base href="{{ asset('') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin Dashboard</title>
    <!-- loader-->
    <link href="backend/assets/css/pace.min.css" rel="stylesheet" />
    <script src="backend/assets/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="backend/assets/images/favicon.ico" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="backend/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="backend/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="backend/assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="backend/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Metismenu CSS-->
    <link href="backend/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="backend/assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start sidebar-wrapper-->
        @include('backend.layouts.sidebar')
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        @include('backend.layouts.header')
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumb-->
                <div class="row pt-2 pb-2">
                    <div class="col-sm-9">
                        <h4 class="page-title">User Profile</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javaScript:void();">Dashtreme</a></li>
                            <li class="breadcrumb-item"><a href="javaScript:void();">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </div>

                </div>
                <!-- End Breadcrumb-->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card profile-card-2">
                            <div class="card-img-block">
                                <img class="img-fluid" src="backend/assets/images/gallery/31.jpg" alt="Card image cap">
                            </div>
                            <div class="card-body pt-5">
                                <img src="{{Auth::guard('admin')->user()->image}}" alt="profile-image"
                                    class="profile" id="output">
                                <h5 class="card-title">{{Auth::guard('admin')->user()->name}}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <div class="icon-block">
                                    <a href="javascript:void();"><i
                                            class="fa fa-facebook bg-facebook text-white"></i></a>
                                    <a href="javascript:void();"> <i
                                            class="fa fa-twitter bg-twitter text-white"></i></a>
                                    <a href="javascript:void();"> <i
                                            class="fa fa-google-plus bg-google-plus text-white"></i></a>
                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                    <li class="nav-item">
                                        <a href="javascript:void();" data-target="#edit" data-toggle="pill"
                                            class="nav-link"><i class="icon-note"></i> <span
                                                class="hidden-xs">Edit</span></a>
                                    </li>
                                </ul>
                                <div class="tab-content p-3">

                                    <div class="tab-pane" id="edit">
                                        <form action="{{url('/admin/account')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">
                                                    Name</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="text" required name="name" value="{{$admin['name']}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" name="email" required type="email" value="{{$admin['email']}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Change
                                                    Image</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" onchange="loadfile(event)" name="image" type="file">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 col-form-label form-control-label">Password</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="password" id="password" name="password">
                                                    <span id="alert-warning"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label">Confirm
                                                    password</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="password" name="confirm_password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                                <div class="col-lg-9">
                                                    <input type="reset" class="btn btn-secondary" value="Cancel">
                                                    <input type="submit" class="btn btn-primary" value="Save Changes">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--start overlay-->
                <div class="overlay"></div>
                <!--end overlay-->
            </div>
            <!-- End container-fluid-->
        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        @include('backend.layouts.footer')
        <!--End footer-->

        <!--start color switcher-->

        <!--end color switcher-->

    </div>
    <!--End wrapper-->


    <!-- Bootstrap core JavaScript-->
    <script src="backend/assets/js/jquery.min.js"></script>
    <script src="backend/assets/js/popper.min.js"></script>
    <script src="backend/assets/js/bootstrap.min.js"></script>

    <!-- simplebar js -->
    <script src="backend/assets/plugins/simplebar/js/simplebar.js"></script>
    <!-- Metismenu js -->
    <script src="backend/assets/plugins/metismenu/js/metisMenu.min.js"></script>

    <!-- Custom scripts -->
    <script src="backend/assets/js/app-script.js"></script>
    <script src="backend/backend_js.js"></script>
</body>

<!-- Mirrored from codervent.com/dashtremev3/pages-user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Jul 2020 09:42:04 GMT -->

</html>
