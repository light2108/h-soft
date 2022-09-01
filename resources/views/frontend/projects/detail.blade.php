<?php
use App\Models\User; ?>
@extends('frontend.index')
@section('content')
    <div class="all-product-area mtb-45">
        <div class="container">
            <div class="row">
                <div class="col-xl-8  col-lg-9 col-md-12 col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="product-img">
                                <a href="javascript:void(0)">
                                    <img src="{{ explode(',', $project['image'])[0] }}" style="width:100%;height:250px;"
                                        alt="" />
                                </a>
                                <center><button class="btn btn-info btn-block btn-round btn-grad"
                                        style="width: 80%;top:-5px;position: relative;" type="button">Giá Bán:
                                        {{ $project['price'] }}
                                        Vnđ</button></center>
                            </div>
                        </div>
                        <div class="col-6 detailproduct">
                            <h5>{{ $project['name'] }}</h5>
                            <h6>Thời gian dự án: <span>{{ $project['time'] }}</span></h6>
                            <div class="row nameproduct">
                                <div class="col-2 left">
                                    <div style="border-bottom: 1px solid #d6d4d4;"></div>
                                </div>
                                <div class="col-3">
                                    App Mobile
                                </div>
                                <div class="col-2 right">
                                    <div style="border-bottom: 1px solid #d6d4d4;"></div>
                                </div>
                            </div>
                            <div id="big-line" style="border-bottom: 3px solid #d6d4d4;"></div>
                            <div id="big-star">
                                <div class="row">
                                    <div class="col-6">
                                        <i class="fa-solid fa-star" style="color: rgb(241, 241, 8)"></i>
                                        <i class="fa-solid fa-star" style="color: rgb(241, 241, 8)"></i>
                                        <i class="fa-solid fa-star" style="color: rgb(241, 241, 8)"></i>
                                        <i class="fa-solid fa-star" style="color: rgb(241, 241, 8)"></i>
                                        <i class="fa-solid fa-star" style="color: #d6d4d4"></i>
                                    </div>
                                    <div class="col-6">
                                        <p style="font-size:16px; right:20%; position: absolute;top:1px; font-weight:600">
                                            <span>4.0/5</span> ({{ $count_comments }} đánh giá)
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row inforproduct">
                        <div class="col-12">
                            <h6>Thông tin mô tả</h6>
                        </div>
                        <div class="col-12" style="font-size: 16px;">
                            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also
                                the leap into electronic typesetting, remaining essentially unchanged</p>
                            <div class="product-img">
                                <a href="#">
                                    <img src="frontend/img/tin-tuc.png" style="width: 100%; height:400px" alt="" />
                                </a>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also
                                the leap into electronic typesetting, remaining essentially unchanged</p>
                            <div class="product-img">
                                <iframe width="100%" height="400px" src="https://www.youtube.com/embed/nOtT9NGIldg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div> --}}
                            @foreach (explode(',', $project['image']) as $image)
                                <p>{{ $project['description'] }}</p>
                                <div class="product-img">
                                    <a href="javascript:void(0)">
                                        <img src="{{ $image }}" style="width: 100%; height:300px" alt="" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-4  col-lg-9 col-md-12 col-12">
                    <div class="product box-shadow">
                        <div class="product-title bg-1 text-uppercase">
                            <h3>Đánh giá</h3>
                        </div>

                        <div class="active-new">
                            @foreach ($comments as $cmt)
                                <div class="product-items container">
                                    <div class="row">
                                        <div class="col-3">
                                            <img class="user_image"
                                                @if (!empty(User::find($cmt['user_id'])->image)) src="{{ User::find($cmt['user_id'])->image }}" @else src="frontend/img/avatar.jpeg" @endif />
                                        </div>
                                        <div class="col-5">
                                            <span
                                                style="position: relative; right:32%;top:3px;font-weight:600; font-size:16px">{{ User::find($cmt['user_id'])->name }}</span>
                                            <div style="position: relative; right:32%;bottom:1px;">
                                                @for ($i = 0; $i < 5; ++$i)
                                                    <i
                                                        @if ($cmt['rating'] == $i + 0.5) class="fa-solid fa-star-half" style="color: rgb(241, 241, 8)" @elseif($i >= $cmt['rating']) class="fa-solid fa-star" style="color: #d6d4d4" @else class="fa-solid fa-star" style="color: rgb(241, 241, 8)" @endif></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <span
                                                style="color: gray; position: relative;float:right;top:25px;">{{ date('H:i-d/m/Y', strtotime($cmt['created_at'])) }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <p style="position: relative; left:2%;">{{ $cmt['content'] }}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <center><button class="btn btn-info btn-block btn-round btn-grad" style="width: 250px"
                                type="button" data-toggle="modal" data-target="#exampleModalCenterComment"
                                data-dismiss="modal">Viết đánh
                                giá</button></center>

                        <div class="middle-product">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenterComment" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #3356AF">
                    <h5 class="modal-title w-100 text-center" style="color: white">Đánh giá</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/dashboard/comments') }}" method="POST">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project['id'] }}">
                        <div class="container">
                            <div class="row">

                                <div class="col col-lg-2">
                                    <div style="position: relative, display: block">
                                        <img src="frontend/img/circle.png"
                                            style="position:relative;max-height:80px; max-width:80px; margin-left: 30px"
                                            alt="">

                                        <h5
                                            style="font-family: 'Times New Roman', Times, serif; position: absolute; display: flex;top: 30px; margin-left: 52px; text-align: center">
                                            4.0/5</h5>
                                    </div>

                                </div>
                                <div class="col-3">
                                    <div class="num">
                                        <div style="margin-left: 20px">
                                            <h6
                                                style="margin-top:30px; top:110%; font-family:'Times New Roman', Times, serif; align-items:center;">
                                                {{ $count_comments }} đánh giá</h6>
                                        </div>
                                    </div>

                                </div>


                                <div class="large">
                                    <div class="col-1" style="border-left: 2px solid gray;height: 100px;">
                                    </div>
                                </div>


                                <div class="col col-xs-12">
                                    <div class="rate">
                                        <h6>Mức độ đánh giá của bạn</h6>
                                        <div style="display:flex ;font-size: 35px">
                                            {{-- <input type="hidden" value="" --}}
                                            <input id="input-id" type="hidden" name="rating" class="rating"
                                                data-size="lg">
                                            {{-- <div class="container">
                                    <span id="rateMe2" class="empty-stars"></span>
                                  </div> --}}
                                            {{-- @for ($i = 1; $i <= 5; ++$i)
                                <i class="fa-solid fa-star star-{{$i}}" style="color: #d6d4d4"></i>&nbsp;
                            @endfor --}}


                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-label-group">
                                        <textarea name="content" rows="5" required class="form-control" placeholder="Vui lòng nhập"></textarea>
                                        <label>Nội dung đánh giá</label>
                                    </div>
                                    <center><button type="submit" style="width: 80%"
                                            class="btn btn-info btn-block btn-round btn-grad">Gửi đánh giá</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
