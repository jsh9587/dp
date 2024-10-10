<?php

namespace Database\Factories\News;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News\NewsPublish>
 */
class NewsPublishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::inRandomOrder()->first()->id, // 랜덤으로 사용자 ID 가져오기
            'published_at' => $this->faker->dateTime(),
        ];
    }
}
