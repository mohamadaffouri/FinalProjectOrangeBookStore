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
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-md-flex gap-4 align-items-center">
            <div class="d-none d-md-flex">All Orders</div>
            <div class="d-md-flex gap-4 align-items-center">
                <form class="mb-3 mb-md-0">
                    <div class="row g-3">

                        <form method="GET" action="{{ route('manageBuyOrders') }}" class="row mb-4">
                            <div class="col-md-3">
                                <select class="form-select" name="status" onchange="this.form.submit()">
                                    <option value=""> Status</option>
                                    <option value="pending" {{ request()->get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="shipped" {{ request()->get('status') == 'arrived' ? 'selected' : '' }}>Shipped</option>
                                    <option value="completed" {{ request()->get('status') == 'arrived' ? 'selected' : '' }}>Completed</option>
                                    <option value="refunded" {{ request()->get('status') == 'arrived' ? 'selected' : '' }}>Refunded</option>
                                    <option value="arrived" {{ request()->get('status') == 'arrived' ? 'selected' : '' }}>Canceled</option>

                                </select>
                            </div>
                            <!-- Items Per Page Dropdown -->
                            <div class="col-md-3">
                                <select class="form-select" name="items_per_page" onchange="this.form.submit()">
                                    <option value="10" {{ request()->get('items_per_page') == 10 ? 'selected' : '' }}>10</option>
                                    <option value="20" {{ request()->get('items_per_page') == 20 ? 'selected' : '' }}>20</option>
                                    <option value="30" {{ request()->get('items_per_page') == 30 ? 'selected' : '' }}>30</option>
                                    <option value="40" {{ request()->get('items_per_page') == 40 ? 'selected' : '' }}>40</option>
                                    <option value="50" {{ request()->get('items_per_page') == 50 ? 'selected' : '' }}>50</option>
                                </select>
                            </div>

                            <!-- Search Bar -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="OrderID or User Name" value="{{ request()->get('search') }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-custom table-lg mb-0" id="orders">
        <thead>
        <tr>
            <th>
                <input class="form-check-input select-all" type="checkbox" data-select-all-target="#orders"
                       id="defaultCheck1">
            </th>

                <th>Order ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Total Price</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr id="order-row-{{ $order->id }}">
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td> <!-- Assuming you have a 'user' relation -->
                <td>{{ $order->created_at->format('M d, Y') }}</td>
                <td>${{ number_format($order->total_price, 2) }}</td>
                <td>
                    <!-- Dropdown to change order status -->
                    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="status-form" data-order-id="{{ $order->id }}">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select form-select-sm" onchange="submitStatusChange({{ $order->id }}, this)">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="refunded" {{ $order->status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                            <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                    </form>
                </td>
                <td class="text-end">
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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4" aria-label="Page navigation example">
    @if ($orders->lastPage() > 1) <!-- Check if there's more than one page -->
    <ul class="pagination justify-content-center">

        <!-- Previous Page Link -->
        <li class="page-item {{ ($orders->currentPage() == 1) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $orders->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        <!-- Pagination Elements -->
        @for ($i = 1; $i <= $orders->lastPage(); $i++)
            <li class="page-item {{ ($orders->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $orders->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <!-- Next Page Link -->
        <li class="page-item {{ ($orders->currentPage() == $orders->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $orders->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>

    </ul>
    @endif
</div>

</div>
<!-- ./ content -->

@endsection
