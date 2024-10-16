@extends('layouts.app1')

@section('content')

<main>

    <!-- shop banner area start -->
    <section class="tp-shop-banner-ptb p-relative pt-110 pb-140">
       <div class="tp-shop-banner-bg" data-background="assets/img/shop/shop-thumb-bg.png"></div>
       <div class="tp-shop-banner-space p-relative fix">
          <div class="tp-shop-banner-active">
             <div class="swiper-wrapper">
                <div class="swiper-slide">
                   <div class="container">
                      <div class="row">
                         <div class="col-lg-7">
                            <div class="tp-shop-banner-thumb">
                               <img src="assets/img/shop/shop-thumb-1.png" alt="">
                            </div>
                         </div>
                         <div class="col-lg-5">
                            <div class="tp-shop-banner-content">
                               <span>Sale Up To 25% Off</span>
                               <h3 class="tp-shop-banner-title">Unleash your Imagination with Books</h3>
                               <div class="tp-shop-banner-btn">
                                  <a href="{{ route('books.index') }}">Shop Now <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                   </svg></span></a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="swiper-slide">
                   <div class="container">
                      <div class="row">
                         <div class="col-lg-7">
                            <div class="tp-shop-banner-thumb text-center">
                               <img src="assets/img/shop/shop-thumb-2.png" alt="">
                            </div>
                         </div>
                         <div class="col-lg-5">
                            <div class="tp-shop-banner-content">
                               <span>Sale Up To 25% Off</span>
                               <h3 class="tp-shop-banner-title">50% off hundreds of Books</h3>
                               <div class="tp-shop-banner-btn">
                                  <a href="{{ route('books.index') }}">Shop Now <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                   </svg></span></a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="swiper-slide">
                   <div class="container">
                      <div class="row">
                         <div class="col-lg-7">
                            <div class="tp-shop-banner-thumb text-center">
                               <img src="assets/img/shop/shop-thumb-3.png" alt="">
                            </div>
                         </div>
                         <div class="col-lg-5">
                            <div class="tp-shop-banner-content">
                               <span>Sale Up To 25% Off</span>
                               <h3 class="tp-shop-banner-title">Meet Your Next Favorite Book.</h3>
                               <div class="tp-shop-banner-btn">
                                  <a href="{{ route('books.index') }}">Shop Now <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                   </svg></span></a>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="tp-shop-banner-dot"></div>
    </section>
    <!-- shop banner area end -->


    <!-- shop feature area start -->
    <section class="tp-shop-feature-area pt-100 pb-95">
       <div class="container">
          <div class="row">
             <div class="col-lg-12">
                <div class="tp-shop-feature-heading text-center">
                   <h3 class="tp-shop-feature-title">Featured Categories</h3>
                   <p>Aliens, tech marvels, and cosmic wonders await in these mind-bending sagas.</p>
                </div>
             </div>
          </div>
          <div class="row">
             <div class="col-lg-4 col-md-6">
                <div class="tp-shop-feature-thumb p-relative mb-25">
                   <img src="assets/img/shop/feature/shop-feature-1.jpg" alt="">
                   <div class="tp-shop-feature-content">
                      <span>FICTION</span>
                      <h4>Huge Sale! <br> Don't miss Out</h4>
                   </div>
                   <div class="tp-shop-feature-btn">
                      <a href="{{ route('books.index') }}">Shop Now <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                       </svg></span></a>
                   </div>
                </div>
             </div>
             <div class="col-lg-4 col-md-6">
                <div class="tp-shop-feature-thumb p-relative mb-25">
                   <img src="assets/img/shop/feature/shop-feature-2.jpg" alt="">
                   <div class="tp-shop-feature-content">
                      <span>NOVEL</span>
                      <h4>Summer <br> Sale bozana</h4>
                   </div>
                   <div class="tp-shop-feature-btn">
                      <a href="{{ route('books.index') }}l">Shop Now <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                       </svg></span></a>
                   </div>
                </div>
                <div class="tp-shop-feature-thumb p-relative mb-25">
                   <img src="assets/img/shop/feature/shop-feature-3.jpg" alt="">
                   <div class="tp-shop-feature-content">
                      <span>NOVEL</span>
                      <h4>Summer <br> Sale bozana</h4>
                   </div>
                   <div class="tp-shop-feature-btn">
                      <a href="{{ route('books.index') }}">Shop Now <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                       </svg></span></a>
                   </div>
                </div>
             </div>
             <div class="col-lg-4 col-md-6">
                <div class="tp-shop-feature-thumb p-relative mb-25">
                   <img src="assets/img/shop/feature/shop-feature-4.jpg" alt="">
                   <div class="tp-shop-feature-content">
                      <span>NOVEL</span>
                      <h4>Summer <br> Sale bozana</h4>
                   </div>
                   <div class="tp-shop-feature-btn">
                      <a href="{{ route('books.index') }}">Shop Now <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                       </svg></span></a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- shop feature area end -->


    <!-- shop product area start -->
    <section class="tp-shop-product-area pb-50">
       <div class="container">
          <div class="row">
             <div class="col-lg-12">
                <div class="tp-shop-product-tab mb-60">
                   <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">New Arrival <span><img src="assets/img/shop/shop-shape.svg" alt=""></span></button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Sales Books  <span><img src="assets/img/shop/shop-shape.svg" alt=""></span></button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Best Seller</button>
                      </li>
                    </ul>
                </div>
             </div>
          </div>

          <div class="tab-content" id="pills-tabContent">
             <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
        @foreach ($newArrivals as $inventoryItem)
         <div class="col-lg-3 col-sm-6">
            <div class="tp-shop-product-item text-center mb-50 fixed-card-size d-flex flex-column" style="height: 100%; justify-content: space-between;     background-color: #f9f9f5;
            ">
                    <!-- Image container with fixed size and centered image -->
                    <div class="tp-shop-product-thumb p-relative" style="height: 300px; display: flex; justify-content: center; align-items: center; background-color: #f9f9f9;">
                        <a href="{{ route('books.show', $inventoryItem->id) }}">
                           <img src="{{ $inventoryItem->book->image ?? asset('images/default-book-image.jpg') }}"
     alt="Book Image"
     style="width: 100%; max-width: 300px; height: 200px; object-fit: cover;   background-color: #f8f8f8;">
                        </a>
                        <div class="tp-shop-product-thumb-tag">
                            <span class="{{ $inventoryItem->condition == 'new' ? 'new' : 'hot' }}">{{ ucfirst($inventoryItem->condition) }}</span>
                        </div>
                        <div class="tp-shop-product-thumb-btn">
               <form action="{{ route('addToCart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="inventory_id" value="{{ $inventoryItem->id }}">
                         <input type="hidden" name="book_id" value="{{ $inventoryItem->book->id }}">
                        <input type="hidden" name="title" value="{{ $inventoryItem->book->title }}">
                        <input type="hidden" name="condition" value="{{ $inventoryItem->condition }}">
                        <input type="hidden" name="price" value="{{ $inventoryItem->discount_price ?? $inventoryItem->price }}">
                        <input type="hidden" name="image" value="{{ $inventoryItem->book->image ?? asset('images/default-book-image.jpg') }}">
                       <button type="submit" class="btn btn-primary">Add to cart</button>


                    </form>
            </div>
                    </div>
                    <!-- Inventory content -->
                    <div class="tp-shop-product-content card-content d-flex flex-column" style="flex-grow: 1;">
                        <div class="tp-shop-product-tag">
                            <span>{{ $inventoryItem->book->author }}</span>
                        </div>
                        <h4 class="tp-shop-product-title card-title">
                            <a href="{{ route('books.show', $inventoryItem->id) }}">{{ $inventoryItem->book->title }}</a>
                        </h4>
                    </div>
                    <!-- Status, Quantity, and Price at the bottom -->
                    <div class="tp-shop-product-bottom mt-auto" style="text-align: center; padding-bottom: 10px;">
                        <div class="tp-shop-product-price card-price">
                            <span>Quantity: {{ $inventoryItem->quantity }}</span>
                        </div>
                        <div class="tp-shop-product-status card-status">
                            <span>Status: {{ ucfirst($inventoryItem->status) }}</span>
                        </div>
                      <div class="tp-shop-product-price" style="padding-top: 10px;">
    @if (!is_null($inventoryItem->discount_price))
        <!-- Discounted price and original price -->
        <span class="new-price" style="color: #e74c3c; font-weight: bold;">${{ number_format($inventoryItem->discount_price, 2) }}</span>
        <span class="old-price" style="text-decoration: line-through; color: #999; margin-left: 10px;">${{ number_format($inventoryItem->price, 2) }}</span>
    @else
        <!-- Show only the original price -->
        <span class="new-price">${{ number_format($inventoryItem->price, 2) }}</span>
    @endif
</div>
                    </div>
                </div>
         </div>
         @endforeach
      </div>
             </div>
             <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                 <div class="row">
        @foreach ($discountedBooks as $discountedBook)
         <div class="col-lg-3 col-sm-6 mb-60">
            <div class="tp-shop-product-item text-center mb-50 fixed-card-size d-flex flex-column" style="height: 100%; justify-content: space-between;     background-color: #f9f9f5;
            ">
                    <!-- Image container with fixed size and centered image -->
                    <div class="tp-shop-product-thumb p-relative" style="height: 300px; display: flex; justify-content: center; align-items: center; background-color: #f9f9f9;">
                        <a href="{{ route('books.show', $discountedBook->id) }}">
                                   <img src="{{ $discountedBook->book->image ?? asset('images/default-book-image.jpg') }}"
     alt="Book Image"
     style="width: 100%; max-width: 300px; height: 200px; object-fit: cover;   background-color: #f8f8f8;">
                        </a>
                        <div class="tp-shop-product-thumb-tag">
                            <span class="{{ $discountedBook->condition == 'new' ? 'new' : 'hot' }}">{{ ucfirst($discountedBook->condition) }}</span>
                        </div>
                          <div class="tp-shop-product-thumb-btn">
               <form action="{{ route('addToCart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="inventory_id" value="{{ $discountedBook->id }}">
                         <input type="hidden" name="book_id" value="{{ $discountedBook->book->id }}">
                        <input type="hidden" name="title" value="{{ $discountedBook->book->title }}">
                        <input type="hidden" name="condition" value="{{ $discountedBook->condition }}">
                        <input type="hidden" name="price" value="{{ $discountedBook->discount_price ?? $discountedBook->price }}">
                        <input type="hidden" name="image" value="{{ $discountedBook->book->image ?? asset('images/default-book-image.jpg') }}">
                       <button type="submit" class="btn btn-primary">Add to cart</button>


                    </form>
            </div>
                    </div>
                    <!-- Inventory content -->
                    <div class="tp-shop-product-content card-content d-flex flex-column" style="flex-grow: 1;">
                        <div class="tp-shop-product-tag">
                            <span>{{ $discountedBook->book->author }}</span>
                        </div>
                        <h4 class="tp-shop-product-title card-title">
                            <a href="{{ route('books.show', $discountedBook->id) }}">{{ $discountedBook->book->title }}</a>
                        </h4>
                    </div>
                    <!-- Status, Quantity, and Price at the bottom -->
                    <div class="tp-shop-product-bottom mt-auto" style="text-align: center; padding-bottom: 10px;">
                        <div class="tp-shop-product-price card-price">
                            <span>Quantity: {{ $discountedBook->quantity }}</span>
                        </div>
                        <div class="tp-shop-product-status card-status">
                            <span>Status: {{ ucfirst($discountedBook->status) }}</span>
                        </div>
                            <div class="tp-shop-product-price" style="padding-top: 10px;">
    @if (!is_null($discountedBook->discount_price))
        <!-- Discounted price and original price -->
        <span class="new-price" style="color: #e74c3c; font-weight: bold;">${{ number_format($discountedBook->discount_price, 2) }}</span>
        <span class="old-price" style="text-decoration: line-through; color: #999; margin-left: 10px;">${{ number_format($discountedBook->price, 2) }}</span>
    @else
        <!-- Show only the original price -->
        <span class="new-price">${{ number_format($discountedBook->price, 2) }}</span>
    @endif
</div>
                    </div>
                </div>
         </div>
         @endforeach
      </div>
             </div>
             <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="row">
                   <div class="col-lg-3 col-sm-6">
                      <div class="tp-shop-product-item text-center mb-50">
                         <div class="tp-shop-product-thumb p-relative">
                            <a href="shop-details.html"><img src="assets/img/shop/product/shop-product-5.jpg" alt=""></a>
                            <div class="tp-shop-product-thumb-tag">
                               <span class="off">35% off</span>
                            </div>
                            <div class="tp-shop-product-thumb-btn">
                               <button>Add to cart</button>
                            </div>
                         </div>
                         <div class="tp-shop-product-content">
                            <div class="tp-shop-product-tag">
                               <span>Business Of Art</span>
                            </div>
                            <h4 class="tp-shop-product-title"><a href="shop-details.html">Camilla Sten</a></h4>
                            <div class="tp-shop-product-price">
                               <span>$105.00</span>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-3 col-sm-6">
                      <div class="tp-shop-product-item text-center mb-50">
                         <div class="tp-shop-product-thumb p-relative">
                            <a href="shop-details.html"><img src="assets/img/shop/product/shop-product-6.jpg" alt=""></a>
                            <div class="tp-shop-product-thumb-tag">
                               <span class="hot">Hot</span>
                            </div>
                            <div class="tp-shop-product-thumb-btn">
                               <button>Add to cart</button>
                            </div>
                         </div>
                         <div class="tp-shop-product-content">
                            <div class="tp-shop-product-tag">
                               <span>History</span>
                            </div>
                            <h4 class="tp-shop-product-title"><a href="shop-details.html">I Alla Vara Dagar</a></h4>
                            <div class="tp-shop-product-price">
                               <span>$105.00</span>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-3 col-sm-6">
                      <div class="tp-shop-product-item text-center mb-50">
                         <div class="tp-shop-product-thumb p-relative">
                            <a href="shop-details.html"><img src="assets/img/shop/product/shop-product-7.jpg" alt=""></a>
                            <div class="tp-shop-product-thumb-tag">
                               <span class="new">New</span>
                            </div>
                            <div class="tp-shop-product-thumb-btn">
                               <button>Add to cart</button>
                            </div>
                         </div>
                         <div class="tp-shop-product-content">
                            <div class="tp-shop-product-tag">
                               <span>History</span>
                            </div>
                            <h4 class="tp-shop-product-title"><a href="shop-details.html">Michael Connelly</a></h4>
                            <div class="tp-shop-product-price">
                               <span>$105.00</span>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-3 col-sm-6">
                      <div class="tp-shop-product-item text-center mb-50">
                         <div class="tp-shop-product-thumb p-relative">
                            <a href="shop-details.html"><img src="assets/img/shop/product/shop-product-8.jpg" alt=""></a>
                            <div class="tp-shop-product-thumb-tag">
                               <span class="hot">Hot</span>
                            </div>
                            <div class="tp-shop-product-thumb-btn">
                               <button>Add to cart</button>
                            </div>
                         </div>
                         <div class="tp-shop-product-content">
                            <div class="tp-shop-product-tag">
                               <span>Romance</span>
                            </div>
                            <h4 class="tp-shop-product-title"><a href="shop-details.html">Miss Night</a></h4>
                            <div class="tp-shop-product-price">
                               <span>$105.00</span>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
           </div>
       </div>
    </section>
    <!-- shop product area end -->


    <!-- cta area start -->
    <section class="tp-shop-cta-area pb-100">
       <div class="container">
          <div class="tp-shop-cta-bg p-relative" data-background="assets/img/shop/product/shop-product-10.jpg">
             <div class="tp-shop-cta-thumb">
                <img src="assets/img/shop/product/shop-product-9.jpg" alt="">
             </div>
             <div class="row align-items-center">
                <div class="col-lg-8">
                   <div class="tp-shop-cta-heading">
                      <span>Book festival</span>
                      <h3 class="tp-shop-cta-title">book of the Year</h3>
                   </div>
                </div>
                <div class="col-lg-4">
                   <div class="tp-shop-cta-btn text-start text-lg-end">
                      <a href="shop-grid.html">Shop Now <span><svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                       </svg></span></a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- cta area end -->





    <!-- shop service area start -->
    <section class="tp-shop-service-area pb-90">
       <div class="container">
          <div class="row">
             <div class="col-lg-4">
                <div class="tp-shop-service-item d-flex justify-content-between align-items-center mb-30" data-background="assets/img/shop/product/shop-service-shape.jpg">
                   <div class="tp-shop-service-content">
                      <h4 class="tp-shop-service-title">Efficient <br>
                         Book Delivery</h4>
                      <p>Fast & Efficient Service</p>
                   </div>
                   <div class="tp-shop-service-thumb">
                      <img src="assets/img/shop/author/shop-icon-1.png" alt="">
                   </div>
                </div>
             </div>
             <div class="col-lg-4">
                <div class="tp-shop-service-item d-flex justify-content-between align-items-center mb-30">
                   <div class="tp-shop-service-content">
                      <h4 class="tp-shop-service-title">Free Shipping For <br>
                         Book Lovers</h4>
                      <p>Shop Books Now</p>
                   </div>
                   <div class="tp-shop-service-thumb">
                      <img src="assets/img/shop/author/shop-icon-2.png" alt="">
                   </div>
                </div>
             </div>
             <div class="col-lg-4">
                <div class="tp-shop-service-item return p-relative d-flex justify-content-between align-items-center mb-30">
                   <div class="tp-shop-service-content">
                      <h4 class="tp-shop-service-title">Return with
                         Confidence</h4>
                      <p>Within 20 Days Return</p>
                   </div>
                   <div class="tp-shop-service-thumb">
                      <img src="assets/img/shop/author/shop-icon-3.png" alt="">
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- shop service area end -->

 </main>
@endsection
