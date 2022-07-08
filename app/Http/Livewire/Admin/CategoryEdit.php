<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CategoryEdit extends Component
{
    use WithFileUploads;

    public $category, $editImage, $rand, $status_old;

    protected $rules = [
        'category.name' => 'required',
        'category.slug' => 'required|unique:categories,slug',
        'category.icon' => 'required',
        'category.status' => 'required',
    ];

    protected $validationAttributes = [
        'category.name' => 'Nombre',
        'category.slug' => 'Slug',
        'category.icon' => 'Icono',
        'category.status' => 'Estado',
        'editImage' => 'Imágen',
    ];


    public function mount()
    {
        $this->rand = rand();
        $this->status_old = $this->category->status;
    }

    public function updatedCategoryName($value)
    {
        $this->category->slug = Str::slug($value);
    }

    public function cancel()
    {
        $this->resetValidation();
        return redirect()->route('admin.categories.index');
    }

    public function updateCategory()
    {
        $rules = $this->rules;
        $rules['category.slug'] = 'required|unique:categories,slug,' . $this->category->id;
        if ($this->editImage) {
            $rules['editImage'] = 'image|max:2048';
        }
        $this->validate($rules);

        if ($this->editImage) {
            Storage::delete($this->category->image);
            $this->category->image = $this->editImage->store('categories');
        }

        $this->category->update();

        # Deshabilitado y estaba habilitado, se deshabilitan todos las subcategorías relacionadas y los productos
        if ($this->category->status == 1 && $this->status_old == 2) {
            $subcategories = $this->category->subcategories;
            $products = $this->category->products;
            foreach ($subcategories as $subcategory) {
                #deshabilitado de subcategories
                $subcategory->status = 1;
                $subcategory->update();
            }
            foreach ($products as $product) {
                #deshabilitado de productos
                $product->statusproduct_id = 2;
                $product->update();
            }
        }

        # Habilitado y estaba deshabilitado, se habilitan todos las subcategorías relacionadas y los productos
        if ($this->category->status == 2 && $this->status_old == 1) {
            $subcategories = $this->category->subcategories;
            $products = $this->category->products;
            foreach ($subcategories as $subcategory) {
                #habilitado de subcategories
                $subcategory->status = 2;
                $subcategory->update();
            }
            foreach ($products as $product) {
                #deshabilitado de productos
                $product->statusproduct_id = 1;
                $product->update();
            }
        }
        $this->status_old = $this->category->status;

        $this->emit('alert', 'Actualizado con exito!', 'Se modifico correctamente la categoría', 'success');
    }

    public function render()
    {
        return view('livewire.admin.category-edit');
    }
}
