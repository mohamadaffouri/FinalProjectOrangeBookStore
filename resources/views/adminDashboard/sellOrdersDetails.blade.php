@extends('adminDashboard.layouts.dashboard')

@section('content')

<!-- content -->
<div class="content ">

<div class="mb-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                    <i class="bi bi-globe2 small me-2"></i> Dashboard
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-5 d-flex align-items-center justify-content-between">
                    <span>Order No : <a href="#">#5355619</a></span>
                    <span class="badge bg-success">Completed</span>
                </div>
                <div class="row mb-5 g-4">
                    <div class="col-md-3 col-sm-6">
                        <p class="fw-bold">Order Created at</p>
                        16/06/2021 at 04:23 PM
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="fw-bold">Name</p>
                        Sayres Seater
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="fw-bold">Email</p>
                        sayres@sayres.com
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <p class="fw-bold">Contact No</p>
                        767-251-8637
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body d-flex flex-column gap-3">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0">Delivery Address</h5>
                                    <a href="#">Edit</a>
                                </div>
                                <div>Name: Home</div>
                                <div>Josephin Villa</div>
                                <div>81 Fulton Park, Brazil/Pedro Leopoldo</div>
                                <div>
                                    <i class="bi bi-telephone me-2"></i> 408-963-7769
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body d-flex flex-column gap-3">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0">Billing Address</h5>
                                    <a href="#">Edit</a>
                                </div>
                                <div>Name: Workplace</div>
                                <div>Josephin Villa</div>
                                <div>29543 South Plaza, Canada/Sydney Mines</div>
                                <div>
                                    <i class="bi bi-telephone me-2"></i> 484-948-8535
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card widget mb-4 ">
            <h5 class="card-header">Order Items</h5>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Condition</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            @foreach ($order->orderItems as $item)
<td>
                                <a href="#">
                                    <img src={{ $item->book->image ?? asset('images/default-book-image.jpg') }}" alt="{{ $item->book->title }}" class="rounded" width="60" >
                                </a>
                            </td>
                          <td>{{ \Illuminate\Support\Str::words($item->book->title, 3, '...') }}</td>
                            <td>1</td>
                            <td>$1.190,90</td>
                            <td>{{ ucfirst($item->condition) }}</td> <!-- Condition -->
                        </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 mt-4 mt-lg-0">
        <div class="card mb-4">
            <div class="card-body">
                <h6 class="card-title mb-4">Price</h6>
                <div class="row justify-content-center mb-3">
                    <div class="col-4 text-end">Sub Total :</div>
                    <div class="col-4">$1.520,96</div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-4 text-end">Shipping :</div>
                    <div class="col-4">Free</div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-4 text-end">Tax(18%) :</div>
                    <div class="col-4">$273,77</div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4 text-end">
                        <strong>Total :</strong>
                    </div>
                    <div class="col-4">
                        <strong>$1.794,73</strong>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
<!-- ./ content -->
@endsection
