<?php

namespace App\Menu;

class MenuManager
{
    private $items = [
        "Main"           => [],
        "Employees"      => [],
        "HR"             => [],
        //        "Performance"    => [],
        "Administration" => [],
        //        "Pages"          => [],
        //        "UI Interface"   => [],
        //        "Extras"         => [],
    ];

    private $icons = [

    ];

    public static $cur = "admin";

    public function add($category, $module, $label, $route, $roles = [1, 2])
    {

        $this->items[$category][$module][] = [
            "label" => $label,
            "route" => $route,
            "roles" => $roles,
        ];
    }

    public function get()
    {
        return $this->items;
    }

    public function addIcon($module, $icon)
    {
        $this->icons[$module] = $icon;
    }

    public function getIcons()
    {
        return $this->icons;
    }

    public function getIcon($module)
    {
        return $this->icons[$module];
    }

}
