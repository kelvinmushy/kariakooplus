<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ad;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use Livewire\WithPagination;

class ProductFilter extends Component
{
    use WithPagination;

    public $category = '';
    public $brand = '';
    public $minPrice;
    public $maxPrice;
    public $conditions = [];

    protected $queryString = ['category', 'brand', 'minPrice', 'maxPrice', 'conditions'];

    // Auto-refresh when any filter is updated
    public function updating($field)
    {
        $this->resetPage(); // Reset to page 1 on any filter update
    }

    public function resetFilters()
    {
        $this->reset(['category', 'brand', 'minPrice', 'maxPrice', 'conditions']);
    }

    public function render()
    {
        $ads = Ad::query()
            ->when($this->category, fn($q) => $q->where('subcategory_id', $this->category))
            ->when($this->brand, fn($q) => $q->where('brand_id', $this->brand))
            ->when(!empty($this->conditions), fn($q) => $q->whereIn('product_condition', $this->conditions))
            ->when($this->minPrice, fn($q) => $q->where('price', '>=', $this->minPrice))
            ->when($this->maxPrice, fn($q) => $q->where('price', '<=', $this->maxPrice))
            ->latest()
            ->paginate(9);

        return view('livewire.product-filter', [
            'ads' => $ads,
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'brands' => Brand::all(),
        ]);
    }
}
