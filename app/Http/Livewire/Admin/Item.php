<?php

namespace App\Http\Livewire\Admin;

use App\Models\Item as ModelsItem;
use App\Models\Valuesitem;
use Livewire\Component;

class Item extends Component
{
    public $subcategory;
    public $editItems=[], $EditItemname=[], $item="";
    public $items_id = "",$items, $ItemNew;

    protected $listeners = ['destroyItem'];

    // protected $rules = [
    //     'name'=>'requered',
    // ];

    public function mount()
    {
        $this->updateItems();
        $this->reset(['items_id']);
        $this->rand = rand();
    }

    

    public function updateItems(){
        $this->items= ModelsItem::where('subcategory_id',$this->subcategory->id)->get();
        foreach ($this->items as $i => $item) {
            $this->EditItemname[$i] = $item->name;
            $this->editItems[$i] = ['EditItem' . $i, 0];            
        }
    }

    public function saveUpdateItem($item_id,$i)
    {
        $this->item = ModelsItem::find($item_id);
        $this->validate(
            ['EditItemname.'.$i => 'required',],
            ['EditItemname.'.$i.'.required' => 'El Nombre de Item es obligatorio',]
        );      
        $this->item->update(['name'=>$this->EditItemname[$i]]);
        $this->updateItems();
    }

    public function saveCreateItem()
    {
        $this->validate(
            ['ItemNew' => 'required',],
            ['ItemNew.required' => 'El Nombre de Item es obligatorio',]
        );
        $item=new ModelsItem();
        $item->name=$this->ItemNew;
        $item->subcategory_id=$this->subcategory->id;
        $item->save();
        $this->ItemNew="";
        $this->updateItems();
    }

    public function destroyItem(ModelsItem $item)
    {
        $item->delete();
        $this->updateItems();
    }

    public function cancel($i)
    {
        $this->editItems[$i][1]=0;
        $this->resetValidation();
        $this->updateItems();
    }

    public function render()
    {
        return view('livewire.admin.item');
    }
}
