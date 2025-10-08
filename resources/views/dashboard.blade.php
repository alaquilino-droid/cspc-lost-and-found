@extends('layouts.app')

@section('content')
<div class="text-center my-5">
    <h1 class="fw-bold mb-3">Welcome, {{ Auth::user()->name }}!</h1>
    <p class="text-muted">Campus Lost & Found Reporter</p>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="row g-3">
                <!-- Report Lost Item -->
                <div class="col-6 col-md-3">
                    <a href="{{ route('items.create') }}?type=lost" class="btn btn-danger w-100 py-4 shadow-sm">
                        <i class="bi bi-exclamation-circle fs-3 d-block mb-2"></i>
                        Report Lost Item
                    </a>
                </div>

                <!-- Report Found Item -->
                <div class="col-6 col-md-3">
                    <a href="{{ route('items.create') }}?type=found" class="btn btn-success w-100 py-4 shadow-sm">
                        <i class="bi bi-check-circle fs-3 d-block mb-2"></i>
                        Report Found Item
                    </a>
                </div>

                <!-- Search All Items -->
                <div class="col-6 col-md-3">
                    <a href="{{ route('items.index') }}" class="btn btn-primary w-100 py-4 shadow-sm">
                        <i class="bi bi-search fs-3 d-block mb-2"></i>
                        Search Items
                    </a>
                </div>

                <!-- My Reports -->
                <div class="col-6 col-md-3">
                    <a href="{{ route('items.myreports') }}" class="btn btn-warning w-100 py-4 shadow-sm">
                        <i class="bi bi-list-check fs-3 d-block mb-2"></i>
                        My Reports
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
