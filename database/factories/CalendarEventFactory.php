<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalendarEvent>
 */
class CalendarEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start = $this->faker->dateTimeBetween($startDate = '-1 months', $endDate = '+1 months');
        return [
            'user_id' => 1,
            'title' => $this->faker->word(),
            'desc' => $this->faker->sentence(),
            'start_date' => $start,
            'end_date' => $start,
            'alarm_time' => $this->faker->date(),
            'reminder' => true
        ];
    }
}
