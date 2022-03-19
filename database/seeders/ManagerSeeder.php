<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manager;
class ManagerSeeder extends Seeder
{

    public function run()
    { 
        $manager = manager::create([
        'id_manager' => 1,
        'notlp' => 666,
        'status' => 'nonaktif',
        'image' => 'qyedhuiefge8i',
        'password' => '1234',
        'name' => 'manager',
        'level' => 'manager',
        'email' => 'manager@gmail.com'
    ]);

    }
}
