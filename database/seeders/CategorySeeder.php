<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Autos', 'Motos', 'Camiones', 'SUV', 'Tractores', 'Buses',
            'Deportivos', 'Eléctricos', 'Pickups', 'Compactos', 'Sedanes',
            'Conversibles', 'Motocross', 'Scooters', 'Utilitarios', 'Remolques',
            'Maquinaria', 'Marítimos', 'Agrícolas', 'Pesados', 'Furgonetas',
            'Taxis', 'Clásicos', 'De lujo', '4x4', 'Mini autos', 'Vehículos híbridos',
            'Motocarros', 'Cuatrimotos', 'Camionetas'
        ];

        $data = array_map(fn($name) => ['name' => $name, 'created_at' => now(), 'updated_at' => now()], $categories);

        Category::insert($data);
    }
}
