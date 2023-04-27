<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'mohamed',
            'last_name' => 'elfert',
            'email' => 'mohamed@yahoo.com',
            'password' => bcrypt('123456'),
            'role_name' => 'user',
            'status' => 'active',
        ]);

        $role = Role::create(['name' => 'user', 'display_name' => 'مستخدم']);

        $role->givePermissionTo('user-show', 'user-showProfile', 'user-profile', 'dashboard-index', 'todo-list',
            'todo-create', 'todo-edit', 'todo-delete', 'todo-show', 'todo-finish');

        $user->assignRole([$role->id]);
    }
}
