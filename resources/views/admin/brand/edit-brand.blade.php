@extends('admin.master')

@section('title')
    Update Brand
@endsection

@section('body')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-edit"></i>Update Brand Form </h1>
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
                <h3 class="card-title">Update Brand</h3>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ url('/brand/update-brand') }}" method="post" name="editBrandForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Brand Name</label>
                            <div class="col-md-8">
                                <input name="brand_name" class="form-control" type="text" value="{{ $brand->brand_name }}">
                                <input name="brand_id" class="form-control" type="hidden" value="{{ $brand->id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Brand Description</label>
                            <div class="col-md-8">
                                <textarea name="brand_description" class="form-control" rows="4" required>{{ $brand->brand_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Publication Status</label>
                            <div class="col-md-8">
                                <select name="publication_status" class="form-control" required>
                                    <option> Change publication status</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <button class="btn btn-primary icon-btn" type="submit" name="btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Category </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
        document.forms['editBrandForm'].elements['publication_status'].value = '{{ $brand->publication_status }}'
    </script>

@endsection