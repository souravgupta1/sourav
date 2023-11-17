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

                        <li class="sidebar-item @if($route == 'dashboard') active @endif ">
                            <a href="{{ route('dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub @if($route == 'create-receipt') active @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Receipt</span>
                            </a>
                            <ul class="submenu @if($route == 'create-receipt' || $route == 'receipt-list' || $route == 'receipt-setting') active @endif">
                                <li class="submenu-item @if($route == 'create-receipt') active @endif">
                                    <a href="{{ route('create-receipt') }}">Receipt Generator</a>
                                </li>
                                <li class="submenu-item @if($route == 'receipt-list') active @endif">
                                    <a href="{{ route('receipt-list') }}">Receipts List</a>
                                </li>
                                <li class="submenu-item @if($route == 'receipt-setting') active @endif">
                                    <a href="{{ route('receipt-setting') }}">Receipts Setting</a>
                                </li>



                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub @if($route == 'create-company') active @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Company</span>
                            </a>
                            <ul class="submenu @if($route == 'create-company') active @endif">
                                <li class="submenu-item  @if($route == 'create-company') active @endif">
                                    <a href="{{ route('create-company') }}">Profile Setting</a>
                                </li>

                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub @if($route == 'create-user') active @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>User</span>
                            </a>
                            <ul class="submenu @if($route == 'create-user') active @endif">
                                <li class="submenu-item  @if($route == 'create-user') active @endif">
                                    <a href="{{ route('create-user') }}">Add User</a>
                                </li>

                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub @if($route == 'create-funder') active @endif">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Funder</span>
                            </a>
                            <ul class="submenu @if($route == 'create-funder' || $route == 'funder-list') active @endif">
                                <li class="submenu-item  @if($route == 'create-funder') active @endif">
                                    <a href="{{ route('create-funder') }}">Add Funder</a>
                                </li>
                                <li class="submenu-item  @if($route == 'funder-list') active @endif">
                                    <a href="{{ route('funder-list') }}">Funder List</a>
                                </li>

                            </ul>
                        </li>




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
                            </ul>
                        </li>



                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
