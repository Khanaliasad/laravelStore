@extends('layouts.admin')

@section('title', 'Welcome Admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit catagory</h3>
                    </div>
                    <!-- /.card-header -->

                    <form method="post" action="{{ route('admin.categoryeditpost', ['id' => $id]) }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="name">name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter ..."
                                               value="{{$data["name"]?$data["name"]:""}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" rows="3">{{$data["description"]?$data["description"]:""}}</textarea>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="flex flex-row">
                                <a  href="{{ URL::previous() }}"class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary  float-right">Submit</button>
                            </div>
                        </div>
                    </form>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- general form elements disabled -->
            </div>
        </div>
    </div>

@endsection
