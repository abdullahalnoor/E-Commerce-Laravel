@extends('admin.master')

@section('title')
    Mange Category
@endsection

@section('body')

    <div class="page-title">
        <div>
            <h1><i class="fa fa-table"></i> Order Manage Table</h1>
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
                            <th>Order Id</th>
                            <th>Customer Name</th>
                            <th>Order Total  </th>
                            <th>Order Status </th>
                            <th>Payment Type</th>
                            <th>Payment Status</th>
                            <th>Order Date</th>
                            <th> Action</th>
                        </tr>
                        </thead>

                        @php($i = 1)
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->order_total }}</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td>{{ $order->payment_type }}</td>
                                        <td>{{ $order->payment_status }}</td>
                                        <td>{{date('j M Y , g:ia',strtotime($order->created_at))}}</td>
                                        <td>
                                            <a href="{{ url('/order/view-order/'.$order->id) }}" class="btn btn-primary btn-xs " title="View Order">
                                                <span class="glyphicon glyphicon-zoom-in"></span>
                                            </a>
                                            <a href="{{ url('/order/order-invoice/'.$order->id) }}" class="btn btn-xs btn-info" title="View Order Invoice" >
                                                <span class="glyphicon glyphicon-zoom-in"></span>
                                            </a>
                                            <a href="{{ url('/order/invoice-download/'.$order->id) }}" class="btn btn-xs btn-success" title="Invoice Download">
                                                <span class="glyphicon glyphicon-download"></span>
                                            </a>
                                            <a href="{{ url('/order/edit-order/'.$order->id) }}" class="btn btn-xs btn-warning" title="Edit Order">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a href="{{ url('/order/delete-order/'.$order->id) }}" class="btn btn-xs btn-danger" title="Delete Order">
                                                <span class="glyphicon glyphicon-tash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection