<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{
    //Protege las rutas según los permisos con el middleware can
    public function __construct()
    {
        // $this->middleware('can:admin.subcategories.index')->only('index');
        // $this->middleware('can:admin.subcategories.create')->only('create', 'store');
        // $this->middleware('can:admin.subcategories.index')->only('edit', 'update');
    }

    public function index()
    {
        return view('admin.subcategories.index');
    }

    public function create()
    {
        return view('admin.subcategories.create');
    }

    public function edit(Subcategory $subcategory)
    {
        return view('admin.subcategories.edit', compact('subcategory'));
    }
}
