<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table("core_roles")->insert([
            "name" => "administrator",
            "code" => "administrator",
        ]);

        DB::table("core_roles")->insert([
            "name" => "employee",
            "code" => "employee",
        ]);

    }
}
