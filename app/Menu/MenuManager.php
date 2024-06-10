<?php

namespace App\Menu;

class MenuManager
{
    private $items = [
        "Main"           => [],
        "Employees"      => [],
        "HR"             => [],
        "Performance"    => [],
        "Administration" => [],
        "Pages"          => [],
        "UI Interface"   => [],
        "Extras"         => [],
    ];

    public static $cur = "admin";

    public function add($category, $module, $label, $route)
    {
        $this->items[$category][$module][] = [
            "label" => $label,
            "route" => $route
        ];
    }

    public function get()
    {
        return $this->items;
    }


}
