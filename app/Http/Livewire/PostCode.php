<?php

namespace App\Http\Livewire;

use App\Models\Postcode as ModelsPostcode;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class PostCode extends Component
{
    public $open = false, $search;

    public function closed()
    {
        $this->resetValidation();
    }

    public function search()
    {
        
    }

    public function render()
    {
        if ($this->search) {
            $postCodes = ModelsPostcode::where('Postcode', 'LIKE', $this->search . '%')
                                    ->take(10)
                                    ->get();
        } else {
            $postCodes = [];
        }
        return view('livewire.post-code', compact('postCodes'));
    }
}
