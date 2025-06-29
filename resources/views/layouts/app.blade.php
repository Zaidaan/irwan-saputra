<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Irwan Saputra | Portfolio @yield('title')</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">

    @stack('styles')

    @yield('head_content')
    
</head>
<body>

    @include ('partials.navbar')

    {{-- Main Content Area --}}
    <main>
        @yield('content')
    </main>

<!-- Work Detail Modal -->
<div class="modal fade" id="workDetailModal" tabindex="-1" aria-labelledby="workDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> {{-- modal-lg for larger modal --}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="workDetailModalLabel">Work Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <img id="modalWorkImage" src="" alt="" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6">
                        <h4 id="modalWorkTitle" class="fw-bold mb-2"></h4>
                        <p class="text-muted mb-3">
                            <span id="modalWorkTimeline"></span>
                        </p>
                        <p id="modalWorkDescription" class="mb-3"></p>
                        <p class="mb-1"><strong>Skills:</strong> <span id="modalWorkSkills"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- Add a "View Project" button if you have a separate project page --}}
                {{-- <a href="#" id="modalViewProjectLink" class="btn btn-primary">View Project</a> --}}
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap JS Bundle CDN (Popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>