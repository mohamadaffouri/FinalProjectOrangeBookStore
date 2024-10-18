<!doctype html>
<html class="no-js" lang="zxx">

   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Acadia - University & Online Course HTML5 Template</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.png') }}">

      <!-- CSS here -->
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   </head>

   <body>

      <!-- pre loader area start -->
      <div id="loading">
         <div id="loading-center">
            <div id="loading-center-absolute">
               <!-- loading content here -->
               <div class="tp-preloader-content">
                  <div class="tp-preloader-logo">
                     <div class="tp-preloader-circle">
                        <svg width="190" height="190" viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round">
                           </circle>
                           <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle>
                        </svg>
                     </div>
                     <img src="{{ asset('assets/img/logo/preloader/preloader-icon.png') }}" alt="">
                  </div>
                  <p class="tp-preloader-subtitle">Loading...</p>
               </div>
            </div>
         </div>
      </div>
      <!-- pre loader area end -->

      <!-- back to top start -->
      <div class="back-to-top-wrapper">
         <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
         </button>
      </div>
      <!-- back to top end -->

      <!-- cart mini area start -->
      <div class="cartmini__area">
         <div class="cartmini__wrapper p-relative d-flex justify-content-between flex-column">
            <div class="cartmini__close">
               <button type="button" class="cartmini__close-btn cartmini-close-btn"><i class="fal fa-times"></i></button>
            </div>
            <div class="cartmini__top-wrapper">
               <div class="cartmini__top p-relative">
                  <div class="cartmini__top-title">
                     <h4>Shopping cart</h4>
                  </div>
               </div>
               {{-- <div class="cartmini__shipping home-shop">
                  <p> Free Shipping for all orders over <span>$50</span></p>
                  <div class="progress">
                     <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" data-width="70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div> --}}
               <div class="cartmini__widget">
                  <div class="cartmini__widget-item">

                     @php
    $cartItems = session()->get('cart', []); // Retrieve cart items from session
@endphp

@if (count($cartItems) > 0)
<div class="cartmini__item-wrapper">
    @foreach ($cartItems as $item)
        <div class="cartmini__item card mb-3">
            <div class="card-body d-flex">
                <!-- Image Section -->
                <div class="cartmini__img">
                    <img src="{{ $item['image'] ?? 'path/to/default-image.jpg' }}" alt="Book Image" class="img-fluid" style="max-width: 100px;">
                </div>

                <!-- Details Section -->
                <div class="cartmini__content ms-3">
                    <!-- Book Title -->
                    <h5 class="cartmini__title">
                        <a href="{{ route('books.show', $item['id']) }}">{{ $item['title'] }}</a>
                    </h5>

                    <!-- Price and Quantity -->
                    <div class="cartmini__price-wrapper d-flex align-items-center">
                        <span class="cartmini__price">${{ number_format($item['price'] ?? 0, 2) }}</span>
                        <span class="cartmini__quantity ms-2">x{{ $item['quantity'] }}</span>
                    </div>
                </div>

                <!-- Remove Button (Optional) -->
                <div class="cartmini__remove ms-auto">
                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                        @csrf <!-- Important for Laravel CSRF protection -->
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@else
    <p>No items in the cart.</p>
@endif

                  </div>
               </div>
               <!-- if no item in cart -->
               <div class="cartmini__empty text-center d-none">
                  <img src="{{ asset('assets/img/shop/empty-cart.png') }}" alt="">
                  <p>Your Cart is empty</p>
                  <a href="shop.html" class="tp-btn">Go to Shop</a>
               </div>
            </div>
            <div class="cartmini__checkout">
               <div class="cartmini__checkout-title mb-30">
                  <h4>Subtotal:</h4>
                  <span>${{ number_format(session()->get('cart_total_price', 0.0), 2) }}</span>
               </div>
               <div class="cartmini__checkout-btn home-shop">
                <a href="{{ route('sellCart') }}" class="tp-btn mb-10 w-100">View Cart</a>
                  <a href="checkout.html" class="tp-btn tp-btn-border w-100"> checkout</a>
               </div>
            </div>
         </div>
      </div>
      <div class="body-overlay"></div>
      <!-- cart mini area end -->



      <!-- header-area-start -->
      <header class="header-area p-relative">
         <div id="header-sticky" class="tp-header-2 tp-header-shop bxs-none">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xxl-4 col-lg-6 col-6">
                     <div class="tp-header-2-right d-flex align-items-center">
                        <div class="tp-header-shop-logo tp-header-logo pr-20">
                           <a href="index.html">
                              <img src="{{ asset('assets/img/logo/logo-black.png') }}" alt="logo">
                           </a>
                        </div>

                     </div>
                  </div>
                  <div class="col-xxl-5 col-lg-6 d-none d-xxl-block">
                     <div class="main-menu text-xxl-end d-none d-xxl-block">
                        <nav class="tp-main-menu-content">
                           <ul>
                              <li class=" tp-static">
                                 <a class="tp-static" href="{{ route('SellYourBook') }}">Home</a>
                              </li>
                              <li class="has-dropdown">
                                 <a href="about.html">Programs</a>
                              </li>
                              <li class="has-dropdown">
                                 <a href="#">Admissions</a>
                                 <ul class="tp-submenu">
                                    <li><a href="university-admission-overview.html">Overview</a></li>
                                 </ul>
                              </li>
                              <li class="has-dropdown tp-static">
                                 <a class="tp-static" href="#">Pages</a>
                              </li>
                              <li class="has-dropdown">
                                 <a href="blog-stories.html">Blog</a>
                              </li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <div class="col-xxl-3 col-lg-6 col-6">
                     <div class="tp-header-2-contact tp-header-shop d-flex align-items-center justify-content-end">
                        <div class="tp-header-2-cart d-none d-md-block">
                           <button class="cartmini-open-btn">
                              <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.87334 20.4998H14.2212C17.2875 20.4998 19.6399 19.3923 18.9717 14.9346L18.1937 8.89343C17.7818 6.66918 16.363 5.81792 15.1182 5.81792H4.9397C3.67655 5.81792 2.34016 6.73325 1.86419 8.89343L1.08616 14.9346C0.518651 18.8889 2.80698 20.4998 5.87334 20.4998Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.73159 5.59824C5.73159 3.21216 7.66588 1.27787 10.052 1.27787V1.27787C11.201 1.273 12.3046 1.72603 13.1188 2.53679C13.9329 3.34754 14.3906 4.44923 14.3906 5.59824V5.59824" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.08976 10.1017H7.13553" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12.9257 10.1017H12.9715" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </span>
                              <i>{{ session()->get('cart_total_items', 0) }}</i>
                           </button>
                        </div>
                        <div class="tp-header-shop-btn d-none d-lg-block">
                           <a class="tp-btn-inner" href="{{ route('homePage') }}">Buy our book</a>
                        </div>
                        <div class="tp-header-shop-login tp-header-user-hover">
                           <button> <img src="{{ Auth::check() ? (Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('assets/img/event/user.jpg')) : asset('assets/img/event/user.jpg') }}" alt="User Image" class="rounded-circle" width="100"></button>
                           <div class="tp-header-user-box">
                              <div class="tp-header-user-content">
                                 <div class="tp-header-user-profile d-flex align-items-center">
                                    <div class="tp-header-user-profile-thumb">
                                        <img src="{{ Auth::check() ? (Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('assets/img/event/user.jpg')) : asset('assets/img/event/user.jpg') }}" alt="User Image" class="rounded-circle" width="100">
                                    </div>
                                    <div class="tp-header-user-profile-content">
                                        @if(Auth::check())
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <span>{{ Auth::user()->role->name }}</span>
                                    @else
                                        <h4>Guest</h4>
                                    @endif
                                    </div>
                                 </div>
                                 <div class="tp-header-user-list">
                                    <ul>
                                        @if(Auth::check())
                                        <li><a href="{{ route('userOrders') }}">Sell Orders</a></li>
                                       <li><a href="{{ route('user.edit', auth()->user()->id) }}">My Profile</a></li>
                                       <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                Logout
                                            </a>
                                        </form>
                                    </li>                                    @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    @endif

                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="offcanvas-btn d-xxl-none ml-30">
                           <button class="offcanvas-open-btn"><i class="fa-solid fa-bars"></i></button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- header-area-end -->

      <!-- offcanvas area start -->
      <div class="offcanvas__area">
         <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
               <button class="offcanvas__close-btn offcanvas-close-btn">
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
               </button>
            </div>
            <div class="offcanvas__content">
               <div class="offcanvas__top mb-90 d-flex justify-content-between align-items-center">
                  <div class="offcanvas__logo tp-header-logo">
                     <a href="index.html">
                        <img src="{{ asset('assets/img/logo/logo-black.png') }}" alt="logo">
                     </a>
                  </div>
               </div>
               <div class="offcanvas-main">
                  <div class="offcanvas-content">
                     <h3 class="offcanvas-title">Hello There!</h3>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                  </div>
                  <div class="tp-main-menu-mobile d-xxl-none"></div>
                  <div class="offcanvas-gallery">
                     <div class="row gx-2">
                        <div class="col-md-3 col-3">
                           <div class="offcanvas-gallery-img fix">
                              <a href="#"><img src="{{ asset('assets/img/menu/offcanvas/offcanvas-1.jpg') }}" alt=""></a>
                           </div>
                        </div>
                        <div class="col-md-3 col-3">
                           <div class="offcanvas-gallery-img fix">
                              <a href="#"><img src="{{ asset('assets/img/menu/offcanvas/offcanvas-2.jpg') }}" alt=""></a>
                           </div>
                        </div>
                        <div class="col-md-3 col-3">
                           <div class="offcanvas-gallery-img fix">
                              <a href="#"><img src="{{ asset('assets/img/menu/offcanvas/offcanvas-3.jpg') }}" alt=""></a>
                           </div>
                        </div>
                        <div class="col-md-3 col-3">
                           <div class="offcanvas-gallery-img fix">
                              <a href="#"><img src="{{ asset('assets/img/menu/offcanvas/offcanvas-4.jpg') }}" alt=""></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="offcanvas-contact">
                     <h3 class="offcanvas-title sm">Information</h3>
                     <ul>
                        <li><a href="tel:1245654">+ 4 20 7700 1007</a></li>
                        <li><a href="mailto:hello@acadia.com">hello@acadia.com</a></li>
                        <li><a href="#">Avenue de Roma 158b, Lisboa</a></li>
                     </ul>
                  </div>
                  <div class="offcanvas-social">
                     <h3 class="offcanvas-title sm">Follow Us</h3>
                     <ul>
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="body-overlay"></div>
      <!-- offcanvas area end -->

      @yield('content')

      <!-- footer-area-start -->
      <footer>
         <div class="tp-footer-main tp-footer-shop pt-80 pb-55">
            <div class="container">
               <div class="row">
                  <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                     <div class="tp-footer-widget tp-footer-shop-col-1 mb-30">
                        <div class="tp-footer-widget-logo mb-20 tp-header-logo">
                           <a href="index.html"><img src="{{ asset('assets/img/logo/logo-black.png') }}" alt=""></a>
                        </div>
                        <div class="tp-footer-widget-content">
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="tp-footer-contact shop">
                           <span>Got Questions? Call us</span>
                           <a href="tel:012345678">+670 413 90 762</a>
                        </div>
                        <div class="tp-footer-contact-mail shop">
                           <a href="mailto:acadia@gmail.com">
                              <span>
                                 <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13 5.40039L10.496 7.40015C9.672 8.05607 8.32 8.05607 7.496 7.40015L5 5.40039" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 11.4004H5.8" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 8.19922H3.4" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </span>
                           acadia@gmail.com</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
                     <div class="tp-footer-widget tp-footer-shop-col-2 mb-30">
                        <h4 class="tp-footer-widget-title mb-15">About</h4>
                        <div class="tp-footer-widget-link">
                           <ul>
                              <li><a href="about.html">About Us</a></li>
                              <li><a href="#">Courses</a></li>
                              <li><a href="#">News & Blogs</a></li>
                              <li><a href="#">Become a Teacher</a></li>
                              <li><a href="#">Events</a></li>
                              <li><a href="#">Contact</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-3 col-md-5 col-sm-5">
                     <div class="tp-footer-widget tp-footer-shop-col-3 mb-30">
                        <h4 class="tp-footer-widget-title mb-15">Quick links</h4>
                        <div class="tp-footer-widget-link">
                           <ul>
                              <li><a href="#">Students</a></li>
                              <li><a href="#">Admission</a></li>
                              <li><a href="#">Faculty & Staff</a></li>
                              <li><a href="#">Media Relations</a></li>
                              <li><a href="#">Alumni</a></li>
                              <li><a href="#">Visit</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-3 col-md-7 col-sm-7">
                     <div class="tp-footer-widget tp-footer-shop-col-4 mb-30">
                        <h4 class="tp-footer-widget-title mb-15">Our Newsletter</h4>
                        <div class="tp-footer-newsletter-wrap">
                           <p>Enter your email and we'll send you more information</p>
                           <form action="#">
                              <div class="tp-footer-newsletter-wrapper tp-footer-shop-input mb-30">
                                 <div class="tp-footer-newsletter-input">
                                    <input type="email" placeholder="Your email">
                                 </div>
                                 <div class="tp-footer-5-newsletter-submit">
                                    <button class="tp-btn-inner">Subscribe</button>
                                 </div>
                              </div>
                           </form>
                           <div class="tp-footer-newsletter-social tp-footer-inner-social">
                              <a class="social-fb" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                              <a class="social-twit" href="#"><i class="fa-brands fa-twitter"></i></a>
                              <a class="social-lnkd" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                              <a class="social-yout" href="#"><i class="fa-brands fa-youtube"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tp-footer-5-bottom tp-footer-shop-bottom">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-md-6">
                     <div class="tp-footer-copyright ">
                        <span>© 2024 <a href="#">Acadia</a>. All rights reserved.</span>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="tp-footer-copyright-payment text-start text-md-end">
                        <a href="#"><img src="{{ asset('assets/img/footer/pay_brand.png') }}" alt=""></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer-area-end -->

      <!-- JS here -->
      <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
      <script src="{{ asset('assets/js/vendor/waypoints.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap-bundle.js') }}"></script>
      <script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
      <script src="{{ asset('assets/js/slick.js') }}"></script>
      <script src="{{ asset('assets/js/range-slider.js') }}"></script>
      <script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
      <script src="{{ asset('assets/js/nice-select.js') }}"></script>
      <script src="{{ asset('assets/js/purecounter.js') }}"></script>
      <script src="{{ asset('assets/js/countdown.js') }}"></script>
      <script src="{{ asset('assets/js/wow.js') }}"></script>
      <script src="{{ asset('assets/js/isotope-pkgd.js') }}"></script>
      <script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
      <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
      <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
      <script src="{{ asset('assets/js/main.js') }}"></script>

   </body>

</html>
