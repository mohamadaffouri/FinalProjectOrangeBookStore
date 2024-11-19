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
            <div class="card-body" style="    height: 100px;">
                <div class="mb-5 d-flex align-items-center justify-content-between">
                    <span>Order No : <a href="#">#{{ $order->id }}</a></span>
                    <div class="col-md-3 col-sm-6">
                        <p class="fw-bold">Order Created at</p>
                        {{ $order->created_at }}
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
                                    <img src="{{ $item->book->image ?? asset('images/default-book-image.jpg') }}" width="60">

                                </a>
                            </td>
                          <td>{{ \Illuminate\Support\Str::words($item->book->title, 3, '...') }}</td>
                            <td>1</td>
                            <td>${{ $item->price }}</td>
                            <td>{{ ucfirst($item->condition) }}</td> <!-- Condition -->
                        </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
<!-- ./ content -->
@endsection
