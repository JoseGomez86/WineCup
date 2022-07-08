<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryProducts extends Component
{
    public $category;
    public $products=[];

    public function loadPost(){
        $this->products=$this->category->products()->where('statusproduct_id','!=' ,2)
            ->where('statusproduct_id','!=' ,4)->where('statusproduct_id','!=' ,3)->take(20)->get();
        $this->emit('glider', $this->category->id);
    }

    public function render()
    {
        return view('livewire.category-products');
    }
}
