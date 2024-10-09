@extends('layouts.appSale')

@section('content')
<main>

    <!-- application area start -->
    <section class="tp-shop-banner-ptb p-relative pt-40 pb-140">
       <div class="container">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
          <div class="row">
             <div class="col-lg-12">
                <div class="tp-application-heading wow fadeInUp" data-wow-delay=".3s">
                   <p class="tp-application-subtitle">Ready to sell your book?</p>
                   <h3 class="tp-application-title">Enter Book Details to Get the Best Price</h3>
                </div>
                <div class="tp-application-from-box wow fadeInUp" data-wow-delay=".5s">
                    <form action="{{ route('books.checkIsbn') }}" method="POST">
                        @csrf
                      <div class="tp-contact-input-form application">
                         <h4 class="tp-application-from-title">Book Information</h4>
                         <div class="row">
                            <!-- ISBN Input -->
                            <div class="col-xl-12 col-lg-12">
                               <div class="tp-contact-input schedule p-relative">
                                  <label>ISBN</label>
                                  <input type="text" name="isbn" placeholder="Enter ISBN of the book" required>
                               </div>
                            </div>
                            <!-- Book Condition Dropdown -->
                            <div class="col-xl-12 col-lg-12">
                               <div class="tp-contact-input schedule p-relative">
                                  <label>Book Condition</label>
                                  <div class="tp-application-select">
                                     <select name="condition" class="wide" >
                                        <option value="new">New</option>
                                        <option value="like_new">Like New</option>
                                        <option value="very_good">Very Good</option>
                                        <option value="good">Good</option>
                                        <option value="acceptable">Acceptable</option>
                                     </select>
                                  </div>
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
