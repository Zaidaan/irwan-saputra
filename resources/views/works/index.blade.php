{{-- resources/views/works/index.blade.php --}}

@extends('layouts.app')

@section('title', '| All Works')

@section('content')

    <section class="page-header-section">
        <div class="container mx-auto px-4 py-8 text-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">My Portfolio Works</h1>
            <p class="text-lg text-gray-600">Explore all my projects and contributions.</p>
        </div>
    </section>

    <section class="card-list-grid-container page-works-grid">
        @forelse ($works as $work)
            {{-- Re-use your existing card partial --}}
            @include('partials.card', ['work' => $work])
        @empty
            <p class="no-items-message">No work items found. Please check back later!</p>
        @endforelse
    </section>

    {{-- Optional: Pagination Links if you decide to paginate --}}
    @if ($works->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{-- Using Bootstrap pagination styling, ensure it's loaded in layouts.app --}}
            {{ $works->links('pagination::bootstrap-5') }}
        </div>
    @endif

@endsection

{{-- Add custom CSS if needed for this specific page header or grid --}}
<style>
    .page-header-section {
        background-color: #f8f8f8; /* Light background */
        padding: 4rem 0; /* Vertical padding */
        margin-top: 5rem; /* Space from fixed navbar */
    }

    .card-list-grid-container {
    display: grid; /* Make it a grid container */
    grid-template-columns: repeat(1, 1fr); /* Default to 1 column on small screens */
    gap: 2rem; /* Consistent gap between grid items */
    max-width: 900px; /* Default max-width for smaller grids (like homepage) */
    width: 100%; /* Take full available width */
    padding: 2rem; /* Add padding to the grid container */
    box-sizing: border-box;
    margin: 0 auto; /* Center the grid container */
}

/* Specific adjustments for the full works page grid */
.page-works-grid {
    padding: 4rem 2rem; /* More padding for a full page grid */
    max-width: 1200px; /* Wider max-width for full page view */
    /* If you want different grid-template-columns for this page by default, define here */
    /* Example: grid-template-columns: repeat(2, 1fr); for desktop default if not already handled by media queries below */
}

    .no-items-message {
    text-align: center;
    color: #666;
    padding: 3rem;
    grid-column: 1 / -1; /* Make it span all columns */
    font-size: 1.2rem;
}

    /* Adjustments for card-list-grid-container if needed for wider layout */
    @media (min-width: 768px) {
    .card-list-grid-container { /* This selector applies to both homepage and works page */
        grid-template-columns: repeat(2, 1fr); /* 2 columns on medium screens and up */
    }
}

/* Optional: Media query for 3 columns on very large screens for works/index */
@media (min-width: 992px) { /* Adjust breakpoint as needed */
    .page-works-grid { /* Target only the full works page grid */
        grid-template-columns: repeat(3, 1fr); /* Example: 3 columns on larger screens for dedicated works page */
    }
}
</style>