<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()->where('user_id', auth()->user()->id)->orderby('id', 'desc')->get();
        $statuses = Status::all();
        $OrdersStatuses = collect();

        foreach ($orders as $order) {
            $OrdersStatuses->push($order->statuses()->where('order_id', $order->id)->get()->last()->statuses);
        };

        if (request('status')) {
            $OrdersStatusesFilter = $OrdersStatuses->all();
            $OrdersStatusesFilter = collect($OrdersStatusesFilter)->where('status_id', request('status'));
         
            $orders = collect();
            foreach ($OrdersStatusesFilter as $orderFilt) {
                $orders->push(Order::query()->where('id', $orderFilt->order_id)->get()[0]);
            };
        }
        return view('orders.index', compact('statuses', 'orders', 'OrdersStatuses'));
    }

    public function show(Order $order)
    {
        $this->authorize('author', $order);

        $address = json_decode($order->address);
        $products = json_decode($order->content);
        $buyerData = json_decode($order->buyerData);
        $statuses = Status::all();
        $statusesNow = $order->statuses()->where('order_id', $order->id)->get();
        //$statusLast= $order->statuses()->where('order_id', $order->id)->get()->last()->statuses->status_id;
        return view('orders.show', compact('order', 'address', 'products', 'buyerData', 'statuses', 'statusesNow'));
    }

    public function payment(Order $order)
    {
        //politicas de autorización app/http/policies 
        $this->authorize('author', $order);
        $this->authorize('payment', $order);

        $address = json_decode($order->address);
        $products = json_decode($order->content);
        $buyerData = json_decode($order->buyerData);
        $statuses = Status::all();
        return view('orders.payment', compact('order', 'address', 'products', 'buyerData'));
    }

    public function pay(Order $order, Request $request)
    {
        $this->authorize('author', $order);

        $payment_id = $request->get('payment_id');
        $response = Http::get("https://api.mercadopago.com/v1/payments/$payment_id" . "?access_token=APP_USR-1983618726007832-120601-9bb9be1c4911b1f64cadf0fbb80945f3-1033453828");
        $response = json_decode($response);
        $status = $response->status;
        if ($status == 'approved') {
            $order->statuses()->attach(2);
            $order->status_id=2;
            $order->save();
        } else {
            $order->statuses()->attach(7);
            $order->status_id=7;
            $order->save();
        }
        return redirect()->route('orders.show', $order);
    }
}
