<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample admin
        $admin = new \App\Models\User();
        $admin->name = "Admin Project";
        $admin->email = "admin@gmail.com";
        $admin->password = bcrypt("rahasia");
        $admin->role = "admin";
        $admin->saldo = 0;
        $admin->save();

        $admin = new \App\Models\User();
        $admin->name = "Super Admin";
        $admin->email = "superadmin@gmail.com";
        $admin->password = bcrypt("rahasia");
        $admin->role = "super admin";
        $admin->saldo = 0;
        $admin->save();

        // user
        $user = new \App\Models\User();
        $user->name = "user Project";
        $user->email = "user@gmail.com";
        $user->password = bcrypt("rahasia");
        $user->role = "user";
        $user->saldo = 0;
        $user->save();

        $user = new \App\Models\User();
        $user->name = "jhon";
        $user->email = "jhon@gmail.com";
        $user->password = bcrypt("12345678");
        $user->role = "user";
        $user->saldo = 0;
        $user->save();

    }
}
