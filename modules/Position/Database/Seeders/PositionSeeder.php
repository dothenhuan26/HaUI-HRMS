<?php

namespace Modules\Position\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Department\Models\Department;
use Modules\Designation\Models\Designation;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $positions = [
            "Web Developer",
            "Web Designer",
            "Android Developer",
        ];

        $jobTypes = [
            "Full time",
            "Part time",
            "Internship",
            "Temporary",
            "Remote",
            "Others"
        ];

        $status = [
            "Open",
            "Close",
            "Cancelled"
        ];

        for ($i = 0; $i < count($positions); $i++) {
            DB::table("positions")->insertGetId([
                "title"          => $positions[$i],
                "location"       => fake()->locale(),
                "description"    => fake()->sentence(20),
                "vacancies"      => rand(1, 10),
                "age"            => "18+",
                "job_type"       => $jobTypes[rand(0, count($jobTypes)-1)],
                "experiences"    => rand(1, 5) . " Years",
                "start_date"     => fake()->date(),
                "expired_date"   => fake()->date(),
                "salary_from"    => "1500",
                "salary_to"      => "3000",
                "status"         => rand(0, count($status)-1),
                "user_create"    => 1,
                "department_id"  => rand(1, Department::count()),
                "designation_id" => rand(1, Designation::count()),
                "created_at"     => date("Y-m-d H:i:s"),
                "updated_at"     => date("Y-m-d H:i:s"),
            ]);
        }

    }
}
