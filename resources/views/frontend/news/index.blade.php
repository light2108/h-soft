@extends('frontend.index')
@section('content')
    <div class="all-product-area mtb-45">
        <div class="container">
            <div class="row">
                <div class="col-xl-9  col-lg-9 col-md-12 col-12">
                    <div class="product box-shadow">
                        <div class="product-title bg-1 text-uppercase">
                            <h3>Tin tức</h3>
                        </div>

                        <div class="tab-active" style="height: 750px;">
                            @for ($i = 0; $i < count($news) - 1; $i += 2)
                                <div class="product-items">
                                    <div class="middle-product">
                                    </div>
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="{{ url('/detail/new/' . $news[$i]['id']) }}">
                                                <img src="{{ $news[$i]['image'] }}" style="height: 150px" alt="" />
                                            </a>
                                        </div>
                                        <div class="new-content">
                                            <span>{{ $news[$i]['name'] }}</span>
                                            <p>{{ $news[$i]['description'] }}</p>
                                            <hr>
                                            <i class="fa-brands fa-facebook-f"></i>
                                            <i class="fa-brands fa-twitter"></i>
                                            <i class="fa-brands fa-instagram"></i>
                                            <i class="fa-brands fa-google"></i>
                                            <label>{{ date('H:i-d/m/Y', strtotime($news[$i]['created_at'])) }}</label>
                                        </div>
                                    </div>
                                    <div class="middle-product">
                                    </div>
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="{{ url('/detail/new/' . $news[$i + 1]['id']) }}">
                                                <img src="{{ $news[$i + 1]['image'] }}" style="height: 150px"
                                                    alt="" />
                                            </a>
                                        </div>
                                        <div class="new-content">
                                            <span>{{ $news[$i + 1]['name'] }}</span>
                                            <p>{{ $news[$i + 1]['description'] }}</p>
                                            <hr>
                                            <i class="fa-brands fa-facebook-f"></i>
                                            <i class="fa-brands fa-twitter"></i>
                                            <i class="fa-brands fa-instagram"></i>
                                            <i class="fa-brands fa-google"></i>
                                            <label>{{ date('H:i-d/m/Y', strtotime($news[$i + 1]['created_at'])) }}</label>
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
                <div class="col-xl-3  col-lg-9 col-md-12 col-12">
                    <div class="product box-shadow">
                        <div class="product-title bg-1 text-uppercase text-center">
                            <h3>Tin tức nổi bật</h3>
                        </div>

                        <div class="active-new">
                            <div class="product-items">
                                <div class="middle-product">
                                </div>
                                @foreach ($featured_news as $new)
                                    <div class="product-wrapper-new container">
                                        <div class="row">
                                            <div class="col-5">
                                                {{-- <div class="product-img"> --}}
                                                <a href="{{ url('/detail/new/' . $new['id']) }}">
                                                    <img src="{{ $new['image'] }}" style="height: 80px;" alt="" />
                                                </a>
                                                {{-- </div> --}}
                                            </div>
                                            <div class="col-7">
                                                <div class="content-new">
                                                    <span>
                                                        {{ $new['name'] }}
                                                    </span>
                                                    <label>{{ date('H:i-d/m/Y', strtotime($new['created_at'])) }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach

                            </div>
                        </div>
                        <center><button class="btn btn-info btn-block btn-round btn-grad" style="width: 220px"
                                type="button">Xem thêm</button></center>

                        <div class="middle-product">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
