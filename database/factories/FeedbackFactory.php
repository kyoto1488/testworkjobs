<?php

namespace Database\Factories;

use App\Models\Enums\Feedback\Status;
use App\Models\Resume;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'resume_id' => Resume::all()->random()->getKey(),
            'vacancy_id' => Vacancy::all()->random()->getKey(),
            'status' => fake()->randomElement([Status::PENDING->value, Status::APPROVED->value, Status::REJECTED->value]),
            'comment' => fake()->text()
        ];
    }
}
