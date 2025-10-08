@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4">
    <h2 class="fw-bold mb-4">Report New Item</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Type</label>
            <select name="type" class="form-select" required>
                <option value="lost" {{ request('type') == 'lost' ? 'selected' : '' }}>Lost</option>
                <option value="found" {{ request('type') == 'found' ? 'selected' : '' }}>Found</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Item Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Date Reported</label>
            <input type="date" name="date_reported" class="form-control" value="{{ old('date_reported') }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Upload Photo (optional)</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Reporter Name (optional)</label>
            <input type="text" name="reporter_name" class="form-control" value="{{ old('reporter_name') }}">
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit Report</button>
        </div>
    </form>
</div>
@endsection
