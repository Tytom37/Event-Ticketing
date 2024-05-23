<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $startDateTime = $this->faker->dateTimeBetween('+0 days', '+1 month');
        $endDateTime = (clone $startDateTime)->modify('+2 hours');

        return [
            'name' => $this->faker->sentence(3),
            'address' => $this->faker->address,
            'mobile_no' => $this->faker->phoneNumber,
            'venue' => $this->faker->company,
            'timestart' => $startDateTime,
            'timeend' => $endDateTime,
        ];
    }
}
