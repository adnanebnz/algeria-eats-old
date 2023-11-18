<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsPage extends Component
{
    public $search;
    public $artisan;
    public $artisanRating;
    public $productType;
    public $productRating;
    public $filters;

    public function mount()
    {
        $this->filters = [
            'search' => $this->search,
            'artisan' => $this->artisan,
            'artisanRating' => $this->artisanRating,
            'productRating' => $this->productRating,
            'productType' => $this->productType,
        ];
    }

    public function render()
    {
        return view('livewire.products-page', [
            'products' => Product::filters($this->filters)->latest()->paginate(10),
        ]);
    }

    public function applyFilters()
    {
        $this->filters = [
            'search' => $this->search,
            'artisan' => $this->artisan,
            'artisanRating' => $this->artisanRating,
            'productRating' => $this->productRating,
            'productType' => $this->productType,
        ];
    }

    public function resetFilters()
    {
        $this->reset(['search', 'artisan', 'artisanRating', 'productRating', 'productType']);
        $this->applyFilters();
    }
}
