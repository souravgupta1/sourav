<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item @if(Route::currentRouteName() == 'dashboard') active @endif ">
                            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub @if(Route::currentRouteName() == 'create-receipt') active @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Receipt</span>
                            </a>
                            <ul class="submenu @if(Route::currentRouteName() == 'create-receipt') active @endif">
                                <li class="submenu-item @if(Route::currentRouteName() == 'create-receipt') active @endif">
                                    <a href="{{ route('create-receipt') }}">Receipt Generator</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">Receipts List</a>
                                </li>



                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub @if(Route::currentRouteName() == 'create-company') active @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Company</span>
                            </a>
                            <ul class="submenu @if(Route::currentRouteName() == 'create-company') active @endif">
                                <li class="submenu-item  @if(Route::currentRouteName() == 'create-company') active @endif">
                                    <a href="{{ route('create-company') }}">Create Profile</a>
                                </li>

                            </ul>
                        </li>




                        <li class="sidebar-title">Mail &amp; Setting</li>

                        <li class="sidebar-item  has-sub @if(Route::currentRouteName() == 'compose-mail' || Route::currentRouteName() == 'mail-setting') active @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-envelope-fill"></i>
                                <span>Mail</span>
                            </a>
                            <ul class="submenu @if(Route::currentRouteName() == 'compose-mail' || Route::currentRouteName() == 'mail-setting') active @endif">
                                <li class="submenu-item @if(Route::currentRouteName() == 'compose-mail') active @endif">
                                    <a href="{{ route('compose-mail') }}"><i class="bi bi-pen-fill"></i> Compose</a>
                                </li>
                                <li class="submenu-item @if(Route::currentRouteName() == 'mail-setting') active @endif">
                                    <a href="{{ route('mail-setting') }}"><i class="bi bi-gear-fill"></i> Mail Setting</a>
                                </li>
                            </ul>
                        </li>



                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
