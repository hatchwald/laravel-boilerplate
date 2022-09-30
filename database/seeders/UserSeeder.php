<?php

namespace Database\Seeders;

use App\Contants\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin ',
            'email' => 'admin@admin.id',
            'password' => bcrypt('123456'),
            'email_verified_at' => Carbon::now(),
            'status' => 1
        ]);
        $user->assignRole([Roles::ADMIN]);
    }
}
