<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="index.html">
            <span class="text">Hospital</span>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Navigation</div>
                <div class="nav-item active">
                    <a href="{{route('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                </div>
                <!-- <div class="nav-item">
                    <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                </div> -->
                @if(auth()->check() && auth()->user()->hasRole('admin'))
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Doctors</span></a>
                    <div class="submenu-content">
                        <a href="{{route('doctor.create')}}" class="menu-item">Create</a>
                        <a href="{{route('doctor.index')}}" class="menu-item">View</a>
                    </div>
                </div>
                @endif
                @if(auth()->check() && auth()->user()->hasRole('doctor'))
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-box"></i><span>Appointments</span></a>
                    <div class="submenu-content">
                        <a href="{{route('appointment.create')}}" class="menu-item">Create</a>
                        <a href="{{route('appointment.index')}}" class="menu-item">View</a>
                    </div>
                </div>
                @endif
                @if(auth()->check() && auth()->user()->hasRole('admin'))
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-gitlab"></i><span>Patients</span></a>
                    <div class="submenu-content">
                        <a href="{{route('booking.index')}}" class="menu-item">Patients Appointments</a>
                        <a href="{{route('allBookings.index')}}" class="menu-item">All Booked Appointments</a>
                    </div>
                </div>
                @endif
                @if(auth()->check() && auth()->user()->hasRole('doctor'))
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-package"></i><span>Prescriptions</span></a>
                    <div class="submenu-content">
                        <a href="{{route('prescriptions.index')}}" class="menu-item">Today Prescriptions</a>
                        <a href="{{route('prescriptions.allPrescriptions')}}" class="menu-item">All Prescriptions</a>

                    </div>
                </div>
                @endif
                <div class="nav-item">
                    <a href="pages/ui/icons.html"><i class="ik ik-command"></i><span>Icons</span></a>
                </div>
                <div class="nav-lavel">Forms</div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-edit"></i><span>Forms</span></a>
                    <div class="submenu-content">
                        <a href="pages/form-components.html" class="menu-item">Components</a>
                        <a href="pages/form-addon.html" class="menu-item">Add-On</a>
                        <a href="pages/form-advance.html" class="menu-item">Advance</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="pages/form-picker.html"><i class="ik ik-terminal"></i><span>Form Picker</span> <span class="badge badge-success">New</span></a>
                </div>

                <div class="nav-lavel">Tables</div>
                <div class="nav-item">
                    <a href="pages/table-bootstrap.html"><i class="ik ik-credit-card"></i><span>Bootstrap Table</span></a>
                </div>
                <div class="nav-item">
                    <a href="pages/table-datatable.html"><i class="ik ik-inbox"></i><span>Data Table</span></a>
                </div>

                <div class="nav-lavel">Charts</div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>Charts</span> <span class="badge badge-success">New</span></a>
                    <div class="submenu-content">
                        <a href="pages/charts-chartist.html" class="menu-item active">Chartist</a>
                        <a href="pages/charts-flot.html" class="menu-item">Flot</a>
                        <a href="pages/charts-knob.html" class="menu-item">Knob</a>
                        <a href="pages/charts-amcharts.html" class="menu-item">Amcharts</a>
                    </div>
                </div>

                <div class="nav-lavel">Apps</div>
                <div class="nav-item">
                    <a href="pages/calendar.html"><i class="ik ik-calendar"></i><span>Calendar</span></a>
                </div>
                <div class="nav-item">
                    <a href="pages/taskboard.html"><i class="ik ik-server"></i><span>Taskboard</span></a>
                </div>

                <div class="nav-lavel">Pages</div>

                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-lock"></i><span>Authentication</span></a>
                    <div class="submenu-content">
                        <a href="pages/login.html" class="menu-item">Login</a>
                        <a href="pages/register.html" class="menu-item">Register</a>
                        <a href="pages/forgot-password.html" class="menu-item">Forgot Password</a>
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>Other</span></a>
                    <div class="submenu-content">
                        <a href="pages/profile.html" class="menu-item">Profile</a>
                        <a href="pages/invoice.html" class="menu-item">Invoice</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="pages/layouts.html"><i class="ik ik-layout"></i><span>Layouts</span><span class="badge badge-success">New</span></a>
                </div>
                <div class="nav-lavel">Other</div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Menu Levels</span></a>
                    <div class="submenu-content">
                        <a href="javascript:void(0)" class="menu-item">Menu Level 2.1</a>
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)" class="menu-item">Menu Level 2.2</a>
                            <div class="submenu-content">
                                <a href="javascript:void(0)" class="menu-item">Menu Level 3.1</a>
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="menu-item">Menu Level 2.3</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="javascript:void(0)" class="disabled"><i class="ik ik-slash"></i><span>Disabled Menu</span></a>
                </div>
                <div class="nav-item">
                    <a href="javascript:void(0)"><i class="ik ik-award"></i><span>Sample Page</span></a>
                </div>
                <div class="nav-lavel">Support</div>
                <div class="nav-item">
                    <a href="javascript:void(0)"><i class="ik ik-monitor"></i><span>Documentation</span></a>
                </div>
                <div class="nav-item">
                    <a href="javascript:void(0)"><i class="ik ik-help-circle"></i><span>Submit Issue</span></a>
                </div>
            </nav>
        </div>
    </div>
</div>
