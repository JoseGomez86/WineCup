<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Proveedores']);
        $role3 = Role::create(['name' => 'Productos']);
        $role4 = Role::create(['name' => 'RecepProd']);

        Permission::create(['name' => 'admin.home', 'description' => 'Dashbord'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.index'  ,'description' => 'Listar Usuarios' ])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create' ,'description' => 'Crear Usuario'   ])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'   ,'description' => 'Editar Usuario'  ])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy','description' => 'Eliminar Usuario'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.create' ,'description' => 'Listar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit'   ,'description' => 'Crear Rol'   ])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy','description' => 'Editar Rol'  ])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.index'  ,'description' => 'Eliminar Rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.permissions.index'  ,'description' => 'Listar Permisos' ])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permissions.create' ,'description' => 'Crear Permiso'   ])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permissions.edit'   ,'description' => 'Editar Permiso'  ])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permissions.destroy','description' => 'Eliminar Permiso'])->syncRoles([$role1]);
    }
}
