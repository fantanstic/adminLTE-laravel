<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;
use App\Models\Normal\UserLoginNormalCount as NormalCount;

class UserLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param $factory
     * @return void
     */
    public function run(Factory $factory)
    {
        factory(\App\Models\Normal\UserLoginNormalCount::class, 3)->create();
        factory(\App\Models\Success\UserLoginSuccessCount::class, 10)->create();
        factory(\App\Models\Failed\UserLoginFailedCount::class, 10)->create();
    }
}
