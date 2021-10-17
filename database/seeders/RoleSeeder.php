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
        $role_super_admin   = Role::create(['name'      => 'Super Admin']);
        $role_admin         = Role::create(['name'      => 'Admin']);
        $role_operator         = Role::create(['name'   => 'Operator']);
        $role_client        = Role::create(['name'      => 'client']);
        $role_cleb          = Role::create(['name'      => 'cleb']);
        $role_agency        = Role::create(['name'      => 'agency']);
        $role_agent         = Role::create(['name'      => 'agent']);


        //PERMISOS PARA SITIOS
        Permission::create(['name' => 'admin.sites.index'])->syncRoles([$role_admin,$role_operator]);
        Permission::create(['name' => 'admin.sites.create'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.sites.store'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.sites.destroy'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.sites.edit'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.sites.update'])->syncRoles([$role_admin]);


        //PERMISOS PARA USUARIOS
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role_admin,$role_operator]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.users.create'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.users.store'])->syncRoles([$role_admin]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role_admin]);
    }
}
