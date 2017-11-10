@extends('admin.master')

@section('title')
    Add Product
@endsection

@section('body')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-plus" aria-hidden="true"></i> Add Product Form </h1>
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
                <h3 class="card-title">Add Product</h3>
                <div class="card-body">
                    @if($message = Session::get('message'))
                        <h2 class="text-center text-success">{{ $message }}</h2>
                    @endif
                    <form class="form-horizontal" action="{{ url('/product/new-product') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-3">Product Name</label>
                            <div class="col-md-8">
                                <input name="product_name" class="form-control" type="text" placeholder="Product  Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Product Category</label>
                            <div class="col-md-8">
                                <select name="category_id" class="form-control" required>
                                    <option> Select publication status</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Product Brand</label>
                            <div class="col-md-8">
                                <select name="brand_id" class="form-control" required>
                                    <option> Select publication status</option>
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Product  Info</label>
                            <div class="col-md-8">
                                <textarea name="product_info" class="form-control" rows="4" placeholder="Write  Product Info" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Product Details </label>
                            <div class="col-md-8">
                                <textarea name="product_details" class="form-control" rows="4" placeholder="Write  Product Details" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Product Image</label>
                            <div class="col-md-8">
                                <input name="product_image" class="form-control" type="file" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Product Sub Images</label>
                            <div class="col-md-8">
                                <input name="sub_image[]" class="form-control" type="file" accept="image/*" multiple>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Product Quantity</label>
                            <div class="col-md-8">
                                <input name="product_quantity" class="form-control col-md-8" type="number" placeholder=" Product Quantity ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Product Price</label>
                            <div class="col-md-8">
                                <input name="product_price" class="form-control col-md-8" type="number" placeholder=" Product Price ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Publication Status</label>
                            <div class="col-md-8">
                                <select name="publication_status" class="form-control" required>
                                    <option> Select publication status</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <button class="btn btn-primary icon-btn" type="submit" name="btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Product</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearix"></div>

    </div>


@endsection