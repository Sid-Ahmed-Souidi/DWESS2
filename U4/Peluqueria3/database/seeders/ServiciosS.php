<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('servicios')->insert([
            'descripcion' => 'Corte de pelo' ,
            'precio' => 7
        ]);  


        DB::table('servicios')->insert([
            'descripcion' => 'Corte de barba' ,
            'precio' => 4
        ]);  


        DB::table('servicios')->insert([
            'descripcion' => 'corte de cejas' ,
            'precio' => 3
        ]);  
    
    
    
    
    }
}
