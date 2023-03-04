<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //super user
        $super_admin = Role::updateOrCreate(['name' => 'super_admin']);
        // $super_admin = Role::updateOrCreate(['name' => 'super_admin', 'd_name_en' => 'Super Admin', 'd_name_ar' => 'مبرمج']);

        // //admin user
        // $admin = Role::updateOrCreate(['name' => 'admin', 'd_name_en' => 'Admin', 'd_name_ar' => 'مدير']);

        // //moderator user
        // $moderator = Role::updateOrCreate(['name' => 'moderator', 'd_name_en' => 'Moderator', 'd_name_ar' => 'مشرف']);

        // //data_entry user
        // $data_entry = Role::updateOrCreate(['name' => 'data_entry', 'd_name_en' => 'Data Entry', 'd_name_ar' => 'مدخل بيانات']);

        // //default user
        // $user = Role::updateOrCreate(['name' => 'user', 'd_name_en' => 'User', 'd_name_ar' => 'مستخدم']);

        // create permissions
        $permissions = [
            ['name' => 'access_dashboard'],

            ['name' => 'access_users'],
            ['name' => 'create_users'],
            ['name' => 'show_users'],
            ['name' => 'edit_users'],
            ['name' => 'delete_users'],

            ['name' => 'access_roles'],
            ['name' => 'create_roles'],
            ['name' => 'show_roles'],
            ['name' => 'edit_roles'],
            ['name' => 'delete_roles'],

            ['name' => 'access_permissions'],
            ['name' => 'create_permissions'],
            ['name' => 'show_permissions'],
            ['name' => 'edit_permissions'],
            ['name' => 'delete_permissions'],

            ['name' => 'access_categories'],
            ['name' => 'create_categories'],
            ['name' => 'show_categories'],
            ['name' => 'edit_categories'],
            ['name' => 'delete_categories'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission['name']], $permission);
        }

        $permissions = Permission::all();
        //create roles and assign existing permissions
        $super_admin->syncPermissions($permissions);
    }
}
