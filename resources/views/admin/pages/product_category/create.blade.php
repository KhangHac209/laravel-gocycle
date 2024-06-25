@extends('admin.layout.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            @session('message')
                                <div class="text-success">{{ session('message') }}</div>
                            @endsession
                            <div class="card-header">
                                <h3 class="card-title">Product Category</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{ route('admin.product_category.store') }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" id="name" value="{{ old('name') }}" name='name'
                                            class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputSlug">Slug</label>
                                        <input type="text" id="slug" value="{{ old('slug') }}" name='slug'
                                            class="form-control" id="exampleInputSLug" placeholder="Slug">
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputStatus">Status</label>
                                        <select name="status" id="">
                                            <option value="">----Please Select---</option>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Show</option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Hide</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('my-jquery')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                var name = $(this).val();

                $.ajax({
                    method: 'POST', //method of form
                    url: "{{ route('admin.product_category.slug') }}", //method of action
                    data: {
                        slug: name,
                        _token: '{{ csrf_token() }}'
                    }, //input name

                    success: function(result) {
                        $('#slug').val(result.slug);
                    }
                });
            });
        });
    </script>
@endsection
