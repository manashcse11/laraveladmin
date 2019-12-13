<nav class="mt-2">
    @if($sidebar_menus)
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        @foreach($sidebar_menus as $sm)
        <li class="nav-item has-treeview {{ (request()->is(str_replace(".", "/", str_replace(".index", "", $sm['route'])))) ? 'menu-open' : '' }}">
            <a href="{{ route($sm['route']) }}" class="nav-link {{ (request()->is(str_replace(".", "/", str_replace(".index", "", $sm['route'])))) ? 'active' : '' }}">
{{--                <i class="nav-icon fas fa-tachometer-alt"></i>--}}
                <i class="nav-icon {{ $sm['icon'] }}"></i>
                <p>
                    {{ $sm['name'] }}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            @if(isset($sm['sub_menu']))
                @foreach($sm['sub_menu'] as $sub)
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route($sub['route']) }}" class="nav-link {{ (request()->is(str_replace(".", "/", str_replace(".index", "", $sub['route'])))) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ $sub['name'] }}</p>
                            </a>
                        </li>
                    </ul>
                @endforeach
            @endif
        </li>
        @endforeach
    </ul>
    @endif
</nav>
