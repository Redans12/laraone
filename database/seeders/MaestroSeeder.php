<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Maestro;

class MaestroSeeder extends Seeder
{
    public function run(): void
    {
        Maestro::create([
            'nombre' => 'Aang',
            'elemento' => 'aire',
            'nacion' => 'Nómadas del Aire',
            'nivel_poder' => 10,
            'tecnica_especial' => 'Estado Avatar',
            'es_avatar' => true,
            'edad' => 112
        ]);

        Maestro::create([
            'nombre' => 'Katara',
            'elemento' => 'agua',
            'nacion' => 'Tribu Agua del Sur',
            'nivel_poder' => 9,
            'tecnica_especial' => 'Curación con Agua',
            'edad' => 14
        ]);

        Maestro::create([
            'nombre' => 'Toph Beifong',
            'elemento' => 'tierra',
            'nacion' => 'Reino Tierra',
            'nivel_poder' => 10,
            'tecnica_especial' => 'Metal Control',
            'edad' => 12
        ]);

        Maestro::create([
            'nombre' => 'Zuko',
            'elemento' => 'fuego',
            'nacion' => 'Nación del Fuego',
            'nivel_poder' => 8,
            'tecnica_especial' => 'Fuego del Dragón',
            'edad' => 16
        ]);

        Maestro::create([
            'nombre' => 'Azula',
            'elemento' => 'fuego',
            'nacion' => 'Nación del Fuego',
            'nivel_poder' => 10,
            'tecnica_especial' => 'Relámpago Azul',
            'edad' => 14
        ]);

        Maestro::create([
            'nombre' => 'Iroh',
            'elemento' => 'fuego',
            'nacion' => 'Nación del Fuego',
            'nivel_poder' => 10,
            'tecnica_especial' => 'Redirección de Relámpagos',
            'edad' => 60
        ]);
    }
}
