@extends('admin.master')

@section('title')
    Update Product
@endsection

@section('body')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-edit"></i>Update Product Form </h1>
            <p> </p>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li>Forms</li>
                <li><a href="#">Sample Forms</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <h3 class="card-title">Update Product</h3>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ url('/product/update-product') }}" enctype="multipart/form-data" method="post" name="editProductForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Product Name</label>
                            <div class="col-md-8">
                                <input name="product_name" value="{{ $product->product_name }}" class="form-control" type="text" >
                                <input name="id" value="{{ $product->id }}" class="form-control" type="hidden" >

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Product Category</label>
                            <div class="col-md-8">
                                <select name="category_id" class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Product Brand</label>
                            <div class="col-md-8">
                                <select name="brand_id" class="form-control" required>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Product Info</label>
                            <div class="col-md-8">
                                <textarea name="product_info" class="form-control" rows="4" required>{{ $product->product_info }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Product Details</label>
                            <div class="col-md-8">
                                <textarea name="product_details" class="form-control" rows="4" required>{{ $product->product_details }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Product Image</label>
                            <div class="col-md-8">
                                <img src="{{ asset($product->product_image ) }}" style="height: 80px; width:120px;"><br><br>
                                <input name="product_image"  class="form-control" type="file"  accept="image/*">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Product Sub Images</label>
                            <div class="col-md-8">
                                @foreach($subImages as $subImage)
                                <img src="{{ asset($subImage->sub_image ) }}" style="height: 80px; width:120px;">
                                @endforeach<br><br>
                                <input name="sub_image[]"  class="form-control" type="file" accept="image/*" multiple required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Product Quantity</label>
                            <div class="col-md-8">
                                <input name="product_quantity" value="{{ $product->product_quantity }}" class="form-control" type="number" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Product Price</label>
                            <div class="col-md-8">
                                <input name="product_price" value="{{ $product->product_price }}" class="form-control" type="number" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Publication Status</label>
                            <div class="col-md-8">
                                <select name="publication_status" class="form-control" required>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <button class="btn btn-primary icon-btn" type="submit" name="btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Product </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearix"></div>

    </div>

    <script>
        document.forms['editProductForm'].elements['publication_status'].value = '{{ $product->publication_status }}'
    </script>

@endsection