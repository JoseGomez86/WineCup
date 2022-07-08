<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    use WithPagination;
    
    public $category, $subcategoria;

    public $view="grid";

    protected $queryString = ['subcategoria'];

    public function borrarFiltros()
    {
        $this->reset(['subcategoria','page']);
    }

    public function updatedsubcategoria()
    {
        $this->resetPage();
    }

    public function render()
    {
        //$products=$this->category->products()->where('status',2)->paginate(20);
        $productsQuery= Product::query()->where('statusproduct_id','!=',2)->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id);
        });

        if ($this->subcategoria) {
            $productsQuery=$productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('slug', $this->subcategoria);
            });
        }

        $products=$productsQuery->paginate(20);
        
        return view('livewire.category-filter', compact('products'));
    }
}
