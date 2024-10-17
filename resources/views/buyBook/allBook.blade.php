@extends('layouts.app1')

@section('content')
<main>

    <!-- shop grid area start -->
    <section class="tp-shop-grid-area pt-100">
       <div class="container">
          <div class="row">
             <div class="col-lg-3 order-2 order-lg-0">
                <div class="tp-shop-grid-sidebar mr-10">
                    <form id="filterForm" action="{{ route('books.index') }}" method="GET">
                        <!-- Price Filter -->
                        <div class="tp-shop-widget mb-35">
                            <h3 class="tp-shop-widget-title no-border">Price Filter</h3>
                            <div class="tp-shop-widget-content">
                                <div class="tp-shop-widget-filter">
                                    <div class="mb-10">
                                        <label for="min_price">Min Price:</label>
                                        <input type="number" name="min_price" value="{{ request('min_price', 0) }}" min="0">
                                    </div>
                                    <div class="mb-10">
                                        <label for="max_price">Max Price:</label>
                                        <input type="number" name="max_price" value="{{ request('max_price', 500) }}" max="500">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Status Filter -->
                        <div class="tp-shop-widget mb-50">
                            <h3 class="tp-shop-widget-title">Product Status</h3>
                            <div class="tp-shop-widget-content">
                                <div class="tp-shop-widget-checkbox">
                                    <ul class="filter-items filter-checkbox">
                                        <li class="filter-item checkbox">
                                            <input id="all_status" type="radio" name="status" value="" {{ request('status') == '' ? 'checked' : '' }}>
                                            <label for="all_status">Show All</label>
                                        </li>
                                        <li class="filter-item checkbox">
                                            <input id="sales" type="radio" name="status" value="sales" {{ request('status') == 'sales' ? 'checked' : '' }}>
                                            <label for="sales">Sales</label>
                                        </li>
                                        <li class="filter-item checkbox">
                                            <input id="available" type="radio" name="status" value="available" {{ request('status') == 'available' ? 'checked' : '' }}>
                                            <label for="available">Available</label>
                                        </li>
                                        <li class="filter-item checkbox">
                                            <input id="coming_soon" type="radio" name="status" value="Coming soon" {{ request('status') == 'Coming soon' ? 'checked' : '' }}>
                                            <label for="coming_soon">Coming Soon</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Language Filter -->
                        <div class="tp-shop-widget mb-50">
                            <h3 class="tp-shop-widget-title">Language</h3>
                            <div class="tp-shop-widget-content">
                                <div class="tp-shop-widget-checkbox">
                                    <ul class="filter-items filter-checkbox">.
                                        <li class="filter-item checkbox">
                                            <input id="all_languages" type="radio" name="language" value="" {{ request('language') == '' ? 'checked' : '' }}>
                                            <label for="all_languages">Show All</label>
                                        </li>
                                        <li class="filter-item checkbox">
                                            <input id="english" type="radio" name="language" value="English" {{ request('language') == 'English' ? 'checked' : '' }}>
                                            <label for="english">English</label>
                                        </li>
                                        <li class="filter-item checkbox">
                                            <input id="german" type="radio" name="language" value="German" {{ request('language') == 'German' ? 'checked' : '' }}>
                                            <label for="german">German</label>
                                        </li>
                                        <li class="filter-item checkbox">
                                            <input id="swedish" type="radio" name="language" value="Swedish" {{ request('language') == 'Swedish' ? 'checked' : '' }}>
                                            <label for="swedish">Swedish</label>
                                        </li>
                                        <li class="filter-item checkbox">
                                            <input id="other" type="radio" name="language" value="other" {{ request('language') == 'other' ? 'checked' : '' }}>
                                            <label for="other">Other</label>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="tp-shop-widget-filter-info d-flex align-items-center justify-content-between">
                            <button type="submit" class="tp-shop-widget-filter-btn w-100">Apply Filter</button>
                        </div>
                    </form>

                </div>
             </div>
             <div class="col-lg-9 order-1 order-lg-1">
                <div class="row">
                   <div class="col-lg-8">
                      <div class="tp-shop-grid-sidebar-left d-flex align-items-center mb-20">
                         <div class="tp-course-grid-sidebar-tab tp-tab">
                            <ul class="nav nav-tabs" id="filterTab" role="tablist">
                               <li class="nav-item" role="presentation">
                                 <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                   <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M5.66667 1H1V5.66667H5.66667V1Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                     <path d="M12.9997 1H8.33301V5.66667H12.9997V1Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                     <path d="M12.9997 8.33337H8.33301V13H12.9997V8.33337Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                     <path d="M5.66667 8.33337H1V13H5.66667V8.33337Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                   </svg>
                                 </button>
                               </li>
                               <li class="nav-item" role="presentation">
                                 <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                     <svg width="14" height="14" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 7.11108H1" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M15 1H1" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M15 13.2222H1" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"></path>
                                     </svg>
                                 </button>
                               </li>
                             </ul>
                         </div>
                         <div class="tp-course-filter-top-result">
                            <p>Showing 1–14 of 26 results</p>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-4">
                      <div class="tp-shop-grid-sidebar-right d-flex justify-content-start justify-content-lg-end mb-20">
                         <div class="tp-course-grid-select tp-course-grid-sidebar-select">
                            <select class="wide">
                               <option>Short by:  Latest</option>
                               <option value="Cleaning Service">Athletic Assistant</option>
                               <option value="Iron Service">Principal</option>
                               <option value="Carpet Service"> Assistant Teacher </option>
                            </select><div class="nice-select wide" tabindex="0"><span class="current">Short by:  Latest</span><ul class="list"><li data-value="Short by: Latest" class="option selected">Short by:  Latest</li><li data-value="Cleaning Service" class="option">Athletic Assistant</li><li data-value="Iron Service" class="option">Principal</li><li data-value="Carpet Service" class="option"> Assistant Teacher </li></ul></div>
                         </div>
                      </div>
                   </div>
                </div>

                <div class="tab-content" id="myTabContent">
                   <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div class="row">
                     @foreach($inventoryItems as $inventory)
     <div class="col-lg-4 col-sm-6 mb-4">
    <div class="tp-shop-product-item text-center mb-50 fixed-card-size d-flex flex-column" style="height: 100%; justify-content: space-between;     background-color: #f9f9f5;
">
        <!-- Image container with fixed size and centered image -->
        <div class="tp-shop-product-thumb p-relative" style="height: 300px; display: flex; justify-content: center; align-items: center; background-color: #f9f9f9;">
            <a href="{{ route('books.show', $inventory->id) }}">
<img src="{{ $inventory->book->image ?? asset('images/default-book-image.jpg') }}"
     alt="Book Image"
     style="width: 100%; max-width: 300px; height: 200px; object-fit: cover;   background-color: #f8f8f8;">
            </a>
            <div class="tp-shop-product-thumb-tag">
                <span class="{{ $inventory->condition == 'new' ? 'new' : 'hot' }}">{{ ucfirst($inventory->condition) }}</span>
            </div>
            <div class="tp-shop-product-thumb-btn">
               <form action="{{ route('addToCart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="inventory_id" value="{{ $inventory->id }}">
                         <input type="hidden" name="book_id" value="{{ $inventory->book->id }}">
                        <input type="hidden" name="title" value="{{ $inventory->book->title }}">
                        <input type="hidden" name="condition" value="{{ $inventory->condition }}">
                        <input type="hidden" name="price" value="{{ $inventory->discount_price ?? $inventory->price }}">
                        <input type="hidden" name="image" value="{{ $inventory->book->image ?? asset('images/default-book-image.jpg') }}">
                       <button type="submit" class="btn btn-primary">Add to cart</button>


                    </form>
            </div>
        </div>
        <!-- Inventory content -->
        <div class="tp-shop-product-content card-content d-flex flex-column" style="flex-grow: 1;">
            <div class="tp-shop-product-tag">
                <span>{{ $inventory->book->author }}</span>
            </div>
            <h4 class="tp-shop-product-title card-title">
                <a href="{{ route('books.show', $inventory->id) }}">{{ $inventory->book->title }}</a>
            </h4>
        </div>
        <!-- Status, Quantity, and Price at the bottom -->
        <div class="tp-shop-product-bottom mt-auto" style="text-align: center; padding-bottom: 10px;">
            <div class="tp-shop-product-price card-price">
                <span>Quantity: {{ $inventory->quantity }}</span>
            </div>
            <div class="tp-shop-product-status card-status">
                <span>Status: {{ ucfirst($inventory->status) }}</span>
            </div>
            <div class="tp-shop-product-price" style="padding-top: 10px;">
    @if (!is_null($inventory->discount_price))
        <!-- Discounted price and original price -->
        <span class="new-price" style="color: #e74c3c; font-weight: bold;">${{ number_format($inventory->discount_price, 2) }}</span>
        <span class="old-price" style="text-decoration: line-through; color: #999; margin-left: 10px;">${{ number_format($inventory->price, 2) }}</span>
    @else
        <!-- Show only the original price -->
        <span class="new-price">${{ number_format($inventory->price, 2) }}</span>
    @endif
</div>
        </div>
    </div>
</div>


                    @endforeach





                      </div>
                   </div>
                   <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="row">
                         <div class="col-lg-12">
                            <div class="tp-shop-list-product-item d-flex mb-10">
                               <div class="tp-shop-list-product-thumb p-relative">
                                  <a href="shop-details.html"><img src="assets/img/shop/list/shop-list-1.jpg" alt=""></a>
                               </div>
                               <div class="tp-shop-list-product-content p-relative">
                                  <div class="tp-shop-product-thumb-tag">
                                     <span class="hot">Hot</span>
                                  </div>
                                  <div class="tp-shop-product-tag">
                                     <span>Family Story</span>
                                  </div>
                                  <h4 class="tp-shop-product-title"><a href="shop-details.html">Nar Allt Ar Over</a></h4>
                                  <p>Online Only! Get more for less with The Work’s expertly hand-picked Book
                                     Bundles. These are a collection of great quality products,</p>
                                  <div class="tp-shop-product-price">
                                     <span>$105.00</span>
                                  </div>
                                  <div class="tp-shop-list-product-btn">
                                     <button>Add to cart</button>
                                  </div>
                               </div>
                            </div>

                            <div class="tp-shop-list-product-item d-flex mb-10">
                               <div class="tp-shop-list-product-thumb p-relative">
                                  <a href="shop-details.html"><img src="assets/img/shop/list/shop-list-2.jpg" alt=""></a>
                               </div>
                               <div class="tp-shop-list-product-content p-relative">
                                  <div class="tp-shop-product-thumb-tag">
                                     <span class="off">35% off</span>
                                  </div>
                                  <div class="tp-shop-product-tag">
                                     <span>Family Story</span>
                                  </div>
                                  <h4 class="tp-shop-product-title"><a href="shop-details.html">Under en rosa Himmel</a></h4>
                                  <p>Online Only! Get more for less with The Work’s expertly hand-picked Book
                                     Bundles. These are a collection of great quality products,</p>
                                  <div class="tp-shop-product-price">
                                     <span>$105.00</span>
                                  </div>
                                  <div class="tp-shop-list-product-btn">
                                     <button>Add to cart</button>
                                  </div>
                               </div>
                            </div>

                            <div class="tp-shop-list-product-item d-flex mb-10">
                               <div class="tp-shop-list-product-thumb p-relative">
                                  <a href="shop-details.html"><img src="assets/img/shop/list/shop-list-3.jpg" alt=""></a>
                               </div>
                               <div class="tp-shop-list-product-content p-relative">
                                  <div class="tp-shop-product-thumb-tag">
                                     <span class="new">New</span>
                                  </div>
                                  <div class="tp-shop-product-tag">
                                     <span>Business Of Art</span>
                                  </div>
                                  <h4 class="tp-shop-product-title"><a href="shop-details.html">Lycko Balansen</a></h4>
                                  <p>Online Only! Get more for less with The Work’s expertly hand-picked Book
                                     Bundles. These are a collection of great quality products,</p>
                                  <div class="tp-shop-product-price">
                                     <span>$105.00</span>
                                  </div>
                                  <div class="tp-shop-list-product-btn">
                                     <button>Add to cart</button>
                                  </div>
                               </div>
                            </div>

                            <div class="tp-shop-list-product-item d-flex mb-10">
                               <div class="tp-shop-list-product-thumb p-relative">
                                  <a href="shop-details.html"><img src="assets/img/shop/list/shop-list-4.jpg" alt=""></a>
                               </div>
                               <div class="tp-shop-list-product-content p-relative">
                                  <div class="tp-shop-product-thumb-tag">
                                     <span class="hot">Hot</span>
                                  </div>
                                  <div class="tp-shop-product-tag">
                                     <span>Romance</span>
                                  </div>
                                  <h4 class="tp-shop-product-title"><a href="shop-details.html">Miss Night</a></h4>
                                  <p>Online Only! Get more for less with The Work’s expertly hand-picked Book
                                     Bundles. These are a collection of great quality products,</p>
                                  <div class="tp-shop-product-price">
                                     <span>$105.00</span>
                                  </div>
                                  <div class="tp-shop-list-product-btn">
                                     <button>Add to cart</button>
                                  </div>
                               </div>
                            </div>

                            <div class="tp-shop-list-product-item d-flex mb-10">
                               <div class="tp-shop-list-product-thumb p-relative">
                                  <a href="shop-details.html"><img src="assets/img/shop/list/shop-list-5.jpg" alt=""></a>
                               </div>
                               <div class="tp-shop-list-product-content p-relative">
                                  <div class="tp-shop-product-thumb-tag">
                                     <span class="new">New</span>
                                  </div>
                                  <div class="tp-shop-product-tag">
                                     <span>History</span>
                                  </div>
                                  <h4 class="tp-shop-product-title"><a href="shop-details.html">Michael Connelly</a></h4>
                                  <p>Online Only! Get more for less with The Work’s expertly hand-picked Book
                                     Bundles. These are a collection of great quality products,</p>
                                  <div class="tp-shop-product-price">
                                     <span>$105.00</span>
                                  </div>
                                  <div class="tp-shop-list-product-btn">
                                     <button>Add to cart</button>
                                  </div>
                               </div>
                            </div>

                            <div class="tp-shop-list-product-item d-flex mb-10">
                               <div class="tp-shop-list-product-thumb p-relative">
                                  <a href="shop-details.html"><img src="assets/img/shop/list/shop-list-5.jpg" alt=""></a>
                               </div>
                               <div class="tp-shop-list-product-content p-relative">
                                  <div class="tp-shop-product-thumb-tag">
                                     <span class="off">35% off</span>
                                  </div>
                                  <div class="tp-shop-product-tag">
                                     <span>Romance</span>
                                  </div>
                                  <h4 class="tp-shop-product-title"><a href="shop-details.html">Emelie Schepp Vita</a></h4>
                                  <p>Online Only! Get more for less with The Work’s expertly hand-picked Book
                                     Bundles. These are a collection of great quality products,</p>
                                  <div class="tp-shop-product-price">
                                     <span>$105.00</span>
                                  </div>
                                  <div class="tp-shop-list-product-btn">
                                     <button>Add to cart</button>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>

             </div>
          </div>
         <div class="row">
    <div class="col-lg-12">
        <div class="tp-event-inner-pagination pb-120">
            <div class="tp-dashboard-pagination pt-20">
                <div class="tp-pagination shop">
                    <nav>
                        <ul class="justify-content-center">
                            <!-- Previous Page Link -->
                            @if ($inventoryItems->onFirstPage())
                                <li class="disabled">
                                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.00017 6.77879L14 6.77879" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M6.24316 11.9999L0.999899 6.77922L6.24316 1.55762" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $inventoryItems->previousPageUrl() }}">
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.00017 6.77879L14 6.77879" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M6.24316 11.9999L0.999899 6.77922L6.24316 1.55762" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </li>
                            @endif

                            <!-- Page Number Links -->
                            @foreach ($inventoryItems->links()->elements[0] as $page => $url)
                                @if ($inventoryItems->currentPage() == $page)
                                    <li><span class="current">{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            <!-- Next Page Link -->
                            @if ($inventoryItems->hasMorePages())
                                <li>
                                    <a href="{{ $inventoryItems->nextPageUrl() }}">
                                        <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.9998 6.77883L1 6.77883" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M8.75684 1.55767L14.0001 6.7784L8.75684 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </li>
                            @else
                                <li class="disabled">
                                    <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.9998 6.77883L1 6.77883" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M8.75684 1.55767L14.0001 6.7784L8.75684 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
       </div>
    </section>
    <!-- shop grid area end -->

 </main>


@endsection
