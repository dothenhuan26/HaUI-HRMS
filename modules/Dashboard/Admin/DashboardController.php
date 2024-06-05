<?php

namespace Modules\Dashboard\Admin;

use Modules\Core\Admin\AdminController;

class DashboardController extends AdminController
{
    public function index()
    {
        $this->checkPermission("dashboard_access");
        $data = [
            "page_title"  => __("Welcome :name!", ["name" => username()]),
            "breadcrumbs" => [
                [
                    "name"  => __("Admin"),
                    "class" => "active",
                ]
            ]
        ];
        return view("Dashboard::admin.index", $data);
    }


}

