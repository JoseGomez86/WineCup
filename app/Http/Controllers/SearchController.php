<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $search= $request->name;

        $products = Product::where('name', 'LIKE', "%" . $search . "%")
                                    ->where('statusproduct_id','!=' ,2)
                                    ->paginate(10);

        return view('search', compact('products'));
    }
}
