<?php

namespace AhmetBarut\LaravelAutoFactory;

use Illuminate\Database\Eloquent\Factories\Factory;

class CreateFactoryForModel extends Factory
{
    protected $model = FakeModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $data = [];

        foreach ($this->states[0]() as $key => $val) {
            $data[$val['name']] = $this->faker->{$val['faker']}();
        }

        $this->states[0] = function () {
            return [];
        };

        return $data;
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
