@extends('layouts.app')

@section('title')
    jkk
@endsection

@section('content')
    <section id="main" class="page-contact">
        <div class="container_12">
            <div id="content" class="grid_12">
                <header>
                    <h1 class="page_title">Contact Us</h1>
                </header>

                <article>
                    <div class="grid_6 adress">
                        <h3>Address</h3>
                        <p>49 Archdale, 2B Charleston, New York City, USA</p>
                        <hr />

                        <h3>Phones</h3>
                        <p>
                            Support: <span>+777 (100) 1234</span><br />
                            Sales manager: <span>+777 (100) 4321</span><br />
                            Director: <span>+777 (100) 1243</span>
                        </p>
                        <hr />

                        <h3>Email Addresses</h3>
                        <p>
                            Support: <span class="mail">support@example.com</span><br />
                            Sales manager:
                            <span class="mail">manager@example.com</span><br />
                            Director: <span class="mail">chief@example.com</span>
                        </p>
                    </div>
                    <!-- .adress -->

                    <div class="grid_6 form">
                        <form class="contact">
                            <h2>Quick Contact</h2>

                            <div class="name">
                                <strong>Name:</strong><sup>*</sup><br />
                                <input type="text" name="name" value="" />
                            </div>
                            <!-- .name -->

                            <div class="email">
                                <strong>Email Adress:</strong><sup>*</sup><br />
                                <input type="email" name="email" value="" />
                            </div>
                            <!-- .email -->

                            <div class="phone">
                                <strong>Telephone:</strong><br />
                                <input type="text" name="phone" value="" />
                            </div>
                            <!-- .phone -->

                            <div class="comment">
                                <strong>Comment:</strong><sup>*</sup><br />
                                <textarea name="comment"></textarea>
                            </div>
                            <!-- .comment -->

                            <div class="submit">
                                <div class="field">
                                    <sup>*</sup><span>Required Field</span>
                                </div>
                                <input type="submit" value="Submit" />
                            </div>
                            <!-- .submit -->
                        </form>
                        <!-- .contact -->
                    </div>
                    <!-- .grid_6 -->
                </article>

                <div class="clear"></div>
            </div>
            <!-- #content -->

            <div class="clear"></div>
        </div>
        <!-- .container_12 -->
    </section>
    <!-- #main -->
    <div class="clear"></div>
@endsection
