<?php

namespace App\Http\Livewire\Admin;

use App\Models\Suppliers;
use Livewire\Component;

class SuppliersCreate extends Component
{
    public $fictitious_name, $trade_name, $cuit, $phone, $address;

    protected $rules = [
        'fictitious_name' => 'required',
        'trade_name' => 'required|unique:categories,slug',
        'cuit' => 'required',
    ];

    protected $validationAttributes = [
        'fictitious_name' => 'Nombre de fantasía',
        'trade_name' => 'Razón social',
        'cuit' => 'Cuit',
    ];

    public function createSupplier()
    {
        $this->validate();

        $supplier = new Suppliers;
        $supplier->fictitious_name = $this->fictitious_name;
        $supplier->trade_name = $this->trade_name;
        $supplier->cuit = $this->cuit;
        $supplier->phone = $this->phone;
        $supplier->address = $this->address;

        $supplier->save();

        $this->emit('alert', 'Creado con exito!', 'Se creo correctamente el nuevo proveedor', 'success');
    }

    public function render()
    {
        return view('livewire.admin.suppliers-create');
    }
}
