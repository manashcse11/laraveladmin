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
            array('name' => 'User Management', 'route' => 'user.index', 'sub_menu' => array(
                array('name' => 'User List', 'route' => 'user.index')
              , array('name' => 'Add User', 'route' => 'user.create'))
            )
        );
    }
}
