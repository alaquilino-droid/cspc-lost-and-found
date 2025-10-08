@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4">
    <h2 class="fw-bold mb-4">Edit Item Report</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Type</label>
            <select name="type" class="form-select" required>
                <option value="lost" {{ old('type', $item->type) == 'lost' ? 'selected' : '' }}>Lost</option>
                <option value="found" {{ old('type', $item->type) == 'found' ? 'selected' : '' }}>Found</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Item Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $item->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" rows="4" class="form-control">{{ old('description', $item->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Date Reported</label>
            <input type="date" name="date_reported" class="form-control" value="{{ old('date_reported', $item->date_reported) }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $item->location) }}">
        </div>

        @if ($item->photo_path)
            <div class="mb-3">
                <p class="fw-semibold mb-1">Current Photo:</p>
                <img src="{{ asset('storage/' . $item->photo_path) }}" class="img-thumbnail mb-2" style="max-width: 250px;">
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label fw-semibold">Replace Photo (optional)</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Reporter Name</label>
            <input type="text" name="reporter_name" class="form-control" value="{{ old('reporter_name', $item->reporter_name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Status</label>
            <select name="status" class="form-select">
                <option value="open" {{ old('status', $item->status) == 'open' ? 'selected' : '' }}>Open</option>
                <option value="claimed" {{ old('status', $item->status) == 'claimed' ? 'selected' : '' }}>Claimed</option>
                <option value="closed" {{ old('status', $item->status) == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('items.show', $item->id) }}" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Report</button>
        </div>
    </form>
</div>
@endsection