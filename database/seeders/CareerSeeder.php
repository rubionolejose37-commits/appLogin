<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar datos de prueba automáticamente
        Career::create(['name' => 'Ingeniería de Sistemas e Informática']);
        Career::create(['name' => 'Administración de Empresas']);
        Career::create(['name' => 'Diseño y Desarrollo de Software']);
    }
}