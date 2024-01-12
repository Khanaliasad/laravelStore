@extends('layouts.admin')

@section('title', 'Welcome Admin')
@section('page_name', 'All Customrs')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-default collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title mt-2">Add Customers</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    </div>
                    <!-- /.card-body -->

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
                        <h3 class="card-title">All Customers's</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Verified</th>
                                <th>created_at</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($Customers as $customer)
                                <tr>
                                    <td>{{ $customer['id'] }}</td>
                                    <td>{{ $customer['name'] }}</td>
                                    <td>{{ $customer['email'] }}</td>
                                    <td>{{ $customer['role'] }}</td>
                                    <td>{{ $customer['phone'] }}</td>
                                    <td>
                                        <div>
                                            @if(is_null($customer['email_verified_at']))
                                                <ion-icon style='height:2em;width:2em;color:red;' name="alert-circle-outline"></ion-icon>
                                            @else
                                                <ion-icon style='height:2em;width:2em;fill:#0c84ff;'
                                                          name="checkmark-done-circle"></ion-icon>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($customer['created_at'])->format('d/m/Y h:i a') }}</td>
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
