<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Number;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $stringLetters = Str::random(2, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // First two characters as alphabets
        $integerDigits = Str::random(3, '1234567890'); // Last three characters as numbers

        $staff_id = $stringLetters . $integerDigits;

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            // 'genders_id' => $this->faker->randomElement(['1', '2']),
            // 'departments_id' => $this->faker->randomElement(['1','2','3','4','5','6','7']),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Set your common password here, // password
            'remember_token' => Str::random(10),
        ];
    }

    public function janeDoe()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Jane Doe',
                'email' => 'janedoe@gmail.com',
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
