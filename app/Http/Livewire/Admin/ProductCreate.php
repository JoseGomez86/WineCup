<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use App\Models\Statusproduct;
use App\Models\Subcategory;
use App\Models\Valuesitem;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $categories, $subcategories = [], $items = [], $imagesToSave = [], $images, $subcategory_select;
    public $category_id = "", $subcategory_id = "", $items_id = "", $statusproduct_id = "", $valuesItemsIds = [];
    public $name, $slug, $description, $valuesItems, $statusProducts, $cost, 
    $percent_profit, $price, $quantity, $idSKU, $SKU;

    protected $listeners = ['refreshImages'];

    protected $rules = [
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'statusproduct_id' => 'required',
        'name' => 'required',
        'slug' => 'required|unique:products',
        'description' => 'required',
        'cost' => 'required',
        'percent_profit' => 'required',
        'valuesItemsIds.*' => 'required', // .* sirve para validar el array completo
    ];

    protected $validationAttributes = [
        'category_id' => 'Categoria',
        'subcategory_id' => 'Subcategoria',
        'statusproduct_id' => 'Estado del producto',
        'description' => 'Descripción',
        'cost' => 'Costo',
        'percent_profit' => 'Porcentaje de ganancia',
        'price' => 'Precio',
        'quantity' => 'Cantidad',
        'valuesItemsIds.*' => '', // .* sirve para validar el array completo
    ];

    public function mount()
    {
        $this->categories = Category::all();
        $this->statusProducts = Statusproduct::all();
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function updatedCategoryId($value)
    {
        $this->subcategories = Subcategory::where('category_id', $value)->get();
        $this->reset(['subcategory_id']);
    }

    public function updatedSubcategoryId($value)
    {
        $this->subcategory_select = Subcategory::where('id', $value)->get()[0];
        if ($this->subcategory_select->status == 1) {
            $this->statusproduct_id = 2;
        }
        else{
            $this->statusproduct_id = "";
        }
        $this->items = Item::where('subcategory_id', $value)->get();
        $this->valuesItems = collect();
        foreach ($this->items as $i => $item) {
            $this->valuesItems->push(Valuesitem::query()->where('item_id', $item->id)->get());
            $this->valuesItemsIds[$i] = "";
        }        
        //Crear SKU
        $idSKU=0;
        if((int)substr(Product::select('SKU')->where('SKU', 'like', '%' . substr($this->subcategory_select->slug,0,2). '%')->orderBy('SKU', 'desc')->first(),12,4)){
            $idSKU = (int)substr(Product::select('SKU')->where('SKU', 'like', '%' . substr($this->subcategory_select->slug,0,2). '%')->orderBy('SKU', 'desc')->first(),12,4)+1;
        }else{
            $idSKU = 1;
        }
        $idSKU = sprintf('%04s', $idSKU);
        $cateDosLet = substr($this->subcategory_select->category->slug,0,2);
        $this->SKU = strtoupper($cateDosLet . substr($this->subcategory_select->slug,0,2)) . $idSKU;
        $this->reset(['items_id']);
    }

    public function updatedCost($value)
    {
        if ($value && $this->percent_profit) {
            $this->price = $value * $this->percent_profit / 100 + $value;
        } else {
            $this->price = "";
        }
    }

    public function updatedPercentProfit($value)
    {
        if ($value && $this->cost) {
            $this->price = $this->cost * $value / 100 + $this->cost;
        } elseif ($this->cost) {
            $this->price = $this->cost;
        } else {
            $this->price = "";
        }
    }

    public function refreshImages()
    {
        $this->imagesToSave[] = (session('nameFile'));
        session()->forget('nameFile');
    }

    public function saveProduct()
    {
        $this->validate();

        $product = new Product;

        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->subcategory_id = $this->subcategory_id;
        $product->statusproduct_id = $this->statusproduct_id;
        $product->cost = $this->cost;
        $product->percent_profit = $this->percent_profit;
        $product->price = $this->price;
        $product->quantity = 0;        
        //substr(Category::where('id', $this->category_id)->get()[0]->slug,0,2);       
        $product->SKU = $this->SKU;
        $product->save();
        $product->valuesitems()->attach($this->valuesItemsIds);

        foreach ($this->imagesToSave as $i => $url) {
            $ext = pathinfo($url, PATHINFO_EXTENSION);
            $urlnew = 'products/' . $product->slug . $i . '.' . $ext;
            Storage::move($url, $urlnew);
            $product->images()->create([
                'url' => $urlnew
            ]);
        }

        $this->reset([
            'category_id', 'subcategory_id', 'name',
            'slug', 'description', 'imagesToSave'
        ]);
        $this->emit('alert', 'Guardado con exito!', 'Se creo correctamente el nuevo producto', 'success');
    }

    public function cancel()
    {
        $this->reset([
            'category_id', 'subcategory_id', 'name',
            'slug', 'description'
        ]);
        $this->resetValidation();
        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        return view('livewire.admin.product-create');
    }
}
