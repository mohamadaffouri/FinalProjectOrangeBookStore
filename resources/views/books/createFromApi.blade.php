@extends('layouts.appSale')

@section('content')
<main>

    <!-- application area start -->
    <section class="tp-shop-banner-ptb p-relative pt-40 pb-140">
       <div class="container">
          <div class="row">
             <div class="col-lg-12">
                <div class="tp-application-heading wow fadeInUp" data-wow-delay=".3s">
                   <p class="tp-application-subtitle">Ready to confirm your book details?</p>
                   <h3 class="tp-application-title">Review and Confirm Book Information</h3>
                </div>
                <div class="tp-application-from-box wow fadeInUp" data-wow-delay=".5s">
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf
                      <div class="tp-contact-input-form application">
                         <h4 class="tp-application-from-title">Book Information</h4>
                         <div class="row">
                            <!-- Image Display (if available) -->
                            @if(isset($bookData['Image1']))
                            <div class="col-xl-12 col-lg-12 mb-3 text-center">
                               <img src="{{ $bookData['Image1'] }}" alt="Book Image" class="img-fluid" style="max-width: 200px;">
                               <input type="hidden" name="image_url" value="{{ $bookData['Image1'] }}">
                            </div>
                            @endif

                            <!-- ISBN-10 Input -->
                            <div class="col-xl-12 col-lg-12">
                               <div class="tp-contact-input schedule p-relative">
                                  <label>ISBN-10</label>
                                  <input type="text" name="isbn_10" value="{{ $isbn }}" readonly>
                                  <input type="hidden" name="condition" value="{{ $condition }}">
                                  <input type="hidden" name="description" value="{{ $bookData['description'] ?? '' }}">
                               </div>
                            </div>
                            <!-- ISBN-13 Input -->
                            <div class="col-xl-12 col-lg-12">
                               <div class="tp-contact-input schedule p-relative">
                                  <label>ISBN-13</label>
                                  <input type="text" name="isbn_13" value="{{ $bookData['ISBN13'] ?? '' }}" readonly>
                               </div>
                            </div>
                            <!-- Title Input -->
                            <div class="col-xl-12 col-lg-12">
                               <div class="tp-contact-input schedule p-relative">
                                  <label>Title</label>
                                  <input type="text" name="title" value="{{ $bookData['Title'] }}" readonly>
                               </div>
                            </div>
                            <!-- Author Input -->
                            <div class="col-xl-12 col-lg-12">
                               <div class="tp-contact-input schedule p-relative">
                                  <label>Author</label>
                                  <input type="text" name="author" value="{{( $bookData['author']) }}" readonly>
                               </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="tp-contact-input schedule p-relative">
                                   <label>Book language </label>
                                   <input type="text" name="language" value="{{ $bookData['languages'][1][0] ?? '' }}" readonly>
                                </div>
                             </div>
                            <div class="col-xl-12 col-lg-12">
                               <div class="tp-contact-input schedule p-relative">
                                  <label>Offer Price </label>
                                  <input type="text" name="price" value="{{ $bookData['Price'] ?? '' }}" readonly>
                               </div>
                            </div>

                         </div>
                      </div>
                      <div class="tp-schedule-btn">
                        <button type="submit" style="
                           border-radius: 0;
                           color: #DDF49F;
                           padding: 6px 22px;
                           background-color: var(--tp-theme-8);
                           width: 155px;
                           height: 55px;
                            font-size: 15px;
                                font-weight: 600;
                           box-shadow: 0px 1px 2px 0px rgba(1, 99, 90, 0.25), 0px 0px 1px 0px #01635A;
                         ">Submit</button>
                    </div>

                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- application area end -->

</main>
@endsection
