@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Accept Book into Inventory</h2>
    @if($book->image)
    <div class="mb-3">
        <img src="{{ $book->image }}" alt="Book Image" class="img-fluid" style="max-width: 200px;">
    </div>
@endif
    <p><strong>Title:</strong> {{ $book->title }}</p>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>ISBN-10:</strong> {{ $book->isbn_10 }}</p>
    <p><strong>ISBN-13:</strong> {{ $book->isbn_13 ?? 'N/A' }}</p>

    <form action="{{ route('inventory.addToInventory') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', 1) }}" required>
        </div>

        <div class="mb-3">
            <label for="condition" class="form-label">Condition</label>
            <select name="condition" class="form-select" required>
                <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>New</option>
                <option value="used" {{ old('condition') == 'used' ? 'selected' : '' }}>Used</option>
                <option value="damaged" {{ old('condition') == 'damaged' ? 'selected' : '' }}>Damaged</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Sold</option>
                <option value="damaged" {{ old('status') == 'damaged' ? 'selected' : '' }}>Damaged</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add to Inventory</button>
    </form>
</div>
@endsection
