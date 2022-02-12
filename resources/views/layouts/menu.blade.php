<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    @if($user->can('menu-dashboard'))
        <a class="nav-link" href="/home">
            <i class=" fas fa-building"></i><span>Dashboard</span>
        </a>     
    @endcan
    @if($user->can('menu-blog'))
        <a class="nav-link" href="/blogs">
            <i class="fab fa-hive"></i><span>Blogs</span>
        </a>     
    @endcan
    @if($user->can('menu-rol'))
        <a class="nav-link" href="/roles">
            <i class=" fas fa-project-diagram"></i><span>Roles</span>
        </a>     
    @endcan
    @if($user->can('menu-usuario'))
        <a class="nav-link" href="/usuarios">
            <i class=" fas fa-users"></i><span>Usuarios</span>
        </a>      
    @endif
    
</li>

