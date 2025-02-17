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
        DB::table('libros')->insert([
            'titulo'=>'Harry Potter',
            'numEjemplares'=>4
        ]);

        DB::table('libros')->insert([
            'titulo'=>'Cien años de soledad',
            'numEjemplares'=>3
        ]);

        DB::table('libros')->insert([
            'titulo'=>'No me puedes lastimar',
            'numEjemplares'=>5
        ]);    }
}
