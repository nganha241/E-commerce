<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'admin', 'display_name' => 'Admin', 'group' => 'system'],
            ['name' => 'seller', 'display_name' => 'Seller', 'group' => 'system'],
            ['name' => 'user', 'display_name' => 'user', 'group' => 'system'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate($role);
        }



        $permissions = [
            ['name' => 'dashboard', 'display_name' => 'Dashboard', 'group' => 'Dashboard'],

            ['name' => 'create-user', 'display_name' => 'Create user', 'group' => 'User'],
            ['name' => 'update-user', 'display_name' => 'Update user', 'group' => 'User'],
            ['name' => 'show-user', 'display_name' => 'Show user', 'group' => 'User'],
            ['name' => 'delete-user', 'display_name' => 'Delete user', 'group' => 'User'],

            ['name' => 'create-role', 'display_name' => 'Create role', 'group' => 'Role'],
            ['name' => 'update-role', 'display_name' => 'Update role', 'group' => 'Role'],
            ['name' => 'show-role', 'display_name' => 'Show role', 'group' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Delete role', 'group' => 'Role'],

            ['name' => 'create-category', 'display_name' => 'Create category', 'group' => 'Category'],
            ['name' => 'update-category', 'display_name' => 'Update category', 'group' => 'Category'],
            ['name' => 'show-category', 'display_name' => 'Show category', 'group' => 'Category'],
            ['name' => 'delete-category', 'display_name' => 'Delete category', 'group' => 'Category'],

            ['name' => 'create-product', 'display_name' => 'Create product', 'group' => 'Product'],
            ['name' => 'update-product', 'display_name' => 'Update product', 'group' => 'Product'],
            ['name' => 'show-product', 'display_name' => 'Show product', 'group' => 'Product'],
            ['name' => 'delete-product', 'display_name' => 'Delete product', 'group' => 'Product'],

            ['name' => 'create-coupon', 'display_name' => 'Create coupone', 'group' => 'Coupon'],
            ['name' => 'update-coupon', 'display_name' => 'Update coupon', 'group' => 'Coupon'],
            ['name' => 'show-coupon', 'display_name' => 'Show coupon', 'group' => 'Coupon'],
            ['name' => 'delete-coupon', 'display_name' => 'Delete coupon', 'group' => 'Coupon'],

            ['name' => 'update-order', 'display_name' => 'Update order', 'group' => 'Order', 'group' => 'Order'],
            ['name' => 'show-order', 'display_name' => 'Show order', 'group' => 'Order', 'group' => 'Order'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate($permission);
        }
    }
}