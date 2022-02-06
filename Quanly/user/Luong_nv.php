<?php
    include_once('../layout/header1.php');
?>
<?php
require_once('../connect.php');
?>
 <?php
 $result=mysqli_query($con, "select * from luong where id_nv='$session_id1'")or die('Error In Session');
 $data1=mysqli_fetch_array($result);
 ?>
<?php
 $result2=mysqli_query($con,"SELECT nv.id_nv,nv.ten_nv,nv.ngay_sinh,nv.gioi_tinh,nv.phong_ban,cv.ten_cv,luong.ngay_nghi,luong.ngay_lam,luong.time_tang_ca, (hs_luong_cv*ngay_lam)+(hs_l_tangca*time_tang_ca)+phu_cap-(ngay_nghi*300000) AS Luongnhanvien FROM nv JOIN cv ON cv.id_cvu=nv.id_cvu JOIN luong ON luong.id_nv=nv.id_nv where nv.id_nv=".$data['id_nv'])or die('Error In Session');
 $data2=mysqli_fetch_array($result2);                         
?> 
<?php
 $result3=mysqli_query($con, "select nv.id_cvu,cv.id_cvu,cv.ten_cv from nv join cv on cv.id_cvu=nv.id_cvu where nv.id_nv=".$data['id_nv'])or die('Error In Session');
 $data3=mysqli_fetch_array($result3);
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lý lương</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="master.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Thông tin lương</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Thông tin cá nhân</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
                <div class="ibox ">
                <div class="ibox-title">
                    <h5> Thông tin lương</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Thông tin</th>
                            </tr>
                        </thead>
                        <tbody>
                                        <tr>
                                        <td> Tên lương</td>
                                        <td> <?php echo $data['ten_nv'] ?></td>
                                        </tr>
                                        <tr>
                                        <td> Ngày sinh nhân  viên</td>
                                        <td> <?php echo $data['ngay_sinh'] ?></td>
                                        </tr>
                                        <tr>
                                        <td> Giới tính</td>
                                        <td> <?php echo $data['gioi_tinh'] ?></td>
                                        </tr>
                                        <tr>
                                        <td> Phòng ban</td>
                                        <td> <?php echo $data['phong_ban'] ?></td>
                                        </tr>
                                        <tr>
                                        <td> Chức vụ</td>
                                        <td> <?php echo $data3['ten_cv'] ?> </td>
                                        </tr>
                                        <tr>
                                        <td> Ngày nghỉ</td>
                                        <td> <?php echo $data1['ngay_nghi'] ?> </td>
                                        </tr>
                                        <tr>
                                        <td> Ngày làm</td>
                                        <td> <?php echo $data1['ngay_lam'] ?> </td>
                                        </tr>
                                        <tr>
                                        <td> Thời gian tăng ca</td>
                                        <td> <?php echo $data1['time_tang_ca'] ?> </td>
                                        </tr>
                                        <tr>
                                        <td> Lương lương</td>
                                        <td> <?php echo $data2['Luongnhanvien'] ?> Vnd </td>
                                        </tr>                  
                        </tbody>
                    </table> 
                </div>
                </div>
        </div>
    </div>
</div>
<?php
    include_once('../layout/footer.php');
?>