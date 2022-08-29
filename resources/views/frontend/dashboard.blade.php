@extends('frontend.index')
@section('content')
    <div class="banner-area ptb-35">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <a href="#">
                            <img src="frontend/img/website.png" alt=""><strong class="title">Website</strong>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <a href="#">
                            <img src="frontend/img/app-mobile.png" alt=""><strong class="title">App Mobile</strong>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="single-banner">
                        <a href="#">
                            <img src="frontend/img/design.png" alt=""><strong class="title">Design</strong>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="single-banner mrg-top-md">
                        <a href="#">
                            <img src="frontend/img/theo-yeu-cau.png" alt=""><strong class="title">Theo yêu cầu</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="all-product-area mtb-45">
        <div class="container">
            <div class="row">
                <div class="col-xl-12  col-lg-9 col-md-12 col-12">
                    <div class="product box-shadow">
                        <div class="product-title bg-1 text-uppercase">
                            <h3>H-App Projects</h3>
                        </div>
                        <div class="new-product-active left-right-angle" style="height: 650px">
                            {{-- @for ($i = 0; $i < count($projects) - 1; $i += 2)
                                <div class="modal fade" id="exampleModalCenterContact-{{ $i }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #3356AF">
                                                <h5 class="modal-title w-100 text-center" style="color: white">Liên hệ với
                                                    chúng tôi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-2"></div>
                                                    <div class="col-8">
                                                        <div class="d-flex flex-column text-center">
                                                            <form action="{{ url('/dashboard/contact') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" value="{{ $projects[$i]['id'] }}">
                                                                <div class="form-label-group">

                                                                    <input type="text" class="form-control"
                                                                        placeholder="Vui lòng nhập" name="name" required>
                                                                    <label>Tên của bạn</label>
                                                                </div>
                                                                <div class="form-label-group">

                                                                    <input type="number" min="0" class="form-control"
                                                                        placeholder="Vui lòng nhập" name="phone" required>
                                                                    <label>Số điện thoại</label>
                                                                </div>
                                                                <div class="form-label-group">

                                                                    <input type="email" class="form-control"
                                                                        placeholder="Vui lòng nhập" name="email" required>
                                                                    <label>Email</label>
                                                                </div>
                                                                <div class="form-label-group">

                                                                    <input type="text" class="form-control"
                                                                        placeholder="Vui lòng nhập" name="address" required>
                                                                    <label>Địa chỉ</label>
                                                                </div>
                                                                <div class="form-label-group">

                                                                    <select name="time" required class="form-control">
                                                                        <option>Cần gấp</option>
                                                                    </select>
                                                                    <label>Thời gian</label>
                                                                </div>
                                                                <div class="form-label-group">

                                                                    <div class="input-group">

                                                                        <input min="0" type="number" name="price"
                                                                            class="form-control input-lg" required
                                                                            placeholder="Vui lòng nhập" />
                                                                        <label>Giá mong muốn</label>
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"
                                                                                style="background-color: white">VND</span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="form-label-group">

                                                                    <textarea name="description" required
                                                                        class="form-control"
                                                                        placeholder="Vui lòng nhập"></textarea>
                                                                    <label>Nội dung dự án muốn làm</label>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-info btn-block btn-round btn-grad">Gửi
                                                                    thông tin</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                    <div class="col-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModalCenterContact-{{ $i+1 }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #3356AF">
                                                <h5 class="modal-title w-100 text-center" style="color: white">Liên hệ với
                                                    chúng tôi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-2"></div>
                                                    <div class="col-8">
                                                        <div class="d-flex flex-column text-center">
                                                            <form action="{{ url('/dashboard/contact') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" value="{{ $projects[$i]['id'] }}">
                                                                <div class="form-label-group">

                                                                    <input type="text" class="form-control"
                                                                        placeholder="Vui lòng nhập" name="name" required>
                                                                    <label>Tên của bạn</label>
                                                                </div>
                                                                <div class="form-label-group">

                                                                    <input type="number" min="0" class="form-control"
                                                                        placeholder="Vui lòng nhập" name="phone" required>
                                                                    <label>Số điện thoại</label>
                                                                </div>
                                                                <div class="form-label-group">

                                                                    <input type="email" class="form-control"
                                                                        placeholder="Vui lòng nhập" name="email" required>
                                                                    <label>Email</label>
                                                                </div>
                                                                <div class="form-label-group">

                                                                    <input type="text" class="form-control"
                                                                        placeholder="Vui lòng nhập" name="address" required>
                                                                    <label>Địa chỉ</label>
                                                                </div>
                                                                <div class="form-label-group">

                                                                    <select name="time" required class="form-control">
                                                                        <option>Cần gấp</option>
                                                                    </select>
                                                                    <label>Thời gian</label>
                                                                </div>
                                                                <div class="form-label-group">

                                                                    <div class="input-group">

                                                                        <input min="0" type="number" name="price"
                                                                            class="form-control input-lg" required
                                                                            placeholder="Vui lòng nhập" />
                                                                        <label>Giá mong muốn</label>
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"
                                                                                style="background-color: white">VND</span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="form-label-group">

                                                                    <textarea name="description" required
                                                                        class="form-control"
                                                                        placeholder="Vui lòng nhập"></textarea>
                                                                    <label>Nội dung dự án muốn làm</label>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-info btn-block btn-round btn-grad">Gửi
                                                                    thông tin</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                    <div class="col-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor --}}
                            @for ($i = 0; $i < count($projects) - 1; $i += 2)
                                <div class="product-items ">
                                    <div class="middle-product">
                                    </div>
                                    <div class="product-wrapper bb bl" style="border: 1px solid gray; border-radius:20px;">
                                        <div class="product-img">
                                            <a href="{{ url('/detail/project/' . $projects[$i]['id']) }}">
                                                <img src="{{ explode(',', $projects[$i]['image'])[0] }}"
                                                    style="width: 100%; height:180px;" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <span style="color: gray">App Mobile</span>
                                            <span>{{ $projects[$i]['name'] }}</span>
                                            <button class="contact" data-toggle="modal"
                                                data-target="#exampleModalCenterContact-{{ $i }}">Liên
                                                hệ</button>
                                        </div>
                                    </div>
                                    <div class="middle-product">
                                    </div>
                                    <div class="product-wrapper bb bl" style="border: 1px solid gray; border-radius:20px;">
                                        <div class="product-img">
                                            <a href="{{ url('/detail/project/' . $projects[$i + 1]['id']) }}">
                                                <img src="{{ explode(',', $projects[$i + 1]['image'])[0] }}"
                                                    style="width: 100%; height:180px;" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <span style="color: gray">App Mobile</span>
                                            <span>{{ $projects[$i + 1]['name'] }}</span>
                                            <button class="contact" data-toggle="modal"
                                                data-target="#exampleModalCenterContact-{{ $i + 1 }}">Liên
                                                hệ</button>
                                        </div>
                                    </div>
                                </div>

                            @endfor

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @for ($i = 0; $i < count($projects) - 1; $i += 2)
        <div class="modal fade" id="exampleModalCenterContact-{{ $i }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #3356AF">
                        <h5 class="modal-title w-100 text-center" style="color: white">Liên hệ với
                            chúng tôi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <div class="d-flex flex-column text-center">
                                    <form action="{{ url('/dashboard/contact') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="project_id" value="{{ $projects[$i]['id'] }}">
                                        <div class="form-label-group">

                                            <input type="text" class="form-control" placeholder="Vui lòng nhập" name="name"
                                                required>
                                            <label>Tên của bạn</label>
                                        </div>
                                        <div class="form-label-group">

                                            <input type="number" min="0" class="form-control" placeholder="Vui lòng nhập"
                                                name="phone" required>
                                            <label>Số điện thoại</label>
                                        </div>
                                        <div class="form-label-group">

                                            <input type="email" class="form-control" placeholder="Vui lòng nhập"
                                                name="email" required>
                                            <label>Email</label>
                                        </div>
                                        <div class="form-label-group">

                                            <input type="text" class="form-control" placeholder="Vui lòng nhập"
                                                name="address" required>
                                            <label>Địa chỉ</label>
                                        </div>
                                        <div class="form-label-group">

                                            <select name="time" required class="form-control">
                                                <option>Cần gấp</option>
                                            </select>
                                            <label>Thời gian</label>
                                        </div>
                                        <div class="form-label-group">

                                            <div class="input-group">

                                                <input min="0" type="number" name="price" class="form-control input-lg"
                                                    required placeholder="Vui lòng nhập" />
                                                <label>Giá mong muốn</label>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        style="background-color: white">VND</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-label-group">

                                            <textarea name="description" required class="form-control"
                                                placeholder="Vui lòng nhập"></textarea>
                                            <label>Nội dung dự án muốn làm</label>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-block btn-round btn-grad">Gửi
                                            thông tin</button>
                                    </form>

                                </div>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenterContact-{{ $i + 1 }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #3356AF">
                        <h5 class="modal-title w-100 text-center" style="color: white">Liên hệ với
                            chúng tôi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <div class="d-flex flex-column text-center">
                                    <form action="{{ url('/dashboard/contact') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="project_id" value="{{ $projects[$i+1]['id'] }}">
                                        <div class="form-label-group">

                                            <input type="text" class="form-control" placeholder="Vui lòng nhập" name="name"
                                                required>
                                            <label>Tên của bạn</label>
                                        </div>
                                        <div class="form-label-group">

                                            <input type="number" min="0" class="form-control" placeholder="Vui lòng nhập"
                                                name="phone" required>
                                            <label>Số điện thoại</label>
                                        </div>
                                        <div class="form-label-group">

                                            <input type="email" class="form-control" placeholder="Vui lòng nhập"
                                                name="email" required>
                                            <label>Email</label>
                                        </div>
                                        <div class="form-label-group">

                                            <input type="text" class="form-control" placeholder="Vui lòng nhập"
                                                name="address" required>
                                            <label>Địa chỉ</label>
                                        </div>
                                        <div class="form-label-group">

                                            <select name="time" required class="form-control">
                                                <option>Cần gấp</option>
                                            </select>
                                            <label>Thời gian</label>
                                        </div>
                                        <div class="form-label-group">

                                            <div class="input-group">

                                                <input min="0" type="number" name="price" class="form-control input-lg"
                                                    required placeholder="Vui lòng nhập" />
                                                <label>Giá mong muốn</label>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        style="background-color: white">VND</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-label-group">

                                            <textarea name="description" required class="form-control"
                                                placeholder="Vui lòng nhập"></textarea>
                                            <label>Nội dung dự án muốn làm</label>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-block btn-round btn-grad">Gửi
                                            thông tin</button>
                                    </form>

                                </div>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endfor
    <div class="all-product-area mtb-45">
        <div class="container">
            <div class="row">
                <div class="col-xl-12  col-lg-9 col-md-12 col-12">
                    <div class="product box-shadow">
                        <div class="product-title bg-1 text-uppercase">
                            <h3>Tin tức</h3>
                        </div>
                        <div class="new-product" style="height: 800px;">
                            @for ($i = 0; $i < count($news) - 1; $i += 2)
                                <div class="product-items">
                                    <div class="middle-product">
                                    </div>
                                    <div class="product-wrapper product-new bb bl">
                                        <div class="product-img">
                                            <a href="{{url('/detail/new/'.$news[$i]['id'])}}">
                                                <img src="{{ $news[$i]['image'] }}" style="height: 200px;width:100%" alt="" />
                                            </a>
                                        </div>
                                        <div class="new-content">
                                            <span>{{ $news[$i]['name'] }}</span>
                                            <p>{{ $news[$i]['description'] }}</p>
                                            <label>{{ date('H:m-d/m/Y', strtotime($news[$i]['created_at'])) }}</label>
                                        </div>
                                    </div>
                                    <div class="middle-product">
                                    </div>
                                    <div class="product-wrapper product-new bb bl">
                                        <div class="product-img">
                                            <a href="{{url('/detail/new/'.$news[$i+1]['id'])}}">
                                                <img src="{{ $news[$i + 1]['image'] }}" style="height: 200px;width:100%" alt="" />
                                            </a>
                                        </div>
                                        <div class="new-content">
                                            <span>{{ $news[$i + 1]['name'] }}</span>
                                            <p>{{ $news[$i + 1]['description'] }}</p>
                                            <label>{{ date('H:m-d/m/Y', strtotime($news[$i + 1]['created_at'])) }}</label>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center" style="position: relative; bottom:15px;">
                                {{ $news->links('pagination::bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- product-area end -->
            </div>
        </div>
    </div>
@endsection
