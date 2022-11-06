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
                @if(auth()->check() && auth()->user()->hasRole('admin'))
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Department</span></a>
                    <div class="submenu-content">
                        <a href="{{route('department.index')}}" class="menu-item">View</a>
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

            </nav>
        </div>
    </div>
</div>
