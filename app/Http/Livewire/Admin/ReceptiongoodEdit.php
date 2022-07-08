<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Receptiongood;
use App\Models\Suppliers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Livewire\Component;

class ReceptiongoodEdit extends Component
{
    public $receptiongood, $i = 0, $j = 0;
    public $suppliers, $supplier_id = "", $dateAdmission, $invoice, $editItem = false;
    public $productNew = [], $productOld = [], $quantity, $product, $expiryDate; //$productNew1,
    protected $listeners = ['productSearch'];

    protected $rules = [
        'receptiongood.reception_dates' => 'required|date',
        'receptiongood.supplier_id' => 'required',
        'receptiongood.invoice' => 'required',
        'productNew.0.*' => 'required', // .* sirve para validar el array completo
    ];

    protected $validationAttributes = [
        'receptiongood.reception_dates' => 'fecha de ingreso',
        'receptiongood.supplier_id' => 'proveedor',
        'receptiongood.invoice' => 'Factura o Remito',
    ];

    public function mount()
    {
        $this->suppliers = Suppliers::all();
        $this->quantity = "";
        $this->product = "";
        $this->expiryDate = "";
        // $this->productNew1 = $this->receptiongood->products;
        foreach ($this->receptiongood->products as $i => $value) {
            $this->productNew[$i]['quantity'] = $value->pivot->quantity;
            $this->productNew[$i]['product'] = $value;
            $this->productNew[$i]['expiryDate'] = $value->pivot->expiration_dates;
        }
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
        if ($this->productNew[$this->i]['product'] != $this->product) {
            $this->j++;
            $this->productOld[$this->j]['product'] = $this->productNew[$this->i]['product'];
            $this->productOld[$this->j]['quantity'] = $this->productNew[$this->i]['quantity'];
        } else {
            if ($this->productNew[$this->i]['quantity'] != $this->quantity) {
                $this->j++;
                $this->productOld[$this->j]['product'] = $this->productNew[$this->i]['product'];
                if ($this->productNew[$this->i]['quantity'] > $this->quantity) {//bajo la cantidad 
                    $this->productOld[$this->j]['quantity'] = $this->productNew[$this->i]['quantity'];
                }else{//subio la cantidad
                    $this->productOld[$this->j]['quantity'] = -$this->productNew[$this->i]['quantity'];
                }
                
            }
        }
        $this->productNew[$this->i]['quantity'] = $this->quantity;
        $this->productNew[$this->i]['product'] = $this->product;
        $this->productNew[$this->i]['expiryDate'] = $this->expiryDate;
        $this->reset(['quantity', 'product', 'expiryDate',]);
        $this->emit('updateSearch', '');
        $this->editItem = false;
    }


    public function updateReceptiongood()
    {
        $this->validate();

        $this->receptiongood->update();
        $this->receptiongood->products()->detach();
        foreach ($this->productNew as $value) {
            //$user->roles()->sync([1 => ['expires' => true], 2, 3]);
            $this->receptiongood->products()->attach($value['product']['id'], ['expiration_dates' => $value['expiryDate'], 'quantity' => $value['quantity']]);
            //modificar Stock de productos
            $product = Product::find($value['product']['id']);
            $product->quantity = $product->quantity + $value['quantity'];
            if ($product->statusproduct_id == 4) { //sin Stock cambio el estado
                $product->statusproduct_id = 1;
            }
            $product->save();
        }
        //resto del Stock todos los productos que se cambiaron o se cambio el stock
        foreach ($this->productOld as $value) {
            $product = Product::find($value['product']['id']);
            $product->quantity = $product->quantity - $value['quantity'];
            if ($product->quantity < 1) { //Si queda sin Stock cambio el estado
                $product->statusproduct_id = 4;
            }
            $product->save();
        }
        $this->emit('alert', 'Modificado con exito!', 'Se modifico correctamente la recepción de mercadería', 'success');
    }

    public function cancel()
    {
        $this->resetValidation();
        return redirect()->route('admin.receptiongoods.index');
    }

    public function render()
    {
        return view('livewire.admin.receptiongood-edit');
    }
}
