@extends('layouts.app1')

@section('content')
<main>

    <!-- shop grid area start -->
    <section class="tp-shop-grid-area pt-100">
       <div class="container">
          <div class="row">
             <div class="col-lg-3 order-2 order-lg-0">
                <div class="tp-shop-grid-sidebar mr-10">
                   <!-- filter -->
                   <div class="tp-shop-widget mb-35">
                      <h3 class="tp-shop-widget-title no-border">Price Filter</h3>

                      <div class="tp-shop-widget-content">
                         <div class="tp-shop-widget-filter">
                            <div id="slider-range" class="mb-10"></div>
                            <div class="tp-shop-widget-filter-info d-flex align-items-center justify-content-between">
                               <span class="input-range">
                                  <input type="text" id="amount" readonly>
                               </span>
                               <button class="tp-shop-widget-filter-btn" type="button">Reset</button>
                            </div>
                         </div>
                      </div>
                   </div>
                   <!-- status -->
                   <div class="tp-shop-widget mb-50">
                      <h3 class="tp-shop-widget-title">Product Status</h3>

                      <div class="tp-shop-widget-content">
                         <div class="tp-shop-widget-checkbox">
                            <ul class="filter-items filter-checkbox">
                               <li class="filter-item checkbox">
                                  <input id="on_sale" type="checkbox">
                                  <label for="on_sale">On sale</label>
                               </li>
                               <li class="filter-item checkbox">
                                  <input id="in_stock" type="checkbox">
                                  <label for="in_stock">In Stock</label>
                               </li>
                            </ul><!-- .filter-items -->
                         </div>
                      </div>
                   </div>
                   <!-- categories -->
                   <div class="tp-shop-widget mb-50">
                      <h3 class="tp-shop-widget-title">Categories</h3>

                      <div class="tp-shop-widget-content">
                         <div class="tp-shop-widget-categories">
                            <ul>
                               <li><a href="#">Children's Books<span>10</span></a></li>
                               <li><a href="#">Comedy<span>18</span></a></li>
                               <li><a href="#">Family Story<span>22</span></a></li>
                               <li><a href="#">Fiction<span>17</span></a></li>
                               <li><a href="#">Modern Fiction<span>22</span></a></li>
                               <li><a href="#">History<span>14</span></a></li>
                               <li><a href="#">Romance<span>19</span></a></li>
                               <li><a href="#">Science Fiction<span>29</span></a></li>
                               <li><a href="#">Phones <span>05</span></a></li>
                               <li><a href="#">Grocery <span>14</span></a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                   <!-- age -->
                   <div class="tp-shop-widget mb-50">
                      <h3 class="tp-shop-widget-title">Ages</h3>

                      <div class="tp-shop-widget-content">
                         <div class="tp-shop-widget-categories height">
                            <ul>
                               <li><a href="#">0 - 2 Years</a></li>
                               <li><a href="#">3 - 5 Years</a></li>
                               <li><a href="#">6 - 9 Years</a></li>
                               <li><a href="#">9 - 12 Years</a></li>
                               <li><a href="#">Teen/Young Adult</a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                   <!-- author -->
                   <div class="tp-shop-widget mb-50">
                      <h3 class="tp-shop-widget-title">Featured Authors</h3>

                      <div class="tp-shop-widget-content">
                         <div class="tp-shop-widget-categories height">
                            <ul>
                               <li><a href="#">Bo Eriksson<span>8</span></a></li>
                               <li><a href="#">Dan Gordon<span>2</span></a></li>
                               <li><a href="#">Gunvor Hofmo<span>4</span></a></li>
                               <li><a href="#">Nadya Toloko<span>6</span></a></li>
                               <li><a href="#">Per Ahlin<span>3</span></a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                   <!-- Language -->
                   <div class="tp-shop-widget mb-50">
                      <h3 class="tp-shop-widget-title">Language</h3>

                      <div class="tp-shop-widget-content">
                         <div class="tp-shop-widget-categories height">
                            <ul>
                               <li><a href="#">English</a></li>
                               <li><a href="#">Spanish</a></li>
                               <li><a href="#">Irish</a></li>
                               <li><a href="#">Swedish</a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
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
                <img src="{{ $inventory->book->image ?? asset('images/default-book-image.jpg') }}" alt="Book Image" style="width: auto; height: 100%; max-width: 100%;">
            </a>
            <div class="tp-shop-product-thumb-tag">
                <span class="{{ $inventory->condition == 'new' ? 'new' : 'hot' }}">{{ ucfirst($inventory->condition) }}</span>
            </div>
            <div class="tp-shop-product-thumb-btn">
                <button class="btn btn-primary">Add to cart</button>
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
                 <span>${{ number_format($inventory->price, 2) }}</span>
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
