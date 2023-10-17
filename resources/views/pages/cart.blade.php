@extends('layouts.app') @section('content')
    <section id="main">
        <div class="container_12">
            <div id="content" class="grid_12">
                <header>
                    <h1 class="page_title">Shopping cart</h1>
                </header>

                <article>
                    <div class="table-container">
                        <table class="cart_product">
                            <tr class="bg">
                                <th class="images"></th>
                                <th class="name">Product Name</th>
                                <th class="name">Color</th>
                                <th class="name">Size</th>
                                <th class="price">Unit Price</th>
                                <th class="qty">Qty</th>
                                <th class="subtotal">Subtotal</th>
                                <th class="close"></th>
                            </tr>
                            <tr>
                                <td class="images"><a href="/product_page.html"><img src="img/content/product12.png"
                                                                                     alt="Product 12" title=""></a></td>
                                <td class="name">Paddywax Fragrance Diffuser Set, Gardenia Tuberose, Jasmine, 4-Ounces
                                </td>
                                <td class="price">$75.00</td>
                                <td class="qty"><input type="text" name="" value="" placeholder="1000"></td>
                                <td class="subtotal">$750.00</td>
                                <td class="close"><a title="close" class="close" href="#"></a></td>
                            </tr>
                            <tr>
                                <td class="images"><a href="/product_page.html"><img src="img/content/product10.png"
                                                                                     alt="Product 10" title=""></a></td>
                                <td class="name">California Scents Spillproof Organic Air Fresheners, Coronado Cherry,
                                    1.5
                                    Ounce Cannister
                                </td>
                                <td class="price">$75.00</td>
                                <td class="qty"><input type="text" name="" value="" placeholder="1000"></td>
                                <td class="subtotal">$750.00</td>
                                <td class="close"><a title="close" class="close" href="#"></a></td>
                            </tr>
                            <tr>
                                <td colspan="7" class="cart_but">
                                    <a href="{{ URL::previous() }}" class="continue"><img src="img/cont.png" alt=""
                                                                                          title=""> Continue
                                        Shopping</a>
                                    <a href="{{route('cart')}}" class="update"><img src="img/update.png" alt=""
                                                                                    title="">
                                        Update Shopping Cart</a>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div id="cart_forms" class="negative-grid">
                        <div class="grid_4">
                            <div class="bottom_block discount">
                                <h3>Privacy Policy</h3>
                                <p>Enter your destination to get a shipping estimate.</p>
                                <ul>
                                    <li><p>lorem</p></li>
                                    <li><p>lorem</p></li>
                                    <li><p>lorem</p></li>
                                </ul>

                            </div><!-- .estimate -->
                        </div><!-- .grid_4 -->

                        <div class="grid_4">
                            <div class="bottom_block discount">
                                <h3>Return policy</h3>
                                <p>Enter your coupon code if you have one.</p>
                                <ul>
                                    <li><p>lorem</p></li>
                                    <li><p>lorem</p></li>
                                    <li><p>lorem</p></li>
                                </ul>
                            </div><!-- .discount -->
                        </div><!-- .grid_4 -->

                        <div class="grid_4">
                            <div class="bottom_block total">
                                <table class="subtotal">
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="price">$1, 500.00</td>
                                    </tr>
                                    <tr class="grand_total">
                                        <td>Grand Total</td>
                                        <td class="price">$1, 500.00</td>
                                    </tr>
                                </table>
                                <a href="{{route('checkout')}}">
                                    <button class="checkout">PROCEED TO CHECKOUT <img src="img/checkout.png" alt=""
                                                                                      title=""></button>
                                </a>
                            </div><!-- .total -->
                        </div><!-- .grid_4 -->

                        <div class="clear"></div>
                    </div><!-- #cart_forms -->
                    <div class="clear"></div>
                </article>

                <div class="related negative-grid">
                    <div class="c_header grid">
                        <div class="grid_10 alpha">
                            <h2>Related Products</h2>
                        </div><!-- .grid_10 -->

                        <div class="grid_2 omega">
                            <a id="next_c1" class="next arows" href="#"><span>Next</span></a>
                            <a id="prev_c1" class="prev arows" href="#"><span>Prev</span></a>
                        </div><!-- .grid_2 -->
                    </div><!-- .c_header -->

                    <div class="related_list">
                        <ul id="listing" class="products">
                            @foreach($Products as $relatedProduct)
                                <li>
                                    <article class="grid_3 article">
                                        @if($relatedProduct['attribute'])
                                            <img class="sale"
                                                 src="{{ asset('img/'.$relatedProduct['attribute'].'.png') }}"
                                                 alt="Sale">
                                        @endif
                                        <div class="prev">
                                            <a href="{{route('product.page',$relatedProduct['id'])}}"><img
                                                        src="{{ asset($relatedProduct['variants'][0]['images'][0]['image_path']) }}"
                                                        alt="{{$relatedProduct['name']}}"
                                                        title="{{$relatedProduct['name']}}"></a>
                                        </div><!-- .prev -->

                                        <h3 class="title">{{$relatedProduct['name']}}</h3>
                                        <div class="cart">
                                            <div class="price">
                                                <div class="vert">
                                                    Rs {{$relatedProduct['price']}}
                                                    <div class="price_old">Rs {{$relatedProduct['old_price']}}</div>
                                                </div>
                                            </div>
                                            <a href="{{route('product.page',$relatedProduct['id'])}}" class="bay"><img
                                                        src="{{ asset('img/bg_cart.png') }}"
                                                        alt="Buy" title=""></a>
                                        </div><!-- .cart -->
                                    </article><!-- .grid_3.article -->
                                </li>

                            @endforeach
                        </ul><!-- #listing -->
                    </div><!-- .brands_list -->
                </div><!-- .related -->

                <div class="clear"></div>
            </div><!-- #content -->

            <div class="clear"></div>
        </div><!-- .container_12 -->
    </section><!-- #main -->
    <div class="clear"></div>
@endsection

@section("end_script")
    <script>

    </script>
@endsection
