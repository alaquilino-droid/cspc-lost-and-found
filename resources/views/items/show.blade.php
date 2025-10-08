@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold mb-0">{{ $item->name ?? ucfirst($item->type).' item' }}</h2>
        <a href="{{ route('items.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <p class="text-muted mb-1"><strong>Type:</strong> {{ ucfirst($item->type) }}</p>
    <p class="text-muted mb-1"><strong>Status:</strong> {{ ucfirst($item->status) }}</p>
    <p class="text-muted mb-1"><strong>Date Reported:</strong> {{ $item->date_reported?->format('M d, Y') }}</p>
    <p class="text-muted mb-3"><strong>Location:</strong> {{ $item->location ?? 'N/A' }}</p>

    @if ($item->photo_path)
        <img src="{{ asset('storage/' . $item->photo_path) }}" class="img-fluid rounded mb-3 shadow-sm" alt="Item Photo">
    @endif

    <p class="lead">{{ $item->description }}</p>

    <div class="mt-4">
        @can('update', $item)
            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary">
                <i class="bi bi-pencil"></i> Edit
            </a>
        @endcan

        @can('delete', $item)
            <form method="POST" action="{{ route('items.destroy', $item->id) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Delete this report?')">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        @endcan

        <a href="{{ route('items.matches', $item->id) }}" class="btn btn-outline-primary">
            <i class="bi bi-link-45deg"></i> Potential Matches
        </a>
    </div>
</div>
@endsection