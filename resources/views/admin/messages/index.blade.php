{{-- resources/views/admin/messages/index.blade.php --}}

@extends('layouts.admin')

@section('title', 'Messages Inbox')

@section('content')
    <h1 class="mb-4">Messages Inbox</h1>

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sender Name</th>
                    <th scope="col">Sender Email</th>
                    <th scope="col">Request Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Received At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $message->sender_name }}</td>
                        <td>{{ $message->sender_email }}</td>
                        <td><span class="badge bg-info">{{ $message->request_type }}</span></td>
                        <td>{{ Str::limit($message->description, 70, '...') }}</td>
                        <td>{{ $message->created_at->format('M d, Y H:i A') }}</td>
                        <td>
                            <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-sm btn-primary me-1">View</a>
                            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this message from {{ $message->sender_name }}?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No messages in your inbox.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination Links --}}
    @if ($messages->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $messages->links('pagination::bootstrap-5') }}
        </div>
    @endif
@endsection