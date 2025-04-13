@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-primary">Ad Details</h2>

    <div class="card shadow rounded-4 border-0 mb-4">
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center bg-light p-3">
                @if ($ad->image_url)
                    <img src="{{ $ad->image_url }}" alt="Ad Image" class="img-fluid rounded-3 shadow-sm">
                @else
                    <div class="text-muted text-center">No image available</div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title mb-3 text-dark">{{ $ad->name }}</h3>

                    <p><strong>Description:</strong><br> {{ $ad->product_description ?? 'N/A' }}</p>
                    
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <p><strong>Price:</strong> <span class="text-success">${{ number_format($ad->price, 2) }}</span></p>
                        </div>
                        <div class="col-sm-6">
                            <p><strong>Stock:</strong> {{ $ad->stock }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p><strong>Status:</strong> 
                                <span class="badge {{ $ad->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($ad->status) }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <a href="{{ route('ads.edit', $ad->id) }}" class="btn btn-warning">Edit Ad</a>
                        <a href="{{ route('ads.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
