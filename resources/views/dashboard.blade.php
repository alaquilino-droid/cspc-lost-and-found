@extends('layouts.app')

@section('content')

<div class="container my-5">

    <!-- DASHBOARD TITLE -->
    <div class="item-card p-4 mb-4">
        <h1 class="page-title">Dashboard</h1>
        <p class="text-muted">Welcome to the CSPC Lost & Found Reporting System.</p>
    </div>

    <!-- ANALYTICS CARDS -->
    <div class="row g-4 mb-5">

        <div class="col-md-3">
            <div class="item-card p-3 text-center">
                <h2 class="fw-bold text-primary">{{ $totalLost }}</h2>
                <p class="text-muted">Lost Items</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="item-card p-3 text-center">
                <h2 class="fw-bold text-success">{{ $totalFound }}</h2>
                <p class="text-muted">Found Items</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="item-card p-3 text-center">
                <h2 class="fw-bold text-info">{{ $resolved }}</h2>
                <p class="text-muted">Resolved</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="item-card p-3 text-center">
                <h2 class="fw-bold">{{ $totalReports }}</h2>
                <p class="text-muted">Total Reports</p>
            </div>
        </div>

    </div>

    <!-- ACTION BUTTONS SECTION -->
    <div class="item-card p-4 mb-5">
        <h4 class="fw-bold mb-3">Quick Actions</h4>

        <div class="row g-3">

            <!-- Report Lost Item -->
            <div class="col-md-3">
                <a href="{{ route('items.create') }}?type=lost"
                    class="btn btn-primary quick-action-btn">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Report Lost Item
                </a>
            </div>

            <!-- Report Found Item -->
            <div class="col-md-3">
                <a href="{{ route('items.create') }}?type=found"
                    class="btn btn-success btn-dashboard">
                    <i class="bi bi-check-circle-fill"></i>
                    Report Found Item
                </a>
            </div>

            <!-- Search Items -->
            <div class="col-md-3">
                <a href="{{ route('items.index') }}"
                    class="btn btn-secondary btn-dashboard">
                    <i class="bi bi-search"></i>
                    Search Items
                </a>
            </div>

            <!-- View My Reports -->
            <div class="col-md-3">
                <a href="{{ route('items.myreports') }}"
                    class="btn btn-warning btn-dashboard">
                    <i class="bi bi-folder2-open"></i>
                    My Reports
                </a>
            </div>
        </div>
    </div>

    <!-- RECENT REPORTS -->
    <div class="item-card p-4">
        <h4 class="fw-bold mb-3">Recently Reported Items</h4>

        <ul class="list-group">
            @forelse($recentReports as $report)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        <strong>{{ $report->name }}</strong><br>
                        <span class="text-muted small">{{ ucfirst($report->type) }} • {{ $report->location }}</span>
                    </span>
                    <a href="{{ route('items.show', $report->id) }}" class="btn btn-sm btn-cspc">
                        View
                    </a>
                </li>
            @empty
                <li class="list-group-item">No recent reports found.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection