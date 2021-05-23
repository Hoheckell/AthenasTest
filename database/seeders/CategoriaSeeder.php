<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['nome'=>'Admin'],
            ['nome'=>'Gerente'],
            ['nome'=>'Normal']
        ];
        DB::table('categorias')->insert($data);
    }
}
