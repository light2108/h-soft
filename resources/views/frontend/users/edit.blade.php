@extends('frontend.index')
@section('content')
    <div class="all-product-area mtb-45">
        <div class="container">
            <div class="row">
                <div class="col-xl-4  col-lg-9 col-md-12 col-12">
                    <div class="product box-shadow">
                        <div class="product-title bg-3">
                            <div class="row">
                                <div class="col-4">
                                    <img class="circular_image" src="frontend/img/user.png" />
                                </div>
                                <div class="col-8">
                                    <p>Hoàng Huy</p>
                                    <span>+84989068867</span>
                                </div>

                            </div>


                        </div>
                        <div class="make-space"></div>
                        <div class="product-title bg-5">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{url('/dashboard/user')}}">Thông tin cá nhân</a>
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <a href="{{url('/dashboard/terms')}}">Điều khoản & chính sách</a>
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <a href="{{url('/dashboard/about-us')}}">Về chúng tôi</a>
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenterChangePassword" data-dismiss="modal">Đổi mật khẩu</a>
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalCenterSignOut" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Đăng xuất</a>
                                    <hr>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="col-xl-8 col-lg-9 col-md-12 col-12">
                    <div class="product box-shadow detailuser">
                        <div class="product-title bg-1 text-center">
                            <p>Thông tin cá nhân</p>
                        </div>
                        <div class="product-title text-center">
                            <img src="frontend/img/user.png" alt="" />
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-1">

                            </div>
                            <div class="col-10">
                                <form>
                                    <div class="form-label-group">
                                        <input type="text" class="form-control" value="{{$user['name']}}" placeholder="Nhập tên">
                                        <label>Tên của bạn</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="number" min="0" class="form-control" value="{{$user['phone']}}" placeholder="Nhập số điện thoại">
                                        <label>Số điện thoại</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="email" class="form-control" value="{{$user['email']}}" placeholder="Nhập email">
                                        <label>Email</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" class="form-control" value="{{$user['address']}}" placeholder="Nhập địa chỉ">
                                        <label for="">Địa chỉ</label>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-info btn-block btn-round btn-white"
                                            style="width: 250px">Hủy bỏ</button>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-info btn-block btn-round btn-grad"
                                            style="width: 250px">Lưu lại</button>
                                        </div>
                                    </div>



                                </form>
                            </div>
                            <div class="col-1">

                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
