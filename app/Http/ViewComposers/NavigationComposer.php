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
            array('name' => 'User Management', 'route' => 'user.index', 'icon' => 'fas fa-user', 'sub_menu' => array(
                array('name' => 'User List', 'route' => 'user.index')
              , array('name' => 'Add User', 'route' => 'user.create'))
            )
          , array('name' => 'Role Management', 'route' => 'role.index', 'icon' => 'fas fa-user-tag', 'sub_menu' => array(
                array('name' => 'Role List', 'route' => 'role.index')
            , array('name' => 'Add Role', 'route' => 'role.create'))
            )
          , array('name' => 'Permission Management', 'route' => 'permission.index', 'icon' => 'fas fa-user-lock', 'sub_menu' => array(
                array('name' => 'Permission List', 'route' => 'permission.index')
            , array('name' => 'Add Permission', 'route' => 'permission.create'))
            )
        );
    }
}
