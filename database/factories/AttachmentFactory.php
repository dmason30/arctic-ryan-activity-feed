<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Attachment;
use App\Models\Event;
use App\Models\Photo;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttachmentFactory extends Factory
{
    protected $model = Attachment::class;

    public function definition()
    {
        return [
            'id' => $this->faker->uuid(),
            'activity_id' => Activity::factory(),
        ];
    }

    public function event()
    {
        return $this->state([
            'attachable_type' => Event::make()->getMorphClass(),
            'attachable_id' => Event::factory(),
        ]);
    }

    public function photo()
    {
        return $this->state([
            'attachable_type' => Photo::make()->getMorphClass(),
            'attachable_id' => Photo::factory(),
        ]);
    }

    public function video()
    {
        return $this->state([
            'attachable_type' => fn () => Video::make()->getMorphClass(),
            'attachable_id' => fn () => Video::factory()->createQuietly(['url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ']),
        ]);
    }
}
