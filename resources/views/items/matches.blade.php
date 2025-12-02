@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Potential Matches for "{{ $item->name }}"</h1>

    <a href="{{ route('items.show', $item->id) }}" class="btn btn-secondary mb-3">← Back</a>

    @if($matches->isEmpty())
        <div class="alert alert-warning">
            No matching items found.
        </div>
    @else
        <div class="row">
            @foreach($matches as $match)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        
                        @if($match->photo_path)
                            <img src="{{ asset('storage/' . $match->photo_path) }}" 
                                 class="card-img-top" 
                                 alt="Item Image">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $match->name }}</h5>
                            <p class="card-text text-muted">
                                {{ Str::limit($match->description, 80) }}
                            </p>

                            <p class="mb-1"><strong>Type:</strong> {{ ucfirst($match->type) }}</p>
                            <p class="mb-1"><strong>Date:</strong> {{ $match->date_reported->format('M d, Y') }}</p>
                            <p class="mb-1"><strong>Location:</strong> {{ $match->location }}</p>

                            <a href="{{ route('items.show', $match->id) }}" class="btn btn-primary w-100 mt-2">
                                View Item
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
