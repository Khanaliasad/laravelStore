@extends('layouts.admin')

@section('title', 'Admin-Products')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-default collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Add products</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-primary" data-card-widget="collapse">
                                <i class="fas fa-plus"></i> Add
                            </button>
                            <!--                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>-->
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <!-- general form elements disabled -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Add catagory</h3>
                                    </div>
                                    <!-- /.card-header -->

                                    <form method="post" action="{{ route('admin.categorycreatepost') }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label for="name">name</label>
                                                        <input type="text" name="name" class="form-control"
                                                               placeholder="Enter category name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- textarea -->
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" class="form-control" rows="3"
                                                                  placeholder="Enter category description"></textarea>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <div class="flex flex-row">
                                                <a href="{{ URL::previous() }}" class="btn btn-secondary">Back</a>
                                                <button type="submit" class="btn btn-primary  float-right">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                <!-- general form elements disabled -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and
                        information about
                        the plugin.
                    </div>
                </div>
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="card-header">
                        <h3 class="card-title">All Category's</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Fabric</th>
                                <th>Price</th>
                                <th>Old Price</th>
                                <th>Attribute</th>
                                <th>Description</th>
                                <th>detail</th>
                                <th>Created At</th>
                                <th>weight</th>
                                <th>Category ID</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($allProducts as $product)
                                <tr>
                                    <td>{{ $product['id'] }}</td>
                                    <td>{{ $product['SKU'] }}</td>
                                    <td>{{ $product['name'] }}</td>
                                    <td>{{ $product['fabric'] }}</td>
                                    <td>{{ $product['price'] }}</td>
                                    <td>{{ $product['old_price'] }}</td>
                                    <td>
                                        @switch($product['attribute'])
                                            @case('new')
                                                <button
                                                    class="btn btn-block btn-outline-primary btn-sm">{{ $product['attribute'] }}</button>
                                                @break

                                            @case('top')
                                                <button
                                                    class="btn btn-block btn-outline-success btn-sm">{{ $product['attribute'] }}</button>
                                                @break

                                            @case('sale')
                                                <button
                                                    class="btn btn-block btn-outline-danger btn-sm">{{ $product['attribute'] }}</button>
                                                @break

                                            @default
                                        @endswitch
                                    </td>
                                    <td>{{ substr($product['description'],0,20) }}...</td>
                                    <td>{{ substr($product['detail'],0,20) }}...</td>
                                    <td>{{ \Carbon\Carbon::parse($product['created_at'])->format('d/m/Y h:i a') }}</td>
                                    <td>{{ $product['weight'] }}</td>
                                    <td>{{ $product['category_id'] }}</td>
                                    <td>
                                        <a class="btn btn-default"
                                           href="{{route('admin.productdetail',$product['id'])}}">Detail</a>
                                        <a class="btn btn-primary"
                                           href="{{ route('admin.productedit',$product['id']) }}">Edit</a>
                                        <a class="btn btn-danger"
                                           href="{{ route('admin.productdelete',$product['id']) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

@endsection
@section('end_script')
    @include('partials.admin.tableScript')
@endsection
