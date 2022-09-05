<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { 
        return [
            'judul' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'tahun' => $this->year('-2 years'),
            'poster'=>'',
            'genre_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,3)
        ];
    }
}
