@extends('layouts.app') @section('content')
<section id="main">
    <div class="container_12">
        <div id="content" class="grid_12">
            <header>
                <h1 class="page_title">Shopping cart</h1>
            </header>
                
            <article>
                <table class="cart_product">
                    <tr class="bg">
                        <th class="images"></th>
                        <th class="name">Product Name</th>
                        <th class="edit"> </th>
                        <th class="price">Unit Price</th>
                        <th class="qty">Qty</th>
                        <th class="subtotal">Subtotal</th>
                        <th class="close"> </th>
                    </tr>
                    <tr>
                        <td class="images"><a href="/product_page.html"><img src="img/content/product12.png" alt="Product 12" title=""></a></td>
                        <td class="name">Paddywax Fragrance Diffuser Set, Gardenia Tuberose, Jasmine, 4-Ounces</td>
                        <td class="edit"><a title="Edit" href="#">Edit</a></td>
                        <td class="price">$75.00</td>
                        <td class="qty"><input type="text" name="" value="" placeholder="1000"></td>
                        <td class="subtotal">$750.00</td>
                        <td class="close"><a title="close" class="close" href="#"></a></td>
                    </tr>
                    <tr>
                        <td class="images"><a href="/product_page.html"><img src="img/content/product10.png" alt="Product 10" title=""></a></td>
                        <td class="name">California Scents Spillproof Organic Air Fresheners, Coronado Cherry, 1.5 Ounce Cannister </td>
                        <td class="edit"><a title="Edit" href="#">Edit</a></td>
                        <td class="price">$75.00</td>
                        <td class="qty"><input type="text" name="" value="" placeholder="1000"></td>
                        <td class="subtotal">$750.00</td>
                        <td class="close"><a title="close" class="close" href="#"></a></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="cart_but">
                            <a href="#" class="continue"><img src="img/cont.png" alt="" title=""> Continue Shopping</a>
                            <a href="#" class="update"><img src="img/update.png" alt="" title=""> Update Shopping Cart</a>
                        </td>
                    </tr>
                </table>
                
                <div id="cart_forms" class="negative-grid">
                    <div class="grid_4">
                        <div class="bottom_block estimate">
                            <h3>Estimate Shipping and Tax</h3>
                            <p>Enter your destination to get a shipping estimate.</p>
                            <form>
                                <p>
                                    <strong>Country:</strong><sup>*</sup><br>
                                    <select>
                                        <option>United States</option>
                                        <option>United States</option>
                                    </select>
                                </p>
                                <p>
                                    <strong>State/Province:</strong><br>
                                    <select class="bottom-index">
                                        <option>Please select region, state or province</option>
                                        <option>Please select region, state or province</option>
                                    </select>
                                </p>
                                <p>
                                    <strong>Zip/Postal Code</strong><br>
                                    <input type="text" name="" value="">
                                </p>
                                <input type="submit" id="get_estimate" value="Get a Quote">
                            </form>

                        </div><!-- .estimate -->
                    </div><!-- .grid_4 -->

                    <div class="grid_4">
                        <div class="bottom_block discount">
                            <h3>Discount Codes</h3>
                            <p>Enter your coupon code if you have one.</p>
                            <form>
                                <p><input type="text" name="" value=""></p>
                                <input type="submit" id="apply_coupon" value="Apply Coupon">
                            </form>
                        </div><!-- .discount -->
                    </div><!-- .grid_4 -->

                    <div class="grid_4">
                        <div class="bottom_block total">
                            <table class="subtotal">
                                <tr>
                                    <td>Subtotal</td><td class="price">$1, 500.00</td>
                                </tr>
                                <tr class="grand_total">
                                    <td>Grand Total</td><td class="price">$1, 500.00</td>
                                </tr>
                            </table>
                            <button class="checkout">PROCEED TO CHECKOUT <img src="img/checkout.png" alt="" title=""></button>
                            <a href="#">Checkout with Multiple Addresses</a>
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
                            <li>
                                <article class="grid_3 article">
                                    <img class="sale" src="img/sale.png" alt="Sale">
                                    <div class="prev">
                                        <a href="/product_page.html"><img src="img/content/product1.png" alt="Product 1" title=""></a>
                                    </div><!-- .prev -->
                    
                                    <h3 class="title">handmade Emerald Cut<br> Emerald Ring</h3>
                                    <div class="cart">
                                        <div class="price">
                                            <div class="vert">
                                                $550.00
                                                <div class="price_old">$725.00</div>
                                            </div>
                                        </div>
                                        <a href="#" class="compare"></a>
                                        <a href="#" class="wishlist"></a>
                                        <a href="#" class="bay"><img src="img/bg_cart.png" alt="Buy" title=""></a>
                                    </div><!-- .cart -->
                                </article><!-- .grid_3.article -->
                            </li>
                            
                            <li>
                                <article class="grid_3 article">
                                    <div class="prev">
                                         <a href="/product_page.html"><img src="img/content/product2.png" alt="Product 2" title=""></a>
                                    </div><!-- .prev -->
                    
                                    <h3 class="title">beautiful Valentine And Engagement</h3>
                                    <div class="cart">
                                        <div class="price">
                                            <div class="vert">
                                                $550.00
                                                <div class="price_old">$725.00</div>
                                            </div>
                                        </div>
                                        <a href="#" class="compare"></a>
                                        <a href="#" class="wishlist"></a>
                                        <a href="#" class="bay"><img src="img/bg_cart.png" alt="Buy" title=""></a>
                                    </div><!-- .cart -->
                                </article><!-- .grid_3.article -->
                            </li>
                            
                            <li>
                                <article class="grid_3 article">
                                    <img class="sale" src="img/new.png" alt="New">
                                    <div class="prev">
                                        <a href="/product_page.html"><img src="img/content/product3.png" alt="Product 3" title=""></a>
                                    </div><!-- .prev -->
                    
                                    <h3 class="title">Emerald Cut Emerald Ring</h3>
                                    <div class="cart">
                                        <div class="price">
                                            <div class="vert">
                                                $550.00
                                                <div class="price_old">$725.00</div>
                                            </div>
                                        </div>
                                        <a href="#" class="compare"></a>
                                        <a href="#" class="wishlist"></a>
                                        <a href="#" class="bay"><img src="img/bg_cart.png" alt="Buy" title=""></a>
                                    </div><!-- .cart -->
                                </article><!-- .grid_3.article -->
                            </li>
                            
                            <li>
                                <article class="grid_3 article">
                                    <div class="prev">
                                        <a href="/product_page.html"><img src="img/content/product4.png" alt="Product 4" title=""></a>
                                    </div><!-- .prev -->
                    
                                    <h3 class="title">Diamond Necklaces and Pendants</h3>
                                    <div class="cart">
                                        <div class="price">
                                            <div class="vert">
                                                $550.00
                                                <div class="price_old">$725.00</div>
                                            </div>
                                        </div>
                                        <a href="#" class="compare"></a>
                                        <a href="#" class="wishlist"></a>
                                        <a href="#" class="bay"><img src="img/bg_cart.png" alt="Buy" title=""></a>
                                    </div><!-- .cart -->
                                </article><!-- .grid_3.article -->
                            </li>
                
                            <li>
                                <article class="grid_3 article">
                                    <div class="prev">
                                        <a href="/product_page.html"><img src="img/content/product5.png" alt="Product 5" title=""></a>
                                    </div><!-- .prev -->
                    
                                    <h3 class="title">Emerald Diamond Solitaire</h3>
                                    <div class="cart">
                                        <div class="price">
                                            <div class="vert">
                                                $550.00
                                                <div class="price_old">$725.00</div>
                                            </div>
                                        </div>
                                        <a href="#" class="compare"></a>
                                        <a href="#" class="wishlist"></a>
                                        <a href="#" class="bay"><img src="img/bg_cart.png" alt="Buy" title=""></a>
                                    </div><!-- .cart -->
                                </article><!-- .grid_3.article -->
                            </li>
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
