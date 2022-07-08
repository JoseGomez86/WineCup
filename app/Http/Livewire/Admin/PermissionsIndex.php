<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionsIndex extends Component
{
    use WithPagination;
    public function render()
    {
        $permissions = Permission::paginate();
        return view('livewire.admin.permissions-index',compact('permissions'));
    }
}
