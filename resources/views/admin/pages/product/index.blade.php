@extends('admin.layout.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Product</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if (session('message'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success" role="alert">
                                            {{ session('message') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">Bordered Table</h3>
                                {{-- <form role="form" action="{{ route('admin.product_category.index') }}" method="GET">
                                    <div class="form-group">
                                        <input type="text" value="{{ request()->key ?? '' }}" name="key"
                                            class="form-control" id="name" placeholder="Enter name">
                                        <select name="sortBy" class="form-control">
                                            <option value="">---Please Select---</option>
                                            <option {{ request()->sortBy === 'oldest' ? 'selected' : '' }} value="oldest">
                                                Oldest</option>
                                            <option {{ request()->sortBy === 'latest' ? 'selected' : '' }} value="latest">
                                                Latest</option>
                                        </select>
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </form> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tableProductCategory" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Product Category</th>
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
                                                <td>{{ $data->price }}</td>
                                                <td>{!! $data->description !!}</td>
                                                <td>{{ $data->productCategory->name }}</td>
                                                {{-- <td>{{ $data->product_category_name }}</td> --}}
                                                <td>{{ $data->status ? 'Show' : 'Hide' }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('admin.product.detailProduct', ['product' => $data->id]) }}">Detail</a>
                                                </td>
                                                <td>
                                                    @if ($data->trashed())
                                                        <form
                                                            action="{{ route('admin.product_category.restore', ['id' => $data->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <button onclick="return confirm('Are you sure?')"
                                                                class="btn btn-success" type="submit">Restore</button>
                                                        </form>
                                                    @endif
                                                    <form method="post">
                                                        @csrf
                                                        <button onclick="return confirm('Are you sure?')"
                                                            class="btn btn-danger" type="submit">Delete</button>
                                                    </form>
                                                    {{-- <form
                                                        action="{{ route('admin.product_category.destroy', ['productCategory' => $data->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button onclick="return confirm('Are you sure?')"
                                                            class="btn btn-danger" type="submit">Delete</button>
                                                    </form> --}}
                                                    {{-- <a href="{{ route('admin.product_category.detail', ['productCategory' => $data->id]) }}"
                                                        class="btn btn-info">Detail</a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $datas->withQueryString()->links() }}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
