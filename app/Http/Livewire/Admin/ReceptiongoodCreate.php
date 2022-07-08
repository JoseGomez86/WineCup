<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Receptiongood;
use App\Models\Suppliers;
use Livewire\Component;

class ReceptiongoodCreate extends Component
{
    public $suppliers, $supplier_id = "", $dateAdmission, $invoice, $editItem = false;
    public $productNew = [], $quantity, $product, $expiryDate, $i = 0;
    protected $listeners = ['productSearch'];

    protected $rules = [
        'dateAdmission' => 'required|date',
        'supplier_id' => 'required',
        'invoice' => 'required',
        'productNew.0.*' => 'required', // .* sirve para validar el array completo
    ];

    protected $validationAttributes = [
        'dateAdmission' => 'fecha de ingreso',
        'supplier_id' => 'proveedor',
        'invoice' => 'Factura o Remito',
    ];

    public function mount()
    {
        $this->suppliers = Suppliers::all();
        $this->quantity = "";
        $this->product = "";
        $this->expiryDate = "";
    }

    public function productSearch($product)
    {
        $this->product = $product;
    }

    public function addProduct()
    {
        $rules = [
            'quantity' => 'required|numeric',
            'product' => 'required',
            'expiryDate' => 'required|date|after:tomorrow',
        ];
        $validationAttributes = [
            'quantity.required' => 'La cantidad es obligatoria',
            'quantity.numeric' => 'La cantidad debe ser un número',
            'product.required' => 'El producto es obligatorio',
            'expiryDate.required' => 'El vencimiento es obligatorio',
            'expiryDate.date' => 'El vencimiento debe ser una fecha',
            'expiryDate.after' => 'La fecha no puede ser tan proximo a vencer o vencido',
        ];
        $this->validate($rules, $validationAttributes);
        $this->i = count($this->productNew);
        if ($this->i > 0) {
            $this->i++;
        }
        $this->productNew[$this->i]['quantity'] = $this->quantity;
        $this->productNew[$this->i]['product'] = $this->product;
        $this->productNew[$this->i]['expiryDate'] = $this->expiryDate;

        $this->reset(['quantity', 'product', 'expiryDate',]);
        $this->emit('updateSearch', "");
    }

    public function deleteProduct($i)
    {
        unset($this->productNew[$i]);
        $this->productNew = array_values($this->productNew);
    }

    public function editItem($i)
    {
        $this->quantity = $this->productNew[$i]['quantity'];
        $this->product = $this->productNew[$i]['product'];
        $this->expiryDate = $this->productNew[$i]['expiryDate'];
        $this->emit('updateSearch', $this->productNew[$i]['product']['name']);
        $this->editItem = true;
        $this->i = $i;
    }

    public function editProduct()
    {
        $this->productNew[$this->i]['quantity'] = $this->quantity;
        $this->productNew[$this->i]['product'] = $this->product;
        $this->productNew[$this->i]['expiryDate'] = $this->expiryDate;
        $this->reset(['quantity', 'product', 'expiryDate',]);
        $this->emit('updateSearch', '');
        $this->editItem = false;
    }


    public function saveReceptiongood()
    {
        $this->validate();

        $receptiongood = new Receptiongood();

        $receptiongood->supplier_id = $this->supplier_id;
        $receptiongood->reception_dates = $this->dateAdmission;
        $receptiongood->invoice = $this->invoice;
        $receptiongood->save();
        foreach ($this->productNew as $value) {
            $receptiongood->products()->attach($value['product']['id'], ['expiration_dates' => $value['expiryDate'], 'quantity' => $value['quantity']]);
            //modificar Stock de productos
            $product = Product::find($value['product']['id']);
            $product->quantity = $product->quantity + $value['quantity'];
            if($product->statusproduct_id==4){//sin Stock cambio el estado
                $product->statusproduct_id=1;
            }
            $product->save();            
        }

        $this->reset([
            'quantity', 'expiryDate', 'product', 'dateAdmission', 'supplier_id', 'invoice', 'productNew',
        ]);
        $this->emit('alert', 'Guardado con exito!', 'Se creo correctamente la nueva recepción de mercadería', 'success');
    }

    public function cancel()
    {
        $this->resetValidation();
        return redirect()->route('admin.receptiongoods.index');
    }

    public function render()
    {
        return view('livewire.admin.receptiongood-create');
    }
}
