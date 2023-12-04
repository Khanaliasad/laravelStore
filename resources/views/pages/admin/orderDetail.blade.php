@extends('layouts.admin')

@section('title', 'Order Detail')
@section('page_name', 'Order Detail')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
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
                        <h1 class="card-title">admin order detail</h1>
                    </div>
                    {{--                        {{dd($orderDetails)}}--}}

                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Order ID:</dt>
                            <dd class="col-sm-8">{{$orderDetails['id']}}.</dd>
                            <dt class="col-sm-4">Status:</dt>
                            <dd class="col-sm-8">
                                <div class="w-25">
                                    @switch($orderDetails['status'])
                                        @case('shipped')
                                            <button
                                                class="btn btn-block btn-outline-primary btn-sm">{{ $orderDetails['status'] }}</button>
                                            @break

                                        @case('completed')
                                            <button
                                                class="btn btn-block btn-outline-success btn-sm">{{ $orderDetails['status'] }}</button>
                                            @break

                                        @case('processing')
                                            <button
                                                class="btn btn-block btn-outline-danger btn-sm">{{ $orderDetails['status'] }}</button>
                                            @break

                                        @default
                                    @endswitch
                                </div>
                            </dd>
                            <dt class="col-sm-4">Order Date:</dt>
                            <dd class="col-sm-8">{{convertTimeStampTodate($orderDetails['order_date'])}}.</dd>
                            <dt class="col-sm-4">Customer Name:</dt>
                            <dd class="col-sm-8">
                                {{$orderDetails['customer_name']." ".$orderDetails['customer_last_name']}}.
                            </dd>
                            <dt class="col-sm-4">phone:</dt>
                            <dd class="col-sm-8">{{$orderDetails['customer_phone']}}.</dd>
                            <dt class="col-sm-4">Email:</dt>
                            <dd class="col-sm-8">{{$orderDetails['customer_email']}}.</dd>
                            <dt class="col-sm-4">Address:</dt>
                            <dd class="col-sm-8">{{$orderDetails['customer_address']}}.</dd>
                            <dt class="col-sm-4">Description:</dt>
                            <dd class="col-sm-8">{{$orderDetails['order_description']}}.</dd>
                            <dt class="col-sm-4">subtotal:</dt>
                            <dd class="col-sm-8">{{$orderDetails['subtotal']}}.</dd>
                            <dt class="col-sm-4">discount:</dt>
                            <dd class="col-sm-8">{{$orderDetails['discount']}}.</dd>
                            <dt class="col-sm-4">Total Amount:</dt>
                            <dd class="col-sm-8">{{$orderDetails['total_amount']}}.</dd>
                        </dl>
                        {{--                        {{dd($orderDetails)}}--}}

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Varient Id</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>color</th>
                                <th>size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orderDetails['items'] as $k=>$order)
                                <tr>
                                    <td>{{ $order['product_id'] }}</td>
                                    <td>{{ $order['product_variant_id'] }}</td>
                                    <td>{{ $order['product']['SKU'] }}</td>
                                    <td>{{ $order['product']['name'] }}</td>
                                    <td>{{ $order['variant']['color'] }}</td>
                                    <td>{{ $order['variant']['size'] }}</td>
                                    <td>{{ $order['product']['price'] }}</td>
                                    <td>{{ $order['quantity'] }}</td>
                                    <td>{{ $order['product']['price'] * $order['quantity'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="flex flex-row">
                            <a href="{{ URL::previous() }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
