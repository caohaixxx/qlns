<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a  href="../admin/thongtin.php"><img alt="image" class="rounded-circle" src="../Assets/image/<?php echo $data['image']; ?>" style="width:50px;height:50px"/></a> 
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"> <?php echo $data['ten_nv']; ?></span>
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
            <li><a href="trangchu.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</a></li>
                <li><a href="nhanvien.php"><i class="fa fa-diamond"></i> <span class="nav-label">Thông tin cá nhân</a></li>
                <li><a href="luong_nv.php"> <i class="fa fa-diamond"></i> <span class="nav-label">Lương cá nhân</a></li>
            <li>
                <a href="cviec.php"><i class="fa fa-diamond"></i> <span class="nav-label">Thông tin công việc</span></a>
            </li>
        </ul>
    </div>
</nav>
