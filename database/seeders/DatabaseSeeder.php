<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make("123456");
        $user->role_id = 1;
        $user->user_create = 0;
        $user->is_active = true;
        $user->save();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->call(DepartmentSeeder::class);
        $this->call(DesignationSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(HolidaySeeder::class);

        User::factory(20)->create();
    }
}
