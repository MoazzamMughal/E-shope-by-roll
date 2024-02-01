@extends('user.index')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $cartItem)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img
                                            src="{{ asset('storage/' . $cartItem->product->product_image) }}"alt="{{ $cartItem->product->product_name }}"
                                            style=" width:100px; height:100px;"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $cartItem->product->product_name }}</a></h4>
                                  
                                </td>
                                <td class="cart_price">
                                    <p>${{ $cartItem->product->product_price }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <!-- Your quantity input here within a form -->
                                        <form action="{{ route('cart.update') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="cart_item_id" value="{{ $cartItem->id }}">
                                            <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cartItem->quantity }}" autocomplete="off" size="2">
                                            <button type="submit" class="btn btn-outline-info">Update</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">
                                        ${{ $cartItem->product->product_price * $cartItem->quantity }}</p>
                                </td>
                                <td class="cart_delete">
                                    <!-- Your delete button/link here -->
                                    <a class="cart_quantity_delete"
                                        href="{{ route('cart.delete', ['id' => $cartItem->id]) }}"><i
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">

            <div class="row">

                <div class="col-sm-6">
                    <div class="total_area">
                        @php
                            $totalPrice = 0;
                        @endphp

                        @foreach ($cartItems as $cartItem)
                            @php
                                $itemTotal = $cartItem->product->product_price * $cartItem->quantity;
                                $totalPrice += $itemTotal;
                            @endphp
                        @endforeach
                        <ul>
                            <li>Cart Sub Total <span>${{ number_format($totalPrice, 2) }}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>${{ number_format($totalPrice, 2) }}</span></li>

                        </ul>



                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{route('user.chackout')}}">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection
