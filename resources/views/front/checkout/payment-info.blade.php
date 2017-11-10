@extends('front.master')

@section('body')
    <!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>Products</li>
            </ul>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- //breadcrumbs -->

    <h3 class="text-center text-info">Plese choose a payment options </h3><br>
        <hr/>
    <br>
    <br>
    <div class="container">
        <div class="roe">
            <div class="col-sm-8 col-md-offset-2">
                <form action="{{ url('/new-order') }}" method="post">
                    {{ csrf_field() }}
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <td>Cash on Delivery </td>
                            <td><input type="radio" name="payment_type" value="Cash on Delivery"> </td>
                        </tr>
                        <tr>
                            <td>BKash   </td>
                            <td><input type="radio" name="payment_type" value="BKash"> </td>
                        </tr>
                        <tr>
                            <td>Paypal  </td>
                            <td><input type="radio" name="payment_type" value="Paypal"> </td>
                        </tr>
                    </table>
                    <input type="submit" name="btn" value="Confirm Your Order" class="btn btn-success">
                </form>

            </div>
        </div>
    </div>



@endsection