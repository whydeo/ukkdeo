<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kasir;

class KasirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kasir = kasir::create([
            'id_kasir' => 1,
            'notlp' => 666,
            'status' => 'nonaktif',
            'image' => 'qyedhuiefge8i',
            'password' => '1234',
            'name' => 'kasir',
            'level' => 'kasir',
            'email' => 'kasir@gmail.com'
        ]);
    }
}
