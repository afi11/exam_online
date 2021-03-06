 <!-- START SIDEBAR-->
 <nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="./assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">James Brown</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="index.html"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">DATA MASTER</li>
            <li>
                <a href="calendar.html"><i class="sidebar-item-icon fa fa-user"></i>
                    <span class="nav-label">Users Management</span>
                </a>
            </li>
            <li>
                <a href="{{ url('schedules') }}"><i class="sidebar-item-icon fa fa-calendar"></i>
                    <span class="nav-label">Schedules</span>
                </a>
            </li>
            <li>
                <a href="{{ url('questions') }}"><i class="sidebar-item-icon fa fa-sticky-note"></i>
                    <span class="nav-label">Questions</span>
                </a>
            </li>
            <li class="heading">Exam</li>
            <li>
                <a href="calendar.html"><i class="sidebar-item-icon fa fa-stack-overflow"></i>
                    <span class="nav-label">Scores</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->