@extends('frontend.index')
@section('content')
    <div class="all-product-area mtb-45">
        <div class="container">
            <div class="row">
                @include('frontend.setting')
                <div class="col-xl-8 col-lg-9 col-md-12 col-12">
                    <div class="product box-shadow detailuser">
                        <div class="product-title bg-1 text-center">
                            <p>Thông tin cá nhân</p>
                        </div>
                        <form action="{{ url('/dashboard/user') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="product-title text-center">
                                <img @if(!empty(Auth::user()->image)) src="{{Auth::user()->image}}" @else src="frontend/img/avatar.jpeg" @endif alt="" id="output" style="border-radius: 50%"
                                    class="img-circle" />
                                <img src="frontend/img/camera.png" style="width: 30px; height:30px; position: relative;left:-30px;top:35px;" alt="">
                                <input type="file" class="file-circle" name="image" onchange="loadfile(event)"
                                    style="display: none" />
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-1">

                                </div>
                                <div class="col-10">

                                    <div class="form-label-group">
                                        <input type="text" name="name" value="{{$user['name']}}" class="form-control" required placeholder="Nhập tên">
                                        <label>Tên của bạn</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="number" name="phone" value="0{{$user['phone']}}" class="form-control" min="0" required placeholder="Nhập số điện thoại">
                                        <label>Số điện thoại</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="email" name="email" value="{{$user['email']}}" class="form-control" required placeholder="Nhập email">
                                        <label>Email</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" name="address" value="{{$user['address']}}" class="form-control" required placeholder="Nhập địa chỉ">
                                        <label for="">Địa chỉ</label>
                                    </div>

                                    <center><button class="btn btn-info btn-block btn-round btn-grad" style="width: 250px"
                                            type="submit">Chỉnh sửa thông tin</button></center>

                                </div>
                                <div class="col-1">

                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
