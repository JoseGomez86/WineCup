<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Image;
use App\Models\Item;
use App\Models\Product;
use App\Models\Statusproduct;
use App\Models\Subcategory;
use App\Models\Valuesitem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class ProductEdit extends Component
{
    public $product, $valuesItemsIds = [], $items_id = "";
    public $categories, $subcategories, $items, $valuesItems;
    public $category_id, $statusProducts, $subcategory_select;
    public $imagesToSave = [];

    protected $listeners = ['refreshImages'];

    protected $rules = [
        'category_id' => 'required',
        'product.subcategory_id' => 'required',
        'product.statusproduct_id' => 'required',
        'product.name' => 'required',
        'product.slug' => 'required|unique:products,slug',
        'product.SKU' => 'required',
        'product.description' => 'required',
        'product.cost' => 'required',
        'product.percent_profit' => 'required',
        'product.price' => '',
        'product.quantity' => '',
        'valuesItemsIds.*' => 'required', // .* sirve para validar el array completo
    ];

    protected $validationAttributes = [
        'category_id' => 'Categoria',
        'product.subcategory_id' => 'Subcategoria',
        'product.statusproduct_id' => 'Estado del producto',
        'product.name' => 'Nombre',
        'product.slug' => 'Slug',
        'product.description' => 'Descripción',
        'product.cost' => 'Costo',
        'product.percent_profit' => 'Porcentaje de ganancia',
        'product.price' => 'Precio',
        'product.quantity' => 'Cantidad',
        'valuesItemsIds.*' => '', // .* sirve para validar el array completo
    ];

    public function updatedCategoryId($value)
    {
        $this->subcategories = Subcategory::where('category_id', $value)->get();
        $this->product->subcategory_id = "";
    }

    public function updatedProductName($value)
    {
        $this->product->slug = Str::slug($value);
    }

    public function updatedProductCost($value)
    {
        if ($value && $this->product->percent_profit) {
            $this->product->price = $value * $this->product->percent_profit / 100 + $value;
        } else {
            $this->product->price = "";
        }
    }

    public function updatedProductPercentProfit($value)
    {
        if ($value && $this->product->cost) {
            $this->product->price = $this->product->cost * $value / 100 + $this->product->cost;
        } elseif ($this->product->cost) {
            $this->product->price = $this->product->cost;
        } else {
            $this->product->price = "";
        }
    }

    public function updatedProductSubcategoryId($value)
    {
        $this->subcategory_select = Subcategory::where('id', $value)->get()[0];
        $this->items = Item::where('subcategory_id', $value)->get();
        $this->valuesItems = collect();
        foreach ($this->items as $i => $item) {
            $this->valuesItems->push(Valuesitem::query()->where('item_id', $item->id)->get());
            $this->valuesItemsIds[$i] = "";
        }
        $this->reset(['items_id']);
        //Crear SKU
        $idSKU=0;
        if((int)substr(Product::select('SKU')->where('SKU', 'like', '%' . substr($this->subcategory_select->slug,0,2). '%')->orderBy('SKU', 'desc')->first(),12,4)){
            $idSKU = (int)substr(Product::select('SKU')->where('SKU', 'like', '%' . substr($this->subcategory_select->slug,0,2). '%')->orderBy('SKU', 'desc')->first(),12,4)+1;
        }else{
            $idSKU = 1;
        }
        $idSKU = sprintf('%04s', $idSKU);
        $cateDosLet = substr($this->subcategory_select->category->slug,0,2);
        $this->product->SKU = strtoupper($cateDosLet . substr($this->subcategory_select->slug,0,2)) . $idSKU;
    }

    public function refreshImages()
    {
        $this->imagesToSave[] = (session('nameFile'));
        session()->forget('nameFile');
    }

    public function mount()
    {
        $this->subcategory_select = Subcategory::where('id', $this->product->subcategory->id)->get()[0];
        $this->categories = Category::all();
        $this->category_id = $this->product->subcategory->category->id;
        $this->subcategories = Subcategory::where('category_id', $this->category_id)->get();
        $this->items = Item::where('subcategory_id', $this->product->subcategory->id)->get();
        $this->valuesItems = collect();
        $this->statusProducts = Statusproduct::all();
        $valuesItemsIds = Valuesitem::whereHas('products', function (Builder $query) {
            $query->where('product_id', $this->product->id);
        })->get();
        $this->valuesItemsIds = collect();
        foreach ($valuesItemsIds as $valuesItemsId) {
            $this->valuesItemsIds->push($valuesItemsId->id);
        }
        foreach ($this->items as $i => $item) {
            $this->valuesItems->push(Valuesitem::query()->where('item_id', $item->id)->get());
            if (empty($this->valuesItemsIds[$i])) {
                $this->valuesItemsIds[$i] = "";
            }
        }
        $this->reset(['items_id']);
    }

    public function deleteImage(Image $image)
    {
        Storage::delete([$image->url]);
        $image->delete();
        $this->product = $this->product->fresh();
    }

    public function updateProduct()
    {
        $rules = $this->rules;
        $rules['product.slug'] = 'required|unique:products,slug,' . $this->product->id;
        $this->validate($rules);

        $this->product->update();

        $this->product->valuesitems()->sync($this->valuesItemsIds);

        foreach ($this->imagesToSave as $i => $url) {
            $ext = pathinfo($url, PATHINFO_EXTENSION);
            $urlnew = 'products/' . $this->product->slug . $i . '.' . $ext;
            Storage::move($url, $urlnew);
            $this->product->images()->create([
                'url' => $urlnew
            ]);
        }

        $this->emit('alert', 'Actualizado con exito!', 'Se modifico correctamente el producto', 'success');
        //return redirect()->route('admin.products.index');
    }

    public function cancel()
    {
        $this->resetValidation();
        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        return view('livewire.admin.product-edit');
    }
}
