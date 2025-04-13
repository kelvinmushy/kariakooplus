<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Ad;

class ProductSearch extends Component
{
    public $search = '';

    public function updatedSearch()
    {
        // Only load if search term is at least 2 characters
        if (strlen($this->search) < 2) {
            $this->reset('results');
        }
    }

    public function getResultsProperty()
    {
        return Ad::where('name', 'like', '%' . $this->search . '%')
                    ->limit(5)
                    ->get();
    }

    public function render()
    {
        //  dd("uuu");
        return view('livewire.product-search');
    }
}
