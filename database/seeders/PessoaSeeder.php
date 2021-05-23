<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'nome'=>'Jorge da Silva',
                'email'=>'jorge@terra.com.br',
                'categoria_codigo'=>1
            ],
            [
                'nome'=>'Flavia Monteiro',
                'email'=>'flavia@globo.com',
                'categoria_codigo'=>2
            ],
            [
                'nome'=>'Marcos Frota Ribeiro',
                'email'=>'ribeiro@gmail.com',
                'categoria_codigo'=>2
            ],
            [
                'nome'=>'Raphael Souza Santos',
                'email'=>'rsantos@gmail.com',
                'categoria_id'=>1
            ],
            [
                'nome'=>'Pedro Paulo Mota',
                'email'=>'ppmota@gmail.com',
                'categoria_codigo'=>1
            ],
            [
                'nome'=>'Winder Carvalho da Silva',
                'email'=>'winder@hotmail.com',
                'categoria_codigo'=>3
            ],
            [
                'nome'=>'Maria da Penha Albuquerque',
                'email'=>'mpa@hotmail.com',
                'categoria_codigo'=>3
            ],
            [
                'nome'=>'Rafael Garcia Souza',
                'email'=>'rgsouza@hotmail.com',
                'categoria_codigo'=>3
            ],
            [
                'nome'=>'Tabata Costa',
                'email'=>'tabata_costa@gmail.com',
                'categoria_codigo'=>2
            ],
            [
                'nome'=>'Ronil Camarote',
                'email'=>'camarote@terra.com.br',
                'categoria_codigo'=>1
            ],
            [
                'nome'=>'Joaquim Barbosa',
                'email'=>'barbosa@globo.com',
                'categoria_codigo'=>1
            ],
            [
                'nome'=>'Carla Zamborlini',
                'email'=>'zamborlini@terra.com.br',
                'categoria_codigo'=>3
            ],
            [
                'nome'=>'João Paulo Vieira',
                'email'=>'jpvieria@gmail.com',
                'categoria_codigo'=>1
            ],
            [
                'nome'=>'Eveline Maria Alcantra',
                'email'=>'ev_alcantra@gmail.com',
                'categoria_codigo'=>2
            ],

        ];
        DB::table('pessoas')->insert($data);
    }
}
