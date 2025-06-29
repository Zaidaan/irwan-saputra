{{-- resources/views/admin/blogs/create.blade.php --}}

@extends('layouts.admin')

@section('title', 'Add New Blog Post')

@section('content')
    <h1 class="mb-4">Add New Blog Post</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Blog Post Details</h6>
        </div>
        <div class="card-body">
            {{-- Form action uses route('admin.blogs.store') which maps to POST /admin/blogs --}}
            <form action="{{ route('admin.blogs.store') }}" method="POST">
                @csrf {{-- CSRF token for security --}}

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Blog Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection