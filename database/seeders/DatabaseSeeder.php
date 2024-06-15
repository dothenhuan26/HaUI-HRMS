<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Modules\Chat\Database\Seeders\ChatSeeder;
use Modules\OJT\Database\Seeders\OjtSeeder;
use Modules\Payroll\Database\Seeders\PayrollSeeder;
use Modules\User\Database\Seeders\ContractSeeder;
use Modules\User\Database\Seeders\UserSeeder;
use Modules\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Department\Database\Seeders\DepartmentSeeder;
use Modules\Designation\Database\Seeders\DesignationSeeder;
use Modules\Holiday\Database\Seeders\HolidaySeeder;
use Modules\Position\Database\Seeders\PositionSeeder;
use Modules\User\Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $sudo = new User();
        $sudo->name = "Sudo";
        $sudo->code = "000000";
        $sudo->id_card = "000000000000";
        $sudo->email = "sudo@gmail.com";
        $sudo->password = Hash::make("123456");
        $sudo->role_id = 1;
        $sudo->user_create = 0;
        $sudo->is_active = true;
        $sudo->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        $this->call(DepartmentSeeder::class);
        $this->call(DesignationSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(HolidaySeeder::class);

        $this->call(UserSeeder::class);

        $admin = new User();
        $admin->name = "Admin";
        $admin->code = "000001";
        $admin->id_card = "000000000002";
        $admin->email = "admin@gmail.com";
        $admin->password = Hash::make("123456");
        $admin->role_id = 2;
        $admin->designation_id = 1;
        $admin->user_create = 1;
        $admin->is_active = true;
        $admin->save();

        $user = new User();
        $user->name = "User";
        $user->code = "000003";
        $user->id_card = "000000000003";
        $user->email = "user@gmail.com";
        $user->password = Hash::make("123456");
        $user->role_id = 3;
        $user->designation_id = 1;
        $user->user_create = 1;
        $user->is_active = true;
        $user->save();

        $this->call(ChatSeeder::class);
        $this->call(PayrollSeeder::class);
        $this->call(ContractSeeder::class);
        $this->call(OjtSeeder::class);

    }
}
