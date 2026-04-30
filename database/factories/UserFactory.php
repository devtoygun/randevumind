<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Keep generated fixtures aligned with the custom user profile schema.
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->optional()->phoneNumber(),
            'emailverifiedat' => now(),
            'phoneverifiedat' => fake()->boolean(60) ? now() : null,
            'birthday' => fake()->optional()->date(),
            'gender' => fake()->boolean(),
            'status' => true,
            'first_login' => true,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            // This state mirrors a user who has not completed email verification yet.
            'emailverifiedat' => null,
        ]);
    }
}
