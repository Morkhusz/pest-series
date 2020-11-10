<?php

namespace Database\Factories;

use App\Models\Invites;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvitesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invites::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $email = $this->faker->unique()->safeEmail;
        return [
            'name' => $this->faker->name,
            'email' => $email,
            'link' => "https://invite.me?e={$email}",
            'user_id' => $this->faker->numberBetween(1, 50),
            'accepted' => 0,
        ];
    }

    public function accepted()
    {
        return $this->state(function (array $attributes) {
            return [
                'accepted' => 1
            ];
        });
    }
}
