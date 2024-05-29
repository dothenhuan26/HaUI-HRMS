<?php

namespace Modules\Core\Updates;

use Illuminate\Support\Facades\Artisan;
use Modules\User\Helpers\PermissionHelper;
use Modules\User\Models\Role;

class Update
{
    public static function run()
    {

        Artisan::call('migrate', [
            '--force' => true,
        ]);

        $sudo = Role::query()->where('code', 'super_admin')->first();
        if($sudo) {
            $sudo->assignPermission(PermissionHelper::all());
        }

        Artisan::call('cache:clear');

    }
}
