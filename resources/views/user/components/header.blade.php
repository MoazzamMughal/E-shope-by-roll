<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content>
    <meta name="author" content>
    <title>E-Shop</title>
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('user/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed"
        sizes="144x144"href="{{ asset('user/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        sizes="114x114"href="{{ asset('user/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        sizes="72x72"href="{{ asset('user/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"href="{{ asset('user/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +92 315-5607830</a></li>
                                <li><a href="https://mail.google.com/"><i class="fa fa-envelope"></i>
                                        mmoazzam@shop.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/i/flow/login"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://myaccount.google.com/"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->


        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">

                    @if (session()->has('success'))
                        <div class="alert alert-dismissable alert-info">
                            {!! session()->get('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html">
                                <img src="{{ asset('user/images/home/logo1.png') }}" alt />
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li>
                                    @php
                                        $approveCount = App\Models\RequestAprove::where('user_id', Auth::user()->id)->count();
                                    @endphp

                                    @if ($approveCount == 1)
                                        @if (Auth::check() && Auth::user()->role == 0 && Auth::user()->status == 0)
                                            <div class="d-flex pt-auto">
                                                <form action="{{ url('cancel-request/' . Auth::user()->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button style="color: coral;text-decoration: none;" type="submit"
                                                        class="btn btn-link p-0 mr-2 text-danger ">
                                                        <i class="fa fa-times "></i>
                                                        <a class="nav-link p-2 text-decoration-none">Request Pending</a>
                                                    </button>
                                                </form>

                                            </div>
                                        @endif
                                    @else
                                        @if (Auth::check() && Auth::user()->role == 0 && Auth::user()->status == 0)
                                            <a class="nav-link p-2"
                                                href="{{ url('sent-request/' . Auth::user()->id) }}">Become a
                                                Vendor</a>
                                        @endif
                                    @endif
                                </li>
                                <li><a href="{{ route('user.cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ route('user.index') }}" class="active">Home</a></li>
                                <li><a href="{{ route('user.contactus') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search" />
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
