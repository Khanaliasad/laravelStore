@extends('layouts.app')
@section('content')
    @include('partials.slider')
    @include('partials.homeBanner')
    <section id="main" class="home">
        <div class="container_12">
            <div id="content">
                @if(session('status'))
                    <div class="alert-success" style="display: none">
                        {{ session('status') }}
                    </div>
                @endif
                @if(session('error'))
                    <p class="alert-error" style="display: none">
                        *<span>{{ session('error') }}</span>
                    </p>
                @endif
                <div class="grid_12">
                    <h2 class="product-title">Featured Products</h2>
                </div>
                <!-- .grid_12 -->

                <div class="clear"></div>

                <div class="products featured-products">

                    @foreach($homeProducts as $product )
                        {{--/*<?= dd(asset($product["variants"][0]["images"][0]["image_path"])) ?>*/--}}
                        <article class="grid_3 article">
                            @if($product['attribute'])
                                <img class="sale" src="{{ asset('img/'.$product['attribute'].'.png') }}" alt="Sale">
                            @endif
                            <div class="prev">
                                <a href="{{route("product.page",$product["id"])}}"
                                ><img
                                            src="{{asset($product["variants"][0]["images"][0]["image_path"])}}"
                                            alt="{{$product["name"]}}"
                                            title="asad"
                                    />
                                </a>
                            </div>
                            <!-- .prev -->

                            <h3 class="title">
                                {{$product["name"]}}
                            </h3>
                            <div class="cart">
                                <div class="price">
                                    <div class="vert">
                                        Rs {{$product["price"]}}
                                        <div class="price_old">Rs {{$product["old_price"]}}</div>
                                    </div>
                                </div>
                                {{--                                        <a href="#" class="compare"></a>--}}
                                {{--                                        <a href="#" class="wishlist"></a>--}}
                                <a href="#" class="bay"
                                ><img src="img/bg_cart.png" alt="Buy" title=""
                                    /></a>
                            </div>
                            <!-- .cart -->
                        </article>
                        <!-- .grid_3.article -->

                    @endforeach


                    <div class="clear"></div>
                </div>
                <!-- .products -->
                <div class="clear"></div>
            </div>
            <!-- #content -->

            <div class="clear"></div>

            <div id="brands" class="grid_12">
                <div class="c_header">
                    <div class="grid_10">
                        <h2>Shop by brands</h2>
                    </div>
                    <!-- .grid_10 -->

                    <div class="grid_2">
                        <a id="next_c1" class="next arows" href="#"
                        ><span>Next</span></a
                        >
                        <a id="prev_c1" class="prev arows" href="#"
                        ><span>Prev</span></a
                        >
                    </div>
                    <!-- .grid_2 -->
                </div>
                <!-- .c_header -->

                <div class="brands_list">
                    <ul id="listing">
                        <li>
                            <a href="#"
                            >
                                <div>
                                    <img
                                            src="img/content/brand1.png"
                                            alt="Brand 1"
                                            title=""
                                    /></div
                                >
                            </a>
                        </li>
                        <li>
                            <a href="#"
                            >
                                <div>
                                    <img
                                            src="img/content/brand2.png"
                                            alt="Brand 2"
                                            title=""
                                    /></div
                                >
                            </a>
                        </li>
                        <li>
                            <a href="#"
                            >
                                <div>
                                    <img
                                            src="img/content/brand3.png"
                                            alt="Brand 3"
                                            title=""
                                    /></div
                                >
                            </a>
                        </li>
                        <li>
                            <a href="#"
                            >
                                <div>
                                    <img
                                            src="img/content/brand4.png"
                                            alt="Brand 4"
                                            title=""
                                    /></div
                                >
                            </a>
                        </li>
                        <li>
                            <a href="#"
                            >
                                <div>
                                    <img
                                            src="img/content/brand5.png"
                                            alt="Brand 5"
                                            title=""
                                    /></div
                                >
                            </a>
                        </li>
                        <li>
                            <a href="#"
                            >
                                <div>
                                    <img
                                            src="img/content/brand6.png"
                                            alt="Brand 6"
                                            title=""
                                    /></div
                                >
                            </a>
                        </li>
                        <li>
                            <a href="#"
                            >
                                <div>
                                    <img
                                            src="img/content/brand7.png"
                                            alt="Brand 7"
                                            title=""
                                    /></div
                                >
                            </a>
                        </li>
                    </ul>
                    <!-- #listing -->
                </div>
                <!-- .brands_list -->
            </div>
            <!-- #brands -->

            <div class="clear"></div>

            <div id="content_bottom">
                <div class="grid_6">
                    <div class="bottom_block about_as">
                        <h3>About Us</h3>
                        <div class="about_as_content">
                            <p>
                                Lorem ipsum, libero et luctus molestie, turpis mi
                                sagittis nisl, a scelerisque leo nulla et lectus
                                pendisse dictum posuere elit, in congue nisl varius
                                lentesque a tellus eget quam varius aliquet.
                            </p>
                            <p>
                                Pellentesque tristique, libero et luctus molestie,
                                turpis a scelerisque leo nulla et lectus pendisse
                                dictum posuere elit. It is a long established fact
                                that a reader will be distracted by the readable
                                content of a page when looking at its layout.
                            </p>
                            <p>
                                In congue nisl varius quis lentesque a tellus eget
                                quam varius aliquet. Vel lobortis gravida. Many
                                desktop publishing packages and web page .
                            </p>
                        </div>
                    </div>
                    <!-- .about_as -->
                </div>
                <!-- .grid_6 -->

                <div class="grid_6">
                    <div class="bottom_block news">
                        <h3>News</h3>
                        <ul>
                            <li>
                                <time datetime="2012-03-03">3 january 2012</time>
                                <a href="#"
                                >Fermentum parturient lacus tristique habitant
                                    nullam morbi et odio nibh mus dictum tellus
                                    erat.</a
                                >
                            </li>

                            <li>
                                <time datetime="2012-02-03">2 january 2012</time>
                                <a href="#"
                                >Cras ac hendrerit dui. Duis lacus ligula,
                                    luctus ac tristique eget, posuere id erat. Many
                                    desktop publishing packages and web page editors
                                    now use.</a
                                >
                            </li>

                            <li>
                                <time datetime="2012-01-03">1 january 2012</time>
                                <a href="#"
                                >Lorem ipsum, libero et luctus molestie, turpis
                                    mi sagittis nisl, a scelerisque leo nulla et
                                    lectus.</a
                                >
                            </li>
                        </ul>
                    </div>
                    <!-- .news -->
                </div>
                <!-- .grid_6 -->
                <div class="clear"></div>
            </div>
            <!-- #content_bottom -->
        </div>
        <!-- .container_12 -->
    </section>
    <!-- #main.home -->

@endsection

@section('end_script')
    @if(session('status'))
        <script>
            let sucessMessage = $('div.alert-success').text()
            $.toast({
                type: "success", autoDismiss: true, message: sucessMessage
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            let errorMessage = $('p.alert-error span').text()
            $.toast({
                type: "error", autoDismiss: true, message: errorMessage
            });
        </script>
    @endif
@endsection
