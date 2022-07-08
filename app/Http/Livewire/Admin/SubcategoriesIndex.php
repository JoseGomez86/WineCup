<?php

namespace App\Http\Livewire\Admin;

use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;

class SubcategoriesIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function render()
    {        
        $subcategories = Subcategory::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.admin.subcategories-index', compact('subcategories'));
    }
}
