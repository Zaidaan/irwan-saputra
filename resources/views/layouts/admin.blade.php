<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa; /* Light background for admin */
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            padding-top: 56px; /* Adjust for fixed navbar height */
        }
        .main-content {
            margin-left: 0; /* Default for collapsed sidebar/no sidebar */
            margin-top: 100px;
        }
        @media (min-width: 768px) {
            .main-content {
                margin-left: 200px; /* Adjust for sidebar width */
            }
        }
    </style>

    @stack('styles')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/admin') }}">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">View Site</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a> {{-- Placeholder for logout --}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <div class="bg-light border-right sidebar" style="width: 200px;">
            <div class="list-group list-group-flush">
                <a href="{{ url('/admin') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="{{ url('/admin/works') }}" class="list-group-item list-group-item-action bg-light">Works</a>
                <a href="{{ url('/admin/blogs') }}" class="list-group-item list-group-item-action bg-light">Blogs</a>
                <a href="{{ url('/admin/messages') }}" class="list-group-item list-group-item-action bg-light">Messages</a>
                <a href="{{ url('/admin/skills') }}" class="list-group-item list-group-item-action bg-light">Skills</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Users</a> {{-- Placeholder for other sections --}}
                <a href="#" class="list-group-item list-group-item-action bg-light">Settings</a>
            </div>
        </div>

        <div class="container-fluid main-content flex-grow-1 p-3">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    @stack('scripts')
</body>
</html>