<div class="container mt-5">
    <div class="row">
        <!-- Sidebar: Show on md and above, hide on small screens -->
        <div class="col-md-3 d-none d-md-block">
            @include('home.sidebar')
        </div>

        <!-- Main Content Area -->
        <div class="col-12 col-md-9">
            <div class="row">
                @forelse ($ads as $ad)
                    <div class="col-12 col-sm-6 col-md-4 mb-4">
                        <div class="card shadow-sm border border-light rounded-lg overflow-hidden h-100">
                            @php
                                $firstImage = $ad->adimages->first() ?? null;
                            @endphp

                            @if($firstImage)
                                <img src="{{ asset($firstImage->image_path) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px; background-color: #f8f9fa;">
                                    <span class="text-muted">No Image</span>
                                </div>
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate">{{ $ad->name }}</h5>
                                <p class="card-text text-muted" style="font-size: 14px; height: 60px; overflow: hidden;">
                                    {{ strip_tags($ad->product_description) }}
                                </p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <span class="text-primary fw-bold">${{ number_format($ad->price, 2) }}</span>
                                    <a href="{{ route('ads.preview', @$ad->slug) }}" class="btn btn-primary btn-sm">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted w-100">No ads match your filters.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $ads->links() }}
    </div>
</div>
