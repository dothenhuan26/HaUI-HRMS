<?php

namespace Modules\Designation\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Department\Models\Department;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $designations = [
            "Web Designer",
            "Web Developer",
            "Android Developer",
            "IOS Developer",
            "UI Designer",
            "UX Designer",
            "IT Technician",
            "Product Manager",
            "SEO Analyst",
            "Front End Designer",
            "Front End Developer",
            "Systems Engineer",
            "Technical Lead",
            "Quality Assurance",
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $departmentId = DB::table("designations")->insertGetId([
            "name"          => "Administration",
            "user_create"   => 0,
            "department_id" => 1,
            "created_at"    => date("Y-m-d H:i:s"),
            "updated_at"    => date("Y-m-d H:i:s"),
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        for ($i = 0; $i < count($designations); $i++) {
            DB::table("designations")->insertGetId([
                "name"       => $designations[$i],
                "user_create"    => 1,
                "department_id" => rand(2, Department::count()),
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        }

    }
}
