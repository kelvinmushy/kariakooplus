<div class="container mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 d-none d-md-block">
            @include('home.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-12 col-md-9">
            <div class="row">
                @forelse ($ads as $ad)
                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                          <a href="{{ route('ads.preview', @$ad->slug) }}" style="text-decoration: none">
                            <div class="card shadow-sm border border-light rounded-lg overflow-hidden h-100">
                                @php
                                    $images = $ad->adimages; // Get all images for the ad
                                    $imageCount = $images->count();
                                    $firstImage = $images->first();
                                @endphp

                                <!-- Image Carousel Container -->
                                <div class="position-relative">
                                    @if($imageCount > 0)
                                        <div id="carousel{{ $ad->id }}" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach($images as $index => $image)
                                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                        <img src="{{ asset($image->image_path) }}"
                                                             class="d-block w-100 img-fluid"
                                                             alt="{{ $ad->name ?? 'Ad Image' }}"
                                                             style="height: 300px; object-fit: cover; background-color: #f9f9f9; 
                                                                    border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <!-- Arrows for Navigation -->
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $ad->id }}" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $ad->id }}" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    @else
                                        <div class="card-img-top d-flex align-items-center justify-content-center"
                                             style="height: 300px; background-color: #f8f9fa; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                            <span class="text-muted">No Image</span>
                                        </div>
                                    @endif

                                    <!-- Image Count Badge at Top Right of the Image -->
                                    @if($imageCount > 1)
                                        <div class="position-absolute top-0 end-0 p-2" 
                                             style="background-color: rgba(0, 0, 0, 0.5); color: white; border-radius: 5px;">
                                            {{ $imageCount }}
                                        </div>
                                    @endif
                                </div>

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-truncate">{{ $ad->name }}</h5>
                                    
                                    <p class="card-text text-muted" style="font-size: 14px; height: 60px; overflow: hidden;">
                                        {{ strip_tags($ad->product_description) }}
                                    </p>

                                    <div class="mt-auto">
                                        <div class="d-flex justify-content-between align-items-center mt-1">
                                            <span class="text-muted text-decoration-line-through" style="font-size: 12px;">
                                                Tsh{{ number_format($ad->original_price ?? $ad->price * 1.2, 2) }}
                                            </span>
                                            <span class="text-primary fw-bold" style="font-size: 14px;">
                                                Tsh{{ number_format($ad->price, 2) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-center text-muted w-100">No ads match your filters.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $ads->links() }}
    </div>
</div>
