@extends('front.master')

@section('body')
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>Cart </li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- about -->
    <div class="about">
        <div class="container">
            <div class="w3ls_about_grids">
                <div class="col-md-9 w3ls_about_grid_left">
                   <h2 class="text-center text-success">Shopping Cart Products</h2>
                    <br><br>
                    <div class="col-xs-12 w3ls_about_grid_left2">
                        @php($i = 1)
                            @php($sum = 0)
                        @if($cartProducts->count() >0 )
                        <table class="table table-bordered ">
                            <tr class="text-info">
                                <th>SL</th>
                                <th>Product Id</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Total Price</th>
                                <th>Action</th>

                            </tr>

                            @foreach($cartProducts as $cartProduct)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $cartProduct->id }}</td>
                                <td>
                                    <img src="{{ asset($cartProduct->options->image) }}" style="height: 80px;width: 80px;">
                                </td>
                                <td>{{ $cartProduct->name }}</td>
                                <td>{{ $cartProduct->price }}</td>
                                <td>
                                    <form action="{{ url('/update-cart-product') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="number"  name="qty" value="{{ $cartProduct->qty }}" min="1">
                                        <input type="hidden" name="rowId" value="{{ $cartProduct->rowId }}">
                                        <input type="submit" name="btn" value="Update">
                                    </form>
                                </td>
                                <td>{{ $total = $cartProduct->price*$cartProduct->qty  }}</td>
                                <td>
                                    <a href="{{ url('/remove-cart-item/'.$cartProduct->rowId) }}"
                                       onclick="return confirm('Do you want to remove this item from Your Cart ??')"
                                       class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                                @php($sum = $sum + $total)
                                @endforeach

                        </table>
                            @else
                            <div class="well bg-success">
                            <h1 class="text-center text-warning text-uppercase">No product is adding yet !!</h1>
                            <h1 class="text-center text-info text-uppercase">Please Add products to Cart !!</h1>
                            </div>
                        @endif



                    </div>
                    <div class="clearfix"> </div>

                </div>
                <div class="col-md-3 w3ls_about_grid_right">
                    <h2 class="text-center text-success text-capitalize">price Table</h2><br>
                    <table class="table table-bordered">

                        <tr>
                            <td>Sub Totlal</td>
                            <td>Tk.{{ $sum }}</td>
                        </tr><tr>
                            <td>Discount </td>
                            <td>Tk.{{ $discount = 0 }}</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td>Tk.{{ $tax = 0 }}</td>
                        </tr>
                        <tr>
                            <td> Grand Total</td>
                            <td>Tk.{{ $grandTotal = ($sum - $discount)+ $tax}}</td>
                            {{ Session::put('grandTotal',$grandTotal) }}
                        </tr>

                    </table>
                    <table class="table">
                        <tr>
                            <td><a href="" class="btn btn-block btn-success">Continue Shopping </a></td>
                            @if(Session::get('customerId'))
                                <td><a href="{{ url('/shipping-info') }}" class="btn btn-block btn-info" > Checkout </a></td>
                                @else
                                <td><a href="{{ url('/checkout') }}" class="btn btn-block btn-info" > Checkout </a></td>
                            @endif
                        </tr>
                    </table>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //about -->
@endsection