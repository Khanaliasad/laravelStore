@extends('layouts.admin')

@section('title', 'Edit Product')

@if($edit)
    @section('page_name', 'Product Edit')
@else
    @section('page_name', 'Product View')
@endif

@section('content')
    <div class="container-fluid">


        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title"> @if($edit)
                                Edit Product
                            @else
                                View Product
                            @endif</h3>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success mt-2">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger mt-2">
                            {{ session('error') }}
                        </div>
                    @endif
                    <!-- /.card-header -->

                    <div class="card-body">
                        <form method="{{ $edit ? "post" : "get" }}" id="product-Body-form"
                              action="{{ $edit ? route('admin.producteditpost', ['id' => $id]) : "#" }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="name">name</label>
                                        <input required type="text" name="name" class="form-control"
                                               placeholder="Enter ..."
                                               value="{{$productDetail["name"]?$productDetail["name"]:""}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="SKU">SKU</label>
                                        <input required type="text" name="SKU" class="form-control"
                                               placeholder="Enter ..." disabled
                                               value="{{$productDetail["SKU"]?$productDetail["SKU"]:""}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="fabric">fabric</label>
                                        <input required type="text" name="fabric" class="form-control"
                                               placeholder="Enter ..."
                                               value="{{$productDetail["fabric"]?$productDetail["fabric"]:""}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="price">price</label>
                                        <input required type="number" name="price" class="form-control"
                                               placeholder="Enter ..." step="any"
                                               value="{{$productDetail["price"]?$productDetail["price"]:""}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="old_price">old price</label>
                                        <input required type="number" name="old_price" class="form-control"
                                               placeholder="Enter ..." step="any"
                                               value="{{$productDetail["old_price"]?$productDetail["old_price"]:""}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="attribute">attribute</label>
                                        <select name="attribute" class="form-control">
                                            @foreach($attributes as $attribute)
                                                @if($productDetail['attribute']=== $attribute['name'])
                                                    <option selected
                                                            value="{{$attribute['value']}}">{{$attribute['name']}}</option>
                                                @else
                                                    <option
                                                        value="{{$attribute['value']}}">{{$attribute['name']}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="weight">weight</label>
                                        <input required type="number" name="weight" class="form-control"
                                               placeholder="Enter ..." step="any"
                                               value="{{$productDetail["weight"]?$productDetail["weight"]:""}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="detail">Detail</label>
                                        <textarea name="detail" class="form-control" required
                                                  rows="4">{{$productDetail["description"]?$productDetail["description"]:""}}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" required
                                                  rows="3">{{$productDetail["description"]?$productDetail["description"]:""}}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" class="form-control">
                                            @foreach($allCategories as $catagory)
                                                @if($catagory['id']=== $productDetail['category_id'])
                                                    <option value="{{$catagory['id']}}"
                                                            selected>{{$catagory['name']}}</option>
                                                @else
                                                    <option value="{{$catagory['id']}}">{{$catagory['name']}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <button id="addVariantBtn" type="button"
                                                class="form-control btn btn-default btn-success"
                                                @if(!$edit) disabled @endif >
                                            Add Variant
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="variants">

                                @foreach($productDetail['variants'] as $key =>$variant)
                                    <div class="row" id="{{'variant-'.$variant['id']}}">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="card card-default collapsed-card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Variant No:{{$key+1}}</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool delete-variant-btn"
                                                                data-custom-variant-id="{{$variant['id']}}"
                                                                data-custom-remove="{{'variant-'.$variant['id']}}">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label
                                                                    for="{{"variants[".$variant['id']."][id]"}}">{{'ID'.$variant['id']}}</label>
                                                                <input type="hidden"
                                                                       name="{{"variants[".$variant['id']."][id]"}}"
                                                                       value="{{$variant['id']}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <!-- text input -->
                                                            <div class="form-group">
                                                                <label
                                                                    for="{{"variants[".$variant['id']."][color]"}}">color</label>
                                                                <input type="text"
                                                                       name="{{"variants[".$variant['id']."][color]"}}"
                                                                       class="form-control"
                                                                       placeholder="Enter ..."
                                                                       value="{{$variant['color']}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="{{"variants[".$variant['id']."][size]"}}">Sizes</label>
                                                                <select name="{{"variants[".$variant['id']."][size]"}}"
                                                                        class="form-control">
                                                                    @foreach($variantSizes as $variantSize)
                                                                        @if($variantSize=== $variant['size'])
                                                                            <option value="{{$variant['size']}}"
                                                                                    selected>{{$variant['size']}}</option>
                                                                        @else
                                                                            <option
                                                                                value="{{$variantSize}}">{{$variantSize}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label
                                                                    for="{{"variants[".$variant['id']."][stock_quantity]"}}">Stock</label>
                                                                <input type="number"
                                                                       name="{{"variants[".$variant['id']."][stock_quantity]"}}"
                                                                       class="form-control"
                                                                       placeholder="Enter ..."
                                                                       value="{{$variant['stock_quantity']}}">

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card card-default">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Variant images</h3>
                                                                    <a href="{{route('admin.uploadImage',$variant['id'])}}"
                                                                       target="blank"
                                                                       class="btn btn-primary float-right">
                                                                        <i class="fas fa-upload"></i>
                                                                        <span>Add</span>
                                                                    </a>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="table table-striped files"
                                                                         id="{{'previews'.$key}}">
                                                                        @foreach($variant['images'] as $index=> $image)
                                                                            <div id="{{'template'.$key.$index}}"
                                                                                 class="row mt-2">
                                                                                <div class="col-auto">
                                                                            <span class="preview"><img
                                                                                    src="{{asset($image['image_path'])}}"
                                                                                    width="80px" height="80px"
                                                                                    alt="{{substr($image['image_path'],13)}}"
                                                                                    data-dz-thumbnail/></span>
                                                                                </div>
                                                                                <div
                                                                                    class="col d-flex align-items-center">
                                                                                    <p class="mb-0">
                                                                                    <span class="lead"
                                                                                          data-dz-name>{{substr($image['image_path'],13)}}</span>
                                                                                    </p>
                                                                                    <strong class="error text-danger"
                                                                                            data-dz-errormessage></strong>
                                                                                </div>
                                                                                <div
                                                                                    class="col-auto d-flex align-items-center">
                                                                                    <div class="btn-group">

                                                                                        <a href="{{route('admin.deleteImage',$image['id'])}}}"
                                                                                           class="btn btn-danger delete">
                                                                                            <i class="fas fa-trash"></i>
                                                                                            <span>Delete</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="flex flex-row">
                        <a href="{{ URL::previous() }}" class="btn btn-secondary">Back</a>
                        <button type="submit" form="product-Body-form" class="btn btn-primary float-right"
                                @if(!$edit) disabled @endif >Submit
                        </button>
                    </div>
                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
        </div>
    </div>
    </div>
@endsection
@section('end_script')
    <script>
        $(document).ready(function () {
            // removing variant handler
            $(document).on('click', '.delete-variant-btn', function () {
                // Get the value of data-custom-remove attribute
                var customRemoveValue = $(this).data('custom-remove');
                var VariantID = $(this).data('custom-variant-id');

                console.log("customRemoveValue:", customRemoveValue, "custom-variant-id;", VariantID)

                if (VariantID !== undefined) {
                    deleteProductVariant(VariantID, customRemoveValue)
                        .done(function (response) {
                            if (response.success) {
                                successToast(response.data.message);
                                // Remove the div with the corresponding id
                                $('#' + customRemoveValue).remove();
                            } else {
                                errorToast(response.data.message);
                            }
                        })
                        .fail(function (xhr, status, error) {
                            console.log(xhr.responseText);
                            console.log(xhr, status, error);
                        });
                } else {
                    // Remove the div with the corresponding id
                    $('#' + customRemoveValue).remove();
                }
                // remove variant api call
            });

            //end variant handler

            function deleteProductVariant(id) {
                const API_Url = "{{ route('admin.productvariantdelete', ['id' => ':id']) }}";
                const url = API_Url.replace(':id', id);
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                console.log(url);
                return $.ajax({
                    url: url,
                    type: "POST",
                    dataType: 'JSON',
                    data: {
                        '_token': csrfToken
                    }
                });
            }


            // Function to handle the click event of the "Add Variant" button
            $("#addVariantBtn").click(function (e) {
                // Prevent the default form submission
                e.preventDefault();
                var numberOfChildren = $("#variants").children().length + 1;
                var productId = {{$id}};
                var newVariantRow =
                    '<div id="variant-' + (numberOfChildren) + '" class="row">' +
                    '<div class="col-md-2"></div>' +
                    '<div class="col-md-8">' +
                    '<div class="card card-default">' +
                    '<div class="card-header">' +
                    '<h3 class="card-title">New Variant No:' + (numberOfChildren) + '</h3>' +
                    '<div class="card-tools">' +
                    '<button type="button" class="btn btn-tool" data-card-widget="collapse">' +
                    '<i class="fas fa-minus"></i>' +
                    '</button>' +
                    '<button type="button" class="btn btn-tool delete-variant-btn"  data-custom-remove="variant-' + (numberOfChildren) + '">' +
                    '<i class="fas fa-times"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '<div class="card-body">' +
                    '<div class="row">' +
                    '<div class="col-sm-12">' +
                    '<div class="form-group">' +
                    '<input type="hidden" name="new_variant[' + (numberOfChildren) + '][product_id]" required class="form-control" value="' + productId + '" >' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-sm-12">' +
                    '<div class="form-group">' +
                    '<label for="new_variant[' + (numberOfChildren) + '][color]">color</label>' +
                    '<input type="text" name="new_variant[' + (numberOfChildren) + '][color]" required class="form-control" placeholder="Enter ..." >' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-sm-6">' +
                    '<div class="form-group">' +
                    '<label for="new_variant[' + (numberOfChildren) + '][size]">Sizes</label>' +
                    '<select name="new_variant[' + (numberOfChildren) + '][size]" class="form-control"> required' +
                    '@foreach($variantSizes as $variantSize)' +
                    '<option value="{{$variantSize}}">{{$variantSize}}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-6">' +
                    '<div class="form-group">' +
                    '<label for="new_variant[' + (numberOfChildren) + '][stock_quantity]">Stock</label>' +
                    '<input type="number" name="new_variant[' + (numberOfChildren) + '][stock_quantity]" class="form-control" placeholder="Enter ..." required>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-md-12">' +
                    '<div class="card card-default">' +
                    '<div class="card-header">' +
                    '<h3 class="card-title">Variant images</h3>' +
                    '<a href="#" class="btn btn-primary float-right" >' +
                    '<i class="fas fa-upload"></i>' +
                    '<span>Add</span>' +
                    '</a>' +
                    '</div>' +
                    '<div class="card-body">' +
                    '<div class="table table-striped files" >' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                $("#variants").append(newVariantRow);
            });
        });
    </script>
@endsection
