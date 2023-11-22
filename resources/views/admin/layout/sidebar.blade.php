@php
    $route = Route::currentRouteName();
@endphp
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
                            @if (check_access('Dashboard','view'))
                            <li class="sidebar-item {{ current_route('dashboard') }} ">
                                <a href="{{ route('dashboard') }}" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            @endif
@if (check_access('Receipt Form','view') || check_access('Receipt List','view') || check_access('Receipt Form','view'))
                        <li class="sidebar-item  has-sub {{ current_route('create-receipt') }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Receipt</span>
                            </a>
                            <ul class="submenu @if($route == 'create-receipt' || $route == 'receipt-list' || $route == 'receipt-setting') active @endif">
                                @if (check_access('Receipt Form','view'))
                                <li class="submenu-item {{ current_route('create-receipt') }}">
                                    <a href="{{ route('create-receipt') }}">Receipt Generator</a>
                                </li>
                                @endif
                                @if (check_access('Receipt List','view'))
                                <li class="submenu-item {{ current_route('receipt-list') }}">
                                    <a href="{{ route('receipt-list') }}">Receipts List</a>
                                </li>
                                @endif
                                @if (check_access('Receipt Form','view'))
                                <li class="submenu-item {{ current_route('receipt-setting') }}">
                                    <a href="{{ route('receipt-setting') }}">Receipts Setting</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif

                    @if (check_access('Company Form','view'))
                        <li class="sidebar-item  has-sub @if($route == 'create-company') active @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Company</span>
                            </a>
                            <ul class="submenu {{ current_route('create-company') }}">
                             @if (check_access('Company Form','view'))
                                <li class="submenu-item  {{ current_route('create-company') }}">
                                    <a href="{{ route('create-company') }}">Profile Setting</a>
                                </li>
                            @endif

                            </ul>
                        </li>
                        @endif


            @if (check_access('User Form','view') || check_access('User List','view'))
                        <li class="sidebar-item  has-sub @if($route == 'create-user') active @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>User</span>
                            </a>
                            <ul class="submenu @if($route == 'create-user' || $route == 'users-list') active @endif">
                                @if (check_access('User Form','view'))
                                <li class="submenu-item  @if($route == 'create-user') active @endif">
                                    <a href="{{ route('create-user') }}">Add User</a>
                                </li>
                                @endif
                                @if (check_access('User List','view'))
                                <li class="submenu-item  @if($route == 'users-list') active @endif">
                                    <a href="{{ route('users-list') }}">User List</a>
                                </li>
                                @endif

                            </ul>
                        </li>
@endif
@if (check_access('Funder Form','view') || check_access('Funder List','view'))
                        <li class="sidebar-item  has-sub @if($route == 'create-funder') active @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Funder</span>
                            </a>
                            <ul class="submenu @if($route == 'create-funder' || $route == 'funder-list') active @endif">
                                @if (check_access('Funder Form','view'))
                                <li class="submenu-item  @if($route == 'create-funder') active @endif">
                                    <a href="{{ route('create-funder') }}">Add Funder</a>
                                </li>
                                @endif
                                @if (check_access('Funder List','view'))
                                <li class="submenu-item  @if($route == 'funder-list') active @endif">
                                    <a href="{{ route('funder-list') }}">Funder List</a>
                                </li>
                                @endif

                            </ul>
                        </li>
 @if (check_access('Mail','view'))
                        <li class="sidebar-title">Mail &amp; Setting</li>

                        <li class="sidebar-item  has-sub @if($route == 'compose-mail' || $route == 'mail-setting') active @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-envelope-fill"></i>
                                <span>Mail</span>
                            </a>
                            <ul class="submenu @if( $route == 'mail-setting') active @endif">

                                <li class="submenu-item @if($route == 'mail-setting') active @endif">
                                    <a href="{{ route('mail-setting') }}"><i class="bi bi-pen-fill"></i> Compose</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
