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
 <h1 class="text-center"><strong>Welcome</strong> <span class="text-success">{{ Session::get('customerName') }}</span></h1>
    <hr/>
 <h3 class="text-center text-info">Provide Us Your Shipping Info</h3><br>
    <h4 class="text-center text-info text-danger">
        If Your Billing Info and Shipping are same just click<br><br>
        <strong>Save Shipping Info</strong>
    </h4>
<br>
<br>
    <div class="container">
        <div class="roe">
            <div class="col-sm-8 col-md-offset-2">
                <form class="form-horizontal" action="{{ url('/new-shipping') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-2">Name</label>
                        <div class="col-md-10">
                            <input name="customer_name" value="{{$customer->customer_name}}" type="text" required="" placeholder="Name" class="form-control ">
                            <span>{{ $errors->has('customer_name') ?$errors->first('customer_name') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">Email </label>
                        <div class="col-md-10">
                            <input name="customer_email" value="{{$customer->customer_email}}" type="email" required="" placeholder="Email Address" class="form-control">
                            <span>{{ $errors->has('customer_email') ?$errors->first('customer_email') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">Mobile</label>
                        <div class="col-md-10">
                            <input name="customer_mobile" value="{{$customer->customer_mobile}}" type="number" required="" class="form-control" placeholder="Phone Number" >
                            <span>{{ $errors->has('customer_mobile') ?$errors->first('customer_mobile') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2">Address</label>
                        <div class="col-md-10">
                            <textarea name="customer_address"  class="form-control" rows="9" placeholder="Write Your Address ">{{$customer->customer_address}}</textarea>
                            <span>{{ $errors->has('customer_address') ?$errors->first('customer_address') : ''}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2"> </label>
                        <div class="col-md-10">
                            <input type="submit" name="btn" value="Save Shipping Info" class="bnt btn-block btn-success"/>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>



@endsection