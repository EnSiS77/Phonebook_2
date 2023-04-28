<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phonebook>
 */
class PhonebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isPublished = rand(1, 5) >1;

        $createdAt = $this->faker->dateTimeBetween('-3 months', '-2 days');

        $data = [
            'user_id'       => (rand(1, 5) == 5) ? 1 : 2,
            'name'          => $this->faker->name(),
            'email'         => $this->faker->email(),
            'phone'         => $this->faker->e164PhoneNumber,
            'is_published'  => $isPublished,
            'published_at'  => $isPublished ? $this->faker->dateTimeBetween('-2 months', '-1 days') : null,
            'created_at'    => $createdAt,
            'updated_at'    => $createdAt,
        ];

        return $data;
    }
}
