<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion @yield('sidenav-class', 'sb-sidenav-dark')" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                </a>
                <div class="sb-sidenav-menu-heading">Management</div>
                <a class="nav-link" href="{{ route('classes.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                    Classes
                </a>
                <a class="nav-link" href="{{ route('students.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                    Students
                </a>
                <a class="nav-link" href="{{ route('subjects.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Subjects
                </a>
                <a class="nav-link" href="{{ route('grades.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                    Grades
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
