<?php

namespace Modules\Holiday\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Department\Models\Department;
use Modules\Designation\Models\Designation;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $holidays = [
            "New Year",
            "Good Friday",
            "May Day",
            "Memorial Day",
            "Ramzon",
            "Bakrid",
            "Deepavali",
            "Christmas",
        ];

        for ($i = 0; $i < count($holidays); $i++) {
            DB::table("holidays")->insertGetId([
                "title"        => $holidays[rand(0, count($holidays) - 1)],
                "day_of_week"  => fake()->dayOfWeek(),
                "holiday_date" => fake()->date(),
                "description" => fake()->sentence(),
                "user_create"  => 1,
                "created_at"   => date("Y-m-d H:i:s"),
                "updated_at"   => date("Y-m-d H:i:s"),
            ]);
        }

    }
}
