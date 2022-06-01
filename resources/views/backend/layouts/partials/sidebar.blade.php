@php
    $usr = Auth::guard('admin')->user();
@endphp
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ asset('template/assets/img/admin-avatar.png') }}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{$usr->name}}</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            @if ($usr->can('dashboard.view'))
            <li>
                <a class="active" href="{{ route('admin.dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            @endif

            <li class="heading">FEATURES</li>

            @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Roles & Permissions</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                  @if ($usr->can('role.view'))
                    <li>
                        <a class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">All Roles</a>
                    </li>
                  @endif
                  @if ($usr->can('role.create'))
                    <li>
                        <a class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}" href="{{ route('admin.roles.create') }}">Create Role</a>
                    </li>
                  @endif
                </ul>
            </li>
            @endif

            @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Admins</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                  @if ($usr->can('admin.view'))
                    <li>
                        <a class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}" href="{{ route('admin.admins.index') }}">All Admins</a>
                    </li>
                  @endif
                  @if ($usr->can('admin.create'))
                    <li>
                        <a class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}" href="{{ route('admin.admins.create') }}">Create Admin</a>
                    </li>
                  @endif
                </ul>
            </li>
            @endif

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Tables</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="table_basic.html">Basic Tables</a>
                    </li>
                    <li>
                        <a href="datatables.html">Datatables</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                    <span class="nav-label">Charts</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="charts_flot.html">Flot Charts</a>
                    </li>
                    <li>
                        <a href="charts_morris.html">Morris Charts</a>
                    </li>
                    <li>
                        <a href="chartjs.html">Chart.js</a>
                    </li>
                    <li>
                        <a href="charts_sparkline.html">Sparkline Charts</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-map"></i>
                    <span class="nav-label">Maps</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="maps_vector.html">Vector maps</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="icons.html"><i class="sidebar-item-icon fa fa-smile-o"></i>
                    <span class="nav-label">Icons</span>
                </a>
            </li>
            <li class="heading">PAGES</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">Mailbox</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="mailbox.html">Inbox</a>
                    </li>
                    <li>
                        <a href="mail_view.html">Mail view</a>
                    </li>
                    <li>
                        <a href="mail_compose.html">Compose mail</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="calendar.html"><i class="sidebar-item-icon fa fa-calendar"></i>
                    <span class="nav-label">Calendar</span>
                </a>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                    <span class="nav-label">Pages</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="invoice.html">Invoice</a>
                    </li>
                    <li>
                        <a href="profile.html">Profile</a>
                    </li>
                    <li>
                        <a href="login.html">Login</a>
                    </li>
                    <li>
                        <a href="register.html">Register</a>
                    </li>
                    <li>
                        <a href="lockscreen.html">Lockscreen</a>
                    </li>
                    <li>
                        <a href="forgot_password.html">Forgot password</a>
                    </li>
                    <li>
                        <a href="error_404.html">404 error</a>
                    </li>
                    <li>
                        <a href="error_500.html">500 error</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="javascript:;">Level 2</a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-3-level collapse">
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
{{--
 <!-- sidebar menu area start -->
 @php
     $usr = Auth::guard('admin')->user();
 @endphp
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">Admin</h2>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    @if ($usr->can('dashboard.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif


                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">

                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
--}}
