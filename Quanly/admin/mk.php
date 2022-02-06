<?php
    include_once('../layout/header.php');
?>
<?php
    require_once("../connect.php");
?>
<?php
    $id_nv=$_GET['id_nv'];   
    $query=mysqli_query($con,"SELECT nv.username,nv.password,nv.ten_nv,nv.image,nv.ngay_sinh,nv.gioi_tinh,nv.sdt,nv.email,nv.que,nv.phong_ban,cv.ten_cv,team.ten_team,nv.hop_dong,nv.ngay_hieu_luc,nv.create_at,nv.update_at FROM nv JOIN cv ON nv.id_cvu=cv.id_cvu JOIN team ON nv.id_team=team.id_team where id_nv='$id_nv'");
    $row=mysqli_fetch_assoc($query);  

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $md5_pass=md5($password);
        $s_update_at = $_POST['update_at'];
        
        $sql = "UPDATE `nv` SET `username`='$username',`password`='$md5_pass',`update_at`='$md5_pass'WHERE id_nv=".$id_nv;
        $query=mysqli_query($con,$sql);
        if($query){
            header("location: nhanvien.php"); 
        }
        else{
            echo 'lỗi';
        }
    }
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lý nhân viên</h2>        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lý nhân viên</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Cập nhật mật khẩu</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Cập nhật mật khẩu </h5>
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
                    <form action="" method="post" enctype="multipart/form-data"> 
                    <input type=hidden name="id_nv" value="<?=$id_nv?>" />
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên người dùng</label>            
                            <div class="col-sm-10"><input class="form-control" name="username"  value="<?php echo $row['username']?>"></div>
                        </div>                      
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Mật khẩu</label>
                            <div class="col-sm-10"><input type="password" class="form-control" name="password"  value="<?php echo $row['password']?>"></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Ngày sửa</label>
                            <div class="col-sm-10"><input type="date" name="update_at" id="" class="form-control"  value="<?php echo $row['update_at']?>"></div>
                        </div>                        
                        <div class="modal-footer"> 
                            <button class="btn btn-primary" type="submit" name="submit">Lưu lại</button> 
                        </div>  
                    </form>          
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once('../layout/footer.php');
?>