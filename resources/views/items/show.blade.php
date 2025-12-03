@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="item-card p-4">

        <h1 class="page-title mb-3">{{ $item->name }}</h1>

        @if($item->photo_path)
            <img src="{{ asset('storage/' . $item->photo_path) }}" 
                 class="img-fluid rounded mb-4" style="max-height: 300px;">
        @endif

        <p><strong>Description:</strong> {{ $item->description }}</p>
        <p><strong>Type:</strong> {{ ucfirst($item->type) }}</p>
        <p><strong>Location:</strong> {{ $item->location }}</p>
        <p><strong>Date Reported:</strong> {{ $item->date_reported->format('M d, Y') }}</p>
        <p><strong>Status:</strong> {{ ucfirst($item->status) }}</p>

        <a href="{{ route('items.index') }}" class="btn btn-secondary mt-3">
            ← Back to Reports
        </a>

        <div class="mt-4 d-flex gap-2">
            <a href="{{ route('items.matches', $item->id) }}" class="btn btn-cspc">View Potential Matches</a>

            @can('update', $item)
                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning btn-edit">
                    <i class="bi bi-pencil-square"></i>
                    Edit
                </a>
            @endcan

            @can('delete', $item)
            <form method="POST" action="{{ route('items.destroy', $item->id) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-delete" onclick="return confirm('Are you sure?')">
                    <i class="bi bi-trash"></i>
                    Delete
                </button>
            </form>
            @endcan
        </div>
    </div>
</div>
@endsection