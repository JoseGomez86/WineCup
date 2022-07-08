<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CategoryCreate extends Component
{
    use WithFileUploads;

    public $rand, $name, $slug, $icon, $image, $status;

    protected $rules = [
        'name' => 'required',
        'slug' => 'required|unique:categories,slug',
        'icon' => 'required',
        'image' => 'image|max:2048',
        'status' => 'required',
    ];

    protected $validationAttributes = [
        'icon' => 'Icono',
        'status' => 'Estado',
        'image' => 'Imágen',
    ];

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function saveCategory()
    {
        $this->validate();

        $category = new Category;
        $category->name=$this->name;
        $category->slug=$this->slug;
        $category->icon=$this->icon;
        $category->image = $this->image->store('categories');
        $category->status=$this->status;

        $category->save();
        $this->emit('alert', 'Creado con exito!', 'Se creo correctamente la categoría', 'success');
    }

    public function cancel()
    {
        $this->resetValidation();
        return redirect()->route('admin.categories.index');
    }

    public function render()
    {
        return view('livewire.admin.category-create');
    }
}
