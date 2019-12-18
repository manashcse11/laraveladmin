<?php
namespace App\Http\ViewComposers;

use App\Type;

class NavigationComposer
{
    public function compose($view)
    {
        $view->with('sidebar_menus', $this->get_sidebar_menus());
    }

    public function get_sidebar_menus(){
        return array(
            array('name' => 'Users', 'route' => 'user.index', 'icon' => 'fas fa-user', 'sub_menu' => array(
                array('name' => 'List', 'route' => 'user.index')
              , array('name' => 'User', 'route' => 'user.create'))
            )
          , array('name' => 'Roles', 'route' => 'role.index', 'icon' => 'fas fa-user-tag', 'sub_menu' => array(
                array('name' => 'List', 'route' => 'role.index')
            , array('name' => 'Add', 'route' => 'role.create'))
            )
          , array('name' => 'Permissions', 'route' => 'permission.index', 'icon' => 'fas fa-user-lock', 'sub_menu' => array(
                array('name' => 'List', 'route' => 'permission.index')
            , array('name' => 'Add', 'route' => 'permission.create'))
            )
        );
    }
}
