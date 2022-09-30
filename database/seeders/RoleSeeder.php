<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Contants\Roles;
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
        $role = Role::create(['name' => Roles::ADMIN]);
        $permissionAdmin = [];
        $permissionClient = [9, 10, 11, 12];

        for ($i = 1; $i < 12; $i++) {
            $permissionAdmin[$i] = $i;
        }
        $role->syncPermissions($permissionAdmin);

        $role = Role::create([
            'name' => Roles::CLIENT,
            'guard_name' => 'web'
        ]);
        $role->syncPermissions($permissionClient);
    }
}
