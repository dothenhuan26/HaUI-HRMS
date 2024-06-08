<?php

namespace Modules\Chat\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Chat\Models\ChatGroup;
use Modules\User\Models\User;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = DB::table("chat_groups")->insertGetId([
            "name"              => "general",
            "number_of_members" => User::count(),
            "user_create"       => 1,
            "created_at"        => date("Y-m-d H:i:s"),
            "updated_at"        => date("Y-m-d H:i:s"),
        ]);

        if ($id) {
            $chatGroup = ChatGroup::find($id);
            $userIds = User::query()->get()->pluck('id');
            $chatGroup->users()->attach($userIds);

            foreach (range(1, 100) as $item) {
                 DB::table("conversations")->insertGetId([
                    "message"    => fake()->sentence(),
                    "user_id"    => rand(1, User::count()),
                    "group_id"   => $id,
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s"),
                ]);
            }


        }

    }
}
