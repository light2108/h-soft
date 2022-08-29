@extends('frontend.index')
@section('content')
    <div class="all-product-area mtb-45">
        <div class="container">
            <div class="row">
                <div class="col-xl-9  col-lg-9 col-md-12 col-12">
                    <div class="product box-shadow detail-product ">
                        <div class="container">
                            <div class="product-title">
                                <h2>{{ $new['name'] }}</h2>
                            </div>
                            <i class="fa-brands fa-facebook-f"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-google"></i>
                            <label>{{ date('H:i-d/m/Y', strtotime($new['created_at'])) }}</label>
                        </div>
                        <p>
                        <div style="border-bottom: 2px solid #d6d4d4;"></div>
                        </p>
                        <div class="container">
                            @foreach (explode(',', $new['image']) as $image)
                                <p>{{ $new['description'] }}</p>
                                <div class="product-img">
                                    <a>
                                        <img src="{{ $image }}" style="width: 100%; height:300px" alt="" />
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                            and more recently with desktop publishing software like Aldus PageMaker including versions of
                            Lorem Ipsum</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page
                            when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                            distribution of letters, as opposed to using 'Content here, content here', making it look like
                            readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as
                            their default model text, and a search for 'lorem ipsum' will uncover many web sites still in
                            their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on
                            purpose (injected humour and the like).</p>
                        <div class="product-img">
                            <a href="#">
                                <img src="frontend/img/tin-tuc.png" style="width: 100%; height:400px" alt="" />
                            </a>
                        </div>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a
                            Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin
                            words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in
                            classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32
                            and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,
                            written in 45 BC. This book is a treatise on the theory of ethics, very popular during the
                            Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in
                            section 1.10.32</p>
                            <div class="product-img">
                                <a href="#">
                                    <img src="frontend/img/tin-tuc.png" style="width: 100%; height:400px" alt="" />
                                </a>
                            </div> --}}
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
                                                    <img src="{{ $new['image'] }}" style="height: 80px" alt="" />
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
