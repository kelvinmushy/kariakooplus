<aside class="bg-white p-4 rounded shadow-sm border" style="position: sticky; top: 80px; z-index: 1010;">
    <h5 class="mb-4 text-center">Filter Products</h5>

    <!-- Category Filter -->
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select id="category" class="form-select" wire:model.lazy="category">
            <option value="">All Categories</option>
            @foreach ($subcategories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Brand Filter -->
    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <select id="brand" class="form-select" wire:model.lazy="brand">
            <option value="">All Brands</option>
            @foreach ($brands as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Condition Filter -->
    <div class="mb-3">
        <label class="form-label">Condition</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model.lazy="conditions" value="new" id="conditionNew">
            <label class="form-check-label" for="conditionNew">New</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model.lazy="conditions" value="used"
                id="conditionUsed">
            <label class="form-check-label" for="conditionUsed">Used</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model.lazy="conditions" value="refurbished"
                id="conditionRefurbished">
            <label class="form-check-label" for="conditionRefurbished">Refurbished</label>
        </div>
    </div>

    <!-- Price Range Filters -->
    <div class="mb-3">
        <label for="minPrice" class="form-label">Price Range</label>
        <div class="d-flex">
            <input type="number" id="minPrice" wire:model.lazy="minPrice" class="form-control me-2"
                placeholder="Min Price">
            <input type="number" id="maxPrice" wire:model.lazy="maxPrice" class="form-control" placeholder="Max Price">
        </div>
    </div>

    <!-- Reset Filters -->
    <div class="text-center mt-2">
        <button class="btn btn-link p-0" wire:click="resetFilters">Reset Filters</button>
    </div>
</aside>