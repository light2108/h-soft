<?php
use App\Models\News;
$news = News::orderBy('id', 'desc')->paginate(3);

?>

<header>
    <div class="header">
        <div class="left-section">
            <a href="{{ url('/') }}">
                <img class="hsoft-logo" src="frontend/img/h-soft.png" alt="" />
            </a>
        </div>
        <div class="middle-section">
            <input class="search-bar" type="text" placeholder="Tìm kiếm ...">
            <a class="search-button" href="">
                <img class="search-img" src="frontend/img/search.svg" alt="">
            </a>
        </div>

        <div class="right-section">
            <button class="ring-button" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">

                <img class="ring-icon"src="frontend/img/bell.svg" alt="">
            </button>
            @if (!empty(Auth::user()->check_login))
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-item">
                        @foreach ($news as $new)
                            <div class="new-{{ $new['id'] }}">
                                <a href="javascript:void(0)" class="cart-items-{{ $new['id'] }}"
                                    @if (in_array(Auth::user()->id, explode(',', $new['user_id']))) style="opacity: 0.7" @endif>
                                    <div class="row">
                                        <div class="col-6 text-left">


                                            <img src="frontend/img/h-soft2.png" alt="" />
                                            <span style="font-weight:800; position:relative; top:-5px;">Tin
                                                tức
                                                mới</span>
                                            <br>
                                            <span style="position:relative; top:-20px; padding-left:40px">
                                                <label>{{ date('H:i-d/m/Y', strtotime($new['created_at'])) }}</label>
                                            </span>
                                        </div>
                                        @if (!in_array(Auth::user()->id, explode(',', $new['user_id'])))
                                            <div class="col-6 text-right img-point-{{ $new['id'] }}">
                                                <img src="frontend/img/point.png" alt="" />

                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ url('/detail/new/' . $new['id']) }}"
                                                data-id="{{ $new['id'] }}" class="image-new">
                                                <img src="{{ $new['image'] }}" style="width:100%; height: 150px"
                                                    alt="" />
                                            </a>
                                            <h6 style="margin-top:10px; font-size:14px;">
                                                {{ $new['name'] }}
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>

                                </a>
                            </div>
                        @endforeach
                        <hr>
                        <center><a href="{{ url('/dashboard/news') }}" style="font-size: 30px;"><i
                                    class="fa fa-angle-double-down"></i></a></center>
                    </div>

                </div>
            @endif
            {{-- <button class="avatar-button">
                <img class="avatar-icon" src="frontend/img/avatar.svg" alt="">
            </button> --}}
            @if (!empty(Auth::user()->check_login))
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('/dashboard/user') }}"
                    {{ Session::put('active', 'infor-user') }}><img
                        @if (!empty(Auth::user()->image)) src="{{ Auth::user()->image }}" @else src="frontend/img/avatar.svg" @endif
                        class="avatar-button"></a>&nbsp;
                <strong class="register-login">{{ Auth::user()->name }}</strong>
            @else
                <strong class="register-login">
                    <a href="#" data-toggle="modal" data-target="#exampleModalCenterRegister">
                        Đăng kí</a>
                    /
                    <a href="#" data-toggle="modal" data-target="#exampleModalCenterLogin" data-dismiss="modal">
                        Đăng nhập
                    </a>
                </strong>
            @endif
        </div>
    </div>
    <div class="header-bottom bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 d-none d-lg-block">
                    <div class="categories-menu text-center text-uppercase click bg-7">
                        <a href="{{ url('/') }}"
                            @if (Session::get('page') == 'dashboard') style="
                            text-decoration: underline;" @endif>TRANG
                            CHỦ</a>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 d-none d-lg-block">
                    <div class="categories-menu text-center text-uppercase click bg-7">
                        <a href="{{ url('/dashboard/projects') }}"
                            @if (Session::get('page') == 'project') style="
                        text-decoration: underline;" @endif>SẢN
                            PHẨM</a>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 d-none d-lg-block">
                    <div class="categories-menu text-center text-uppercase click bg-7">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenterContact"
                            data-dismiss="modal">LIÊN HỆ</a>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 d-none d-lg-block">
                    <div class="categories-menu text-center text-uppercase click bg-7">
                        <a href="{{ url('/dashboard/news') }}"
                            @if (Session::get('page') == 'new') style="
                        text-decoration: underline;" @endif>TIN
                            TỨC</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


</header>
<div class="sloder-area">
    <img src="frontend/img/coding.png" alt="" />
</div>
