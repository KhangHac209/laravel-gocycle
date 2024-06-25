@extends('admin.layout.master')

@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 3 | Simple Tables</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    @session('message')
                                        <div class="text-success">{{ session('message') }}</div>
                                    @endsession
                                    <div class="card-header">
                                        <h3 class="card-title">Bordered Table</h3>
                                        <form method="get" action="{{ route('admin.product_category.index') }}"
                                            role="form">
                                            <input type="text" value="{{ request()->key ?? '' }}" id="key"
                                                name='key' class="form-control" placeholder="Enter name">
                                            <select name="sortBy" id="" class="form-control my-2">
                                                <option value="">----Please Select----</option>
                                                <option {{ request()->sortBy = 'oldest' ? 'selected' : '' }} value="oldest">
                                                    Oldest</option>
                                                <option {{ request()->sortBy = 'latest' ? 'selected' : '' }} value="latest">
                                                    Latest</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </form>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="myTable" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Status</th>
                                                    <th>Detail</th>
                                                    <th style="width: 40px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->slug }}</td>
                                                        <td>{{ $data->status ? 'Show' : 'Hide' }}</td>
                                                        <td>
                                                            <a
                                                                href="{{ route('admin.product_category.detail', ['productCategory' => $data->id]) }}">Detail</a>
                                                        </td>
                                                        <td>
                                                            @if ($data->trashed())
                                                                <form
                                                                    action="{{ route('admin.product_category.restore', ['id' => $data->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <button class="btn btn-success"
                                                                        onclick="return confirm('Are u sure ?')"
                                                                        type="submit">Restore</button>
                                                                </form>
                                                            @endif
                                                            <form
                                                                action="{{ route('admin.product_category.destroy', ['productCategory' => $data->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <button class="btn btn-danger"
                                                                    onclick="return confirm('Are u sure ?')"
                                                                    type="submit">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer clearfix">
                                        {{ $datas->withQueryString()->links() }}
                                        {{-- <ul class="pagination pagination-sm m-0 float-right">
                                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                            @for ($page = 1; $page <= $totalPages; $page++)
                                                <li class="page-item"><a class="page-link"
                                                        href="?page={{ $page }}">{{ $page }}</a></li>
                                            @endfor
                                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- ./wrapper -->

                            <!-- jQuery -->
                            <script src="../../plugins/jquery/jquery.min.js"></script>
                            <!-- Bootstrap 4 -->
                            <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                            <!-- AdminLTE App -->
                            <script src="../../dist/js/adminlte.min.js"></script>
                            <!-- AdminLTE for demo purposes -->
                            <script src="../../dist/js/demo.js"></script>
    </body>

    </html>
@endsection

@section('my-jquery')
    <script>
        $(document).ready(function() {
            let table = new DataTable('#myTable');
        })
    </script>
@endsection
