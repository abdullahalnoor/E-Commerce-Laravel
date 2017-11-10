@extends('admin.master')

@section('title')
    Add Category
@endsection

@section('body')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-plus" aria-hidden="true"></i> Add Category Form </h1>
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
                <h3 class="card-title">Add Category</h3>
                <div class="card-body">
                    @if($message = Session::get('message'))
                    <h2 class="text-center text-success">{{ $message }}</h2>
                    @endif
                    <form class="form-horizontal" action="{{ url('/category/new-category') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-3">Category Name</label>
                            <div class="col-md-8">
                                <input name="category_name" class="form-control" type="text" placeholder="Enter full name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Category Description</label>
                            <div class="col-md-8">
                                <textarea name="category_description" class="form-control" rows="4" placeholder="Enter your address" required></textarea>
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
                            <button class="btn btn-primary icon-btn" type="submit" name="btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Category</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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