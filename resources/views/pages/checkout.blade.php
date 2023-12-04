@extends('layouts.app') @section('content')
    <section id="main">
        <div class="container_12">

            <div id="content" class="grid_12">
                <header>
                    <h1 class="page_title">Checkout</h1>
                </header>

                <article id="checkout_info" class="grid_9">
                    <ul class="checkout_list">
                        <li class="active">
                            <div class="list_header">
                                <div class="number"></div>
                                Checkout Method
                            </div>
                            <div class="list_body">
                                <form action="{{route('order')}}" method="post">
                                    @csrf
                                    <div class="checkout_or">


                                        <div style="display: none">
                                            <strong>userId:</strong><sup class="surely">*</sup><br>
                                            <input type="text" name="user_id" class=""
                                                   value="{{ Auth::user() &&( Auth::user()->role !=='admin' )?Auth::user()->id : "null" }}">
                                        </div><!-- .userId -->
                                        <div style="display: none">
                                            <strong>order date:</strong><sup class="surely">*</sup><br>
                                            <input type="datetime-local" name="order_date"
                                                   value="{{ date('Y-m-d\TH:i:s') }}"/>
                                        </div><!-- .order_date -->

                                        <div class="">
                                            <strong>First Name:</strong><sup class="surely">*</sup><br>
                                            <input type="text" name="customer_name" class="" value="" required>
                                        </div><!-- .customer_name -->
                                        <div class="">
                                            <strong>Last Name:</strong><sup class="surely">*</sup><br>
                                            <input type="text" name="customer_last_name" class="" value="" required>
                                        </div><!-- .customer_last_name -->
                                        <div class="">
                                            <strong>Email Adress:</strong><sup class="surely">*</sup><br>
                                            <input type="email" name="customer_email" class="" value="" required>
                                        </div><!-- .email -->
                                        <div class="">
                                            <strong>Phone:</strong><sup class="surely">*</sup><br>
                                            <input id="telephone" type="text" name="customer_phone" class="" value=""
                                                   required>
                                        </div><!-- .customer_phone -->

                                        <div class="">
                                            <strong>Address:</strong><sup class="surely">*</sup><br>
                                            <input type="text" name="customer_address" class="" value="" required>
                                        </div><!-- .customer_address -->
                                        <div class="order_description">
                                            <strong>Additional Notes:</strong><br>
                                            <textarea type="text" name="order_description" class="" value=""></textarea>
                                        </div><!-- .order_description -->


                                        <div class="Tnc">
                                            <input class="niceCheck" type="checkbox" name="Tnc" value="1" checked>
                                            <span>* Accept Terms and Conditions</span>
                                        </div><!-- .Tnc -->
                                        <div class="clear"></div>
                                        @if(session('error'))
                                            <p class="alert-error">
                                                *<span>{{ session('error') }}</span>
                                            </p>
                                        @endif
                                        <div class="submit">
                                            <input type="submit" value="Submit">
                                        </div><!-- .submit -->
                                    </div>
                                </form>
                                <div class="clear"></div>
                            </div>
                        </li>
                        <!--        <li class="active">
                                    <a href="#" class="list_header"><div class="number">2</div>Billing Information</a>
                                </li>
                                <li>
                                    <div class="list_header"><div class="number">3</div>Shipping Information</div>
                                </li>
                                <li>
                                    <div class="list_header"><div class="number">4</div>Shipping Method</div>
                                </li>
                                <li>
                                    <div class="list_header"><div class="number">5</div>Payment Information</div>
                                </li>
                                <li>
                                    <div class="list_header"><div class="number">6</div>Order Review</div>
                                </li>-->
                    </ul>
                </article><!-- #checkout_info -->
                <!--
                            <div class="grid_3" id="sidebar_right">
                                <aside id="checkout_progress">
                                    <h3>Your Checkout Progress</h3>
                                    <ul>
                                        <li><a title="Edit" href="#">Edit</a>Billing Address</li>
                                        <li><a title="Edit" href="#">Edit</a>Shipping Address</li>
                                        <li><a title="Edit" href="#">Edit</a>Shipping Method</li>
                                        <li><a title="Edit" href="#">Edit</a>Payment Method</li>
                                    </ul>
                                </aside>
                            </div>&lt;!&ndash; #sidebar_right &ndash;&gt;
                                -->
            </div><!-- #content -->

            <div class="clear"></div>
        </div><!-- .container_12 -->
    </section><!-- #main -->
    <div class="clear"></div>
@endsection
@section('end_script')
    @if(session('error'))
        <script>
            let errorMessage = $('p.alert-error span').text()
            $.toast({
                type: "error", autoDismiss: true, message: errorMessage
            });
        </script>
    @endif
@endsection
