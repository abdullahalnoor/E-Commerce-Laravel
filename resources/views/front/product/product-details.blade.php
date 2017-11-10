@extends('front.master')

@section('body')
    <!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <ul>
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
                <li>Single Page</li>
            </ul>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- single -->
    <div class="single">
        <div class="container">
            <div class="col-md-4 single-left">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach($subImages as $subImage)
                        <li data-thumb="{{asset($subImage->sub_image)}}">
                            <div class="thumb-image"> <img src="{{asset($subImage->sub_image)}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                        </li>
                            @endforeach
                    </ul>
                </div>
                <!-- flexslider -->
                <script defer src="{{asset('/front')}}/js/jquery.flexslider.js"></script>
                <link rel="stylesheet" href="{{asset('/front')}}/css/flexslider.css" type="text/css" media="screen" />
                <script>
                    // Can also be used with $(document).ready()
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                        });
                    });
                </script>
                <!-- flexslider -->
                <!-- zooming-effect -->
                <script src="{{asset('/front')}}/js/imagezoom.js"></script>
                <!-- //zooming-effect -->
            </div>
            <div class="col-md-8 single-right">
                <h3>{{$productDetails->product_name}}</h3>
                <div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked>
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
                </div>
                <div class="description">
                    <h5><i>Description</i></h5>
                    <p>{{ $productDetails->product_details }}</p>
                </div>
                 <div class="simpleCart_shelfItem">
                    <p><span></span> <i class="item_price">{{ $productDetails->product_price }}</i></p>

                    <form action="{{ url('/add-to-cart') }}" method="post">
                        {{ csrf_field() }}
                         <input type="number" name="qty" value="1" min="1">
                         <input type="hidden" name="product_id" value="{{$productDetails->id}}" min="1">
                        <input type="submit"  name="btn" value="Add to cart" class="">
                    </form>

                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="additional_info">
        <div class="container">
            <div class="sap_tabs">
                <div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
                    <ul>
                        <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Information</span></li>
                        <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
                    </ul>
                    <div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
                        <h3>The Best 3GB RAM Mobile Phone</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                            eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                            odit aut fugit, sed quia consequuntur magni dolores eos qui
                            ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum
                            exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea
                            commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate
                            velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat
                            quo voluptas nulla pariatur.</p>
                    </div>

                    <div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
                        <h4>(2) Reviews</h4>
                        <div class="additional_info_sub_grids">
                            <div class="col-xs-2 additional_info_sub_grid_left">
                                <img src="{{asset('/front')}}/images/t1.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="col-xs-10 additional_info_sub_grid_right">
                                <div class="additional_info_sub_grid_rightl">
                                    <a href="single.html">Laura</a>
                                    <h5>Oct 06, 2016.</h5>
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate
                                        velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat
                                        quo voluptas nulla pariatur.</p>
                                </div>
                                <div class="additional_info_sub_grid_rightr">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="{{asset('/front')}}/images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="{{asset('/front')}}/images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="{{asset('/front')}}/images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="{{asset('/front')}}/images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="{{asset('/front')}}/images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="additional_info_sub_grids">
                            <div class="col-xs-2 additional_info_sub_grid_left">
                                <img src="{{asset('/front')}}/images/t2.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="col-xs-10 additional_info_sub_grid_right">
                                <div class="additional_info_sub_grid_rightl">
                                    <a href="single.html">Michael</a>
                                    <h5>Oct 04, 2016.</h5>
                                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate
                                        velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat
                                        quo voluptas nulla pariatur.</p>
                                </div>
                                <div class="additional_info_sub_grid_rightr">
                                    <div class="rating">
                                        <div class="rating-left">
                                            <img src="{{asset('/front')}}/images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="{{asset('/front')}}/images/star-.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="{{asset('/front')}}/images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="{{asset('/front')}}/images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="rating-left">
                                            <img src="{{asset('/front')}}/images/star.png" alt=" " class="img-responsive">
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="review_grids">
                            <h5>Add A Review</h5>
                            <form action="#" method="post">
                                <input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                                <input type="email" name="Email" placeholder="Email" required="">
                                <input type="text" name="Telephone" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
                                <textarea name="Review" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
                                <input type="submit" value="Submit" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{asset('/front')}}/js/easyResponsiveTabs.js" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#horizontalTab1').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });
                });
            </script>
        </div>
    </div>



    {{--@include('front.includes.related-product')--}}



    <!-- Related Products -->
    <div class="w3l_related_products">
        <div class="container">
            <h3>Related Products</h3>
            <ul id="flexiselDemo2">
                @foreach($categoryProducts as $categoryProduct)
                <li>
                    <div class="w3l_related_products_grid">
                        <div class="agile_ecommerce_tab_left mobiles_grid">
                            <div class="hs-wrapper hs-wrapper3">
                                <img src="{{ asset($categoryProduct->product_image) }}" alt=" " class="img-responsive" />

                                <div class="w3_hs_bottom">
                                    <div class="flex_ecommerce">
                                        <a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                    </div>
                                </div>
                            </div>
                            <h5><a href="{{ url('/product-details/'.$categoryProduct->id) }}">{{ $categoryProduct->product_name }} </a></h5>
                            <div class="simpleCart_shelfItem">
                                <p class="flexisel_ecommerce_cart"><span></span> <i class="item_price">Tk.{{  $categoryProduct->product_price}}</i></p>
                                <form action="#" method="post">
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="w3ls_item" value="Kid's Toy">
                                    <input type="hidden" name="amount" value="">
                                    <button type="submit" class="w3ls-cart">Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
               @endforeach
            </ul>


        </div>
    </div>
    <!-- //Related Products -->
    <script type="text/javascript">
        $(window).load(function() {
            $("#flexiselDemo2").flexisel({
                visibleItems:4,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint:568,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint:667,
                        visibleItems:2
                    },
                    tablet: {
                        changePoint:768,
                        visibleItems: 3
                    }
                }
            });

        });
    </script>
    <script type="text/javascript" src="{{ asset('/front') }}/js/jquery.flexisel.js"></script>
    <!-- cart-js -->
    <script src="{{ asset('/front') }}/js/minicart.js"></script>

@endsection