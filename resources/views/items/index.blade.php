@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="item-card p-4 mb-4">
        <h1 class="page-title">Search Lost & Found Items</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('items.create') }}" class="btn btn-cspc">
                <i class="bi bi-plus-circle"></i> Report New Item
            </a>
        </div>

        <form action="{{ route('items.index') }}" method="GET" class="d-flex mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
            <button class="btn btn-cspc ms-2">Search</button>
        </form> 
    </div>

    <div class="row g-4">
        @forelse($items as $item)
            <div class="col-md-4">
                <div class="item-card p-3">

                    @if($item->photo_path)
                        <img src="{{ asset('storage/' . $item->photo_path) }}" 
                             class="img-fluid rounded mb-3" style="height: 180px; object-fit: cover;">
                    @endif

                    <h5 class="fw-bold">{{ $item->name }}</h5>
                    <p class="text-muted">{{ Str::limit($item->description, 80) }}</p>

                    <p><strong>Type:</strong> {{ ucfirst($item->type) }}</p>
                    <p><strong>Location:</strong> {{ $item->location }}</p>
                    <p><strong>Date:</strong> {{ $item->date_reported->format('M d, Y') }}</p>

                    <a href="{{ route('items.show', $item->id) }}" class="btn btn-cspc mt-2 w-100">
                        View Details
                    </a>

                </div>
            </div>
        @empty
            <div class="alert alert-warning">No items found.</div>
        @endforelse
    </div>
</div>
@endsection