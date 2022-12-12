<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->deactivated()->create();

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'mmshop.admin@gmail.com',
            'password' => bcrypt('admin12478')
        ]);

        $role = Role::where('name', 'super-admin')->first();

        $user->assignRole($role);
    }
}
