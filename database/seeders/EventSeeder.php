<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder {
    public function run(): void {
        Event::create([
            'titulo' => 'Inauguração da Exposição X',
            'descricao' => 'Grande evento cultural no Museu Escolar.',
            'data_inicio' => '2025-09-01',
            'data_fim' => '2025-09-15',
            'autor' => 'Carolina Rosa',
            'publicado' => true,
        ]);
    }
}

