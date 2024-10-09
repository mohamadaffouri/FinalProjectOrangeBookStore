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
            <li class="breadcrumb-item active" aria-current="page">Inventory</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-md-flex gap-4 align-items-center">
            <div class="d-none d-md-flex">All Items</div>
            <div class="d-md-flex gap-4 align-items-center">
                <form class="mb-3 mb-md-0">
                    <div class="row g-3">
                <form method="GET" action="{{ route('manageBooks') }}" class="row mb-4">
                    <div class="col-md-3">
                        <select class="form-select" name="status" onchange="this.form.submit()">
                            <option value="">Status</option>
                            <option value="available" {{ request()->get('status') == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="coming soon" {{ request()->get('status') == 'coming soon' ? 'selected' : '' }}>Coming Soon</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="condition_match" onchange="this.form.submit()">
                            <option value="">Condition Match</option>
                            <option value="match" {{ request()->get('condition_match') == 'match' ? 'selected' : '' }}>Condition Matches</option>
                            <option value="mismatch" {{ request()->get('condition_match') == 'mismatch' ? 'selected' : '' }}>Condition Does Not Match</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" name="items_per_page" onchange="this.form.submit()">
                            <option value="10" {{ request()->get('items_per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ request()->get('items_per_page') == 20 ? 'selected' : '' }}>20</option>
                            <option value="30" {{ request()->get('items_per_page') == 30 ? 'selected' : '' }}>30</option>
                            <option value="40" {{ request()->get('items_per_page') == 40 ? 'selected' : '' }}>40</option>
                            <option value="50" {{ request()->get('items_per_page') == 50 ? 'selected' : '' }}>50</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search by title" value="{{ request()->get('search') }}">
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
    <table class="table table-custom table-lg mb-0" id="inventory">
        <thead>
        <tr>
<th>ID</th>
            <th> Title</th>
            <th> Condition (User Provided)</th>
            <th>Verified Condition</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($inventoryItems as $inventory)
            <tr>
                <td>{{ $inventory->id }}</td>
                <td>{{ $inventory->book->title }}</td>
                <td>{{ ucfirst($inventory->condition) }}</td>
                <td>
                    <!-- Dropdown to verify condition -->
                    <form action="{{ route('inventory.updateCondition', $inventory->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="verified_condition" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="new" {{ $inventory->verified_condition == 'new' ? 'selected' : '' }}>New</option>
                            <option value="like_new" {{ $inventory->verified_condition == 'like_new' ? 'selected' : '' }}>Like New</option>
                            <option value="very_good" {{ $inventory->verified_condition == 'very_good' ? 'selected' : '' }}>Very Good</option>
                            <option value="good" {{ $inventory->verified_condition == 'good' ? 'selected' : '' }}>Good</option>
                            <option value="acceptable" {{ $inventory->verified_condition == 'acceptable' ? 'selected' : '' }}>Acceptable</option>
                        </select>
                    </form>
                </td>
                <td>{{ ucfirst($inventory->status) }}</td>
                <td class="text-end">
                    <div class="d-flex">
                        <div class="dropdown ms-auto">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="" class="dropdown-item">Show</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-4" aria-label="Page navigation example">
    @if ($inventoryItems->lastPage() > 1) <!-- Check if there's more than one page -->
    <ul class="pagination justify-content-center">

        <!-- Previous Page Link -->
        <li class="page-item {{ ($inventoryItems->currentPage() == 1) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $inventoryItems->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        <!-- Pagination Elements -->
        @for ($i = 1; $i <= $inventoryItems->lastPage(); $i++)
            <li class="page-item {{ ($inventoryItems->currentPage() == $i) ? 'active' : '' }}">
                <a class="page-link" href="{{ $inventoryItems->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <!-- Next Page Link -->
        <li class="page-item {{ ($inventoryItems->currentPage() == $inventoryItems->lastPage()) ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $inventoryItems->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>

    </ul>
    @endif
</div>

</div>
<!-- ./ content -->

@endsection
