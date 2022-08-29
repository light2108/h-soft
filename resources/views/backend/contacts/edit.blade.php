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
                        <li class="breadcrumb-item active" aria-current="page">Edit Contact</li>
                    </ol>
                </div>

            </div>
            <!-- End Breadcrumb-->
            {{-- <form action="{{ url('/admin/edit/project/' . $contact['id']) }}" method="POST" enctype="multipart/form-data"> --}}
                {{-- @csrf --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header text-uppercase">Form Data</div>
                            <div class="card-body">
                                <label>Name</label>
                                <input type="text" value="{{ $contact['name'] }}" required name="name" class="form-control">
                                <hr>
                                <label>Email</label>
                                <input type="email" value="{{ $contact['email'] }}" required name="email"
                                    class="form-control">
                                <hr>
                                <label>Phone</label>
                                <input type="number" value="{{ $contact['phone'] }}" required name="phone"
                                    class="form-control">
                                <hr>
                                <label>Address</label>
                                <input type="text" value="{{ $contact['address'] }}" required name="address"
                                    class="form-control">
                                <hr>
                                <label>Time</label>
                                <input type="text" value="{{ $contact['time'] }}" required name="time" class="form-control">
                                <hr>
                                <label>Price</label>
                                <input type="number" value="{{ $contact['price'] }}" required name="price" class="form-control">
                                <hr>
                                <label>Description</label>
                                <textarea id="summernoteEditor" name="description">
                                        {{ $contact['description'] }}
                                </textarea>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->
                <!--End Row-->


            {{-- </form> --}}


            <!--End Row-->



            <!--End Row-->
            <!--start overlay-->
            <div class="overlay"></div>
            <!--end overlay-->
        </div>
        <!-- End container-fluid-->

    </div>
@endsection
