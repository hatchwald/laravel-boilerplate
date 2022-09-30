<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            /**
             *  =========================================
             *  ================= Roles =================
             *  =========================================
             */
            'role-view',
            'role-create',
            'role-edit',
            'role-delete',

            /**
             *  =========================================
             *  ================= Users =================
             *  =========================================
             */
            'user-view',
            'user-create',
            'user-edit',
            'user-delete',

            /**
             *  =========================================
             *  ================= Contents =================
             *  =========================================
             */
            'content-view',
            'content-create',
            'content-edit',
            'content-delete',


        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
