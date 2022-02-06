<?php
    include_once('../layout/header1.php');
?>
<?php
require_once('../connect.php');

$result=mysqli_query($con,"select nv.id_nv,nv.ten_nv,nv.ngay_sinh,nv.gioi_tinh,nv.sdt,nv.email,nv.que,nv.phong_ban,cv.ten_cv,team.ten_team,nv.hop_dong,nv.ngay_hieu_luc FROM nv JOIN cv ON cv.id_cvu=nv.id_cvu JOIN team ON team.id_team=nv.id_team WHERE id_nv=".$data['id_nv']);
$data=mysqli_fetch_array($result);
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lý nhân viên </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="master.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Thông tin nhân viên</a>
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
                    <h5> Thông tin nhân viên</h5>
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
                                <th> Thông tin nhân viên</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                             <td> ID Nhân Viên</td>
                             <td> <?php echo $data['id_nv']; ?> </td>
                            </tr> 
                           <tr>
                             <td> Tên Nhân Viên</td>
                             <td> <?php echo $data['ten_nv']; ?> </td>
                            </tr> 
                            <tr>
                             <td> Ngày sinh</td>
                             <td> <?php echo $data['ngay_sinh']; ?> </td>
                            </tr> 
                            <tr>
                             <td> Giới tính</td>
                             <td> <?php echo $data['gioi_tinh']; ?> </td>
                            </tr> 
                            <tr>
                             <td> Số điện thoại</td>
                             <td> <?php echo $data['sdt']; ?> </td>
                            </tr> 
                            <tr>
                             <td> Email</td>
                             <td> <?php echo $data['email']; ?> </td>
                            </tr> 
                            <tr>
                             <td> Quê quán</td>
                             <td> <?php echo $data['que']; ?> </td>
                            </tr> 
                            <tr>
                             <td> Phòng ban</td>
                             <td> <?php echo $data['phong_ban']; ?> </td>
                            </tr> 
                            <tr>
                             <td>Chức vụ</td>
                             <td> <?php echo $data['ten_cv']; ?> </td>
                            </tr> 
                            <tr>
                             <td> Team</td>
                             <td> <?php echo $data['ten_team']; ?> </td>
                            </tr> 
                            <tr>
                             <td> Hợp đồng</td>
                             <td> <?php echo $data['hop_dong']; ?> </td>
                            </tr>      
                            <tr>
                             <td> Ngày hiệu lực</td>
                             <td> <?php echo $data['ngay_hieu_luc']; ?> </td>
                            </tr>                
                        </tbody>
                    </table>
                    <div class="modal-footer"> 
                    <a type="button" class="btn btn-primary" href="cn_nvien.php">Cập nhật thông tin</a>
                        </div>  
                </div>
                </div>
        </div>
    </div>
</div>
<?php
    include_once('../layout/footer.php');
?>