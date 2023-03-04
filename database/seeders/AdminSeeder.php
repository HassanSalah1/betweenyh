<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin =  User::updateOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Super Admin',
            'email_verified_at' => now(),
            // 'phone' => '01111234567',
            'password' => bcrypt('12345678'),
            // 'status' => '1',
        ]);
        if (!$super_admin->hasRole('super_admin')) {
            $super_admin->assignRole('super_admin');
        }

        // $permissions = Permission::all();
        // $super_admin->syncPermissions($permissions);
    }
}
