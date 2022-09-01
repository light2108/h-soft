<!doctype html>
<html class="no-js" lang="">

<!-- Mirrored from demo.hasthemes.com/oneclick-preview/oneclick/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 10:48:47 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>H-SOFT</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="{{ asset('') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="frontend/img/h-soft.png">

    <link rel="stylesheet" href="frontend/css/animate.min.css">
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
    {{-- https://cdn.jsdelivr.net/gh/exacti/floating-labels@latest/floating-labels.min.css --}}
    {{-- <link rel="stylesheet" type="text/css"
        href="frontend/dmm.css" media="screen"> --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/exacti/floating-labels@latest/floating-labels.min.css" media="screen">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <!-- font-awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- nivo-slider css -->
    <link rel="stylesheet" href="frontend/css/nivo-slider.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"> --}}
    <!-- owl carousel css -->
    <link rel="stylesheet" href="frontend/css/owl.carousel.min.css">
    <!-- icofont css -->
    <link rel="stylesheet" href="frontend/css/icofont.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="frontend/css/meanmenu.css">
    <!-- jquery-ui css -->
    <link rel="stylesheet" href="frontend/css/jquery-ui.min.css">
    <!-- magnific-popup css -->
    <link rel="stylesheet" href="frontend/css/magnific-popup.css">
    <!-- percircle css -->
    <link rel="stylesheet" href="frontend/css/percircle.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="frontend/style.css">
    <link rel="stylesheet" href="frontend/style2.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="frontend/css/responsive.css">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all"
        rel="stylesheet" type="text/css" />

    <!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme CSS files as mentioned below (and change the theme property of the plugin) -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css"
        media="all" rel="stylesheet" type="text/css" />
    <!-- Modernizr JS -->
    <script src="frontend/js/vendor/modernizr-2.8.3.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    @if (Session::has('error_message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('error_message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('success_message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @include('frontend.layouts.header')

    <div class="modal fade" id="exampleModalCenterRegister" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <img class="img-after" src="frontend/img/vector.png" alt="">
                            <img class="img" src="frontend/img/at-o.png" alt="">
                        </div>
                        <div class="col-6">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="form-title text-center">
                                <img src="frontend/img/h-soft.png" alt="" />
                            </div>
                            <br><br>
                            <p class="title-login text-center" style="font-size: 24px;">Đăng Kí</p>
                            <div class="form-title text-center">Nhập số điện thoại và mật khẩu của bạn để</div>
                            <div class="form-title text-center">đăng kí tài khoản</div><br>
                            <div class="d-flex flex-column text-center">
                                <form action="{{ url('/dashboard/register') }}" method="POST">
                                    @csrf
                                    <div class="form-label-group">
                                        <input type="number" class="form-control" name="phone"
                                            placeholder="Nhập số điện thoại" min="0" maxlength="10" required>
                                        <label>Nhập số điện thoại</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" class="form-control" required name="password"
                                            placeholder="Nhập mật khẩu">
                                        <label>Nhập mật khẩu</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" class="form-control" required name="confirm_password"
                                            placeholder="Nhập lại mật khẩu">
                                        <label for="">Nhập lại mật khẩu</label>
                                    </div>
                                    <div class="form-group text-left" style="font-size: 16px;">
                                        <input type="radio">&nbsp;Tôi đồng ý với điều khoản sử dụng & chính sách bảo
                                        mật
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block btn-round btn-grad">Đăng
                                        ký</button>
                                </form>
                                <div class="text-center title-login">Đã có tài khoản ? <a href="#"
                                        style="color:blue" data-toggle="modal" data-target="#exampleModalCenterLogin"
                                        data-dismiss="modal">Đăng nhập</a></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenterLogin" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <img class="img-after" src="frontend/img/vector.png" alt="">
                            <img class="img" src="frontend/img/at-o.png" alt="">
                        </div>
                        <div class="col-6">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="form-title text-center">
                                <img src="frontend/img/h-soft.png" alt="" />
                            </div>
                            <br><br>
                            <p class="title-login text-center" style="font-size: 24px;">Đăng nhập</p>
                            <div class="form-title text-center">Nhập số điện thoại và mật khẩu của bạn để</div>
                            <div class="form-title text-center">đăng nhập tài khoản</div><br>
                            <div class="d-flex flex-column text-center">
                                <form action="{{ url('/dashboard/login') }}" method="POST">
                                    @csrf
                                    <div class="form-label-group">

                                        <input type="number" name="phone" class="form-control"
                                            placeholder="Nhập số điện thoại" min="0" maxlength="10" required>
                                        <label for="">Nhập số điện thoại</label>
                                    </div>
                                    <div class="form-label-group">

                                        <input type="password" name="password" class="form-control"
                                            placeholder="Nhập mật khẩu" required>
                                        <label for="">Nhập mật khẩu</label>
                                    </div>
                                    <div class="text-right title-login"><a href="#" data-toggle="modal"
                                            data-target="#exampleModalCenterConfirmPhone" data-dismiss="modal">Quên
                                            mật
                                            khẩu ?</a></div>
                                    <br>
                                    <button type="submit" class="btn btn-info btn-block btn-round btn-grad"
                                        style="background-color: #3356AF">Đăng nhập</button>
                                </form>
                                <br>
                                <div class="text-center title-login">Chưa có tài khoản ? <a href="#"
                                        style="color:blue" data-toggle="modal"
                                        data-target="#exampleModalCenterRegister" data-dismiss="modal">Đăng ký</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenterConfirmPhone" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <img class="img-after" src="frontend/img/vector.png" alt="">
                            <img class="img" src="frontend/img/at-o.png" alt="">
                        </div>
                        <div class="col-6">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="form-title text-center">
                                <img src="frontend/img/h-soft.png" alt="" />
                            </div>
                            <br><br>
                            <p class="title-login text-center" style="font-size: 24px;">Xác nhận tài khoản</p>
                            <div class="form-title text-center">Nhập số điện thoại và mật khẩu của bạn để lấy</div>
                            <div class="form-title text-center">lại mật khẩu</div><br>
                            <div class="d-flex flex-column text-center">
                                {{-- <form action="{{ url('dashboard/check-phone-number') }}" method="POST">
                                    @csrf --}}
                                <div class="form-label-group">

                                    <input type="number" name="phone" class="form-control phone"
                                        placeholder="Nhập số điện thoại" min="0" required>
                                    <label for="">Nhập số điện thoại</label>
                                </div>
                                <button type="button"
                                    class="btn btn-info btn-block btn-round btn-grad confirm_phone">Tiếp
                                    tục</button>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenterForgotPassword" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <img class="img-after" src="frontend/img/vector.png" alt="">
                            <img class="img" src="frontend/img/at-o.png" alt="">
                        </div>
                        <div class="col-6">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="form-title text-center">
                                <img src="frontend/img/h-soft.png" alt="" />
                            </div>
                            <br><br>
                            <p class="title-login text-center" style="font-size: 24px;">Quên mật khẩu</p>
                            <div class="form-title text-center">Mã xác nhận đã được gửi qua tin nhắn SMS của</div>
                            <div class="form-title text-center">số điện thoại <a
                                    style="color: #3356AF; font-weight: 500" id="get_phone"></a></div><br>
                            <div class="d-flex flex-column text-center">
                                <form>
                                    <div class="container height-100 d-flex justify-content-center align-items-center">
                                        <div class="position-relative">
                                            <div class="p-2 text-center">
                                                <div id="otp"
                                                    class="inputs d-flex flex-row justify-content-center mt-2 container">

                                                    <input class="m-2 text-center form-control rounded" type="text"
                                                        id="first" /> <input
                                                        class="m-2 text-center form-control rounded" type="text"
                                                        id="second" /> <input
                                                        class="m-2 text-center form-control rounded" type="text"
                                                        id="third" /> <input
                                                        class="m-2 text-center form-control rounded" type="text"
                                                        id="fourth" /> <input
                                                        class="m-2 text-center form-control rounded" type="text"
                                                        id="fifth" />
                                                </div>
                                                <div id="remember_phone"></div>

                                            </div>
                                        </div>
                                    </div><br>
                                    <button type='button'
                                        class="btn btn-info btn-block btn-round btn-grad forgot_password"
                                        style="background-color: #3356AF">Xác nhận</button>
                                </form>
                            </div>
                            <div class="mt-3">
                                <span class="d-block mobile-text" id="countdown"></span>
                                <span class="d-block mobile-text" id="resend"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenterChangePassword" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3356AF">
                    <h5 class="modal-title w-100 text-center" style="color: white">Đổi mật khẩu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="d-flex flex-column text-center">
                                <form action="{{ url('/dashboard/change-password') }}" method="POST">
                                    @csrf
                                    {{-- <div class="form-label-group">

                                        <input type="password" class="form-control" placeholder="Vui lòng nhập"
                                            name="password" required>
                                        <label>Nhập mật khẩu cũ</label>
                                    </div> --}}
                                    <div id="last_phone"></div>
                                    <div class="form-label-group">

                                        <input type="password" class="form-control" placeholder="Vui lòng nhập"
                                            name="new_password" required>
                                        <label>Nhập mật khẩu mới</label>
                                    </div>
                                    <div class="form-label-group">

                                        <input type="password" class="form-control" placeholder="Vui lòng nhập"
                                            name="confirm_password" required>
                                        <label>Nhập lại mật khẩu mới</label>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block btn-round btn-grad">Hoàn
                                        tất</button>
                                </form>
                                {{-- <form>
                                    <div class="form-label-group">
                                        <textarea class="form-control" placeholder="Floating Label area" rows="3"></textarea>
                                        <label for="tt">Floating Label area</label>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenterSignOut" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3356AF">
                    <h5 class="modal-title w-100 text-center" style="color: white">Đăng xuất</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="d-flex flex-column text-center">
                                <p style="font-size: 18px; font-weight:600; ">Xác nhận đăng xuất tài khoản?</p>
                                <br><br><br>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="reset" class="btn btn-info btn-block btn-round btn-white">Hủy
                                            bỏ</button>
                                    </div>
                                    <div class="col-6">
                                        <a role="button" href="{{ url('/dashboard/logout') }}"
                                            class="btn btn-info btn-block btn-round btn-grad">Đăng xuất</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')


    @include('frontend.layouts.footer')
    <!-- footer-area end -->

    <!-- Placed js at the end of the document so the pages load faster -->
    <!-- jquery latest version -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="frontend/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js"
        type="text/javascript"></script>

    <!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme JS files as mentioned below (and change the theme property of the plugin) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js"></script>

    <!-- optionally if you need translation for your language then include locale file as mentioned below (replace LANG.js with your own locale file) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/locales/LANG.js"></script>
    {{-- <script src="frontend/js/vendor/jquery-1.12.4.min.js"></script> --}}
    <!-- Popper js -->
    <script src="frontend/js/popper.js"></script>
    <!-- Bootstrap framework js -->
    <script src="frontend/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}
    <!-- magnific popup js -->
    <script src="frontend/js/jquery.magnific-popup.min.js"></script>
    <!-- mixitup js -->
    <script src="frontend/js/jquery.mixitup.min.js"></script>
    <!-- jquery-ui price-->
    <script src="frontend/js/jquery-ui.min.js"></script>
    <!-- ScrollUp Js -->
    <script src="frontend/js/jquery.scrollUp.min.js"></script>
    <!-- countDown Js -->
    <script src="frontend/js/jquery.countdown.min.js"></script>
    <!-- nivo slider js -->
    <script src="frontend/js/jquery.nivo.slider.pack.js"></script>
    <!-- mobail menu js -->
    <script src="frontend/js/jquery.meanmenu.js"></script>
    <!-- owl carousel js -->
    <script src="frontend/js/owl.carousel.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="frontend/js/plugins.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="frontend/js/main.js"></script>
    <script src="frontend/frontend.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(".js-example-tags").select2({
            // tags: true
        });
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"></script> --}}
</body>

<!-- Mirrored from demo.hasthemes.com/oneclick-preview/oneclick/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 10:49:31 GMT -->

</html>
