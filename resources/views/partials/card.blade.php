{{-- resources/views/partials/card.blade.php --}}

<div class="card-wrapper">
    <div class="card-content">
        <div class="card-header-wrapper">
            <div class="card-header">
                <span class="work-title">{{ $work->title }}</span>
                <span class="work-date">
                    {{ $work->started_at ? $work->started_at->format('M d, Y') : 'N/A' }}
                    @if($work->started_at && $work->ended_at) - @endif
                    {{ $work->ended_at ? $work->ended_at->format('M d, Y') : 'N/A' }}
                </span>
            </div>
            <a class="card-button" href="#"
               data-bs-toggle="modal"
               data-bs-target="#workDetailModal"
               data-work-id="{{ $work->id }}"
               data-work-title="{{ $work->title }}"
               data-work-start-date="{{ $work->started_at ? $work->started_at->format('M d, Y') : 'N/A' }}"
               data-work-end-date="{{ $work->ended_at ? $work->ended_at->format('M d, Y') : 'N/A' }}"
               data-work-description="{{ $work->description }}"
               data-work-image-url="{{ asset($work->image_url) }}"
               data-work-image-alt="{{ $work->image_alt }}"
               data-work-skills="{{ implode(', ', $work->skills->pluck('name')->toArray()) }}">
                Detail
            </a>
        </div>
        <div class="card-body">
            {{ Str::limit($work->description, 100, '...') }}
        </div>

        {{-- REMOVED: The block that displayed skills on the card itself --}}
        {{--
        @if ($work->skills->isNotEmpty())
            <div class="card-skills-list">
                @foreach ($work->skills as $skill)
                    <span class="skill-badge">{{ $skill->name }}</span>
                @endforeach
            </div>
        @endif
        --}}

        <img src="{{ asset($work->image_url) }}" alt="{{ $work->image_alt }}" class="card-thumbnail">
    </div>
</div>