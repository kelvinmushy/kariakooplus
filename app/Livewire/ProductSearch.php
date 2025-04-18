<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Ad;

class ProductSearch extends Component
{
    public $query = '';
    public $results = [];

    public function submitSearch()
    {
        if (strlen($this->query) >= 2) {
            $this->results = Ad::where('name', 'like', '%' . $this->query . '%')
                                ->limit(5)
                                ->get();
        } else {
            $this->results = [];
        }
    }

    public function render()
    {
        return view('livewire.product-search');
    }
}



