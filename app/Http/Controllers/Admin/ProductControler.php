<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductControler extends Controller
{
    public function files(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);
        
        session(['nameFile'=>Storage::put('livewire-tmp', $request->file('file'))]);   
             
    }
}
