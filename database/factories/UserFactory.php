<?php

namespace Database\Factories;

use Cassandra\Smallint;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $nrp = 2272000;

        $emailDomain = '@maranatha.ac.id';
        $nrp++;
        return [
            'nrp' => $nrp,
            'name' => $this->faker->name,
            'email' => $nrp . $emailDomain,
            'password' => bcrypt('12345678'),
            'role_id' => 3,
            'prodi_id' => 1,
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
}
