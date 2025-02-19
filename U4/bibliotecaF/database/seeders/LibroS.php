<?php

namespace Database\Seeders;

use App\Models\Libro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibroS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Libro::create([
            'titulo' => 'Invisible',
            'numEjemplares' => 15
        ]);
        Libro::create([
            'titulo' => 'Mitos griegos',
            'numEjemplares' => 9
        ]);
        Libro::create([
            'titulo' => 'Sin novedad en el frente',
            'numEjemplares' => 20
        ]);
    }
}
