@extends('backend.dashboard_table')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <form action="{{url('/admin/delete-all/contacts')}}" method="POST">
                @csrf
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">Data Tables</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">Dashtreme</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contacts</li>
                    </ol>
                </div>

                <div class="col-sm-3">


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
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Time</th>
                                            <th>Price</th>
                                            <th>Project</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $key => $contact)
                                            <tr>
                                                <td><input type="checkbox" name="id[]" value="{{$contact['id']}}"></td>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $contact['name'] }}</td>
                                                <td>{{ $contact['email'] }}</td>
                                                <td>{{ $contact['phone'] }}</td>
                                                <td>
                                                    {{$contact['time']}}
                                                </td>
                                                <td>{{$contact['price']}}</td>
                                                <td>
                                                    @foreach ($projects as $project)
                                                        @if ($project['id']==$contact['project_id'])
                                                            {{$project['name']}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a role="button"
                                                        href="{{ url('/admin/edit/contact/' . $contact['id']) }}"
                                                        class="btn btn-success"><i
                                                            class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp;
                                                    <a role="button" href="{{ url('/admin/delete/contact/'.$contact['id']) }}"
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
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Time</th>
                                            <th>Price</th>
                                            <th>Project</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $key => $contact)
                                            <tr>
                                                <td><input type="checkbox" name="id[]" value="{{$contact['id']}}"></td>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $contact['name'] }}</td>
                                                <td>{{ $contact['email'] }}</td>
                                                <td>{{ $contact['phone'] }}</td>
                                                <td>
                                                    {{$contact['time']}}
                                                </td>
                                                <td>{{$contact['price']}}</td>
                                                <td>
                                                    @foreach ($projects as $project)
                                                        @if ($project['id']==$contact['project_id'])
                                                            {{$project['name']}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a role="button"
                                                        href="{{ url('/admin/edit/contact/' . $contact['id']) }}"
                                                        class="btn btn-success"><i
                                                            class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp;
                                                    <a role="button" href="{{ url('/admin/delete/contact/'.$contact['id']) }}"
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
