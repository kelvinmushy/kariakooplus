<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <section class="search-section text-center position-relative" style="background-color: #28a745; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px;">
        <div class="container py-5">
            <h2 class="text-white mb-4">Find Your Perfect Product</h2>
    
            <div class="position-relative" style="max-width: 600px; margin: 0 auto;">
                <input type="text"
                       wire:model.debounce.500ms="search"
                       class="form-control form-control-md"
                       placeholder="Search for products..."
                />
    
                @if(strlen(@$search) > 1)
                    <div class="bg-white text-start shadow rounded position-absolute w-100 mt-1 z-3">
                        @if($results->count() > 0)
                            <ul class="list-group list-group-flush">
                                @foreach($results as $result)
                                    <li class="list-group-item">
                                        <a href="{{ route('ads.show', $result->id) }}" class="text-dark text-decoration-none">
                                            {{ $result->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="p-2 text-muted">No products found.</div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>
    
</div>
