<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartProduct extends Component
{
    public $qty=1;
    public $product, $quantity;
    public $options=[];

    public function mount(){
        $this->quantity= qty_available($this->product->id);
        $this->options['image']=Storage::url($this->product->images->first()->url);
    }

    public function decrement ()
    {
        if ($this->qty>1) {
            --$this->qty;
        }
    }

    public function increment ()
    {
        if ($this->qty < $this->quantity) {
            ++$this->qty;
        }
    }

    public function addProduct()
    {
        Cart::add(['id' => $this->product->id,
                   'name' => $this->product->name,
                   'qty' => $this->qty,
                   'price' => $this->product->price,
                   'weight' => 550,
                   'options' => $this->options
                ]);
        $this->quantity= qty_available($this->product->id);
        $this->reset('qty');
        $this->emitTo('dropdown-cart','render');
    }

    public function render()
    {
        return view('livewire.add-cart-product');
    }
}
