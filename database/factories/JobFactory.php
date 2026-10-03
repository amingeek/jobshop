<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => $this->faker->jobTitle(),
            'salary' => $this->faker->numberBetween(3000, 10000),
            'location' => $this->faker->randomElement(['Remote', 'Berlin', 'Munich', 'Hamburg', 'Frankfurt']),
            'type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract', 'Internship']),
            'description' => $this->faker->paragraph(),
            'requirements' => [
                $this->faker->sentence(),
                $this->faker->sentence(),
                $this->faker->sentence(),
                $this->faker->sentence(),
            ],
        ];
    }}
