<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'user-list',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.index',
            ], [
                'name' => 'user-create',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.create,dashboard.users.store',
            ], [
                'name' => 'user-edit',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.edit,dashboard.users.update',
            ], [
                'name' => 'user-delete',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.destroy',
            ], [
                'name' => 'user-show',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.show',
            ],[
                'name' => 'user-showProfile',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.showProfile',
            ],[
                'name' => 'user-profile',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'dashboard.users.profile',
            ], [
                'name' => 'role-list',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'dashboard.roles.index',
            ], [
                'name' => 'role-create',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'dashboard.roles.create,dashboard.roles.store',
            ], [
                'name' => 'role-edit',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'dashboard.roles.edit,dashboard.roles.update',
            ], [
                'name' => 'role-delete',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'dashboard.roles.destroy',
            ], [
                'name' => 'role-show',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'dashboard.roles.show',
            ],[
                'name' => 'setting-list',
                'display_name' => 'الإعدادات',
                'guard_name' => 'web',
                'routes' => 'dashboard.settings.index',
            ],[
                'name' => 'setting-edit',
                'display_name' => 'الإعدادات',
                'guard_name' => 'web',
                'routes' => 'dashboard.settings.update',
            ],[
                'name' => 'dashboard-index',
                'display_name' => 'الرئيسيه',
                'guard_name' => 'web',
                'routes' => 'dashboard.index',
            ],[
                'name' => 'todo-list',
                'display_name' => 'قائمه المهام',
                'guard_name' => 'web',
                'routes' => 'dashboard.todos.index',
            ],[
                'name' => 'todo-create',
                'display_name' => 'قائمه المهام',
                'guard_name' => 'web',
                'routes' => 'dashboard.todos.create,dashboard.todos.store',
            ],[
                'name' => 'todo-edit',
                'display_name' => 'قائمه المهام',
                'guard_name' => 'web',
                'routes' => 'dashboard.todos.edit,dashboard.todos.update',
            ],[
                'name' => 'todo-delete',
                'display_name' => 'قائمه المهام',
                'guard_name' => 'web',
                'routes' => 'dashboard.todos.destroy',
            ],[
                'name' => 'todo-show',
                'display_name' => 'قائمه المهام',
                'guard_name' => 'web',
                'routes' => 'dashboard.todos.show',
            ],[
                'name' => 'todo-finish',
                'display_name' => 'قائمه المهام',
                'guard_name' => 'web',
                'routes' => 'dashboard.finish',
            ],
        ];


        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'display_name' => $permission['display_name'],
                'guard_name' => $permission['guard_name'],
                'routes' => $permission['routes'],
            ]);
        }
    }
}
