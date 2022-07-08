<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\facades\Cart;

class UpdateCartProduct extends Component
{
    public $rowId, $qty, $quantity;

    public function mount(){
        $product=Cart::get($this->rowId);
        $this->qty=$product->qty;
        $this->quantity= qty_available($product->id);
    }

    public function decrement ()
    {
        if ($this->qty>1) {
            --$this->qty;
            $product=Cart::get($this->rowId);
            Cart::update($this->rowId,$this->qty);
            $this->quantity= qty_available($product->id);
            $this->emit('render');
        }
    }

    public function increment ()
    {
        if ($this->quantity>0) {            
            ++$this->qty;
            $product=Cart::get($this->rowId);
            Cart::update($this->rowId,$this->qty);
            $this->quantity= qty_available($product->id);
            $this->emit('render');
        }
    }

    public function render()
    {
        return view('livewire.update-cart-product');
    }
}
