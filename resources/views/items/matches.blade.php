@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="item-card p-4 mb-4">
        <h1 class="page-title">Potential Matches for "{{ $item->name }}"</h1>
        <p class="text-muted">These items may match the report.</p>
        <a href="{{ route('items.show', $item->id) }}" class="btn btn-secondary mt-2">← Back</a>
    </div>

    <div class="row g-4">
        @forelse($matches as $match)
            <div class="col-md-4">
                <div class="item-card p-3">

                    @if($match->photo_path)
                        <img src="{{ asset('storage/' . $match->photo_path) }}" 
                             class="img-fluid rounded mb-3" style="height: 180px; object-fit: cover;">
                    @endif

                    <h5 class="fw-bold">{{ $match->name }}</h5>
                    <p class="text-muted">{{ Str::limit($match->description, 80) }}</p>

                    <p><strong>Type:</strong> {{ ucfirst($match->type) }}</p>
                    <p><strong>Location:</strong> {{ $match->location }}</p>

                    <a href="{{ route('items.show', $match->id) }}" class="btn btn-cspc mt-2 w-100">
                        View Details
                    </a>

                </div>
            </div>
        @empty
            <div class="alert alert-warning">No potential matches found.</div>
        @endforelse
    </div>
</div>
@endsection