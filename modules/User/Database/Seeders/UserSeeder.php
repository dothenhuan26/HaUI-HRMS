<?php

namespace Modules\User\Database\Seeders;

use Carbon\Carbon;
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
        $edu = [
            [
                "institution"   => "Oxford University",
                "subject"       => "Computer Science",
                "start_date"    => "06/01/2002",
                "complete_date" => "05/31/2006",
                "degree"        => "BE Computer Science",
                "grade"         => "Grade A",
            ],
            [
                "institution"   => "Oxford University",
                "subject"       => "Computer Science",
                "start_date"    => "06/01/2002",
                "complete_date" => "05/31/2006",
                "degree"        => "BE Computer Science",
                "grade"         => "Grade A",
            ],
        ];
        $edu = json_encode($edu);

        $exp =[
            [
                "company_name" => "Digital Devlopment Inc",
                "location"     => "United States",
                "job_position" => "Web Developer",
                "period_from"  => "01/07/2007",
                "period_to"    => "08/06/2018",
            ],
            [
                "company_name" => "Digital Devlopment Inc",
                "location"     => "United States",
                "job_position" => "Web Developer",
                "period_from"  => "01/07/2007",
                "period_to"    => "08/06/2018",
            ],
        ];
        $exp = json_encode($exp);
        foreach (range(0, 25) as $item) {
            DB::table("users")->insert([
                'name'              => fake()->name(),
                'code'              => time() . rand(),
                'id_card'           => time() . rand(),
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
                'religion'          => fake()->city(),
                "is_active"         => true,
                "phone"             => "123456789",
                "user_create"       => 1,
                "role_id"           => 3,
                "designation_id"    => rand(1, Designation::count()),
                "created_at"        => Carbon::now(),
                "experiences"       => $exp,
                "educations"        => $edu,
            ]);
        }

    }
}
