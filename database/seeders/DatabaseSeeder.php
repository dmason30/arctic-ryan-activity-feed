<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Activity;
use App\Models\Attachment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Artisan::call('migrate:fresh');

        \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        Activity::factory(5)->state(['user_id' => $user->getKey()])->create()->each(function (Activity $model) {
            Attachment::factory()->event()->create(['activity_id' => $model->getKey()]);
        });

        Activity::factory(5)->state(['user_id' => $user->getKey()])->create()->each(function (Activity $model) {
            Attachment::factory(5)->photo()->create(['activity_id' => $model->getKey()]);
        });

        Activity::factory(5)->state(['user_id' => $user->getKey()])->create()->each(function (Activity $model) {
            Attachment::factory()->video()->create(['activity_id' => $model->getKey()]);
        });
    }
}
