<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                
                <!-- App service provider -->
                @if($app_info)
                <img src="{{ asset('images/info/'.$app_info->logo) }}" alt="User Image">
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- DASHBOARD START -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"

                    @if(  Route::currentRouteName() == 'dashboard' )
                    class="nav-link active"
                    @else
                    class="nav-link"
                    @endif

                    >
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- DASHBOARD END -->

                @if( auth('super_admin')->check() )
                    @foreach( App\Models\UserModule\Module::orderBy('position','asc')->get() as $module )
                        @if( $module->route == null )
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon {{ $module->icon }}"></i>
                                    <p>
                                        {{ $module->name }}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @foreach( $module->sub_module->sortBy('position',false) as $sub_module )
                                    <li class="nav-item">
                                        <a href="{{ route($sub_module->route) }}" 
                                        @if(  Route::currentRouteName() == $sub_module->route )
                                            class="nav-link active"
                                        @else
                                            class="nav-link"
                                        @endif
                                        >
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                {{ $sub_module->name }} 
                                            </p>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route($module->route) }}"

                                @if(  Route::currentRouteName() == $module->route )
                                class="nav-link active"
                                @else
                                class="nav-link"
                                @endif

                                >
                                    <i class="nav-icon {{ $module->icon }}"></i>
                                    <p>
                                        {{ $module->name }}
                                    </p>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @elseif( auth('web')->check() )
                    @foreach( App\Models\UserModule\Module::orderBy('position','asc')->get() as $module )
                        @if( can($module->key) )
                            @if( $module->route == null )
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon {{ $module->icon }}"></i>
                                        <p>
                                            {{ $module->name }}
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @foreach( $module->sub_module->sortBy('position',false) as $sub_module )
                                            @if( can($sub_module->key) )
                                                <li class="nav-item">
                                                    <a href="{{ route($sub_module->route) }}" 
                                                    @if(  Route::currentRouteName() == $sub_module->route )
                                                        class="nav-link active"
                                                    @else
                                                        class="nav-link"
                                                    @endif
                                                    >
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>
                                                            {{ $sub_module->name }} 
                                                        </p>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route($module->route) }}"

                                    @if(  Route::currentRouteName() == $module->route )
                                    class="nav-link active"
                                    @else
                                    class="nav-link"
                                    @endif

                                    >
                                        <i class="nav-icon {{ $module->icon }}"></i>
                                        <p>
                                            {{ $module->name }}
                                        </p>
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
