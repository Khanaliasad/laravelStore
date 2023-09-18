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
            <div class="list_header"><div class="number">1</div>Checkout Method</div>
            <div class="list_body">
            <form class="checkout_or">
                <h3>Checkout as a Guest or Register</h3>
                <p>Register with us for future convenience:</p>
                <ul class="radio">
                <li><input class="niceRadio" type="radio" name="register"> Checkout as Guest</li>
                <li><input class="niceRadio" type="radio" name="register"> Register</li>
                </ul>
                <p>Register and save time!<br>
                Register with us for future convenience:</p>
                <ul>
                <li>Fast and easy check out</li>
                <li>Easy access to your order history and status</li>
                </ul>
                <input type="submit" value="Continue">
            </form>
            <form class="login">
                <h3>Login</h3>
                <p>If you have an account with us, please log in.</p>
                        
                <div class="email">
                <strong>Email Adress:</strong><sup class="surely">*</sup><br>
                <input type="email" name="" class="" value="">
                </div><!-- .email -->
                        
                <div class="password">
                <strong>Password:</strong><sup class="surely">*</sup><br>
                <input type="text" name="" class="" value="">
                </div><!-- .password -->
            
                <div class="remember">
                <input class="niceCheck" type="checkbox" name="Remember_password">
                <span>Remember password</span>
                </div><!-- .remember -->
            
                <div class="submit">										
                <input type="submit" value="Login">
                                    <a class="forgot" href="#">Forgot Your Password?</a>
                <span>* Required Field</span>
                                    <div class="clear"></div>
                </div><!-- .submit -->
            </form>
            <div class="clear"></div>
            </div>
        </li>
        <li>
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
        </li>
        </ul>
    </article><!-- #checkout_info -->
            
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
            </div><!-- #sidebar_right -->
                
        </div><!-- #content -->

        <div class="clear"></div>
    </div><!-- .container_12 -->
</section><!-- #main -->
<div class="clear"></div>
@endsection
