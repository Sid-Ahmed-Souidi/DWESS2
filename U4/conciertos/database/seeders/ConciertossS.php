<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConciertossS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('conciertos')->insert([
            
            'titulo'=> 'Morad',
            'fecha'=> '2025-12-03',
            'aforo'=> 10000,
            'precioEntrada'=> 30


        ]);
        DB::table('conciertos')->insert([
            
            'titulo'=> 'quevedo',
            'fecha'=> '2025-12-03',
            'aforo'=> 4000,
            'precioEntrada'=> 40


        ]);  

        DB::table('conciertos')->insert([
            
            'titulo'=> 'salama',
            'fecha'=> '2025-10-03',
            'aforo'=> 20000,
            'precioEntrada'=> 50


        ]);  
    
    
    }
}
