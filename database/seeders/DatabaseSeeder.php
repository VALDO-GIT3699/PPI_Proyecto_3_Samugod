<?php
namespace Database\Seeders;

use App\Models\Citas;
use App\Models\Consultorio;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // if (!User::where('email', 'us@example.com')->exists()) {
        //     $user = User::factory()->create([
        //         'name' => 'Test User',
        //         'email' => 'us@example.com',
        //         'role' => 'admin',
        //     ]);

        User::factory()->withPersonalTeam()->create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'role' => 'admin',
            'password' => '$2y$12$Emk8nYXYjpADClwbwrI94.LPuQatTTiXMcLvtlvBUQSaNg.Rjnmz2',
        ]);
        
        User::factory(4)
            //->has(Citas::factory()->has(Consultorio::factory()->count(2))->count(2))
            ->create();
    
    

        // Llamar al seeder de Consultorio
        $this->call([
            ConsultorioSeeder::class,
        ]);
    }
}
