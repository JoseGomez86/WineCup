<?php

namespace App\Http\Livewire\Admin;

use App\Models\Status;
use Livewire\Component;

class OrdersShow extends Component
{
    public $order, $statuses, $statusesNow;

    public function render()
    {
        $address = json_decode($this->order->address);
        $products = json_decode($this->order->content);
        $buyerData = json_decode($this->order->buyerData);
        $this->statusOrder();
        return view('livewire.admin.orders-show', compact('address', 'products', 'buyerData'));
    }

    public function updateStatusOrder()
    {
        if ($this->order->status_id == 2) {
            $this->order->status_id = 3;
            $this->order->statuses()->attach(3);
        }
        else if ($this->order->status_id == 3) {
            $this->order->status_id = 4;
            $this->order->statuses()->attach(4);
        }
        else if ($this->order->status_id == 4) {
            $this->order->status_id = 5;
            $this->order->statuses()->attach(5);
        }
        $this->order->save();
    }

    public function statusOrder()
    {
        $this->statuses = Status::all();
        $this->statusesNow = $this->order->statuses()->where('order_id', $this->order->id)->get();
    }
}
