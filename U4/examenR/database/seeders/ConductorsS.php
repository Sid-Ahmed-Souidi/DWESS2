<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConductorsS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('conductors')->insert([
            'nombre' => 'Paco' ,
            'dni' => '77024598j'
    ]);

    DB::table('conductors')->insert([
        'nombre' => 'Mohamed' ,
        'dni' => '55024123j'
    ]);


    DB::table('conductors')->insert([
    'nombre' => 'Sergio' ,
    'dni' => '98767837H'
    ]);


    }
}
