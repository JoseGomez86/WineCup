<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class SearchProduct extends Component
{
    public $search, $products;
    public $open = false;
    protected $listeners = ['updateSearch'];

    public function updateSearch( $product)
    {
        $this->search = $product;
    }
    public function updatedSearch($value)
    {
        if ($value) {
            $this->open = true;
        } else {
            $this->open = false;
        }
    }

    public function render()
    {
        if ($this->search) {
            $this->products = Product::where('name', 'LIKE', "%" . $this->search . "%")->take(10)->get();
        } else {
            $this->products = [];
        }
        return view('livewire.admin.search-product');
    }

    public function selectProduct($j)
    {
        $this->search = $this->products[$j]->name;
        $this->open = false;
        $this->emit('productSearch', $this->products[$j]);
    }
}
