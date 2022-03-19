<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $manager = roles::create([
        'name' => 'manager',
        'guard_name'=>'web'
    ]);

    $admin = roles::create([
        'name' => 'admin',
        'guard_name'=>'web'
    ]);

    $kasir = roles::create([
        'name' => 'kasir',
        'guard_name'=>'web'
    ]);
    }
}
