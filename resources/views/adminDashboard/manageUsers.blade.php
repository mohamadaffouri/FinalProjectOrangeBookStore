@extends('adminDashboard.layouts.dashboard')

@section('content')
    <!-- content -->

    <div class="content ">

    <div class="card">
        <div class="card-body">
            <div class="d-md-flex gap-4 align-items-center">
                <div class="d-none d-md-flex">All Users</div>
                <div class="d-md-flex gap-4 align-items-center">
                    <form class="mb-3 mb-md-0">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <select name="sort" class="form-select" onchange="this.form.submit()">
                                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Sort by Name (A-Z)</option>
                                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Sort by Name (Z-A)</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-select">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search users..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="ms-auto">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-icon">
                        <i class="bi bi-plus-circle"></i> Create New User
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="users" class="table table-custom table-lg">
            <thead>
            <tr>
                <th>
                    <input class="form-check-input select-all" type="checkbox" data-select-all-target="#users"
                           id="defaultCheck1">
                </th>
                <th>Name</th>

                <th>Email</th>

                <th>Role</th>
                <th>Status</th>
                <th class="text-end">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <a href="#">
                        <figure class="avatar me-3">
                            <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/user/man_avatar3.jpg') }}" alt="User Image" class="rounded-circle" width="100">
                        </figure>
                        {{ $user->name }}

                    </a>
                </td>

                <td>{{ $user->email  }}</td>

                <td>{{ $user->role->name  }} </td>
                <td>
                    <span class="badge bg-danger">Blocked</span>
                    {{-- <span class="badge bg-success">Active</span> --}}
                </td>
                <td class="text-end">
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown"
                           class="btn btn-floating"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#" class="dropdown-item">View Profile</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="dropdown-item">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="dropdown-item text-danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) this.closest('form').submit();">
                                Delete
                            </a>
                        </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach











            </tbody>
        </table>
    </div>

    <nav class="mt-4" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    </div>
    <!-- ./ content -->



    @endsection
