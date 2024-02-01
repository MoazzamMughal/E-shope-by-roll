@extends('user.index')

@section('content')
    <section id="cart_items">
        <div class="container">


            <div class="checkout-options">

                <ul class="nav">
                    <li>
                        <a href="{{ route('user.index') }}"><i class="fa fa-times"></i>Cancel</a>
                    </li>
                </ul>
            </div><!--/checkout-options-->


            <div class="review-payment">
                <h2>Review & Payment</h2>
            </div>

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
                                <td class="cart_total">
                                    <!-- Your quantity input here within a form -->
                                    <p class="cart_total_price">{{ $cartItem->quantity }}</p>
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


                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            @php
                                $totalPrice = 0;
                            @endphp

                            @foreach ($cartItems as $cartItem)
                                @php
                                    $itemTotal = $cartItem->product->product_price * $cartItem->quantity;
                                    $totalPrice += $itemTotal;
                                @endphp
                            @endforeach
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>${{ number_format($totalPrice, 2) }}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>${{ number_format($totalPrice, 2) }}</span></td>
                                </tr>
                            </table>
                        </td>
                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
                <span style=" float: right;">
                    <form method="POST" action="#">
                        @csrf
                        <button type="submit" class="btn btn-default update">Place Order</button>
                    </form>
                </span>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
