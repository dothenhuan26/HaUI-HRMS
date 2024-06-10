<?php

namespace Modules\Payroll\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Department\Models\Department;
use Modules\Designation\Models\Designation;
use Modules\User\Models\User;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i <= User::count(); $i++) {
            DB::table("payrolls")->insertGetId([
                "bank_name"     => fake()->name(),
                "bank_number"   => time() . rand(),
                "salary"        => 5000.00,
                "gratuity"      => 200.00,
                "salary_gross"  => 4500.00,
                "salary_net"    => 6000.00,
                "overtime"      => 30.00,
                "deduction"     => 300.00,
                "unpaid_leave"  => 2,
                "advance"       => 100.00,
                "absent_amount" => 400.00,
                "allowance"     => 2000.00,
                "loan"          => 500.00,
                "insurance"     => 1000.00,
                "others"        => 400.00,
                "user_id"       => $i,
                "user_create"   => 1,
                "user_update"   => 1,
                "created_at"    => date("Y-m-d H:i:s"),
                "updated_at"    => date("Y-m-d H:i:s"),
            ]);
        }

    }
}
