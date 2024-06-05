<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\User\Models\User;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $departments = [
            "Web Development",
            "Application Development",
            "IT Management",
            "Accounts Management",
            "Support Management",
            "Marketing"
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table("departments")->insertGetId([
            "name"        => "Administration",
            "manager_id"  => 0,
            "user_create" => 0,
            "created_at"  => date("Y-m-d H:i:s"),
            "updated_at"  => date("Y-m-d H:i:s"),
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        for ($i = 0; $i < count($departments); $i++) {
            DB::table("departments")->insertGetId([
                "name"        => $departments[$i],
                "description" => fake()->sentence(),
                "manager_id"  => 1,
                "phone"       => "98951823",
                "email"       => fake()->email(),
                "user_create" => 1,
                "created_at"  => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ]);
        }

    }
}
