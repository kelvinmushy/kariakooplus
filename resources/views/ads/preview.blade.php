@extends('layouts.frontend.app')

@section('title', $ad->name)

@section('top')
    <style>
        /* Limit image height in carousel */
        #adCarousel .carousel-item img {
            max-height: 600px;
            object-fit: cover;
        }

        /* Adjust image height on small screens */
        @media (max-width: 576px) {
            #adCarousel .carousel-item img {
                max-height: 250px;
            }
        }

        .thumbnail-container img {
            transition: border 0.3s;
        }

        .ad-title {
            font-size: 1rem;
            font-weight: 600;
        }

        .ad-price {
            font-size: 1.1rem;
            color: #007bff;
        }

        /* Hover effect for related ads */
        .card:hover {
            transform: scale(1.02);
            transition: transform 0.3s ease-in-out;
        }
    </style>
@endsection

@section('content')
    <div class="container py-3">
        <!-- Image Gallery Section -->
        <div class="row justify-content-start mb-4">
            <div class="col-lg-8">
                @if($ad->adimages && count($ad->adimages))
                    <div id="adCarousel" class="carousel slide border rounded shadow-sm" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($ad->adimages as $key => $image)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <img src="{{ asset($image->image_path) }}" class="d-block w-100 p-2 rounded"
                                        alt="Product Image">
                                </div>
                            @endforeach
                        </div>
                        @if(count($ad->adimages) > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#adCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#adCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        @endif
                    </div>

                    <!-- Thumbnail Gallery -->
                    <div class="thumbnail-container mt-3">
                        <div class="d-flex flex-wrap gap-2 justify-content-start">
                            @foreach($ad->adimages as $key => $image)
                                <img src="{{ asset($image->image_path) }}"
                                    class="thumbnail img-thumbnail p-1 {{ $key === 0 ? 'border-primary' : '' }}"
                                    data-bs-target="#adCarousel" data-bs-slide-to="{{ $key }}"
                                    style="width: 80px; height: 80px; object-fit: cover; cursor: pointer; "
                                    alt="Thumbnail {{ $key + 1 }}" loading="lazy">
                            @endforeach
                        </div>
                    </div>
                @else
                    <img src="{{ asset('no-image.png') }}" class="img-fluid rounded shadow" alt="No image">
                @endif
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="row justify-content-start">
            <div class="col-lg-8">
                <div class="border rounded p-4 shadow-sm bg-white">
                    <h2 class="fw-bold mb-2">{{ $ad->name }}</h2>
                    <span class="badge bg-secondary mb-3"><i class="bi bi-tag-fill me-1"></i>
                        {{ $ad->subcategory->name }}</span>

                    <h4 class="text-success fw-bold mb-3">
                        <i class="bi bi-cash-stack me-2"></i> Tsh {{ number_format($ad->price, 0) }}
                    </h4>

                    <p class="text-muted mb-1">
                        <i class="bi bi-info-circle me-2"></i><strong>Condition:</strong>
                        {{ ucfirst($ad->product_condition) }}
                    </p>

                    <p class="mb-1">
                        <i class="bi bi-award me-2"></i><strong>Brand:</strong> {{ $ad->brand->name }}
                    </p>

                    <hr>

                    <h5 class="fw-bold mt-4"><i class="bi bi-card-text me-2"></i>Product Description</h5>
                    <div class="p-3 rounded" style="font-size: 0.95rem;">
                        {!! $ad->product_description !!}
                    </div>

                    <!-- WhatsApp Contact -->
                    <div class="mt-4">
                        @php
                            $whatsappMessage = "Hi, I'm interested in the product: " . $ad->name . "\n";
                            $whatsappMessage .= "Price: Tsh " . number_format($ad->price, 0) . "\n";
                            $whatsappMessage .= "Product Link: " . url()->current();
                            $whatsappMessage = urlencode($whatsappMessage);
                        @endphp
                        <a href="https://wa.me/+255744091391?text={{ $whatsappMessage }}"
                            class="btn btn-success btn-lg w-100" target="_blank">
                            <i class="bi bi-whatsapp"></i> Buy & Chat on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Ads Section -->
        @if($relatedAds->count())
            <div class="container pb-5">
                <h4 class="fw-bold mb-3">Related Ads</h4>
                <div class="row">
                    @foreach($relatedAds as $related)
                        <div class="col-md-3 mb-4">
                            <div class="card h-100 shadow-sm border-0">
                                <a href="{{ route('ads.preview', @$ad->slug) }}">
                                    <img src="{{ $related->adimages->first()->image_path ?? asset('no-image.png') }}"
                                        class="card-img-top rounded-top"
                                        alt="{{ $related->name }}"
                                        style="height: 180px; object-fit: cover;">
                                </a>
                                <div class="card-body">
                                    <h6 class="ad-title mb-1">{{ Str::limit($related->name, 40) }}</h6>
                                    <p class="text-success ad-price mb-1">Tsh {{ number_format($related->price, 0) }}</p>
                                    <span class="badge bg-secondary">{{ $related->subcategory->name }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
