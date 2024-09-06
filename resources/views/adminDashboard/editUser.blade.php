@extends('adminDashboard.layouts.dashboard')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex flex-column flex-md-row text-center text-md-start mb-3">
    <figure class="me-4 flex-shrink-0">
        <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/user/man_avatar3.jpg') }}" alt="User Image" class="rounded-circle" width="100">

    </figure>
    <div class="flex-fill">
        <h5 class="mb-3">{{ $user->name }}</h5>

        {{-- <button class="btn btn-outline-danger btn-icon" data-bs-toggle="tooltip" title="Remove Avatar">
            <i class="bi bi-trash me-0"></i>
        </button> --}}
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h6 class="card-title mb-4">Edit User Information</h6>
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-12">
                    <!-- Name Field -->
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Leave blank to keep current password">
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Role Field -->
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role_id" class="form-select" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image Upload Field -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Change Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->

                    <div class="d-flex justify-content-between mb-3">
                        <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        <a href="{{ route('manageUsers') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
