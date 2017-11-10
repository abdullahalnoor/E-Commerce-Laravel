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
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h1 class="text-primary text-center text-uppercase">Log in</h1>
                    @if($message = Session::get('message'))
                        <h3 class="text-danger">{{ $message }}</h3>
                        @endif
                    <br>
                    <br>
                    <form class="form-horizontal" action="{{ url('/customer-login') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-2">Email </label>
                            <div class="col-md-10">
                                <input name="customer_email" type="email" required="" placeholder="Email Address" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">Password </label>
                            <div class="col-md-10">
                                <input name="customer_password" type="password" required="" placeholder="Password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2"> </label>
                            <div class="col-md-10">
                                <input type="submit" name="btn" value="Sign in " class="bnt btn-block btn-success"/>
                            </div>
                        </div>


                    </form>

                </div>
                <div class="col-md-7">
                    <h1 class="text-primary text-center text-uppercase">Registration Form</h1>
                    <br>
                    <br>
                    <form class="form-horizontal" action="{{ url('/customer-registration') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-2">Name</label>
                            <div class="col-md-10">
                            <input name="customer_name" type="text" required="" placeholder="Name" class="form-control ">
                            <span>{{ $errors->has('customer_name') ?$errors->first('customer_name') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">Email </label>
                            <div class="col-md-10">
                            <input name="customer_email" type="email" required="" placeholder="Email Address" class="form-control">
                            <span>{{ $errors->has('customer_email') ?$errors->first('customer_email') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">Password </label>
                            <div class="col-md-10">
                            <input name="customer_password" type="password" required="" placeholder="Password" class="form-control">
                            <span>{{ $errors->has('customer_password') ?$errors->first('customer_password') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">Mobile</label>
                            <div class="col-md-10">
                            <input name="customer_mobile" type="number" required="" class="form-control" placeholder="Phone Number" >
                            <span>{{ $errors->has('customer_mobile') ?$errors->first('customer_mobile') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2">Address</label>
                            <div class="col-md-10">
                            <textarea name="customer_address" class="form-control" rows="9" placeholder="Write Your Address "></textarea>
                            <span>{{ $errors->has('customer_address') ?$errors->first('customer_address') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2"> </label>
                            <div class="col-md-10">
                                <input type="submit" name="btn" value="Create Account" class="bnt btn-block btn-success"/>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>



@endsection