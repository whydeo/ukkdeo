<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@role.test',
            'level'=> 'admin',
            'password' => bcrypt('1234')
        ]);

         $admin->assignRole('admin');

        // $manager = User::create([
        //     'name' => 'Manager',
        //     'email' => 'manager@role.test',
        //     'level'=> 'manager',
        //     'password' => bcrypt('1234')
        // ]);

        // $manager->assignRole('manager');

        // $kasir = User::create([
        //             'name' => 'kasir',
        //             'email' => 'kasir@role.test',
        //             'level'=> 'kasir',
        //             'password' => bcrypt('1234')
        //         ]);

        // $kasir->assignRole('kasir');

    }
}
