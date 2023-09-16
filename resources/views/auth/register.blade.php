@extends('layouts.app')
@section('content')
<section id="main" class="page-login">
    <div class="container_12">
        <div id="content" class="grid_12">
            <header>
                <h1 class="page_title">Create an Account</h1>
            </header>
                
            <article>
                <div class="grid_3 new_customers">
        <h2></h2>
        {{-- <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
        <div class="clear"></div>
        <button class="account">Create An Account</button> --}}
                </div><!-- .grid_6 -->
    
                <div class="grid_6 registed_form">
        <form class="registed">
            {{-- <h2></h2> --}}
            <p>{{ __("If you have an account with us, please ")}}<a href="{{ route('login') }}">log in.</a></p>
           
            <div class="name">
                <strong>name:</strong><sup>*</sup><br>
                <input type="text" name="" class="" value="">
                </div><!-- .name -->
            <div class="email">
            <strong>Email Adress:</strong><sup>*</sup><br>
            <input type="email" name="" class="" value="">
            </div><!-- .email -->
            <div class="password">
            <strong>Password:</strong><sup>*</sup><br>
            <input type="text" name="" class="" value="">
            </div><!-- .password -->
            <div class="password">
                <strong>Confirm Password:</strong><sup>*</sup><br>
                <input type="text" name="" class="" value="">
                </div><!-- .password -->
            {{-- <div class="remember">
            <input class="niceCheck" type="checkbox" name="Remember_password">
            <span class="rem">Remember password</span>
            </div><!-- .remember --> --}}
            <div class="submit">										
            <input type="submit" value="Login">
                            <a class="forgot" href="#">Forgot Your Password?</a>
            <span>* Required Field</span>
                            <div class="clear"></div>
            </div><!-- .submit -->
        </form><!-- .registed -->
                </div><!-- .grid_6 -->
    </article>
                
            <div class="clear"></div>
        </div><!-- #content -->

        <div class="clear"></div>
    </div><!-- .container_12 -->
</section>
@endsection
@section('contentAuthDefault')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
