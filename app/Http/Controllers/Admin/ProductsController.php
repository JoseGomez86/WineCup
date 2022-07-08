<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //Protege las rutas según los permisos con el middleware can
    public function __construct()
    {
        // $this->middleware('can:admin.products.index')->only('index');
        // $this->middleware('can:admin.products.create')->only('create', 'store');
        // $this->middleware('can:admin.products.index')->only('edit', 'update');
    }

    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        
    }

    public function show($permission)
    {
       
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update()
    {

    }

    public function destroy()
    {
        
    }
}
