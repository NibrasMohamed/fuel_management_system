<?php $user = auth()->user(); ?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section ">
        <h3>General</h3>
        <ul class="nav side-menu">
            @if ($user->hasRole('Admin') || $user->hasRole('Manager'))
                <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
                <li><a href="/token"><i class="fa fa-qrcode"></i> Tokens </a></li>

                <li><a href="/fuel-availabilty"><i class="fa fa-database"></i> Fuel Availabilty </a></li>
                <li><a href="/token-payment"><i class="fa fa-usd"></i> Token Payment </a></li>

                <li><a><i class="fa fa-users"></i> Customers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/customers"> View Customers </a></li>
                        <li><a href="/vehicles"> Vehicles </a></li>
                    </ul>
                </li>
            @endif

            @if ($user->hasRole('Admin') || $user->hasRole('User'))
                <li><a href="/request-token"><i class="fa fa-edit"></i> Request Token </a></li>
                <li><a href="/my-token/{{ auth()->user()->id }}"><i class="fa fa-qrcode"></i> View My Token </a></li>
                
            @endif

            @if ($user->hasRole('Admin') || $user->hasRole('Employee'))
                <li><a href="/tokens"><i class="fa fa-qrcode"></i> Tokens </a></li>
            @endif

            @if ($user->hasRole('Admin') || $user->hasRole('Head-Office'))
                <li><a href="/main-dashboard"><i class="fa fa-home"></i> Dashboard </a></li>
                <li><a href="/fuel-request"><i class="fa fa-fire"></i> Fuel Requests </a></li>
                <li><a href="/stations"><i class="fa fa-university"></i> Stations </a></li>
                <li><a href="/schedule"><i class="fa fa-calendar"></i> Shedule </a></li>
                <li><a><i class="fa fa-users"></i> Employee Management<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/employees">Employees</a></li>
                        <li><a href="/new-employee">New Employee</a></li>
                    </ul>
                </li>
            @endif


        </ul>


    </div>


</div>
