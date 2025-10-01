<?php

namespace Database\Seeders;

use DB;
use App\Models\Mes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mes::firstOrCreate(['nombre_mes' => 'Enero']);
        Mes::firstOrCreate(['nombre_mes' => 'Febrero']);
        Mes::firstOrCreate(['nombre_mes' => 'Marzo']);
        Mes::firstOrCreate(['nombre_mes' => 'Abril']);
        Mes::firstOrCreate(['nombre_mes' => 'Mayo']);
        Mes::firstOrCreate(['nombre_mes' => 'Junio']);
        /*Mes::create(['nombre_mes' => 'Enero']);

        $mes = new Mes();
        $mes->nombre_mes = 'Febrero';
        $mes->save();

        $mes3 = new Mes();
        $mes3->insert(['nombre_mes' => 'Marzo']);

        DB::insert(
            "INSERT INTO meses (nombre_mes) VALUES (?)", ['Abril']
        );

        DB::statement("INSERT INTO meses (nombre_mes) VALUES (?)", ['Mayo']);
        */
    }
}
