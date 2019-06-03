<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = ['1', '2', '3'];
        $faker = app(Faker\Generator::class);

        $statuses = factory(\App\Models\Status::class)
            ->times(100)
            ->make()
            ->each(function ($status) use ($faker, $userIds) {
                $status->user_id = $faker->randomElement($userIds);
            })
            ->toArray();

        \App\Models\Status::insert($statuses);

    }
}
