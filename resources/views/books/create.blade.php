@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Book</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="isbn_10" class="form-label">ISBN-10</label>
            <input type="text" name="isbn_10" class="form-control" value="{{ old('isbn_10', session('isbn')) }}" required>
        </div>

        <div class="mb-3">
            <label for="isbn_13" class="form-label">ISBN-13 (optional)</label>
            <input type="text" name="isbn_13" class="form-control" value="{{ old('isbn_13') }}">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author (optional)</label>
            <input type="text" name="author" class="form-control" value="{{ old('author') }}" >
        </div>

        <div class="mb-3">
            <label for="edition" class="form-label">Edition (optional)</label>
            <input type="text" name="edition" class="form-control" value="{{ old('edition') }}">
        </div>

        <button type="submit" class="btn btn-success">Add Book</button>
    </form>
</div>
@endsection
