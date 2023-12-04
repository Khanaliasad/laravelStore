@extends('layouts.admin')

@section('title', 'Welcome Admin')

@section('page_name','All Orders')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!--<div class="card card-default collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title mt-2">Add Order</h3>
                                        <a href="#" disabled
                                           class="btn btn-primary btn-lg card-title float-right disabled">Add order</a>
                                    </div>
                                    &lt;!&ndash; /.card-header &ndash;&gt;
                                    <div class="card-body">
                                    </div>
                                    &lt;!&ndash; /.card-body &ndash;&gt;

                                </div>-->
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
                                <th>Status</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Order Date</th>
                                <th>Number of Items</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($allOrders as $order)
                                <tr>
                                    <td>{{ $order['id'] }}</td>
                                    <td>
                                        @switch($order['status'])
                                            @case('shipped')
                                                <button
                                                    class="btn btn-block btn-outline-primary btn-sm">{{ $order['status'] }}</button>
                                                @break

                                            @case('completed')
                                                <button
                                                    class="btn btn-block btn-outline-success btn-sm">{{ $order['status'] }}</button>
                                                @break

                                            @case('processing')
                                                <button
                                                    class="btn btn-block btn-outline-danger btn-sm">{{ $order['status'] }}</button>
                                                @break

                                            @default
                                        @endswitch
                                    </td>
                                    <td>{{ $order['customer_name']." ".$order['customer_last_name'] }}</td>
                                    <td>{{ $order['customer_phone'] }}</td>
                                    <td>{{ $order['customer_email'] }}</td>
                                    <td>{{ $order['subtotal'] }}</td>
                                    <td>{{ $order['discount'] }}</td>
                                    <td>{{ $order['total_amount'] }}</td>
                                    <td>{{ convertTimeStampTodate($order['order_date']) }}</td>
                                    <td>{{ count($order['items']) }}</td>

                                    <td>
                                        <a class="btn btn-default"
                                           href="{{route('admin.orderdetail',$order['id'])}}">Detail</a>
                                        <!--                                        <a class="btn btn-primary"
                                           href="{{ route('admin.productedit',$order['id']) }}">Edit</a>
                                        <a class="btn btn-danger"
                                           href="{{ route('admin.productdelete',$order['id']) }}">Delete</a>-->
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
