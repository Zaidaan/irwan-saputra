{{-- resources/views/admin/messages/show.blade.php --}}

@extends('layouts.admin')

@section('title', 'View Message')

@section('content')
    <h1 class="mb-4">Message Details</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Message from {{ $message->sender_name }}</h6>
            <div>
                <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary btn-sm">Back to Inbox</a>
                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this message?');">Delete</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong>Sender Name:</strong> {{ $message->sender_name }}
            </div>
            <div class="mb-3">
                <strong>Sender Email:</strong> {{ $message->sender_email }}
            </div>
            <div class="mb-3">
                <strong>Request Type:</strong> <span class="badge bg-info">{{ $message->request_type }}</span>
            </div>
            <div class="mb-3">
                <strong>Received At:</strong> {{ $message->created_at->format('M d, Y H:i A') }}
            </div>
            <div class="mb-3">
                <strong>Description:</strong>
                <p class="mt-2 p-3 bg-light border rounded">{{ $message->description ?? 'No description provided.' }}</p>
            </div>
        </div>
    </div>
@endsection