<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesControllers extends Controller
{
    //Protege las rutas según los permisos con el middleware can
    public function __construct()
    {
        // $this->middleware('can:admin.categories.index')->only('index');
        // $this->middleware('can:admin.categories.create')->only('create', 'store');
        // $this->middleware('can:admin.categories.index')->only('edit', 'update');
    }

    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }
}
