<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\District;
use App\Models\Locality;
use App\Models\Postcode;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditAddress extends Component
{

    public $address;

    public $open = false, $typeDwelling=1;

    public $nameAddress, $street, $numberHome, $reference,
    $apartmentComplex, $edifice, $floor, $apartment;

    public $provinces,$districts=[],$localities=[], $postcodes=[];
    public $province_id="",$district_id="",$locality_id="",$postcode_id="";

    protected $rules = [
        'nameAddress' => 'required|max:30',
        'street'      => 'required',
        'numberHome'  => 'required',
        'province_id' => 'required',
        'district_id' => 'required',
        'locality_id' => 'required',
        'postcode_id' => 'required',
    ];

    public function mount(Address $address){
        $this->address=$address;
        $this->provinces=Province::all();
        $this->districts=District::where('province_id', $address->province_id)->get();
        $this->localities=Locality::where('district_id',$address->district_id)->get();
        $this->postcodes=Postcode::where('locality_id',$address->locality_id)->get();
        $this->province_id=$address->province_id;
        $this->district_id=$address->district_id;
        $this->locality_id=$address->locality_id;
        $this->postcode_id=$address->postcode_id;
        $this->nameAddress=$address->name;
        $this->street=$address->street;
        $this->numberHome=$address->number;
        $this->reference=$address->reference;
        $this->apartmentComplex=$address->apartmentComplex;
        $this->edifice=$address->edifice;
        $this->floor=$address->floor;
        $this->apartment=$address->apartment;
    
        if(empty($address->apartment))
        {
            $this->typeDwelling = 0;
        }
    }

    public function updatedProvinceId($value)
    {
        $this->districts = District::where('province_id', $value)->get();
        $this->reset(['district_id','locality_id','postcode_id']);
    }

    public function updatedDistrictId($value)
    {
        $this->localities = Locality::where('district_id', $value)->get();
        $this->reset(['locality_id','postcode_id']);
    }

    public function updatedLocalityId($value)
    {
        $this->postcodes = Postcode::where('locality_id', $value)->get();
        $this->reset('postcode_id');
    }
    
    public function updateAddress()
    {
        if ($this->typeDwelling != 0) {
            $this->rules = [
                'nameAddress' => 'required|max:30',
                'street'      => 'required',
                'numberHome'  => 'required',
                'province_id' => 'required',
                'district_id' => 'required',
                'locality_id' => 'required',
                'postcode_id' => 'required',
                'floor'       => 'required',
                'apartment'   => 'required',
            ];
        }
        $this->validate();
        $this->address->province_id=$this->province_id;
        $this->address->district_id=$this->district_id;
        $this->address->locality_id=$this->locality_id;
        $this->address->postcode_id=$this->postcode_id;
        $this->address->name=$this->nameAddress;
        $this->address->street=$this->street;
        $this->address->number=$this->numberHome;
        $this->address->reference=$this->reference;
        $this->address->apartmentComplex=$this->apartmentComplex;
        $this->address->edifice=$this->edifice;
        $this->address->floor=$this->floor;
        $this->address->apartment=$this->apartment;
        $this->address->save();
  
        $this->reset(['open', 'typeDwelling','nameAddress', 'street', 'numberHome', 'reference',
        'apartmentComplex', 'edifice', 'floor', 'apartment','province_id','district_id',
        'locality_id','postcode_id']);
        $this->emitTo('create-order','render');
        $this->emit('alert','Se guardo correctamente!','Ya tenemos tu nueva dirección.','success');
    }

    public function deleteAddress()
    {
        $this->address->delete();
        $this->emitTo('create-order','render');
        $this->emit('alert','Se Borro correctamente!','Ya no tenemos más esa dirección.','success');
    }
    public function closed()
    {
        $this->reset(['open','typeDwelling','nameAddress', 'street', 'numberHome', 'reference',
        'apartmentComplex', 'edifice', 'floor', 'apartment','province_id','district_id',
        'locality_id','postcode_id']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.edit-address');
    }
}
