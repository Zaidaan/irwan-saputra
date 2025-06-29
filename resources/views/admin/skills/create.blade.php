@extends('layouts.admin')

@section('title', 'Add New Skill')

@section('content')
    <h1 class="mb-4">Add New Skill</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Skill Details</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.skills.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Skill Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="proficiency" class="form-label">Proficiency (%)</label>
                    <input type="number" class="form-control @error('proficiency') is-invalid @enderror" id="proficiency" name="proficiency" value="{{ old('proficiency') }}" min="0" max="100">
                    @error('proficiency')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Skill</button>
                </div>
            </form>
        </div>
    </div>
@endsection