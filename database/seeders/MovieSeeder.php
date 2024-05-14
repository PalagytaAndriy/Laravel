<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'title' => 'The Shawshank',
                'published' => true,
                'poster_link' => 'shawshank.jpg',
                'genres' => ['Drama'],
            ],
            [
                'title' => 'The Godfather',
                'published' => true,
                'poster_link' => 'godfather.jpg',
                'genres' => ['Crime', 'Drama'],
            ],
        ];

        foreach ($movies as $movieData) {
            $genres = $movieData['genres'];
            unset($movieData['genres']);

            $movie = Movie::create($movieData);

            foreach ($genres as $genreName) {
                $genre = Genre::where('name', $genreName)->firstOrFail();
                $movie->genres()->attach($genre);
            }
        }
    }
}
