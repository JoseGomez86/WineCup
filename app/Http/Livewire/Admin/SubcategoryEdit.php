<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class SubcategoryEdit extends Component
{
    use WithFileUploads;

    public $editImage, $rand;
    public $subcategory, $categories;
    public $category_id, $status_old;

    protected $rules = [
        'category_id' => 'required',
        'subcategory.name' => 'required',
        'subcategory.status' => 'required',
    ];

    protected $validationAttributes = [
        'subcategory.name' => 'Nombre',
        'subcategory.slug' => 'Slug',
        'subcategory.icon' => 'Icono',
        'subcategory.status' => 'Estado',
        'editImage' => 'Imágen',
    ];

    public function mount()
    {
        $this->categories = Category::all();
        $this->category_id = $this->subcategory->category->id;
        $this->rand = rand();
        $this->status_old = $this->subcategory->status;
    }

    public function updatedSubcategoryName($value)
    {
        $this->subcategory->slug = Str::slug($value);
    }

    public function cancel()
    {
        $this->resetValidation();
        return redirect()->route('admin.subcategories.index');
    }

    public function updateSubcategory()
    {
        $rules = $this->rules;
        $rules['subcategory.slug'] = 'required|unique:subcategories,slug,' . $this->subcategory->id;
        if ($this->editImage) {
            $rules['editImage'] = 'image|max:2048';
        }
        $this->validate($rules);
        if ($this->editImage) {
            Storage::delete($this->subcategory->image);
            $this->subcategory->image = $this->editImage->store('subcategories');
        }
        $this->subcategory->update();

        # Deshabilitado y estaba habilitado, se deshabilitan todos los productos relacionados
        if ($this->subcategory->status == 1 && $this->status_old == 2) {
            $products = $this->subcategory->products;
            foreach ($products as $product) {
                #deshabilitado de productos
                $product->statusproduct_id = 2;
                $product->update();
            }
        }

        # Habilitado y estaba deshabilitado, se habilitan todos los productos relacionados
        if ($this->subcategory->status == 2 && $this->status_old == 1) {
            $products = $this->subcategory->products;            
            foreach ($products as $product) {
                #deshabilitado de productos
                $product->statusproduct_id = 1;
                $product->update();
            }
        }
        $this->status_old = $this->subcategory->status;
        
        $this->emit('alert', 'Actualizado con exito!', 'Se modifico correctamente la subcategoría', 'success');
    }

    public function render()
    {
        return view('livewire.admin.subcategory-edit');
    }
}
