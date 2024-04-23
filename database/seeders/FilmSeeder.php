<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Film;
use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = ['Naruto','Boruto','Jujutsu Kaisen'];
        
        foreach ($titles as $title) {
            
            $film = Film::create([
                'judul' => $title,
                'tahun' => rand(1000, 2000),
                'usia'  => rand(1, 60),
                'perusahaan' => 'Google',
                'sutradara' => 'Putra',
                'deskripsi' => 'Hello World',
                'is_publish' => rand(0, 1)
            ]);

            for ($i = 1; $i <= 1; $i++) { 
                
                $season = Season::create([
                    'film_id' => $film->id
                ]);

                for ($a = 1; $a <= 3; $a++) { 
                    
                    $episode = Episode::create([
                        'season_id' => $season->id
                    ]);

                }

            }

        }
    }
}
