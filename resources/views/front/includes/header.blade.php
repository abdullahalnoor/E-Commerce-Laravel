<div class="header" id="home1">
    <div class="container">
        <div class="">

            @if(Session::get('customerId'))
                <a href="{{ url('/customer-logout') }}" class="btn btn-danger ">Sign Out</a>
                <a class="btn btn-default">{{ Session::get('customerName') }}</a>
            @else
                <a href="#" class="btn btn-success ">Sig In</a>
                <a href="#" class="btn btn-info ">Sig Up</a>
           @endif
            {{--<a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>--}}

        </div>

        <div class="w3l_logo">
             <h1><a href="index.html">Electronic Store<span>Your stores. Your place.</span></a></h1>
        </div>
        <div class="search">
            <input class="search_box" type="checkbox" id="search_box">
            <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
            <div class="search_form">
                <form action="#" method="post">
                    <input type="text" name="Search" placeholder="Search...">
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
        <div class="cart cart box_1">
            {{--<form action="#" method="post" class="last">--}}
                {{--<input type="hidden" name="cmd" value="_cart" />--}}
                {{--<input type="hidden" name="display" value="1" />--}}
                {{--<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>--}}
            {{--</form>--}}
            @if(Session::get('grandTotal'))
                <a href="{{ url('/show-cart') }}" class="w3view-cart" style="width: 120px;height:60px; color: white;" ><i class="fa fa-cart-arrow-down"></i><br>Tk.{{ Session::get('grandTotal') }}</a>
            @else
                <a href="{{ url('/show-cart') }}" class="w3view-cart" style="width: 80px;" ><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
                @endif

        </div>
    </div>
</div>