<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $this->faker->randomElement(['Male','Female']),
            'nationality' => $this->faker->country(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'address2' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'zip' => $this->faker->postcode(),
            'photo' => $this->faker->imageUrl(200,200),
            'birthday' => $this->faker->date(),
            'blood_type' => $this->faker->randomElement(['A+','A-','B+','B-','O+','O-','AB+','AB-']),
            'religion' => $this->faker->randomElement(['Islam','Hinduism','Christianity','Buddhism']),
            'role' => $this->faker->randomElement(['admin','student']),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];

    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Create a student user.
     */
    public function student(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'student',
        ]);
    }

    /**
     * Create a teacher user.
     */
    public function teacher(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'teacher',
        ]);
    }

    /**
     * Create an admin user.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
        ]);
    }
}
