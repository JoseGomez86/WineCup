<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\District;
use App\Models\Locality;
use App\Models\Postcode;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAddress extends Component
{

    public $open = false, $typeDwelling = 0;

    public $nameAddress, $street, $numberHome, $reference,
        $apartmentComplex, $edifice, $floor, $apartment;

    public $provinces, $districts = [], $localities = [], $postcodes = [];
    public $province_id = "", $district_id = "", $locality_id = "", $postcode_id = "";

    protected $rules = [
        'nameAddress' => 'required|max:30',
        'street'      => 'required',
        'numberHome'  => 'required',
        'province_id' => 'required',
        'district_id' => 'required',
        'locality_id' => 'required',
        'postcode_id' => 'required',
    ];

    public function mount()
    {
        $this->provinces = Province::all();
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

    public function saveAddress()
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
        $user = Auth::user();
        Address::create([
            'name' => $this->nameAddress,
            'street' => $this->street,
            'number' => $this->numberHome,
            'apartmentComplex' => $this->apartmentComplex,
            'edifice' => $this->edifice,
            'floor' => $this->floor,
            'apartment' => $this->apartment,
            'reference' => $this->reference,
            'province_id' => $this->province_id,
            'district_id' => $this->district_id,
            'locality_id' => $this->locality_id,
            'postcode_id' => $this->postcode_id,
            'user_id' => $user->id,
        ]);
        $this->reset([
            'open','typeDwelling', 'nameAddress', 'street', 'numberHome', 'reference',
            'apartmentComplex', 'edifice', 'floor', 'apartment', 'province_id', 'district_id',
            'locality_id', 'postcode_id'
        ]);
        $this->emitTo('create-order', 'render');
        $this->emit('alert', 'Se guardo correctamente!', 'Ya tenemos tu nueva dirección.', 'success');
    }

    public function closed()
    {
        $this->reset([
            'open','typeDwelling', 'nameAddress', 'street', 'numberHome', 'reference',
            'open', 'nameAddress', 'street', 'numberHome', 'reference',
            'apartmentComplex', 'edifice', 'floor', 'apartment', 'province_id', 'district_id',
            'locality_id', 'postcode_id'
        ]);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.create-address');
    }
}
