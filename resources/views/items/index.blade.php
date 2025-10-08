@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold">Campus Lost & Found</h1>
    @auth
        <a href="{{ route('items.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Report New Item
        </a>
    @endauth
</div>

<form action="{{ route('items.search') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="q" class="form-control" value="{{ request('q') }}"
               placeholder="Search by keyword, description...">
        <button class="btn btn-outline-primary"><i class="bi bi-search"></i> Search</button>
    </div>
</form>

@if($items->count())
    <div class="row">
        @foreach($items as $item)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    @if($item->photo_path)
                        <img src="{{ asset('storage/' . $item->photo_path) }}" class="card-img-top" alt="Item Photo">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name ?? ucfirst($item->type).' item' }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($item->description, 100) }}</p>
                        <p class="small text-secondary mb-2">
                            <strong>Type:</strong> {{ ucfirst($item->type) }}<br>
                            <strong>Location:</strong> {{ $item->location ?? 'N/A' }}<br>
                            <strong>Date:</strong> {{ $item->date_reported?->format('M d, Y') }}
                        </p>
                        <a href="{{ route('items.show', $item) }}" class="btn btn-sm btn-outline-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $items->links() }}
    </div>
@else
    <div class="alert alert-info">
        No items found.
    </div>
@endif
@endsection