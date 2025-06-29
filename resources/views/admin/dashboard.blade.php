@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4">Welcome to the Admin Dashboard!</h1>

    <div class="row">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Works
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">42</div> {{-- Placeholder for dynamic count --}}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-briefcase fa-2x text-gray-300"></i> {{-- Font Awesome icon placeholder --}}
                            <!-- You might need to add Font Awesome to admin.blade.php if you want icons -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Recent Visitors
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1,200</div> {{-- Placeholder --}}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pending Tasks
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">7</div> {{-- Placeholder --}}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
        </div>
        <div class="card-body">
            <p>From here, you can manage different aspects of your portfolio website.</p>
            <a href="{{ route('admin.works.index') }}" class="btn btn-primary me-2">Manage Works</a>
            <a href="#" class="btn btn-secondary me-2">Manage Users</a>
            <a href="#" class="btn btn-secondary">Settings</a>
        </div>
    </div>
@endsection