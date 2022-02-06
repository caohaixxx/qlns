<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a  href="../admin/thongtin.php"><img alt="image" class="rounded-circle" src="../Assets/image/<?php echo $data['image']; ?>" style="width:50px;height:50px"/></a> 
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"> <?php echo $data['ten_admin']; ?></span>
                        <span class="text-muted text-xs block">Đăng xuất<b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="thongtin.php">Thông tin tài khoản</a></li>
                        <li><a class="dropdown-item" href="update_pass.php">Đổi mật khẩu</a></li>
                        <li><a class="dropdown-item" href="../logout.php">Đăng xuất</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    QLNS
                </div>
            </li>
            <li><a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</a></li>
            <li>
                <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> <span class="nav-label">Tác vụ nhân sự</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="admin.php">Quản lý admin</a></li> 
                    <li><a href="nhanvien.php">Quản lý nhân viên</a></li>                 
                    <li><a href="chamcong.php">Quản lý chấm công</a></li>
                    <li><a href="team.php">Quản lý team </a></li>         
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-area-chart"></i> <span class="nav-label">Quản lý công việc</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="congviec.php">Quản lý công việc</a></li>                 
                    <li><a href="task.php">Công việc nhỏ</a></li>        
                </ul>
            </li>
            <li>
                <a href="cv.php"><i class="fa fa-diamond"></i> <span class="nav-label">Quản lý chức vụ</span></a>
            </li>
            <li>
                <a href="tknhanvien.php"><i class="fa fa-pie-chart"></i>Thống kê nhân viên</a>
            </li>
            <li>
                <a href="tongluong.php"><i class="fa fa-pie-chart"></i> <span class="nav-label">Tổng lương nhân viên</span></a>
            </li>
        </ul>
    </div>
</nav>
