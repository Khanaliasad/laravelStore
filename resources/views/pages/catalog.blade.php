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
                                        value="{{$i}}">
                                    {{$i}}
                                </option>
                            @endfor
                        </select>

                        <span>per page</span>
                    </div><!-- .show -->

                    <div class="sort">
                        <span>Sort By</span>
                        <select>
                            <option value="price">Price</option>
                            <option value="name">Name</option>
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
                    <ul class="paginationUL">

                    </ul>

                </div><!-- .pagination -->
                <p class="pagination_info">Displaying <span class="productsFrom"></span> to <span
                            class="productsTo"></span> (of <span class="totalProducts"></span> products)</p>

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

        function loadData() {
            let page = getCurrentPage();
            let show = getCurrentShow();
            let sort = getCurrentSortBy();
            let url = "{{ route('catalog.show',$crumb[count($crumb)-1]) }}";
            let cart = "{{ asset('img/bg_cart.png')}}";
            let sale = "{{ asset('img/sale.png')}}";

            $.ajax({
                url: url + '?page=' + page + "&show=" + show + "&sort=" + sort,
                method: "GET",
                dataType: 'JSON',
                success: function (response) {
                    console.log("response", response)
                    // removing existing data
                    removeProducts();
                    $("SELECT").selectBox().load(productsShow(response[0].show));
                    setPagination(response[0].totalPages)
                    changeCurrentPage(response[0].page);
                    setPaginationDetails(response[0].show,response[0].page,response[0].totalProducts)

                    // Append data to the recipe list
                    response.products.forEach(function (product) {

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


                    });
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
                }
            });
        }

        // initial page load ajax call
        $(".page_title").load(loadData());

        // selectbox change handeler for (show and sortby)
        $("SELECT").selectBox().change(function (event) {
            changeCurrentPage(1);
            loadData();
        });

        // default script to handle pagination
        $(document).on("click", ".pages", function (event) {
            var currentPage = parseInt(getCurrentPage())

            if ($(this).attr('id') == "prev") {
                if (currentPage > 1 && currentPage <= {{$totalPages}}) {
                    $(".paginationUL .prev").attr("disabled", false);
                    changeCurrentPage(currentPage - 1)
                } else {
                    $(".prev").attr("disabled", true);
                    return;
                }
            } else if ($(this).attr('id') == "next") {
                if (currentPage >= 1 && currentPage < {{$totalPages}}) {
                    $(".next").attr("disabled", false);
                    changeCurrentPage(currentPage + 1)

                } else {
                    $(".next").attr("disabled", true);
                    return;
                }

            } else {
                changeCurrentPage($(this).attr('id'))
            }

            loadData();
        });

        // adding pagination wrt total products
        function setPagination(totalPages) {
            // removing previous pagination
            $('.paginationUL li').remove();

            // adding pagination
            $('.paginationUL').append(`<li id="prev" class="pages"><a>&#8592;</a></li>`);
            for (let i = 1; i <= totalPages; i++) {
                $('.paginationUL').append(`<li id=${i} class="pages"><a>${i}</a></li>`);
            }
            $('.paginationUL').append(`<li id="next" class="pages"><a>&#8594;</a></li>`);
        }

        function removeProducts() {
            $(".products.catalog.negative-grid").empty();
        }

        function changeCurrentPage(page) {
            $(".paginationUL .curent").removeClass("curent");
            $(`#${page}`).addClass("curent")
        }

        // update currently showing number of product
        function productsShow(show) {
            $("div .show .selectBox-label").text(show);
        }

        function getCurrentShow() {
            if ($("div .show .selectBox-label").text() == "") {
                return 3
            }
            return $("div .show .selectBox-label").text();
        }

        function getCurrentPage() {
            // console.log("getCurrentPage", $(".pagination ul li.curent").text())
            if ($(".pagination ul li.curent").text()) {
                return $(".pagination ul li.curent").text();
            }
            return 1;
        }

        function getCurrentSortBy() {
            // console.log($("div .sort .selectBox-label").text());
            if ($("div .sort .selectBox-label").text() == "") {
                return 'price'
            }
            return $("div .sort .selectBox-label").text();
        }
        function setPaginationDetails(show,page,totalProducts) {
            let from = show*page-show+1;
            let to = show*page<totalProducts?show*page:totalProducts;

            $(".totalProducts").text(totalProducts);
            $(".productsFrom").text(from);
            $(".productsTo").text(to);
        }
        // setPaginationDetails(3,1,10);
    </script>
@endsection
