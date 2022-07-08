<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CancelOrder extends Component
{
    public $order;
    public function cancel(){
        $items=json_decode($this->order->content);
        foreach ($items as $item) {
            increase($item);
        }
        $this->order->status_id=6;
        $this->order->save();
        $this->order->statuses()->attach(6);
        
        return redirect()->route('orders.show', $this->order);
    }

    public function render()
    {
        return view('livewire.cancel-order');
    }    
}
