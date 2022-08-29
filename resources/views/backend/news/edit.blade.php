@extends('backend.dash_create_edit')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">Create</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Dashtreme</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit new</li>
                    </ol>
                </div>

            </div>
            <!-- End Breadcrumb-->
            <form action="{{ url('/admin/edit/new/' . $new['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header text-uppercase">Form Data</div>
                            <div class="card-body">
                                <label>Name</label>
                                <input type="text" value="{{ $new['name'] }}" required name="name" class="form-control">
                                <hr>

                                <label>Image</label>
                                {{-- <input name="image" onchange="loadfile(event)" type="file" multiple class="form-control">
                                <img id="output" src="{{ $new['image'] }}" width="200px" height="200px"> --}}
                                <input name="image[]" onchange="loadfile(event)" type="file" multiple class="form-control">
                                <div id="preview">
                                    @foreach (explode(",", $new['image']) as $image)
                                        <img src="{{$image}}" width="100px" height="100px">
                                    @endforeach
                                </div>
                                <hr>
                                <label>Description</label>
                                <textarea id="summernoteEditor" name="description">
                                        {{ $new['description'] }}
                                </textarea>
                                <hr>
                                <button type="submit" class="btn btn-gradient-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->
                <!--End Row-->


            </form>


            <!--End Row-->



            <!--End Row-->
            <!--start overlay-->
            <div class="overlay"></div>
            <!--end overlay-->
        </div>
        <!-- End container-fluid-->

    </div>
@endsection
