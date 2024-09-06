@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Check ISBN</h2>

    <form action="{{ route('books.checkIsbn') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="isbn" class="form-label">Enter ISBN</label>
            <input type="text" name="isbn" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Check ISBN</button>
    </form>
</div>
@endsection
