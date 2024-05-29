<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Designation\Models\Designation;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach (range(0, 25) as $item) {
            DB::table("users")->insert([
                'name'              => fake()->name(),
                'code'              => time().rand(),
                'email'             => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password'          => Hash::make("123456"),
                'remember_token'    => Str::random(10),
                'address'           => fake()->address(),
                'gender'            => rand(0, 1) ? "Male" : "Female",
                'birthday'          => fake()->date(),
                'country'           => fake()->country(),
                'national'          => fake()->country(),
                'passport'          => fake()->creditCardNumber(),
                'passport_exp'      => fake()->date(),
                'status'            => "publish",
                'religion'          => fake()->city(),
                "is_active"         => true,
                "phone"             => "123456789",
                "user_create"       => 1,
                "role_id"           => 2,
                "designation_id" => rand(0, Designation::count()-1),
            ]);
        }

    }
}
