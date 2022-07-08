<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Item;
use App\Models\Subcategory;
use App\Models\Valuesitem;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

use Livewire\WithFileUploads;

class SubcategoryCreate extends Component
{
    use WithFileUploads;

    public $rand, $categories;
    public $category_id = "", $name, $slug, $icon, $image, $status;
    public $ItemsNew = [];

    protected $rules = [
        'category_id' => 'required',
        'name' => 'required',
        'slug' => 'required|unique:subcategories,slug',
        'image' => 'image|max:2048',
        // 'status' => 'required',
    ];

    public function mount()
    {
        $this->categories = Category::all();
        $this->rand = rand();
        $this->ItemsNew[0][0] = "";
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function cancel()
    {
        $this->resetValidation();
        return redirect()->route('admin.subcategories.index');
    }

    public function addItem($i)
    {
        $j = 0;
        $this->validate(
            ['ItemsNew.' . $i . '.0' => 'required'],
            ['ItemsNew.' . $i . '.0.required' => 'El Nombre del Item es obligatorio',]
        );
        $this->ItemsNew[$i + 1][0] = "";
    }

    public function deleteItem($i)
    {
        if ($i == 0 && !isset($this->ItemsNew[1])) {
            unset($this->ItemsNew[$i]);
            $this->ItemsNew[0][0] = "";
        } else {
            unset($this->ItemsNew[$i]);
            $this->ItemsNew = array_values($this->ItemsNew);
        }
    }

    public function deleteValueitem($i, $j)
    {
        if ($j == 1 && !isset($this->ItemsNew[$i][2])) {
            unset($this->ItemsNew[$i][$j]);
            $this->ItemsNew[$i][1] = "";
        } else {
            unset($this->ItemsNew[$i][$j]);
            $this->ItemsNew[$i] = array_values($this->ItemsNew[$i]);
        }
    }

    public function saveSubcategory()
    {
        $this->validate();
        $subcategory = new Subcategory;
        $subcategory->name = $this->name;
        $subcategory->slug = $this->slug;
        $subcategory->image = $this->image->store('subcategories');
        $subcategory->category_id = $this->category_id;
        $subcategory->save();
        foreach ($this->ItemsNew as $i => $ItemNew) {
            $item = new Item();
            $item->name = $this->ItemsNew[$i][0];
            $item->subcategory_id = $subcategory->id;
            $item->save();
            foreach ($ItemNew as $j => $valueItem) {
                if (isset($this->ItemsNew[$i][$j + 1])&&$this->ItemsNew[$i][$j + 1]!="") {
                    $valueItem = new Valuesitem();
                    $valueItem->name = $this->ItemsNew[$i][$j + 1];
                    $valueItem->item_id = $item->id;
                    $valueItem->save();
                }
            }
        }
        $this->emit('alert', 'Creada con exito!', 'Se creo correctamente la nueva subcategoría', 'success');
    }

    public function render()
    {
        return view('livewire.admin.subcategory-create');
    }
}
