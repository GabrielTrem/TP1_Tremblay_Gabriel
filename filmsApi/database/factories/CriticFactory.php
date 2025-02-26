<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Critic>
 */

use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Film;

class CriticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'film_id'=>Film::all()->random()->id, //trouver sur https://stackoverflow.com/questions/44102483/in-laravel-how-do-i-retrieve-a-random-user-id-from-the-users-table-for-model-fa
            'score' =>$faker->randomFloat(1, 0, 10),
            'comment' =>$faker->paragraph(2)
        ];
    }
}
