@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="card form-card p-4">

        <h1 class="page-title">Edit Item Report</h1>

        <form method="POST" action="{{ route('items.update', $item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Item Type</label>
                <select name="type" class="form-select">
                    <option value="lost" {{ $item->type == 'lost' ? 'selected' : '' }}>Lost</option>
                    <option value="found" {{ $item->type == 'found' ? 'selected' : '' }}>Found</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Item Name</label>
                <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control">{{ $item->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="date_reported" class="form-control" value="{{ $item->date_reported }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" value="{{ $item->location }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload New Photo (optional)</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('items.index') }}" class="btn btn-secondary btn-cancel">Cancel</a>
                <button class="btn btn-form w-50">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection