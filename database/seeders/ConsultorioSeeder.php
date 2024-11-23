<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsultorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Evitar duplicados al crear consultorios
        $consultorios = ['guadalajara', 'atotonilco', 'zapopan'];

        foreach ($consultorios as $tag) {
            // Usar firstOrCreate para evitar duplicados
            \App\Models\Consultorio::firstOrCreate(['tag' => $tag]);
        }
    }
}
