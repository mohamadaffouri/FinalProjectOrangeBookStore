@extends('layouts.app1')

@section('content')

<main>

    <!-- cart area start -->
    <section class="tp-cart-area pt-120  pb-120">
       <div class="container">
          <div class="row">
            @auth

            @else
            <div class="col-xl-7 col-lg-7">
                <div class="tp-checkout-verify">
                   <div class="tp-checkout-verify-item">
                      <p class="tp-checkout-verify-reveal">Returning customer? <button type="button" class="tp-checkout-login-form-reveal-btn">Click here to login</button></p>

                      <div id="tpReturnCustomerLoginForm" class="tp-return-customer">
                        <form action="{{ route('loginCheckOut') }}" method="POST">
@csrf
                            <div class="tp-return-customer-input">
                               <label>Email</label>
                               <input type="email" name="email" placeholder="Your Email">
                               @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                            </div>
                            <div class="tp-return-customer-input">
                               <label>Password</label>
                               <input type="password" name="password" placeholder="Password">
                               @error('password')
                               <div class="text-danger">{{ $message }}</div>
                           @enderror
                            </div>

                            <div class="tp-return-customer-suggetions d-sm-flex align-items-center justify-content-between mb-20">
                               <div class="tp-return-customer-remeber">
                                  <input id="remeber" type="checkbox">
                                  <label for="remeber">Remember me</label>
                               </div>
                               {{-- <div class="tp-return-customer-forgot">
                                  <a href="#">Forgot Password?</a>
                               </div> --}}
                            </div>
                            <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Login</button>
                         </form>
                      </div>
                   </div>
                </div>
            </div>
            @endauth

            <div class="col-xl-9 col-lg-8">
                <div class="tp-cart-list mb-25 mr-30">
                    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@php

        $totalPrice = session()->get('totalPrice', 0);// Retrieve cart items from session
@endphp

                   <table class="table">
                      <thead>
                         <tr>
                            <th colspan="2" class="tp-cart-header-product">Product</th>
                            <th class="tp-cart-header-price">Price</th>

                            <th></th>
                         </tr>
                      </thead>
                      <tbody>
                         @if(session('buyCart'))
                             @foreach(session('buyCart') as $id => $details)
                             <tr>
                                <!-- img -->
                                <td class="tp-cart-img"><a href="#"><img src="{{ $details['image'] }}" alt=""></a></td>
                                <!-- title -->
                                <td class="tp-cart-title"><a href="#">{{ $details['title'] }}</a></td>
                                <!-- price -->
                                <td class="tp-cart-price"><span>{{ $details['price'] }} </span></td>
                                {{-- {{ number_format($details['price'], 2) }} --}}
                                <!-- quantity -->

                                <!-- action -->
                                <td class="tp-cart-action">
                                   <form action="{{ route('buyCart.remove', $id) }}" method="POST">
                                       @csrf
                                       <button type="submit" class="tp-cart-action-btn">
                                          <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"/>
                                          </svg>
                                          <span>Remove</span>
                                       </button>
                                   </form>
                                </td>
                             </tr>
                             @endforeach
                         @else
                             <tr>
                                <td colspan="5">Your cart is empty</td>
                             </tr>
                         @endif
                      </tbody>
                      </table>
                </div>
                <div class="tp-cart-bottom">
                   <div class="row align-items-end">
                      <div class="col-xl-6 col-md-8">
                         <div class="tp-cart-coupon">
                            <form action="#">
                               <div class="tp-cart-coupon-input-box">
                                  <label>Coupon Code:</label>
                                  <div class="tp-cart-coupon-input d-flex align-items-center">
                                     <input type="text" placeholder="Enter Coupon Code">
                                     <button type="submit">Apply</button>
                                  </div>
                               </div>
                            </form>
                         </div>
                      </div>
                      <div class="col-xl-6 col-md-4">
                         <div class="tp-cart-update text-md-end">
                            <button type="button" class="tp-cart-update-btn">Update Cart</button>
                         </div>
                      </div>
                   </div>
                </div>
            </div>

             <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="tp-cart-checkout-wrapper">
                   <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                      <span class="tp-cart-checkout-top-title">Subtotal</span>
                      <span class="tp-cart-checkout-top-price">${{ $totalPrice }}</span>
                   </div>
                   <div class="tp-cart-checkout-shipping">
                      <h4 class="tp-cart-checkout-shipping-title">Shipping</h4>

                      <div class="tp-cart-checkout-shipping-option-wrapper">
                         <div class="tp-cart-checkout-shipping-option">
                            <input id="flat_rate" type="radio" name="shipping">
                            <label for="flat_rate">Flat rate: <span>$20.00</span></label>
                         </div>
                         <div class="tp-cart-checkout-shipping-option">
                            <input id="local_pickup" type="radio" name="shipping">
                            <label for="local_pickup">Local pickup: <span> $25.00</span></label>
                         </div>
                         <div class="tp-cart-checkout-shipping-option">
                            <input id="free_shipping" type="radio" name="shipping">
                            <label for="free_shipping">Free shipping</label>
                         </div>
                      </div>
                   </div>
                   <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                      <span>Total</span>
                      <span>${{ $totalPrice }}</span>
                   </div>
                   <div class="tp-cart-checkout-proceed">
                    @auth
                        <!-- Show the checkout button if the user is authenticated -->
                        <a href="{{ route('checkOut') }}" class="tp-cart-checkout-btn w-100">Proceed to Checkout</a>
                    @else
                        <!-- Show a message if the user is not authenticated -->
                        <div class="alert alert-warning">
                            Please <a href="{{ route('login') }}">sign in</a> to proceed to checkout.
                        </div>
                    @endauth
                </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- cart area end -->


 </main>

@endsection
