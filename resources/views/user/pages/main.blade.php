@extends('user.index')

@section('content')
    <section id="slider"><!--slider-->

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <!-- Carousel Indicators -->
                        <ol class="carousel-indicators">
                            @foreach ($products as $index => $product)
                                <li data-target="#slider-carousel" data-slide-to="{{ $index }}"
                                    class="{{ $index == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>

                        <div class="carousel-inner">
                            @foreach ($products as $index => $product)
                                <div class="item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>{{ $product->product_name }}</h2>
                                        <p>{{ $product->product_detail }} </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{ asset('storage/' . $product->product_image) }}"
                                            class="girl img-responsive" alt />
                                        <img src="{{ asset('user/images/home/pricing.png') }}" class="pricing" alt />
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </section><!--/slider-->


    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-products-->
                            @foreach ($categories as $category)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordian"
                                                href="#category_{{ $category->id }}">
                                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                {{ $category->name }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="category_{{ $category->id }}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <!-- You can add links or further details for each category if needed -->
                                                @foreach ($category->products as $product)
                                                    <li><a href="#">{{ $product->product_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!--/category-products-->
                        <div class="shipping text-center"><!--shipping-->
                            <img src="{{ asset('user/images/home/shipping.jpg') }}" alt />
                        </div><!--/shipping-->
                    </div>

                </div>

                <div class="col-sm-9 padding-right">
                    <h2 class="title text-center">Features Items</h2>
                    <div class="features_items " style="display: flex; flex-wrap:wrap;"><!--features_items-->
                        @foreach ($products as $product)
                            <div class="col-sm-4 ">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('storage/' . $product->product_image) }}"
                                                alt="{{ $product->product_name }}" style=" width:100px; height:100px;">
                                            <h2>${{ $product->product_price }}</h2>
                                            <p>{{ $product->product_name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>${{ $product->product_price }}</h2>
                                                <p>{{ $product->product_name }}</p>
                                                <form action="{{ route('cart.add') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <button type="submit" class="btn btn-default add-to-cart">
                                                        <i class="fa fa-shopping-cart"></i> Add to cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <!--features_items-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($products->chunk(3) as $key => $chunk)
                                    <div class="item {{ $key == 0 ? 'active' : '' }}">
                                        <div class="row">
                                            @foreach ($chunk as $product)
                                                <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                        <div class="single-products">
                                                            <div class="productinfo text-center">
                                                                <img src="{{ asset('storage/' . $product->product_image) }}"
                                                                    alt="{{ $product->product_name }}"
                                                                    style="max-width: 100px; max-height: 100px;">
                                                                <h2>${{ $product->product_price }}</h2>
                                                                <p>{{ $product->product_name }}</p>
                                                                <a href="#" class="btn btn-default add-to-cart"><i
                                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/recommended_items-->


                </div>
            </div>
        </div>
    </section>
@endsection



