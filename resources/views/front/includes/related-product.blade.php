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