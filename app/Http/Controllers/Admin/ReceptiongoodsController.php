<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Receptiongood;
use Illuminate\Http\Request;

class ReceptiongoodsController extends Controller
{
    public function index()
    {
        $receptiongoods=Receptiongood::all();
        return view('admin.receptiongoods.index', compact('receptiongoods'));
    }

    public function create()
    {
        return view('admin.receptiongoods.create');
    }

    public function edit(Receptiongood $receptiongood)
    {
        return view('admin.receptiongoods.edit', compact('receptiongood'));
    }
}
