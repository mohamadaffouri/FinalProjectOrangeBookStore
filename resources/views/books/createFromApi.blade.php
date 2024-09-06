@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Confirm Book Details from Google Books API</h2>
    <!-- Display Book Image if Available -->


    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        @if(isset($bookData['imageLinks']['thumbnail']))
        <div class="mb-3">
            <img src="{{ $bookData['imageLinks']['thumbnail'] }}" alt="Book Image" class="img-fluid" style="max-width: 200px;">
            <input type="hidden" name="image_url" value="{{ $bookData['imageLinks']['thumbnail'] }}">
        </div>
    @endif
        <div class="mb-3">
            <label for="isbn_10" class="form-label">ISBN-10</label>
            <input type="text" name="isbn_10" class="form-control" value="{{ $isbn }}" required>
        </div>

        <div class="mb-3">
            <label for="isbn_13" class="form-label">ISBN-13</label>
            <input type="text" name="isbn_13" class="form-control" value="{{ $bookData['industryIdentifiers'][1]['identifier'] ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $bookData['title'] }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="{{ implode(', ', $bookData['authors'] ?? []) }}">
        </div>

        <div class="mb-3">
            <label for="edition" class="form-label">Edition (optional)</label>
            <input type="text" name="edition" class="form-control" value="{{ $bookData['publishedDate'] ?? '' }}">
        </div>

        <button type="submit" class="btn btn-success">Accept and Save Book</button>
    </form>
</div>
@endsection
