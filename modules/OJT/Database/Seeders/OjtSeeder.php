<?php

namespace Modules\OJT\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Department\Models\Department;

class OjtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        foreach (range(1, 10) as $item) {
            DB::table("ojts")->insertGetId([
                "title"       => 'Intern',
                "user_create" => 1,
                "user_update" => 1,
                "created_at"  => date("Y-m-d H:i:s"),
                "updated_at"  => date("Y-m-d H:i:s"),
            ]);
        }

    }
}
