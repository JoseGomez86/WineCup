<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Valuesitem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){

        $valuesItems = Valuesitem::whereHas('products', function (Builder $query) use($product) {
            $query->where('product_id', $product->id);
        })->get();
        $postCode="";
        
        return view('products.show', compact('product','valuesItems','postCode'));
    }
}
