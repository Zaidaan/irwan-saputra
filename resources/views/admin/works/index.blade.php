@extends('layouts.admin')

@section('title', 'Manage Works')

@section('content')
    <h1 class="mb-4">Manage Works</h1>

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.works.create') }}" class="btn btn-primary">Add New Work</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Start Date</th> {{-- Changed from Timeline --}}
                    <th scope="col">End Date</th>   {{-- Changed from Timeline --}}
                    <th scope="col">Skills</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image Alt</th>
                    <th scope="col">Image URL</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($works as $work)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $work->title }}</td>
                        <td>{{ $work->started_at ? $work->started_at->format('M d, Y') : 'N/A' }}</td> {{-- Format date --}}
                        <td>{{ $work->ended_at ? $work->ended_at->format('M d, Y') : 'N/A' }}</td>     {{-- Format date --}}
                        <td>
                            @if (!empty($work->skills))
                                @foreach ($work->skills as $skill)
                                    <span class="badge bg-secondary me-1">{{ $skill }}</span>
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ Str::limit($work->description, 50, '...') }}</td>
                        <td>{{ $work->image_alt }}</td>
                        <td>{{ $work->image_url }}</td>
                        <td>
                            <a href="{{ route('admin.works.edit', $work->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                            <form action="{{ route('admin.works.destroy', $work->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete \'{{ $work->title }}\'?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No works found. Click "Add New Work" to get started!</td> {{-- Updated colspan --}}
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection