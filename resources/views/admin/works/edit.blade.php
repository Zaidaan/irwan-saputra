@extends('layouts.admin')

@section('title', 'Edit Work')

@section('content')
    <h1 class="mb-4">Edit Work</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Work Details</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.works.update', $work->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $work->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="started_at" class="form-label">Start Date</label>
                        <input type="date" class="form-control @error('started_at') is-invalid @enderror" id="started_at" name="started_at" value="{{ old('started_at', $work->started_at ? $work->started_at->format('Y-m-d') : '') }}">
                        @error('started_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="ended_at" class="form-label">End Date</label>
                        <input type="date" class="form-control @error('ended_at') is-invalid @enderror" id="ended_at" name="ended_at" value="{{ old('ended_at', $work->ended_at ? $work->ended_at->format('Y-m-d') : '') }}">
                        @error('ended_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- NEW SKILLS MULTI-SELECT for EDIT --}}
                <div class="mb-3">
                    <label for="skill_ids" class="form-label">Skills</label>
                    <select class="form-select @error('skill_ids') is-invalid @enderror" id="skill_ids" name="skill_ids[]" multiple size="5">
                        <option value="">Select Skills (Optional)</option>
                        @foreach($skills as $skill)
                            <option value="{{ $skill->id }}"
                                {{-- Check old input first, then attached skills --}}
                                {{ (in_array($skill->id, old('skill_ids', [])) || in_array($skill->id, $attachedSkillIds)) ? 'selected' : '' }}>
                                {{ $skill->name }} ({{ $skill->proficiency ?? 'N/A' }}%)
                            </option>
                        @endforeach
                    </select>
                    @error('skill_ids')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    @error('skill_ids.*')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $work->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image_alt" class="form-label">Image Alt Text</label>
                    <input type="text" class="form-control @error('image_alt') is-invalid @enderror" id="image_alt" name="image_alt" value="{{ old('image_alt', $work->image_alt) }}" placeholder="e.g., Screenshot of portfolio website">
                    @error('image_alt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image_url" class="form-label">Image URL / Path</label>
                    <input type="text" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url', $work->image_url) }}" placeholder="e.g., /images/work/my-project.png">
                    @error('image_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.works.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Work</button>
                </div>
            </form>
        </div>
    </div>
@endsection