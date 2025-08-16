<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder {
    public function run(): void {
        News::create([
            'titulo' => 'Museu lança novo catálogo digital',
            'conteudo' => 'Foi disponibilizado o novo catálogo digital com mais de 100 artefactos.',
            'autor' => 'Jorge Macedo',
            'data_publicacao' => now(),
            'publicado' => true,
        ]);
    }
}

