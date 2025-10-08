@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold">My Recent Reports</h1>
    <a href="{{ route('items.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> New Report
    </a>
</div>

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
                        <p class="card-text text-muted">{{ Str::limit($item->description, 80) }}</p>
                        <p class="small text-secondary">
                            {{ ucfirst($item->type) }} | {{ $item->status }}<br>
                            {{ $item->date_reported?->format('M d, Y') }}
                        </p>
                        <a href="{{ route('items.show', $item->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-info">
        You haven’t reported any items yet.
    </div>
@endif
@endsection