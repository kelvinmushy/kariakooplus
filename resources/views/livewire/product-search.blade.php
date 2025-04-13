<div>
    {{-- Search Section for Ads --}}
    <section class="search-section text-center position-relative"
        style="background-color: #28a745; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px;">
        <div class="container py-5">
            <h2 class="text-white mb-4">Find Your Perfect Ad</h2>

            <form wire:submit.prevent="submitSearch">
                <div class="position-relative" style="max-width: 600px; margin: 0 auto;">
                    <div class="input-group">
                        <input type="text" wire:model.defer="query" class="form-control form-control-md"
                            placeholder="Search for ads..." />
                        <button type="submit" class="btn btn-dark">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>

                    @if($results && count($results) > 0)
                                    <div class="row">
                                        @foreach($results as $ad)
                                                            <div class="col-12 col-sm-6 col-md-4 mb-4">
                                                                <div class="card shadow-sm border border-light rounded-lg overflow-hidden h-100">
                                                                    @php
                                                                        $firstImage = $ad->adimages->first() ?? null;
                                                                    @endphp

                                                                    @if($firstImage)
                                                                        <img src="{{ asset($firstImage->image_path) }}" class="card-img-top"
                                                                            style="height: 200px; object-fit: cover;">
                                                                    @else
                                                                        <div class="card-img-top d-flex align-items-center justify-content-center"
                                                                            style="height: 200px; background-color: #f8f9fa;">
                                                                            <span class="text-muted">No Image</span>
                                                                        </div>
                                                                    @endif

                                                                    <div class="card-body d-flex flex-column">
                                                                        <h5 class="card-title text-truncate">{{ $ad->name }}</h5>
                                                                        {{-- <p class="card-text text-muted"
                                                                            style="font-size: 14px; height: 60px; overflow: hidden;">
                                                                            {{ strip_tags($ad->product_description) }}
                                                                        </p> --}}
                                                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                                                            <span class="text-primary fw-bold">${{ number_format($ad->price, 2) }}</span>
                                                                            <a href="{{ route('ads.preview', @$ad->slug) }}"
                                                                                class="btn btn-primary btn-sm">View</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                        @endforeach

                                    </div>
                    @elseif($results && count($results) === 0)
                        <div class="bg-white text-muted text-center rounded mt-1 p-2">No ads found.</div>
                    @endif
                </div>
            </form>
        </div>
    </section>
</div>