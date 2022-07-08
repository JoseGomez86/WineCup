<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Order $order){
        if ($order->user_id==$user->id) {
            return true;
        }else{
            return false;
        }
    }

    public function payment(User $user, Order $order){
        $statusNow=$order->statuses()->where('order_id',$order->id)->get()->last();
        if ($statusNow->id==1)
        {
            return true;
        } else
        {
            return false;
        }
    }
}
