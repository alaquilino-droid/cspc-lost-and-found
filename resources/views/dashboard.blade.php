@extends('layouts.app')

@section('content')
<div class="container my-5">

    <h1 class="page-title">Welcome, {{ Auth::user()->name }}!</h1>
    <p class="text-muted mb-4">Campus Lost & Found Reporter System – Powered by CSPC</p>

    <div class="row g-4">

        <div class="col-md-3">
            <a href="{{ route('items.create') }}?type=lost" class="text-decoration-none">
                <div class="cspc-card">
                    <div class="cspc-icon">📕</div>
                    <h5 class="fw-bold">Report Lost Item</h5>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('items.create') }}?type=found" class="text-decoration-none">
                <div class="cspc-card">
                    <div class="cspc-icon">📗</div>
                    <h5 class="fw-bold">Report Found Item</h5>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('items.index') }}" class="text-decoration-none">
                <div class="cspc-card">
                    <div class="cspc-icon">🔍</div>
                    <h5 class="fw-bold">Search Items</h5>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('items.myreports') }}" class="text-decoration-none">
                <div class="cspc-card">
                    <div class="cspc-icon">📝</div>
                    <h5 class="fw-bold">My Reports</h5>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection