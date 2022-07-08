<?php

namespace App\Http\Livewire\Admin;

use App\Models\Valuesitem;
use Livewire\Component;

class ValueitemCrud extends Component
{
    public $item, $i;
    public $valuesItemsIds = [], $valueItemNew = [], $valuesItems;
    public $EditValueItemname = [], $editValueItems = [];

    protected $listeners = ['destroyValueItem'];

    public function mount()
    {
        $this->updateValuesItems();
    }

    public function updateValuesItems()
    {      
        $this->valuesItems = Valuesitem::query()->where('item_id', $this->item->id)->get();
        foreach ($this->valuesItems as $i => $valuesItem) {
            $this->EditValueItemname[$i] = $valuesItem->name;
            $this->editValueItems[$i] = ['EditValueItem'.$i, 0];            
        }
    }

    public function createValueItem($itemId){
        $this->validate(
            ['valueItemNew.'.$this->i => 'required'],
            ['valueItemNew.'.$this->i.'.required' => 'El Nombre de valor de Item es obligatorio',]
        );
        $valueItem = new Valuesitem;
        $valueItem->name=$this->valueItemNew[$this->i];
        $valueItem->item_id=$itemId;
        $valueItem->save();
        $this->valueItemNew[$this->i]="";
        $this->updateValuesItems();          
    }

    public function saveUpdatevalueItem(Valuesitem $valuesItem, $i)
    {
        $this->validate(
            ['EditValueItemname.'.$i => 'required',],
            ['EditValueItemname.'.$i.'.required' => 'El Nombre de valor de Item es obligatorio',]
        );      
        $valuesItem->update(['name'=>$this->EditValueItemname[$i]]);
        $this->updateValuesItems();
    }

    public function destroyValueItem($valuesItemId)
    {
        $valueItem=Valuesitem::query()->where('id',$valuesItemId);
        $valueItem->delete();
        $this->updateValuesItems();
    }

    public function cancel($i)
    {
        $this->editValueItems[$i][1]=0;
        $this->resetValidation();
        $this->updateValuesItems();
    }

    public function render()
    {
        return view('livewire.admin.valueitem-crud');
    }
}
