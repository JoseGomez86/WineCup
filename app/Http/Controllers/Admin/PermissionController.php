<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //Protege las rutas según los permisos con el middleware can
    public function __construct()
    {
        $this->middleware('can:admin.permissions.index')->only('index');
        $this->middleware('can:admin.permissions.create')->only('create', 'store');
        $this->middleware('can:admin.permissions.index')->only('edit', 'update');
        $this->middleware('can:admin.permissions.create')->only('destroy');
    }

    public function index()
    {
        return view('admin.permissions.index');
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:permissions',
            'description'=>'required'
        ]);   
        $permission = Permission::create($request->all());     
        return redirect()->route('admin.permissions.index')->with('info','El permiso se creó correctamente.');
    }

    public function show($permission)
    {
        //
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit',compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name'=>"required|unique:permissions,name,$permission->id",
            'description'=>'required'
        ]);
        $permission->update($request->all());

        return redirect()->route('admin.permissions.index')->with('info','El permiso se actualizó correctamente.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('info','El permiso se eliminó correctamente.');
    }
}
