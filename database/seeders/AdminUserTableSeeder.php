<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Admin']);

        $user = User::create([
            'name' => 'Ethar Shrouf',
            'email' => 'ethartest@gmail.com',
            'is_admin' => '1',
            'role_name' => ['Admin'],
            'status' => '1',
            'password' => bcrypt('12341234'),
        ]);

        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole($role->id);
    }
}
