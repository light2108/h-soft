<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/dashtremev3/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Jul 2020 09:41:31 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <base href="{{ asset('') }}" />
    <title>Admin Login</title>
    <!-- loader-->
    <link href="backend/assets/css/pace.min.css" rel="stylesheet" />
    <script src="backend/assets/js/pace.min.js"></script>
    <!--favicon-->
    <link rel="icon" href="backend/assets/images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS-->
    <link href="backend/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="backend/assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="backend/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="backend/assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">


    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="height-100v d-flex align-items-center justify-content-center">

            <div class="card card-authentication1 mb-0">
                <div class="card-body">
                    <div class="card-content p-2">
                        <div class="text-center">
                            <img src="backend/assets/images/logo-icon.png" alt="logo icon">
                        </div>

                        <div class="card-title text-uppercase text-center py-3">Sign In</div>
                        @if (Session::has('error_message'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('error_message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ url('/admin') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername" class="sr-only">Email</label>
                                <div class="position-relative has-icon-right">
                                    <input type="email" id="exampleInputUsername" class="form-control input-shadow"
                                        placeholder="Enter Email" name="email">
                                    <div class="form-control-position">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword" class="sr-only">Password</label>
                                <div class="position-relative has-icon-right">
                                    <input type="password" id="exampleInputPassword" class="form-control input-shadow"
                                        placeholder="Enter Password" name="password">
                                    <div class="form-control-position">
                                        <i class="icon-lock"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <div class="icheck-material-white">
                                        <input type="checkbox" id="user-checkbox" checked="" />
                                        <label for="user-checkbox">Remember me</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 text-right">
                                    <div class="icheck-material-white">
                                    <a href="authentication-reset-password.html">Reset Password</a>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-light btn-block">Sign In</button>


                        </form>
                    </div>
                </div>
                <div class="card-footer text-center py-3">
                    <p class="text-warning mb-0">Do not have an account? <a href="authentication-signup.html"> Sign Up
                            here</a></p>
                </div>
            </div>
        </div>

        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--start color switcher-->

        <!--end color switcher-->

    </div>
    <!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="backend/assets/js/jquery.min.js"></script>
    <script src="backend/assets/js/popper.min.js"></script>
    <script src="backend/assets/js/bootstrap.min.js"></script>

    <!-- Metismenu js -->
    <script src="backend/assets/plugins/metismenu/js/metisMenu.min.js"></script>

    <!-- Custom scripts -->
    <script src="backend/assets/js/app-script.js"></script>

</body>

<!-- Mirrored from codervent.com/dashtremev3/authentication-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 29 Jul 2020 09:41:31 GMT -->

</html>
