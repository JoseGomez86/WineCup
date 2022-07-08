<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SuppliersEdit extends Component
{
    public $supplier;

    protected $rules = [
        'supplier.fictitious_name' => 'required',
        'supplier.trade_name' => 'required',
        'supplier.cuit' => 'required',
        'supplier.phone' => '',
        'supplier.address' => '',
    ];

    protected $validationAttributes = [
        'supplier.fictitious_name' => 'Nombre de fantasía',
        'supplier.trade_name' => 'Razón social',
        'supplier.cuit' => 'Cuit',
        'supplier.phone' => 'Teléfono',
        'supplier.address' => 'Dirección',
    ];

    public function updateSupplier()
    {
        $this->validate();
        $this->supplier->update();

        $this->emit('alert', 'Actualizado con exito!', 'Se modifico correctamente el proveedor', 'success');

    }

    public function cancel()
    {
        $this->resetValidation();
        return redirect()->route('admin.suppliers.index');
    }

    public function render()
    {
        return view('livewire.admin.suppliers-edit');
    }
}
