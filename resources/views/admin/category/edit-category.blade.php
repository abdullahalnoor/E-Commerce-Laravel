@extends('admin.master')

@section('title')
    Update Category
@endsection

@section('body')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-edit"></i>Update Category Form </h1>
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
                <h3 class="card-title">Update Category</h3>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ url('/category/update-category') }}" method="post" name="editCategoryForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Category Name</label>
                            <div class="col-md-8">
                                <input name="category_name" class="form-control" type="text" value="{{ $category->category_name }}">
                                <input name="category_id" class="form-control" type="hidden" value="{{ $category->id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Change Category Description</label>
                            <div class="col-md-8">
                                <textarea name="category_description" class="form-control" rows="4" required>{{ $category->category_description }}</textarea>
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
        document.forms['editCategoryForm'].elements['publication_status'].value = '{{ $category->publication_status }}'
    </script>

@endsection