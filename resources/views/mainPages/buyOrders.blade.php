@extends('layouts.app1')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="shortcut icon" href="{{ asset('favicon.png') }}"/>
<div class="container mt-20">
    <!-- Search Bar -->
    <form action="{{ route('userOrders') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="order_id" class="form-control" placeholder="Search by Order ID" value="{{ request('order_id') }}">
            <button type="submit" class="" style="
            border-radius: 0;
            color: #DDF49F;
            padding: 6px 22px;
            background-color: var(--tp-theme-8);
            width: 155px;
            height: 55px;
             font-size: 15px;
                 font-weight: 600;
            box-shadow: 0px 1px 2px 0px rgba(1, 99, 90, 0.25), 0px 0px 1px 0px #01635A;
          ">Search</button>
        </div>
    </form>


    <div class="tab-pane fade show active" id="home" role="tabpanel">
        <div class="table-responsive">
            <ul class="table-list">
                <!-- Table Header -->
                <li class="table-header">
                    <div class="table-row d-flex justify-content-between align-items-center">
                        <div class="table-col col-md-2">
                            <h4 class="table-title">Order ID</h4>
                        </div>
                        <div class="table-col col-md-3">
                            <h4 class="table-title">Course Name</h4>
                        </div>
                        <div class="table-col col-md-2">
                            <h4 class="table-title">Date</h4>
                        </div>
                        <div class="table-col col-md-2">
                            <h4 class="table-title">Price</h4>
                        </div>
                        <div class="table-col col-md-2">
                            <h4 class="table-title">Status</h4>
                        </div>
                        <div class="table-col col-md-1"></div>
                    </div>
                </li>

                <!-- Loop through the user's orders -->
                @forelse($orders as $order)
                    <li class="table-item">
                        <div class="table-row d-flex justify-content-between align-items-center">
                            <div class="table-col col-md-2">
                                <h4 class="table-text">#{{ $order->id }}</h4>
                            </div>
                            <div class="table-col col-md-3">
                                <h4 class="table-text">{{ $order->type }}</h4>
                            </div>
                            <div class="table-col col-md-2">
                                <h4 class="table-text">{{ $order->created_at->format('M d, Y') }}</h4>
                            </div>
                            <div class="table-col col-md-2">
                                <h4 class="table-text">${{ number_format($order->total_price, 2) }}</h4>
                            </div>
                            <div class="table-col col-md-2">
                                <span class="badge badge-warning">{{ ucfirst($order->status) }}</span>
                            </div>
                            <div class="table-col col-md-1 text-end">
                             
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('order.show', $order->id) }}" class="dropdown-item">Show</a>
                                {{-- <a href="{{ route('orders.edit', $order->id) }}" class="dropdown-item">Edit</a> --}}
                            </div>
                        </div>
                    </div>
              
                            </div>
                        </div>
                    </li>
                @empty
                    <li>
                        <div class="alert alert-info">You have no orders yet.</div>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>

</div>

@endsection
