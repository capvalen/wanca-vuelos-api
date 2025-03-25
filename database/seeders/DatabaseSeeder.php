<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\ClienteSemilla;
use Database\Seeders\DestinoSemilla;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::truncate();

        User::factory()->create([
            'paterno' => 'Pariona',
            'materno' => 'Valencia',
            'name' => 'Carlos',
            'usuario' => 'cpariona',
            'email' => 'infocat2.0@gmail.com',
            'password' => Hash::make('nus'),
            'nivel' => 1,
        ]);

        $this->call(ClienteSemilla::class);
        $this->call(MonedaSemilla::class);
        $this->call(DestinoSemilla::class);
        $this->call(ConceptoSemilla::class);
        $this->call(ServicioSemilla::class);
        $this->call(RelacionSemilla::class);
    }
}
