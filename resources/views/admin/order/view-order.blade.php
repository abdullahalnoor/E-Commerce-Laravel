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

                <h1 class="card-title text-center">
                    Customer Information For This Order
                </h1>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <tr>
                            <th>Shipping Name</th>
                            <td>{{ $customer->customer_name }}</td>
                        </tr>
                        <tr>
                            <th> Email</th>
                            <td>{{ $customer->customer_email }}</td>
                        </tr>
                        <tr>
                            <th> Phone</th>
                            <td>{{ $customer->customer_mobile }}</td>
                        </tr>
                        <tr>
                            <th>Address </th>
                            <td>{{ $customer->customer_address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <h1 class="card-title text-center">
                    Shipping Information For This Order
                </h1>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <tr>
                            <th>Shipping Name</th>
                            <td>{{ $shippingInfo->customer_name }}</td>
                        </tr>
                        <tr>
                            <th> Email</th>
                            <td>{{ $shippingInfo->customer_email }}</td>
                        </tr>
                        <tr>
                            <th> Phone</th>
                            <td>{{ $shippingInfo->customer_mobile }}</td>
                        </tr>
                        <tr>
                            <th>Address </th>
                            <td>{{ $shippingInfo->customer_address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>





    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <h1 class="card-title text-center">
                    Product Information Data Table
                </h1>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <tr>
                            <th>SL</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Price  </th>
                            <th>Product Quantity </th>
                            <th> Total Price </th>
                        </tr>
                        @php($i = 1)
                        @foreach($orderProducts as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ 	$product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>{{ $product->product_quantity * $product->product_price }}</td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection