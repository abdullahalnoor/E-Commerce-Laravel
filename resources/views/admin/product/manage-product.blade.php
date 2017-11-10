@extends('admin.master')

@section('title')
    Mange Product
@endsection

@section('body')

    <div class="page-title">
        <div>
            <h1><i class="fa fa-table"></i> Product Manage Table</h1>
            <p></p>
        </div>
        <div>
            <ul class="breadcrumb side">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li>Tables</li>
                <li class="active"><a href="#">Data Table</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($message = Session::get('message'))
                    <h2 class="text-center text-success">{{ $message }}</h2>
                @endif
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Category </th>
                            <th>Brand </th>
                            <th>Publication Status</th>
                            <th>Creation date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php( $i = 1)
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $i++ }} </td>
                                    <td> {{ $product->product_name }}</td>
                                    <td> {{ $product->category_name }}</td>
                                    <td> {{ $product->brand_name }}</td>
                                    <td> {{ $product->publication_status == 1 ?'Published' :'Unpublished'}}</td>
                                    <td> {{ date('F d,Y',strtotime($product->created_at ))}}</td>
                                    <td>
                                        @if($product->publication_status == 1)
                                            <a href="{{ url('/product/unpublished-product/'.$product->id) }}" class="btn btn-xs btn-primary">
                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                            </a>
                                        @else
                                            <a href="{{ url('/product/published-product/'.$product->id) }}" class="btn btn-xs btn-warning">
                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                            <a href="{{ url('/product/view-product/'.$product->id) }}" target="_blank" class="btn btn-xs btn-success"">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        <a href="{{ url('/product/edit-product/'.$product->id) }}" class="btn btn-xs btn-info">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>

                                          <a href="{{ url('/product/delete-product/'.$product->id) }}" class="btn btn-xs btn-danger"
                                           onclick="return confirm('Are you sure to delete this ?')">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection