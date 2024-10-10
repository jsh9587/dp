<?php

namespace Database\Factories\News;

use App\Models\News\NewsAuthor;
use App\Models\News\NewsFlag;
use App\Models\News\NewsLevel;
use App\Models\News\NewsPublish;
use App\Models\News\NewsStatus;
use App\Models\News\NewsType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'title' => $this->faker->sentence(6), // 6개의 단어로 구성된 문장 생성
            'content' => $this->faker->paragraphs(3, true), // 3개의 문단 생성
            'status_id' => NewsStatus::inRandomOrder()->first()->id, // 랜덤으로 상태 ID 가져오기
            'author_id' => User::inRandomOrder()->first()->id,
            'publish_id' => NewsPublish::inRandomOrder()->first()->id,
            'type_id' => NewsType::inRandomOrder()->first()->id,
            'level_id' => NewsLevel::inRandomOrder()->first()->id,
            'flag1_id' => NewsFlag::where('type',1)->inRandomOrder()->first()->id,
            'flag2_id' => NewsFlag::where('type',2)->inRandomOrder()->first()->id,
        ];
    }
}
