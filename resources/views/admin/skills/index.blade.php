@extends('layouts.admin')

@section('title', 'Manage Skills')

@section('content')
    <h1 class="mb-4">Manage Skills</h1>

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">Add New Skill</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Proficiency (%)</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($skills as $skill)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->proficiency ?? 'N/A' }}%</td>
                        <td>
                            <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                            <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete \'{{ $skill->name }}\'?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No skills found. Click "Add New Skill" to get started!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination Links --}}
    @if ($skills->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $skills->links('pagination::bootstrap-5') }}
        </div>
    @endif
@endsection