<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViajesS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('viajes')->insert([
            
            'titulo'=> 'Titulo del viaje 1',
            'destino'=> 'Maldivas',
            'numNoches'=> 3,
            'numPlazas'=> 12,
            'precioPersona' => 50
        ]);

                
        DB::table('viajes')->insert([
            
            'titulo'=> 'Titulo del viaje 2',
            'destino'=> 'Marruecos',
            'numNoches'=> 4,
            'numPlazas'=> 20,
            'precioPersona' => 60
        ]);

        
        DB::table('viajes')->insert([
            
            'titulo'=> 'Titulo del viaje 3',
            'destino'=> 'España',
            'numNoches'=> 4,
            'numPlazas'=> 14,
            'precioPersona' => 30
        ]);






    }
}
