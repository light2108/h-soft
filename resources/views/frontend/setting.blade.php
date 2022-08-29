<div class="col-xl-4  col-lg-9 col-md-12 col-12">
    <div class="product box-shadow">
        <div class="product-title bg-3">
            <div class="row">
                <div class="col-4">
                    <img class="circular_image" @if(!empty(Auth::user()->image)) src="{{Auth::user()->image}}" @else src="frontend/img/avatar.jpeg" @endif/>
                </div>
                <div class="col-8">
                    @if(!empty(Auth::user()->name))
                    <p>{{Auth::user()->name}}</p>
                    @else <p>user</p>
                    @endif
                    <span>+84{{Auth::user()->phone}}</span>
                </div>

            </div>


        </div>
        <div class="make-space"></div>
        <div class="product-title bg-5">
            <div class="row">
                <div class="col-12">
                    <a href="{{url('/dashboard/user')}}" @if (Session::get('active')=="infor-user")
                    style="color:blue"
                    @endif >Thông tin cá nhân</a>
                    <hr>
                </div>
                <div class="col-12">
                    <a href="{{ url('/dashboard/terms') }}" @if (Session::get('active')=="terms")
                    style="color:blue"
                    @endif>Điều khoản & chính sách</a>
                    <hr>
                </div>
                <div class="col-12">
                    <a href="{{ url('/dashboard/about-us') }}" @if (Session::get('active')=="about-us")
                    style="color:blue"
                    @endif>Về chúng tôi</a>
                    <hr>
                </div>
                <div class="col-12">
                    <a href="javascript:void(0)" data-toggle="modal"
                        data-target="#exampleModalCenterChangePassword" data-dismiss="modal">Đổi mật
                        khẩu</a>
                    <hr>
                </div>
                <div class="col-12">
                    <a href="javascript:void(0)" data-toggle="modal"
                        data-target="#exampleModalCenterSignOut" data-dismiss="modal"><i
                            class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Đăng xuất</a>
                    <hr>
                </div>
            </div>
        </div>



    </div>
</div>
