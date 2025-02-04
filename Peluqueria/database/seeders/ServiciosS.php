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
            'descripcion'=>'Corte caballero',
            'precio'=>10
        ]);

        DB::table('servicios')->insert([
            'descripcion'=>'Barba',
            'precio'=>3
        ]);

        DB::table('servicios')->insert([
            'descripcion'=>'moicano',
            'precio'=>8
        ]);

    }
}
