@extends('layouts.app')
@section('title')
    {{$product['name']}}
@endsection
@section('content')
    <section id="main">
        <div class="container_12">
            <div id="content" class="grid_12">
                <header>
                    <h1 class="page_title">{{$product['name']}}</h1>
                </header>

                <article class="product_page negative-grid">
                    <div class="grid_5 img_slid" id="products">
                        @if($product['attribute'])
                            <img class="sale" src="{{ asset('img/'.$product['attribute'].'.png') }}"
                                 alt="{{$product['attribute']}}">
                        @endif
                        <div class="preview slides_container">
                            <div class="prev_bg">
                                <a href="{{asset($product['variants'][0]['images'][0]['image_path'])}}" class="jqzoom"
                                   rel='gal1' title="">
                                    <img src="{{ asset($product['variants'][0]['images'][0]['image_path']) }}"
                                         alt="Product 1" title=""
                                         style="width: 100%">
                                </a>
                            </div>
                        </div><!-- .preview -->

                        <div class="next_prev">
                            <a id="img_prev" class="arows" href="#"><span>Prev</span></a>
                            <a id="img_next" class="arows" href="#"><span>Next</span></a>
                        </div><!-- .next_prev -->

                        <ul class="small_img clearfix" id="thumblist">
                            @foreach($product['variants'] as $variant)
                                @foreach($variant['images'] as $image)
                                    <li>
                                        <a class="zoomThumbActive" href='javascript:void(0);'
                                           rel="{gallery: 'gal1', smallimage: '{{ asset($image['image_path']) }}',largeimage: '{{ asset($image['image_path']) }}'}">
                                            <img src='{{ asset($image['image_path']) }}' alt="{{$product['name']}}">
                                        </a>
                                    </li>
                                @endforeach
                            @endforeach
                            {{--  <li><a class="zoomThumbActive" href='javascript:void(0);'
                                     rel="{gallery: 'gal1', smallimage: '{{ asset('img/content/product1.png') }}',largeimage: '{{ asset('img/content/product1.png') }}'}"><img
                                          src='{{ asset('img/content/product1.png') }}' alt=""></a></li>
                              <li><a href='javascript:void(0);'
                                     rel="{gallery: 'gal1', smallimage: '{{ asset('img/content/product2.png') }}',largeimage: '{{ asset('img/content/product2.png')}}'}"><img
                                          src='{{ asset('img/content/product2.png') }}' alt=""></a></li>
                              <li><a href='javascript:void(0);'
                                     rel="{gallery: 'gal1', smallimage: '{{ asset('img/content/product3.png')}}',largeimage: '{{ asset('img/content/product3.png')}}'}"><img
                                          src='{{ asset('img/content/product3.png') }}' alt=""></a></li>
                              <li><a href='javascript:void(0);'
                                     rel="{gallery: 'gal1', smallimage: '{{ asset('img/content/product4.png')}}',largeimage: '{{ asset('img/content/product4.png')}}'}"><img
                                          src='{{ asset('img/content/product4.png') }}' alt=""></a></li>
                              <li><a href='javascript:void(0);'
                                     rel="{gallery: 'gal1', smallimage: '{{ asset('img/content/product5.png')}}',largeimage: '{{ asset('img/content/product5.png')}}'}"><img
                                          src='{{ asset('img/content/product5.png') }}' alt=""></a></li>--}}
                        </ul><!-- .small_img -->

                        <div id="pagination"></div>
                    </div><!-- .grid_5 -->

                    <div class="grid_7">
                        <div class="entry_content">
                            <div class="soc">
                                <img src="{{ asset('img/soc.png') }}" alt="Soc">
                            </div><!-- .soc -->
                            <div class="clear"></div>

                            <p>{{$product['detail']}}</p>

                            <div class="ava_price">
                                <div class="price">
                                    {{--                                    <div class="price_old">$1,725.00</div>--}}
                                    Rs {{$product['price']}}
                                </div><!-- .price -->

                                <div class="availability_sku">
                                    <div class="availability">
                                        Availability: <span>In stock</span>
                                    </div>
                                    <div class="sku">
                                        SKU: <span>{{$product['SKU']}}</span>
                                    </div>


                                </div><!-- .availability_sku -->
                                <div class="availability_sku" style="margin-left: 10px">
                                    @if($product['fabric'])
                                        <div class="sku">
                                            Fabric: <span>{{$product['fabric']}}</span>
                                        </div>
                                    @endif
                                    @if($product['weight'])
                                        <div class="sku">
                                            Weight: <span>{{$product['weight']}}</span>
                                        </div>
                                    @endif
                                </div><!-- .availability_sku -->

                                <div class="clear"></div>
                            </div><!-- .ava_price -->

                            <div class="parameter_selection">

                                <div class="swatches">

                                    <div class="swatch clearfix">
                                        <div class="header">Color</div>
                                        <div id="product-varient-color">
                                            @foreach($product['variants'] as $variant)
                                                <div data-value="{{ $variant['color'] }}"
                                                     class="swatch-element color {{ strtolower($variant['color']) }} available">
                                                    <div class="tooltip">{{ $variant['color'] }}</div>
                                                    <input quickbeam="color"
                                                           id="swatch-1-{{ strtolower($variant['color']) }}"
                                                           type="radio" name="option-{{$variant['color']}}"
                                                           value="{{ $variant['color'] }}"
                                                    />
                                                    <label for="swatch-1-{{ strtolower($variant['color']) }}"
                                                           style="border-color: {{ strtolower($variant['color']) }};">
                                                        <span
                                                            style="background-color: {{ strtolower($variant['color']) }};"></span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="swatch clearfix">
                                        <div class="header">Size</div>
                                        <div id="product-varient-size">
                                            <div data-value="{{ $variant['size'] }}"
                                                 class="swatch-element plain size {{ strtolower($variant['size']) }} available">
                                                <div>Kindly Select color to view available sizes</div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div><!-- .parameter_selection -->
                            <div class="swatch size_graph">
                                <div class="size_graph_element">
                                    <div class="tooltip">Click to view Size Guide</div>
                                    <button class="modal-open" data-modal="modal1">
                                        size guide
                                   </button>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="cart">
                                <a href="#" class="bay"><img src="{{ asset('img/bg_cart.png') }}" alt="Buy"
                                                                      title="">Add to Cart</a>
                                {{--                                <a href="#" class="wishlist"><span></span>Add to Compare</a>--}}
                                {{--                                <a href="#" class="compare"><span></span>Add to Compare</a>--}}
                            </div><!-- .cart -->

                        </div><!-- .entry_content -->
                    </div><!-- .grid_7 -->
                    <div class="clear"></div>
                    <!-- .modal -->
                    <div class="modal" id="modal1">
                        <div class="modal-content">
                            <div class="modal-header">
                                Size Guide
                                <button class="modal-close">
                                    <ion-icon class="close-icon" name="close-outline">Close</ion-icon>
                                </button>
                            </div>
                            <div class="modal-body modal-one">
                                <img
                                    src="{{asset('img/Size-Chart.png')}}"
                                    alt="Size Guide"

                                />
                            </div>
                            <div class="modal-footer">
                                <button class="button close-btn modal-close">Close</button>
                            </div>
                        </div>
                    </div>
                    <!-- end .modal -->

                    <div class="grid_12">
                        <div id="wrapper_tab" class="tab1">
                            <a href="#" class="tab1 tab_link">Description</a>
                            <div class="clear"></div>
                            <div class="tab1 tab_body">
                                <h4>About This Item</h4>
                                <p>{{$product['description']}}</p>
                                <div class="clear"></div>
                            </div><!-- .tab1 .tab_body -->

                            <div class="clear"></div>
                        </div>
                        ​<!-- #wrapper_tab -->
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
                            @foreach($relatedProducts as $relatedProduct)
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
                                            {{--                                            <a href="#" class="compare"></a>--}}
                                            {{--                                            <a href="#" class="wishlist"></a>--}}
                                            <a href="#" class="bay"><img src="{{ asset('img/bg_cart.png') }}"
                                                                         alt="Buy" title=""></a>
                                        </div><!-- .cart -->
                                    </article><!-- .grid_3.article -->
                                </li>

                            @endforeach

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
@section("end_script")
    <script>

        $(document).ready(function () {
            var uniqueValues = {};

            $('#product-varient-color').children().each(function () {
                var dataValue = $(this).attr('data-value');

                // Check if the value is not already in the object
                if (!uniqueValues[dataValue]) {
                    // Append the value to the object to keep track of it
                    uniqueValues[dataValue] = true;

                    // Remove existing children
                    $('#product-varient-color').children().remove();

                    // Append only unique values
                    Object.keys(uniqueValues).forEach(function (uniqueValue) {
                        $('#product-varient-color').append(` <div data-value="${uniqueValue}" class="swatch-element color ${uniqueValue.toLowerCase()} available">
                    <div class="tooltip">${uniqueValue}</div>
                    <input quickbeam="color" id="swatch-1-${uniqueValue.toLowerCase()}" type="radio" name="option-1" value="${uniqueValue}"  onchange="handleColorRadioChange(this)"/>
                    <label for="swatch-1-${uniqueValue.toLowerCase()}" style="border-color: ${uniqueValue.toLowerCase()};">
                        <span style="background-color: ${uniqueValue.toLowerCase()};"></span>
                    </label>
                </div>`);
                    });
                }
            });


        });

        function handleColorRadioChange(radio) {
            let product = @json($product);
            //removing all current sizes
            $('#product-varient-size').children().remove();
            //adding right sizes
            product.variants.forEach((elem) => {
                if (elem.color === radio.value) {
                    updatesizeRadio(elem);
                }
            })
        }


        function updatesizeRadio(variant) {
            $('#product-varient-size').append(`
                <div
                data-varientid="${variant.id}"
                data-varient="${JSON.stringify(variant)}"
                class="swatch-element plain size ${variant.size.toLowerCase()} available ">
                <input
                id='swatch-${variant.size.toLowerCase()}'
                type="radio" name="size-option-${variant.size}"
                value="${variant.size}"
                onclick="handleSizeClick(this)"
                />
                <label for="swatch-${variant.size.toLowerCase()}">
                ${variant.size}
                </label>
            </div>
            `)
        }

        function handleSizeClick(element) {
            // Remove the 'selected-size' class from all inputs with the same name
            $('.selected-size').removeClass('selected-size')

            // Add the 'selected-size' class to the clicked input
            element.parentElement.classList.add('selected-size');

            // Your existing click handling logic
            let variantId = $(element).parent().data('varientid');

            if (variantId) {
                console.log(variantId);
                saveSelectedVariant(variantId);
            }
        }

        const modalOpenBtns = document.querySelectorAll(".modal-open");
        const modalCloseBtns = document.querySelectorAll(".modal-close");
        const body = document.querySelector("body");
        modalOpenBtns.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                let modal = btn.getAttribute("data-modal");
                document.getElementById(modal).style.display = "block";
                body.classList.add("prevent-background-scroll");
            });
        });

        modalCloseBtns.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                let modal = (btn.closest(".modal").style.display = "none");
                body.classList.remove("prevent-background-scroll");
            });
        });

        document.addEventListener("click", (e) => {
            if (e.target.classList.contains("modal")) {
                e.target.style.display = "none";
                body.classList.remove("prevent-background-scroll");
            }
        });


    </script>
@endsection
