@extends('layouts.app')
@section('content')
    <section id="main">
        <div class="container_12">
            <div id="content" class="grid_12">
                <header>
                    <h1 class="page_title">handmade Cut Emerald Ring</h1>
                </header>

                <article class="product_page negative-grid">
                    <div class="grid_5 img_slid" id="products">
                        <img class="sale" src="{{ asset('img/sale.png') }}" alt="Sale">
                        <div class="preview slides_container">
                            <div class="prev_bg">
                                <a href="img/content/product1.png" class="jqzoom" rel='gal1' title="">
                                    <img src="{{ asset('img/content/product1.png') }}" alt="Product 1" title=""
                                        style="width: 100%">
                                </a>
                            </div>
                        </div><!-- .preview -->

                        <div class="next_prev">
                            <a id="img_prev" class="arows" href="#"><span>Prev</span></a>
                            <a id="img_next" class="arows" href="#"><span>Next</span></a>
                        </div><!-- .next_prev -->

                        <ul class="small_img clearfix" id="thumblist">
                            <li><a class="zoomThumbActive" href='javascript:void(0);'
                                    rel="{gallery: 'gal1', smallimage: './img/content/product1.png',largeimage: './img/content/product1.png'}"><img
                                        src='{{ asset('img/content/product1.png') }}' alt=""></a></li>
                            <li><a href='javascript:void(0);'
                                    rel="{gallery: 'gal1', smallimage: './img/content/product2.png',largeimage: './img/content/product2.png'}"><img
                                        src='{{ asset('img/content/product2.png') }}' alt=""></a></li>
                            <li><a href='javascript:void(0);'
                                    rel="{gallery: 'gal1', smallimage: './img/content/product3.png',largeimage: './img/content/product3.png'}"><img
                                        src='{{ asset('img/content/product3.png') }}' alt=""></a></li>
                            <li><a href='javascript:void(0);'
                                    rel="{gallery: 'gal1', smallimage: './img/content/product4.png',largeimage: './img/content/product4.png'}"><img
                                        src='{{ asset('img/content/product4.png') }}' alt=""></a></li>
                            <li><a href='javascript:void(0);'
                                    rel="{gallery: 'gal1', smallimage: './img/content/product5.png',largeimage: './img/content/product5.png'}"><img
                                        src='{{ asset('img/content/product5.png') }}' alt=""></a></li>
                        </ul><!-- .small_img -->

                        <div id="pagination"></div>
                    </div><!-- .grid_5 -->

                    <div class="grid_7">
                        <div class="entry_content">
                            <div class="soc">
                                <img src="{{ asset('img/soc.png') }}" alt="Soc">
                            </div><!-- .soc -->

                            <div class="review">
                                <a class="plus" href="#"></a>
                                <a class="plus" href="#"></a>
                                <a class="plus" href="#"></a>
                                <a href="#"></a>
                                <a href="#"></a>
                                <span><strong>3</strong> REVIEW(S)</span>
                                <span class="separator">|</span>
                                <a class="add_review" href="#">ADD YOUR REVIEW</a>
                            </div>

                            <p>Duis mollis, augue rutrum viverra pellentesque, odio lacus feugiat neque, eget pulvinar enim
                                dui vitae enim. Suspendisse adipiscing sollicitudin scelerisque. Vivamus mattis lacinia
                                nulla vel adipiscing. Phasellus et lacus at eros scelerisque auctor eu eu nisl.</p>

                            <div class="ava_price">
                                <div class="price">
                                    <div class="price_old">$1,725.00</div>
                                    $1,550.00
                                </div><!-- .price -->

                                <div class="availability_sku">
                                    <div class="availability">
                                        Availability: <span>In stock</span>
                                    </div>
                                    <div class="sku">
                                        SKU: <span>Candles OV</span>
                                    </div>
                                </div><!-- .availability_sku -->
                                <div class="clear"></div>
                            </div><!-- .ava_price -->

                            <div class="parameter_selection">
                                <select>
                                    <option>Select a size</option>
                                    <option>Select a size</option>
                                </select>
                                <select>
                                    <option>Choose a material</option>
                                    <option>Choose a material</option>
                                </select>
                            </div><!-- .parameter_selection -->

                            <div class="cart">
                                <a href="#" class="bay"><img src="{{ asset('img/bg_cart.png') }}" alt="Buy"
                                        title="">Add to Cart</a>
                                <a href="#" class="wishlist"><span></span>Add to Compare</a>
                                <a href="#" class="compare"><span></span>Add to Compare</a>
                            </div><!-- .cart -->

                        </div><!-- .entry_content -->
                    </div><!-- .grid_7 -->
                    <div class="clear"></div>

                    <div class="grid_12">
                        <div id="wrapper_tab" class="tab1">
                            <a href="#" class="tab1 tab_link">Description</a>
                            <a href="#" class="tab2 tab_link">Reviews</a>
                            <a href="#" class="tab3 tab_link">Custom Tab</a>

                            <div class="clear"></div>

                            <div class="tab1 tab_body">
                                <h4>About This Item</h4>
                                <p>Suspendisse at placerat turpis. Duis luctus erat vel magna pharetra aliquet. Maecenas
                                    tincidunt feugiat ultricies. Phasellus et dui risus. Vestibulum adipiscing, eros quis
                                    lobortis dictum. Etiam mollis volutpat odio, id euismod justo gravida a. Aliquam erat
                                    volutpat. Phasellus faucibus venenatis lorem, vitae commodo elit pretium et. Duis
                                    rhoncus lobortis congue. Vestibulum et purus dui, vel porta lectus. Sed vulputate
                                    pulvinar adipiscing.</p>
                                <ul>
                                    <li>She was walking to the mall.</li>
                                    <li>Ted might eat the cake.</li>
                                    <li>You must go right now.</li>
                                    <li>Words were spoken.</li>
                                    <li>The teacher is writing a report.</li>
                                </ul>

                                <p>Here are some verb phrase examples where the verb phrase is the predicate of a sentence.
                                    In this case, the verb phrase consists of the main verb plus any auxiliary, or helping,
                                    verbs. Nulla nec velit. Mauris pulvinar erat non massa. Suspendisse tortor turpis, porta
                                    nec, tempus vitae, iaculis semper, pede.</p>
                                <ol>
                                    <li>Shipping & Delivery.</li>
                                    <li>Privacy & Security.</li>
                                    <li>Returns & Replacements.</li>
                                    <li>Payment, Pricing & Promotions.</li>
                                    <li>Viewing Orders.</li>
                                </ol>
                                <p>Next are some verb phrase examples of verb phrases where the phrase has a single function
                                    which means it can act like an adverb or an adjective. The phrase would include the verb
                                    and any modifiers, complements, or objects. Lorem ipsum dolor sit amet, consectetuer
                                    adipiscing elit. Morbi luctus. Duis lobortis. Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Curabitur nec posuere odio. Proin vel ultrices erat.</p>
                                <div class="clear"></div>
                            </div><!-- .tab1 .tab_body -->

                            <div class="tab2 tab_body">
                                <h4>Customer reviews</h4>

                                <ul class="comments">
                                    <li>
                                        <div class="autor">Mike Example</div>, <time
                                            datetime="2012-11-03">03.11.2012</time>

                                        <div class="evaluation">
                                            <div class="quality">
                                                <span>Quality</span>
                                                <a class="plus" href="#"></a>
                                                <a class="plus" href="#"></a>
                                                <a class="plus" href="#"></a>
                                                <a href="#"></a>
                                                <a href="#"></a>
                                            </div>
                                            <div class="price">
                                                <span>Price</span>
                                                <a class="plus" href="#"></a>
                                                <a class="plus" href="#"></a>
                                                <a class="plus" href="#"></a>
                                                <a class="plus_minus" href="#"></a>
                                                <a href="#"></a>
                                            </div>
                                            <div class="clear"></div>
                                        </div><!-- .evaluation -->

                                        <p>Suspendisse at placerat turpis. Duis luctus erat vel magna pharetra aliquet.
                                            Maecenas tincidunt feugiat ultricies. Phasellus et dui risus. Vestibulum
                                            adipiscing, eros quis lobortis dictum. It enim ad minim veniam, quis nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </li>

                                    <li>
                                        <div class="autor">Mike Example</div>, <time
                                            datetime="2012-11-03">01.11.2012</time>

                                        <div class="evaluation">
                                            <div class="quality">
                                                <span>Quality</span>
                                                <a class="plus" href="#"></a>
                                                <a class="plus" href="#"></a>
                                                <a class="plus" href="#"></a>
                                                <a class="plus" href="#"></a>
                                                <a class="plus_minus" href="#"></a>
                                            </div>
                                            <div class="price">
                                                <span>Price</span>
                                                <a class="plus" href="#"></a>
                                                <a class="plus" href="#"></a>
                                                <a class="plus" href="#"></a>
                                                <a class="plus" href="#"></a>
                                                <a href="#"></a>
                                            </div>
                                            <div class="clear"></div>
                                        </div><!-- .evaluation -->

                                        <p>Etiam mollis volutpat odio, id euismod justo gravida a. Aliquam erat volutpat.
                                            Phasellus faucibus venenatis lorem, vitae commodo elit pretium et. Duis rhoncus
                                            lobortis congue. Vestibulum et purus dui, vel porta lectus. Sed vulputate
                                            pulvinar adipiscing. It enim ad minim veniam, quis nostrud exercitation ullamco
                                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </li>
                                </ul><!-- .comments -->

                                <form class="add_comments">
                                    <h4>Write Your Own Review</h4>

                                    <div class="evaluation">
                                        <div class="quality">
                                            Quality<sup>*</sup>
                                            <input class="niceRadio" type="radio" name="quality" value="1"><span
                                                class="eva_num">1</span>
                                            <input class="niceRadio" type="radio" name="quality" value="2"><span
                                                class="eva_num">2</span>
                                            <input class="niceRadio" type="radio" name="quality" value="3"><span
                                                class="eva_num">3</span>
                                            <input class="niceRadio" type="radio" name="quality" value="4"><span
                                                class="eva_num">4</span>
                                            <input class="niceRadio" type="radio" name="quality" value="5"><span
                                                class="eva_num">5</span>
                                        </div>
                                        <div class="price">
                                            Price<sup>*</sup>
                                            <input class="niceRadio" type="radio" name="price" value="1"><span
                                                class="eva_num">1</span>
                                            <input class="niceRadio" type="radio" name="price" value="2"><span
                                                class="eva_num">2</span>
                                            <input class="niceRadio" type="radio" name="price" value="3"><span
                                                class="eva_num">3</span>
                                            <input class="niceRadio" type="radio" name="price" value="4"><span
                                                class="eva_num">4</span>
                                            <input class="niceRadio" type="radio" name="price" value="5"><span
                                                class="eva_num">5</span>
                                        </div>
                                        <div class="clear"></div>
                                    </div><!-- .evaluation -->

                                    <div class="nickname">
                                        <strong>Nickname</strong><sup>*</sup><br>
                                        <input type="text" name="" class="" value="">
                                    </div><!-- .nickname -->

                                    <div class="your_review">
                                        <strong>Summary of Your Review</strong><sup>*</sup><br>
                                        <input type="text" name="" class="" value="">
                                    </div><!-- .your_review -->

                                    <div class="text_review">
                                        <strong>Review</strong><sup>*</sup><br>
                                        <textarea name="text"></textarea><br>
                                        <i>Note: HTML is not translated!</i>
                                    </div><!-- .text_review -->

                                    <div class="clear"></div>



                                    <input type="submit" value="Submit Review">
                                </form><!-- .add_comments -->
                                <div class="clear"></div>
                            </div><!-- .tab2 .tab_body -->

                            <div class="tab3 tab_body">
                                <h4>Custom Tab</h4>
                                <div class="clear"></div>
                            </div><!-- .tab3 .tab_body -->
                            <div class="clear"></div>
                        </div>​<!-- #wrapper_tab -->
                        <div class="clear"></div>
                    </div><!-- .grid_12 -->
                    <div class="clear"></div>
                </article><!-- .product_page -->

                <div class="related negative-grid">

                    <div class="c_header">
                        <div class="grid_10">
                            <h2>Related Products</h2>
                        </div><!-- .grid_10 -->

                        <div class="grid_2">
                            <a id="next_c1" class="next arows" href="#"><span>Next</span></a>
                            <a id="prev_c1" class="prev arows" href="#"><span>Prev</span></a>
                        </div><!-- .grid_2 -->
                    </div><!-- .c_header -->

                    <div class="related_list">
                        <ul id="listing" class="products">
                            <li>
                                <article class="grid_3 article">
                                    <img class="sale" src="{{ asset('img/sale.png') }}" alt="Sale">
                                    <div class="prev">
                                        <a href="/product_page.html"><img src="{{ asset('img/content/product1.png') }}"
                                                alt="Product 1" title=""></a>
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
                                        <a href="#" class="bay"><img src="{{ asset('img/bg_cart.png') }}"
                                                alt="Buy" title=""></a>
                                    </div><!-- .cart -->
                                </article><!-- .grid_3.article -->
                            </li>

                            <li>
                                <article class="grid_3 article">
                                    <div class="prev">
                                        <a href="/product_page.html"><img src="{{ asset('img/content/product2.png') }}"
                                                alt="Product 2" title=""></a>
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
                                        <a href="#" class="bay"><img src="{{ asset('img/bg_cart.png') }}"
                                                alt="Buy" title=""></a>
                                    </div><!-- .cart -->
                                </article><!-- .grid_3.article -->
                            </li>

                            <li>
                                <article class="grid_3 article">
                                    <img class="sale" src="{{ asset('img/new.png') }}" alt="New">
                                    <div class="prev">
                                        <a href="/product_page.html"><img src="{{ asset('img/content/product3.png') }}"
                                                alt="Product 3" title=""></a>
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
                                        <a href="#" class="bay"><img src="{{ asset('img/bg_cart.png') }}"
                                                alt="Buy" title=""></a>
                                    </div><!-- .cart -->
                                </article><!-- .grid_3.article -->
                            </li>

                            <li>
                                <article class="grid_3 article">
                                    <div class="prev">
                                        <a href="/product_page.html"><img src="{{ asset('img/content/product4.png') }}"
                                                alt="Product 4" title=""></a>
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
                                        <a href="#" class="bay"><img src="{{ asset('img/bg_cart.png') }}"
                                                alt="Buy" title=""></a>
                                    </div><!-- .cart -->
                                </article><!-- .grid_3.article -->
                            </li>

                            <li>
                                <article class="grid_3 article">
                                    <div class="prev">
                                        <a href="/product_page.html"><img src="{{ asset('img/content/product5.png') }}"
                                                alt="Product 5" title=""></a>
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
                                        <a href="#" class="bay"><img src="{{ asset('img/bg_cart.png') }}"
                                                alt="Buy" title=""></a>
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
