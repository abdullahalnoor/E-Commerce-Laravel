@extends('admin.master')

@section('title')
    Mange Brand
@endsection

@section('body')

    <div class="page-title">
        <div>
            <h1><i class="fa fa-table"></i> Brand Manage Table</h1>
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

                <div class="card-body">
                    @if($message = Session::get('message'))
                        <h2 class="text-center text-success">{{ $message }}</h2>
                    @endif
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Publication Status</th>
                            <th>Creation date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php( $i = 1)
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $i++ }} </td>
                                    <td> {{ $brand->brand_name }}</td>
                                    <td> {{ $brand->brand_description }}</td>
                                    <td> {{ $brand->publication_status == 1 ?'Published' :'Unpublished'}}</td>
                                    <td> {{ date('F d,Y',strtotime($brand->created_at ))}}</td>
                                    <td>
                                        @if($brand->publication_status == 1)
                                            <a href="{{ url('/brand/unpublished-brand/'.$brand->id) }}" class="btn btn-xs btn-primary">
                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                            </a>
                                        @else
                                            <a href="{{ url('/brand/published-brand/'.$brand->id) }}" class="btn btn-xs btn-warning">
                                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                        <a href="{{ url('/brand/edit-brand/'.$brand->id) }}" class="btn btn-xs btn-info">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ url('/brand/delete-brand/'.$brand->id) }}" class="btn btn-xs btn-danger"
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

    <script type="text/javascript" src="{{ asset('/admin') }}/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('/admin') }}/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection