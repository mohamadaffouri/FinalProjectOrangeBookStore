@extends('layouts.app1')

@section('content')

<main>

    <!-- checkout area start -->
    <section class="tp-checkout-area pt-120 pb-120" data-bg-color="#EFF1F5">
       <div class="container">
          <div class="row">
             <div class="col-xl-7 col-lg-7">
                <div class="tp-checkout-verify">
                   <div class="tp-checkout-verify-item">
                      <p class="tp-checkout-verify-reveal">Returning customer? <button type="button" class="tp-checkout-login-form-reveal-btn">Click here to login</button></p>

                      <div id="tpReturnCustomerLoginForm" class="tp-return-customer">
                         <form action="#">

                            <div class="tp-return-customer-input">
                               <label>Email</label>
                               <input type="text" placeholder="Your Email">
                            </div>
                            <div class="tp-return-customer-input">
                               <label>Password</label>
                               <input type="password" placeholder="Password">
                            </div>

                            <div class="tp-return-customer-suggetions d-sm-flex align-items-center justify-content-between mb-20">
                               <div class="tp-return-customer-remeber">
                                  <input id="remeber" type="checkbox">
                                  <label for="remeber">Remember me</label>
                               </div>
                               <div class="tp-return-customer-forgot">
                                  <a href="#">Forgot Password?</a>
                               </div>
                            </div>
                            <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Login</button>
                         </form>
                      </div>
                   </div>
                   <div class="tp-checkout-verify-item">
                      <p class="tp-checkout-verify-reveal">Have a coupon? <button type="button" class="tp-checkout-coupon-form-reveal-btn">Click here to enter your code</button></p>

                      <div id="tpCheckoutCouponForm" class="tp-return-customer">
                         <form action="#">
                            <div class="tp-return-customer-input">
                               <label>Coupon Code :</label>
                               <input type="text" placeholder="Coupon">
                            </div>
                            <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Apply</button>
                         </form>
                      </div>
                   </div>
                </div>
             </div>


             <style>
                .address-card {
                    border: 1px solid #ddd;
                    padding: 15px;
                    margin-bottom: 15px;
                    border-radius: 10px;
                    background-color: #f9f9f9;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                .address-card input[type="radio"] {
                    margin-right: 10px;
                }

                .address-card h5 {
                    margin: 0;
                    font-size: 1.1em;
                    color: #333;
                    font-weight: bold;
                }

                .address-card p {
                    margin: 5px 0;
                    font-size: 0.9em;
                    color: #666;
                }

                .address-card .phone {
                    font-weight: bold;
                }

                .address-card .select-label {
                    display: flex;
                    align-items: center;
                }
            </style>
             <div class="col-lg-7">
                <div class="tp-checkout-bill-area">
                    <h3 class="tp-checkout-bill-title">Billing Details</h3>

                    <div class="tp-checkout-bill-form">
                        <!-- Check if the user has existing addresses -->
                        @php
                            $addresses = auth()->user()->addresses; // Fetch all user addresses
                            $selectedAddressId = session()->get('selected_address');
                        @endphp


                        @if($addresses->isNotEmpty())
                            <!-- Display the existing addresses -->
                            <h4>Select a Shipping Address:</h4>
                            <form id="addressForm" action="{{ route('save.address') }}" method="POST">
                                @csrf

                                <!-- Existing Addresses -->
                                @php
                                    $addresses = auth()->user()->addresses; // Fetch all user addresses
                                @endphp

                                @if($addresses->isNotEmpty())
                                    <h4>Select a Shipping Address:</h4>
                                    @foreach($addresses as $address)
                                    <div class="address-card" onclick="selectAddress({{ $address->id }})">
                                        <label class="select-label">
                                            <input type="radio" name="selected_address" value="{{ $address->id }}"
                    {{ $selectedAddressId == $address->id ? 'checked' : '' }} required>
                                            <div>
                                                <h5>{{ $address->first_name }} {{ $address->last_name }}</h5>
                                                <p>{{ $address->company_name ?? 'N/A' }}</p>
                                                <p>{{ $address->address_line1 }}</p>
                                                @if($address->address_line2)
                                                    <p>{{ $address->address_line2 }}</p>
                                                @endif
                                                <p>{{ $address->city }}, {{ $address->state }}, {{ $address->zip_code }}</p>
                                                <p>{{ $address->country }}</p>
                                                <p class="phone">Phone: {{ $address->phone }}</p>
                                            </div>
                                        </label>
                                    </div>
                                    @endforeach
                                @else
                                    <h4>No saved addresses. Please add a new one below:</h4>
                                @endif

                                <!-- Optionally, you can keep a submit button for fallback -->
                                <div class="tp-checkout-btn-wrapper mt-3">
                                    <button type="submit" class="tp-checkout-btn w-100" style="display: none;">Save Address and Proceed</button>
                                </div>
                            </form>
                            <script>
                                function selectAddress(addressId) {
                                    // Select the radio button
                                    document.querySelector(`input[name="selected_address"][value="${addressId}"]`).checked = true;

                                    // Automatically submit the form
                                    document.getElementById('addressForm').submit();
                                }
                            </script>

                            <!-- Option to add a new address -->
                            <div class="tp-checkout-option">
                                <input id="use_new_address" type="radio" name="selected_address" value="new" onclick="toggleNewAddressForm()">
                                <label for="use_new_address">Use a different address</label>
                            </div>
                        @else
                            <!-- If no existing address, display only the form -->
                            <h4>Please fill out your address details:</h4>
                        @endif

                        <!-- New Address Form -->
                        <div id="new_address_form" style="display: {{ $addresses->isNotEmpty() ? 'none' : 'block' }};">
                            <form action="{{ route('address.store') }}" method="POST">
                                @csrf
                                <div class="tp-checkout-bill-inner">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="tp-checkout-input">
                                                <label>First Name <span>*</span></label>
                                                <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="tp-checkout-input">
                                                <label>Last Name <span>*</span></label>
                                                <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tp-checkout-input">
                                                <label>Company name (optional)</label>
                                                <input type="text" name="company_name" placeholder="Example LTD." value="{{ old('company_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tp-checkout-input">
                                                <label>Country / Region</label>
                                                <input type="text" name="country" placeholder="United States (US)" value="{{ old('country') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tp-checkout-input">
                                                <label>Street address</label>
                                                <input type="text" name="address_line1" placeholder="House number and street name" value="{{ old('address_line1') }}" required>
                                            </div>
                                            <div class="tp-checkout-input">
                                                <input type="text" name="address_line2" placeholder="Apartment, suite, unit, etc. (optional)" value="{{ old('address_line2') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tp-checkout-input">
                                                <label>Town / City</label>
                                                <input type="text" name="city" placeholder="" value="{{ old('city') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="tp-checkout-input">
                                                <label>State / County</label>
                                                <select name="state" required>
                                                    <option value="New York US">New York US</option>
                                                    <option value="Berlin Germany">Berlin Germany</option>
                                                    <option value="Paris France">Paris France</option>
                                                    <option value="Tokiyo Japan">Tokiyo Japan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="tp-checkout-input">
                                                <label>Postcode ZIP</label>
                                                <input type="text" name="zip_code" placeholder="" value="{{ old('zip_code') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tp-checkout-input">
                                                <label>Phone <span>*</span></label>
                                                <input type="text" name="phone" placeholder="" value="{{ old('phone') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tp-checkout-input">
                                                <label>Email address <span>*</span></label>
                                                <input type="email" name="email" value="{{ auth()->user()->email }}" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tp-checkout-btn-wrapper">
                                    <button type="submit" class="tp-checkout-btn w-100">Save New Address</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function toggleNewAddressForm() {
                    const form = document.getElementById('new_address_form');
                    form.style.display = 'block';
                }
            </script>


             <div class="col-lg-5">
                <!-- checkout place order -->
                <div class="tp-checkout-place white-bg">
                   <h3 class="tp-checkout-place-title">Your Order</h3>

                   <div class="tp-order-info-list">
                      <ul>

                         <!-- header -->
                         <li class="tp-order-info-list-header">
                            <h4>Product</h4>
                            <h4>Total</h4>
                         </li>


                         @php
                            $cartItems = session()->get('buyCart', []);
                            $totalQuantity = session()->get('totalQuantity', 0);
                                $totalPrice = session()->get('totalPrice', 0);// Retrieve cart items from session
                        @endphp
                        <!-- item list -->
                        @foreach ($cartItems as $item )


                        <li class="tp-order-info-list-desc">
                            <p>{{ implode(' ', array_slice(explode(' ', $item['title']), 0, 3)) }} </p>

                           <span>{{ number_format($item['price'] ?? 0, 2) }}</span>
                        </li>
                        @endforeach

                         <!-- subtotal -->
                         <li class="tp-order-info-list-subtotal">
                            <span>Subtotal</span>
                            <span>${{ $totalPrice }}</span>
                         </li>

                         <!-- shipping -->
                         <li class="tp-order-info-list-shipping">
                            <span>Shipping</span>
                            <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                               <span>
                                  <input id="flat_rate" type="radio" name="shipping">
                                  <label for="flat_rate">Flat rate: <span>$20.00</span></label>
                               </span>
                               <span>
                                  <input id="local_pickup" type="radio" name="shipping">
                                  <label for="local_pickup">Local pickup: <span>$25.00</span></label>
                               </span>
                               <span>
                                  <input id="free_shipping" type="radio" name="shipping">
                                  <label for="free_shipping">Free shipping</label>
                               </span>
                            </div>
                         </li>

                         <!-- total -->
                         <li class="tp-order-info-list-total">
                            <span>Total</span>
                            <span>$1,476.00</span>
                         </li>
                      </ul>
                   </div>
                   <div class="tp-checkout-payment">
                      <div class="tp-checkout-payment-item">
                         <input type="radio" id="back_transfer" name="payment">
                         <label for="back_transfer" data-bs-toggle="direct-bank-transfer">Direct Bank Transfer</label>
                         <div class="tp-checkout-payment-desc direct-bank-transfer">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                         </div>
                      </div>
                      <div class="tp-checkout-payment-item">
                         <input type="radio" id="cheque_payment" name="payment">
                         <label for="cheque_payment">Cheque Payment</label>
                         <div class="tp-checkout-payment-desc cheque-payment">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                         </div>
                      </div>
                      <div class="tp-checkout-payment-item">
                         <input type="radio" id="cod" name="payment">
                         <label for="cod">Cash on Delivery</label>
                         <div class="tp-checkout-payment-desc cash-on-delivery">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                         </div>
                      </div>
                      <div class="tp-checkout-payment-item paypal-payment">
                         <input type="radio" id="paypal" name="payment">
                         <label for="paypal">PayPal <img src="assets/img/shop/payment-option.png" alt=""> <a href="#">What is PayPal?</a></label>
                      </div>
                   </div>
                   <div class="tp-checkout-agree">
                      <div class="tp-checkout-option">
                         <input id="read_all" type="checkbox">
                         <label for="read_all">I have read and agree to the website.</label>
                      </div>
                   </div>
                   <form action="{{ route('placeOrder') }}" method="POST">
                    @csrf
                    <div class="tp-checkout-btn-wrapper">
                        <button type="submit" class="tp-checkout-btn w-100">Place Order</button>
                    </div>
                </form>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- checkout area end -->


 </main>

 @endsection
