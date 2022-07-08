<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Status;
use Livewire\Component;

class OrdersIndex extends Component
{
    public $orders, $statuses, $OrdersStatuses;

    public function render()
    {
        $this->orders = Order::query()->orderby('id', 'desc')->get();
        $this->statuses = Status::all();
        $this->OrdersStatuses = collect();

        foreach ($this->orders as $order) {
            $this->OrdersStatuses->push($order->statuses()->where('order_id', $order->id)->get()->last()->statuses);
        };

        if (request('status')) {
            $this->OrdersStatusesFilter = $this->OrdersStatuses->all();
            $this->OrdersStatusesFilter = collect($this->OrdersStatusesFilter)->where('status_id', request('status'));

            $this->orders = collect();
            foreach ($this->OrdersStatusesFilter as $orderFilt) {
                $this->orders->push(Order::query()->where('id', $orderFilt->order_id)->get()[0]);
            };
        }
        return view('livewire.admin.orders-index');
    }
}
