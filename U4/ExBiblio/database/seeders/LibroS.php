<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibroS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('libros')->insert([
            'titulo'=>'Libro 1',
            'numEjemplares'=>7
        ]);
        DB::table('libros')->insert([
            'titulo'=>'Libro 2',
            'numEjemplares'=>8
        ]);
        DB::table('libros')->insert([
            'titulo'=>'Libro 3',
            'numEjemplares'=>18
        ]);
        DB::table('libros')->insert([
            'titulo'=>'Libro 4',
            'numEjemplares'=>28
        ]);
        DB::table('libros')->insert([
            'titulo'=>'Libro 5',
            'numEjemplares'=>38
        ]);
    }
}
