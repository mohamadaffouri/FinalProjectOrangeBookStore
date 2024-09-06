@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Inventory List</h2>



    <table class="table table-striped">
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Quantity</th>
                <th>Condition</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventoryItems as $item)
                <tr>
                    <td>{{ $item->book->title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ ucfirst($item->condition) }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
