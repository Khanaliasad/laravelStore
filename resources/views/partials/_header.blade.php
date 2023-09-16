    <header id="branding">
        <div class="container_12">
            <div class="grid_3">
                <hgroup>
                    <h1 id="site_logo"><a href="/" title=""><img src="img/logo.png" alt="Online Store Theme Logo"></a></h1>
                    <h2 id="site_description">Online Store Theme</h2>
                </hgroup>
            </div><!-- .grid_3 -->

            <div class="grid_9">
                <div class="top_header">
                    <div class="welcome">
                        Welcome visitor you can <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">create an account</a>.
                    </div><!-- .welcome -->

                    <ul id="cart_nav">
                        <li>
                            <a class="cart_li" href="#">
                                <div class="cart_ico"></div>
                                Cart
                                <span>$0.00</span>
                            </a>
                            <ul class="cart_cont">
                                <li class="no_border recently">Recently added item(s)</li>
                                <li>
                                    <a href="/product_page.html" class="prev_cart"><div class="cart_vert"><img src="img/content/cart_img.png" alt="Product 1" title=""></div></a>
                                    <div class="cont_cart">
                                        <h4>Faddywax Fragrance Diffuser Set <br>Gardenia</h4>
                                        <div class="price">1 x <span>$399.00</span></div>
                                    </div>
                                    <a title="close" class="close" href="#"></a>
                                    <div class="clear"></div>
                                </li>

                                <li>
                                    <a href="/product_page.html" class="prev_cart"><div class="cart_vert"><img src="img/content/cart_img2.png" alt="Product 2" title=""></div></a>
                                    <div class="cont_cart">
                                        <h4>Caldrea Linen and Room Spray</h4>
                                        <div class="price">1 x <span>$123.00</span></div>
                                    </div>
                                    <a title="close" class="close" href="#"></a>
                                    <div class="clear"></div>
                                </li>
                                <li class="no_border">
                                    <a href="/shopping_cart.html" class="view_cart">View shopping cart</a>
                                    <a href="/checkout.html" class="checkout">Procced to Checkout</a>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- .cart_nav -->

                    <form class="search">
                        <input type="submit" class="search_button" value="">
                        <input type="text" name="search" class="search_form" value="" placeholder="Search entire store here...">
                    </form><!-- .search -->
                </div><!-- .top_header -->
            </div><!-- .grid_9 -->
            
            <div class="grid_9 primary-box">
                <nav class="primary">
                    <div class="bg-menu-select"></div>
                    <a class="menu-select" href="#">Catalog</a>
                    <ul>
                        <li class="curent"><a href="/">Home</a></li>
                        <li><a href="/catalog_grid.html">Solids</a></li>
                        <li><a href="/catalog_grid.html">Liquids</a></li>
                        <li class="parent">
                            <a href="/catalog_grid.html">Spray</a>
                            <ul class="sub">
                                <li><a href="/catalog_grid.html">For home</a></li>
                                <li><a href="/catalog_grid.html">For Garden</a></li>
                                <li><a href="/catalog_grid.html">For Car</a></li>
                                <li><a href="/catalog_grid.html">Other spray</a></li>
                            </ul>
                        </li>
                        <li><a href="/catalog_grid.html">Electric</a></li>
                        <li><a href="/catalog_grid.html">For cars</a></li>
                        <li class="parent">
                            <a href="#">All pages</a>
                            <ul class="sub">
                                <li><a href="/">Home</a></li>
                                <li><a href="/typography_page.html">Typography and basic styles</a></li>
                                <li><a href="/catalog_grid.html">Catalog (grid view)</a></li>
                                <li><a href="/catalog_list.html">Catalog (list type view)</a></li>
                                <li><a href="/product_page.html">Product view</a></li>
                                <li><a href="/shopping_cart.html">Shoping cart</a></li>
                                <li><a href="/checkout.html">Proceed to checkout</a></li>
                                <li><a href="/compare.html">Products comparison</a></li>
                                <li><a href="/login.html">Login</a></li>
                                <li><a href="/contact_us.html">Contact us</a></li>
                                <li><a href="/404.html">404</a></li>
                                <li><a href="/blog.html">Blog posts</a></li>
                                <li><a href="/blog_post.html">Blog post view</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav><!-- .primary -->
            </div><!-- .grid_9 -->
        </div>
        <div class="clear"></div>
    </header>