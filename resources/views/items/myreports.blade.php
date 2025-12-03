@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="item-card p-4 mb-4">
        <h1 class="page-title">My Recent Reports</h1>
        <p class="text-muted">These are the items you have reported.</p>
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

                    <p><strong>Status:</strong> {{ ucfirst($item->status) }}</p>

                    <div class="mt-3 d-flex gap-2">
                        <a href="{{ route('items.show', $item->id) }}" 
                           class="btn btn-cspc w-50">View</a>

                        <a href="{{ route('items.edit', $item->id) }}" 
                           class="btn btn-warning w-50">Edit</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning">You have not submitted any reports yet.</div>
        @endforelse
    </div>
</div>
@endsection