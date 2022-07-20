<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'rooms.edit']);
        Permission::create(['name' => 'rooms.delete']);
        Permission::create(['name' => 'rooms.update']);
        Permission::create(['name' => 'units.create']);
        Permission::create(['name' => 'units.edit']);
        Permission::create(['name' => 'units.delete']);
        Permission::create(['name' => 'units.update']);
        Permission::create(['name' => 'bookings.create']);
        Permission::create(['name' => 'bookings.edit']);
        Permission::create(['name' => 'bookings.delete']);
        Permission::create(['name' => 'bookings.update']);
        Permission::create(['name' => 'meals_orders.update']);
        Permission::create(['name' => 'meals_orders.create']);
        Permission::create(['name' => 'meals_orders.edit']);
        Permission::create(['name' => 'meals_orders.delete']);
        Permission::create(['name' => 'drinks_orders.update']);
        Permission::create(['name' => 'drinks_orders.create']);
        Permission::create(['name' => 'drinks_orders.delete']);
        Permission::create(['name' => 'pantry_orders.edit']);
        Permission::create(['name' => 'pantry_orders.create']);
        Permission::create(['name' => 'pantry_orders.delete']);
        Permission::create(['name' => 'pantry_orders.update']);



        //create roles and assign existing permissions
        $guestRole = Role::create(['name' => 'guest']);
        $guestRole->givePermissionTo('bookings.create');
        $guestRole->givePermissionTo('bookings.edit');
        $guestRole->givePermissionTo('bookings.delete');
        $guestRole->givePermissionTo('bookings.update');
        $guestRole->givePermissionTo('pantry_orders.create');
        $guestRole->givePermissionTo('pantry_orders.edit');
        $guestRole->givePermissionTo('pantry_orders.delete');
        $guestRole->givePermissionTo('pantry_orders.update');

        $superadminRole = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule

        // create demo users
        $user = User::factory()->create([
            'name' => 'Ardhi',
            'email' => 'ardhi.kholifatul@gmail.com',
            'password' => bcrypt('12345678'),
            'phone_number' => '081225755325',
            'status_verified' => '1',
            'role' => 'guest'
        ]);
        $user->assignRole($guestRole);

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678'),
            'phone_number' => '089658662848',
            'status_verified' => '1',
            'role' => 'super_admin'
        ]);
        $user->assignRole($superadminRole);
    }
}
