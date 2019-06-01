<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = factory(\App\Model\User::class)->times(50)->make();
        \App\Model\User::query()->insert($factory->makeVisible([
            'password', 'remember_token'
        ])->toArray());

        $admin = \App\Model\User::query()->find(1);
        $admin->name = 'Yanfan';
        $admin->email = 'Yanfan@qq.com';
        $admin->save();
    }
}
