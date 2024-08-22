<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    public function run()
    {
        Doctor::create([
            'name' => 'Dr. Juan Pérez',
            'specialty' => 'Cardiología',
            'phone' => '555-1234',
            'email' => 'juan.perez@example.com',
        ]);

        Doctor::create([
            'name' => 'Dra. María García',
            'specialty' => 'Pediatría',
            'phone' => '555-5678',
            'email' => 'maria.garcia@example.com',
        ]);

        // Agrega más doctores si lo deseas
    }
}