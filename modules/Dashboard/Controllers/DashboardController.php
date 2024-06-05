<?php

namespace Modules\Dashboard\Controllers;

use Modules\Core\Admin\AdminController;

class DashboardController extends AdminController
{
    public function index()
    {
//        $this->checkPermission("dashboard_access");
        $data = [
            "page_title"  => __("Welcome :name!", ["name" => username()]),
            "breadcrumbs" => [
                [
                    "name"  => __("Employee"),
                    "class" => "active",
                ]
            ]
        ];
        return view("Dashboard::frontend.index", $data);
    }


}

