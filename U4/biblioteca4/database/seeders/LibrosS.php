<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrosS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('libros')->insert([
                'titulo' => 'harry El Sosio' ,
                'numEjemplares' => 3
        ]);

        DB::table('libros')->insert([
            'titulo' => 'no me puedes lastimar' ,
            'numEjemplares' => 1
         ]);

         DB::table('libros')->insert([
            'titulo' => 'no me puedes lastimar' ,
            'numEjemplares' => 2
         ]);
    }
}
