<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\District;
use App\Models\Locality;
use App\Models\Order;
use App\Models\Phone;
use App\Models\Postcode;
use App\Models\Province;
use App\Models\Zone;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class CreateOrder extends Component
{
    protected $listeners = ['render'];

    public $shippingCost, $address_id, $user, $name, $dni, $Phone1, $Phone2, $Phone1Id, $Phone2Id;

    protected $rules = [
        'name'  => 'required|max:30',
        'dni'   => 'required|max:8',
        'Phone1' => 'required',
    ];
    
    public function update_data()
    {
        $this->validate();
        $this->user->update([
            'name' => $this->name,
            'documentId' => $this->dni,
        ]);

        if (!empty($this->user->phones[0])) {
            Phone::where('id', $this->Phone1Id)->update(['numberPhone' => $this->Phone1]);           
            if (!empty($this->Phone2)) {
                if (!empty($this->user->phones[1])) {
                    Phone::where('id', $this->Phone2Id)->update(['numberPhone' => $this->Phone2]);
                }
                else{
                    $this->user->phones()->create(['numberPhone' => $this->Phone2]);
                }
            } else {
                Phone::where('id', $this->Phone2Id)->delete();
            }
            
        } else {
            $this->user->phones()->create(['numberPhone' => $this->Phone1]);
            if (!empty($this->Phone2)) {
                $this->user->phones()->create(['numberPhone' => $this->Phone2]);
            }
        }
        $this->emit('saved');
    }

    public function create_order()
    {
        $this->rules = [
            'name'  => 'required|max:30',
            'dni'   => 'required|max:8',
            'Phone1' => 'required',
            'address_id' => 'required',
        ];
        $this->validate();
        $address=Address::find($this->address_id);
        $province=Province::find($address->province_id)->name;
        $district=District::find($address->district_id)->name;
        $locality=Locality::find($address->locality_id)->name;
        $postCode=Postcode::find($address->postcode_id)->Postcode;
        $shippingType = 2;
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->buyerData = json_encode(['name'=>$this->name, 'dni'=>$this->dni, 'Phone1'=>$this->Phone1, 'Phone2'=>$this->Phone2]);
        $order->shippingType = $shippingType;
        $order->shippingCost = $this->shippingCost;
        $order->total =  Cart::subtotalFloat() + $this->shippingCost;
        $order->content = Cart::content();
        $order->address = json_encode(['name'=>$address->name, 'street'=>$address->street, 'number'=>$address->number,
                            'apartmentComplex'=>$address->apartmentComplex,'edifice'=>$address->edifice,'floor'=>$address->floor,
                            'apartment'=>$address->apartment,'reference'=>$address->reference,'province'=>$province,'district'=>$district,
                            'locality'=>$locality,'postcode'=>$postCode]);
        $order->status_id=1;
        $order->save();
        $order->statuses()->sync(1);
        foreach (Cart::content() as $item) {
            discount($item);//funcion en helpers para bajar el stock de los productos comprados.
        }
        Cart::destroy();
        return redirect()->route('orders.payment',$order);
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->dni = $this->user->documentId;
        $count = 0;
        if (!empty($this->user->phones[0])) {
            foreach ($this->user->phones as $phone) {
                if ($count == 0) {
                    $this->Phone1 = $phone->numberPhone;
                    $this->Phone1Id = $phone->id;
                } else {
                    $this->Phone2 = $phone->numberPhone;
                    $this->Phone2Id = $phone->id;
                }
                $count++;
            }
        }
    }

    public function updatedAddressId($value)
    {
        $address = Address::find($value);
        $postCode = Postcode::find($address->postcode_id);
        $zone = Zone::find($postCode->zone_id);
        $this->shippingCost = $zone->shipping_cost;
    }

    public function render()
    {
        $addresses = $this->user->addresses;
        return view('livewire.create-order', compact(['addresses']));
    }
}
