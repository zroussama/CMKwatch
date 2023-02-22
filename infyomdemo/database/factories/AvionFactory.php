<?php

namespace Database\Factories;

use App\Models\Avion;
use Illuminate\Database\Eloquent\Factories\Factory;


class AvionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Avion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'nom' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'taille' => $this->faker->randomDigitNotNull,
            'places' => $this->faker->randomDigitNotNull,
            'ficheClient' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
