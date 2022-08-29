@extends('backend.dashboard_table')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <form action="{{url('/admin/delete-all/news')}}" method="POST">
                @csrf
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">Data Tables</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Dashtreme</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">News</li>
                    </ol>
                </div>

                <div class="col-sm-3">

                    <div class="btn-group float-sm-right">
                        <a role="button" href="{{ url('/admin/create/new') }}"
                            class="btn btn-info waves-effect waves-light"><i class="fa fa-plus"></i> Create</a>
                    </div>
                    <div class="btn-group float-sm-right">
                        <button type="submit"
                            class="btn btn-warning waves-effect waves-light"><i class="fa fa-remove"></i> Delete All</button>
                    </div>
                </div>

            </div>
            @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('success_message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (Session::has('error_message'))
            <div class="alert alert-wraning alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('error_message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-table"></i> Data Table Example</div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="default-datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" class="select-all"></th>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Time</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as $key => $new)
                                            <tr>
                                                <td><input type="checkbox" name="id[]" value="{{$new['id']}}"></td>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $new['name'] }}</td>
                                                <td>{{ date('H:i',strtotime($new['created_at'])) }}</td>
                                                <td>{{ date('Y-m-d',strtotime($new['created_at'])) }}</td>
                                                <td>
                                                    @if ($new['status'] == 1)
                                                        <a href="javascript:void(0)" data-id="{{$new['id']}}" id="new-{{$new['id']}}" class="text texture-success change-status-new">Active</a>
                                                    @else
                                                        <a href="javascript:void(0)" data-id="{{$new['id']}}" id="new-{{$new['id']}}" class="text texture-danger change-status-new">Inactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a role="button"
                                                        href="{{ url('/admin/edit/new/' . $new['id']) }}"
                                                        class="btn btn-success"><i
                                                            class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp;
                                                    <a role="button" href="{{ url('/admin/delete/new/'.$new['id']) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-table"></i> Data Exporting</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" class="select-all"></th>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Time</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as $key => $new)
                                            <tr>
                                                <td><input type="checkbox" name="id[]" value="{{$new['id']}}"></td>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $new['name'] }}</td>
                                                <td>{{ date('H:i',strtotime($new['created_at'])) }}</td>
                                                <td>{{ date('Y-m-d',strtotime($new['created_at'])) }}</td>
                                                <td>
                                                    @if ($new['status'] == 1)
                                                        <a href="javascript:void(0)" data-id="{{$new['id']}}" id="new-{{$new['id']}}" class="text texture-success change-status-new">Active</a>
                                                    @else
                                                        <a href="javascript:void(0)" data-id="{{$new['id']}}" id="new-{{$new['id']}}" class="text texture-danger change-status-new">Inactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a role="button"
                                                        href="{{ url('/admin/edit/new/' . $new['id']) }}"
                                                        class="btn btn-success"><i
                                                            class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp;
                                                    <a role="button" href="{{ url('/admin/delete/new/'.$new['id']) }}"
                                                        class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Row-->
            <!--start overlay-->
            </form>
            <div class="overlay"></div>
            <!--end overlay-->
        </div>
        <!-- End container-fluid-->

    </div>
@endsection
