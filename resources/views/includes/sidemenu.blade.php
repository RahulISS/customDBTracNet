    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <!-- <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon"> -->
            </div>
            <div>
               <img src="" height="40">&nbsp;<span style="color:white;">Tracknet</span></img>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
            </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{route('adminDashboard')}}">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="{{route('projectlist')}}">
                    <div class="parent-icon"><i class="bx bx-user-plus"></i>
                    </div>
                    <div class="menu-title">Projects</div>
                </a>
                
            </li>
            <li>
                <a href="{{route('customerlist')}}">
                    <div class="parent-icon"><i class="bx bx-user-plus"></i>
                    </div>
                    <div class="menu-title">Users</div>
                </a>
                
            </li>
            <li>
                <a href="{{route('portallist')}}">
                    <div class="parent-icon"><i class='bx bx-desktop'></i>
                    </div>
                    <div class="menu-title">Portals</div>
                </a>
            </li>
            <li>
                <a href="{{route('modulelist')}}">
                    <div class="parent-icon"><i class='bx bx-layer'></i>
                    </div>
                    <div class="menu-title">Modules</div>
                </a>
            </li>
            <li>
                <a href="{{route('rolelist')}}">
                    <div class="parent-icon"><i class='bx bx-user-circle'></i>
                    </div>
                    <div class="menu-title">Roles</div>
                </a>
            </li>
            <li>
                <a href="{{route('permissionlist')}}">
                    <div class="parent-icon"><i class='bx bx-key'></i>
                    </div>
                    <div class="menu-title">Permission</div>
                </a>
            </li>
        
        </ul>
        <!--end navigation-->
    </div>