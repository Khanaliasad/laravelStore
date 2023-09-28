@extends('layouts.app')

@section('title')
    Catalog
@endsection

@section('content')
    <section id="main">
        <div class="container_12">
            <div id="content" class="grid_9">
                <h1 class="page_title">Product List</h1>
                <div class="options">
                    <div class="show">
                        <span>Show</span>
                        <select id="showProductQty">
                            @for($i = 1; $i <= 10; $i++)
                                <option
                                    value="show={{$i}}">
                                    {{$i}}
                                </option>
                            @endfor
                        </select>

                        <span>per page</span>
                    </div><!-- .show -->

                    <div class="sort">
                        <span>Sort By</span>
                        <select>
                            <option>Price</option>
                            <option>Rating</option>
                            <option>Name</option>
                        </select>

                        <a class="sort_up" href="#">&#8593;</a>
                    </div><!-- .sort -->

                    <div class="grid-list">
                        <a class="grid current" href="/"><span></span></a>
                        <a class="list" href="/catalog_list.html"><span></span></a>
                    </div><!-- .grid-list -->

                </div><!-- .options -->
                <div class="clear"></div>

                <div class="products catalog negative-grid">


                    <div class="clear"></div>
                </div><!-- .products -->
                <div class="clear"></div>

                <div class="pagination">
                    <ul>
                        <li class="prev"><a>&#8592;</a></li>
                        @for($i = 1; $i <= $totalPages; $i++)
                            <li id="page{{$i}}"><a>{{$i}}</a></li>
                        @endfor

                        <li class="next"><a>&#8594;</a></li>
                    </ul>
                </div><!-- .pagination -->
                <p class="pagination_info">Displaying 1 to 12 (of {{$totalProducts}} products)</p>

                <div class="clear"></div>
            </div><!-- #content -->

            <div id="sidebar" class="grid_3">
                <aside id="categories_nav">
                    <header class="aside_title">
                        <h3>Categories</h3>
                    </header>

                    <nav class="right_menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            @foreach($categories as $category)
                                @if($requestedCategory == $category )
                                    <li class="current"><a
                                            href="{{ route('catalog.show', str_replace(' ', '-', $category)) }}">{{ $category }}</a>
                                    </li>
                                @else
                                    <li class=""><a
                                            href="{{ route('catalog.show', str_replace(' ', '-', $category)) }}">{{ $category }}</a>
                                    </li>
                                @endif

                            @endforeach
                        </ul>
                    </nav><!-- .right_menu -->
                </aside><!-- #categories_nav -->

                <!--                <aside id="shop_by">
                                    <header class="aside_title">
                                        <h3>Shop By</h3>
                                    </header>

                                    <div class="currently_shopping">
                                        <h4>Currently Shopping by:</h4>
                                        <ul>
                                            <li><a title="close" class="close" href="#"></a>Price: <span>$0.00 - $999.99</span>
                                            </li>
                                            <li><a title="close" class="close" href="#"></a>Manufacturer: <span>Apple</span></li>
                                        </ul>

                                        <a class="clear_all" href="#">Clear All</a>

                                        <div class="clear"></div>
                                    </div>&lt;!&ndash; .currently_shopping &ndash;&gt;

                                    <h4 class="sub_title">Category</h4>

                                    <nav class="check_opt">
                                        <ul>
                                            <li><a href="#">For Home (23)</a></li>
                                            <li><a href="#">For Car (27)</a></li>
                                            <li><a href="#">For Office (9)</a></li>
                                        </ul>
                                    </nav>&lt;!&ndash; .check_opt &ndash;&gt;

                                    <h4 class="sub_title">Price</h4>

                                    <nav class="check_opt price">
                                        <ul>
                                            <li><a href="#">0.00 - $49.99 (21)</a></li>
                                            <li><a href="#">$50.00 - $99.99 (7)</a></li>
                                            <li><a href="#">$100.00 and above (15)</a></li>
                                        </ul>
                                    </nav>&lt;!&ndash; .check_opt &ndash;&gt;
                                </aside>
                                -->
                <!-- #shop_by -->

                <aside id="specials" class="specials">
                    <header class="aside_title">
                        <h3>Specials</h3>
                    </header>

                    <ul>
                        <li>
                            <div class="prev">
                                <a href="#"><img src="{{ asset('img/content/product7.png') }}" alt="Product 7"
                                                 title=""></a>
                            </div>

                            <div class="cont">
                                <a href="#">Emerald Cut Emerald Ring</a>
                                <div class="prise"><span class="old">$1770.00</span> $750.00</div>
                            </div>
                        </li>

                        <li>
                            <div class="prev">
                                <a href="#"><img src="{{ asset('img/content/product1.png') }}" alt="Product 1"
                                                 title=""></a>
                            </div>

                            <div class="cont">
                                <a href="#">Handmade Emerald Diamond Solitaire</a>
                                <div class="prise">$3250.00</div>
                            </div>
                        </li>
                    </ul>
                </aside><!-- #specials -->

                <!--                <aside id="compare_products">
                                    <header class="aside_title">
                                        <h3>Compare Products</h3>
                                    </header>

                                    <ul>
                                        <li><a title="close" class="close" href="#"></a>Home Collection Honeysuckle Orchid
                                            Flameless
                                        </li>
                                        <li><a title="close" class="close" href="#"></a>Caldrea Linen and Room Spray, Ginger
                                            Pomelo
                                        </li>
                                        <li><a title="close" class="close" href="#"></a>Fresh Wave Travel Size Spray</li>
                                    </ul>

                                    <button class="compare">Compare</button>
                                    <a class="clear_all" href="#">Clear All</a>

                                    <div class="clear"></div>
                                </aside>&lt;!&ndash; #compare_products &ndash;&gt;-->

                <!--                <aside id="newsletter_signup">
                                    <header class="aside_title">
                                        <h3>Newsletter Signup</h3>
                                    </header>

                                    <p>Phasellus vel ultricies felis. Duis rhoncus risus eu urna pretium.</p>

                                    <form class="newsletter">
                                        <input type="email" name="newsletter" class="your_email" value=""
                                               placeholder="Enter your email address...">
                                        <input type="submit" id="submit" value="Subscribe">
                                    </form>
                                </aside>-->

                <!-- #newsletter_signup -->

            </div><!-- .sidebar -->
            <div class="clear"></div>
        </div><!-- .container_12 -->
    </section><!-- #main -->
    <div class="clear"></div>
@endsection
@section("end_script")
    <script>

        // Loading Recipe Data

        function loadData(page, show = "show=3") {
            let url = "{{ route('catalog.show',$crumb[count($crumb)-1]) }}";
            let cart = "{{ asset('img/bg_cart.png')}}";
            let sale = "{{ asset('img/sale.png')}}";
            console.log(cart);
            $.ajax({
                url: url + '?page=' + page +"&"+ show,
                method: "GET",
                dataType: 'JSON',
                success: function (response) {
                    // removing existing data
                    removeProducts();
                    changeCurrentPage(page);

                    // Append data to the recipe list
                    response.forEach(function (product) {

                        let productRoute = `/product/${product.id}`;

                        $(".products.catalog.negative-grid").append(`
                            <article class="grid_3 article">
                            <img class="sale" src="${sale}" alt="Sale" />
                            <div class="prev">
                            <a href="${productRoute}">
                            <img src="${product.variants[0]?.images[0]?.image_path}" alt="${product.name}" title=""
                            /></a>
                            </div>
                            <!-- .prev -->

                            <h3 class="title">${product.name}</h3>
                            <div class="cart">
                            <div class="price">
                            <div class="vert">
                            Rs ${product?.variants[0]?.price} {{--
                            <div class="price_old">$725.00</div>
                            --}}
                        </div>
                        </div>
{{-- <a href="#" class="compare"></a>--}}{{-- --}}{{----}}
                        {{--                            <a href="#" class="wishlist"></a>--}}
                        <a href="#" class="bay"
                        ><img src="${cart}" alt="Buy" title=""
                            /></a>
                            </div>
                            <!-- .cart -->
                            </article>
`);
                        $(".article").hover(
                            function () {
                                var self = this;
                                this.hoverAnimationTimeout = setTimeout(function () {
                                    $(self).find(".price").transition({left: 0, textAlign: 'left'});
                                    $(self).find(".bay").transition({rotate: 360, opacity: 1, delay: 200});
                                    $(self).find(".compare").transition({left: '110px', delay: 400});
                                    $(self).find(".wishlist").transition({left: '144px', delay: 500});
                                }, 280);
                            }, function () {
                                clearTimeout(this.hoverAnimationTimeout);
                                $(this).find(".wishlist").transition({left: '244px'});
                                $(this).find(".compare").transition({left: '220px'});
                                $(this).find(".bay").transition({rotate: 0, opacity: 0});
                                $(this).find(".price").transition({left: '60px', textAlign: 'center'});
                            });


                    });

                }
            });
        }

        @for($i = 1; $i <= $totalPages; $i++)
        $("#page{{$i}}").click(function (event) {
            // changeCurrentPage(event.target.firstChild.data);
            loadData(event.target.firstChild.data);
        });
        @endfor

        // initial page load ajax call
        $(".page_title").load(loadData(1));
        $("SELECT").selectBox().load(productsShow());


        $('.prev').click(function (event) {
            var currentPage = $('.curent')[0].children[0].text
            if (currentPage > 1 && currentPage <= {{$totalPages}}) {
                $(".prev").attr("disabled", false);
                loadData(currentPage - 1);
            } else {
                $(".prev").attr("disabled", true);
            }
        });

        $('.next').click(function (event) {
            var currentPage = parseInt($('.curent')[0].children[0].text);
            if (currentPage >= 1 && currentPage < {{$totalPages}}) {
                $(".next").attr("disabled", false);
                loadData(currentPage + 1);
            } else {
                $(".next").attr("disabled", true);
            }
        });

        function removeProducts() {
            $(".products.catalog.negative-grid").empty();
        }

        function changeCurrentPage(page) {
            $(".curent").removeClass("curent");
            $(`#page${page}`).addClass("curent")
        }

        function productsShow() {
                let show = {{$show}};
                console.log($("div .show .selectBox-label").text(show),)

        }

        $("SELECT").selectBox().change(function (event) {
            // alert("bharwa")
            loadData(1, $(this).val());
            // window.location.href = $(this).val();

        });

    </script>
@endsection
