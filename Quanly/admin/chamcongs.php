<?php
    include_once('../layout/header.php');
?>
<?php  
  require_once('../connect.php');

 $s_id=$s_id_nv=$s_id_cvu=$s_ngay_nghi=$s_ngay_lam=$s_time_tang_ca=$s_create_at=$s_update_at='';          
    if(!empty($_POST)){     

        if(isset($_POST['id_luong'])){
            $s_id = $_POST['id_luong'];
        }
        if(isset($_POST['submit'])){
            if(!empty($_POST['id_nv'])) {
                $s_id_nv = $_POST['id_nv'];
            }
        }
        if(isset($_POST['submit'])){
            if(!empty($_POST['id_cvu'])) {
                $s_id_cvu = $_POST['id_cvu'];
            }
        }
        if(isset($_POST['ngay_nghi'])){
            $s_ngay_nghi = $_POST['ngay_nghi'];
        }
        if(isset($_POST['ngay_lam'])){
            $s_ngay_lam = $_POST['ngay_lam'];
        }
        if(isset($_POST['time_tang_ca'])){
            $s_time_tang_ca = $_POST['time_tang_ca'];
        }
        if(isset($_POST['create_at'])){
            $s_create_at = $_POST['create_at'];
        }
        if(isset($_POST['update_at'])){
            $s_update_at = $_POST['update_at'];
        }
        
        $s_id_nv= str_replace('\'','\\\'',$s_id_nv);
        $s_ngay_nghi= str_replace('\'','\\\'',$s_ngay_nghi);
        $s_id_cvu= str_replace('\'','\\\'',$s_id_cvu);
        $s_ngay_lam= str_replace('\'','\\\'',$s_ngay_lam);
        $s_time_tang_ca= str_replace('\'','\\\'',$s_time_tang_ca);

        if($s_id != ''){
            //update
            $sql = "UPDATE `luong` SET `ngay_nghi`='$s_ngay_nghi',`ngay_lam`='$s_ngay_lam',`time_tang_ca`='$s_time_tang_ca',`update_at`='$s_update_at' WHERE id_luong=".$s_id;
            $query=mysqli_query($con,$sql);
            header("location: chamcong.php");  
        }     
        else{
            // Kiểm tra id_cvu hoặc id_nv có bị trùng hay không
            $sql = "SELECT * FROM luong WHERE id_nv = '$s_id_nv'";
                
            // Thực thi câu truy vấn
            $result = mysqli_query($con, $sql);
                
            // Nếu kết quả trả về lớn hơn 1 thì nghĩa là id_cvu hoặc id_nv đã tồn tại trong CSDL
            if (mysqli_num_rows($result) > 0)
            {
                // Sử dụng javascript để thông báo
                echo '<script language="javascript">alert("Nhân viên này chấm công rồi ! vui lòng chấm nhân viên  khoản khác"); window.location="chamcong.php";</script>';
                    
                // Dừng chương trình
                die ();
            }
            else{
            //insert 
            $sql = "INSERT INTO `luong`(`id_luong`,`id_nv`, `ngay_nghi`, `ngay_lam`,`time_tang_ca`, `create_at`, `update_at`) VALUES ('$s_id','$s_id_nv','$s_ngay_nghi','$s_ngay_lam','$s_time_tang_ca','$s_create_at','$s_create_at')";
            $query=mysqli_query($con,$sql);
            header("location: chamcong.php");           
            }                 
        }       
    }
    $id_luong=$_GET['id_luong'];   
    $query=mysqli_query($con,"select * from `luong` where id_luong='$id_luong'");
    $row=mysqli_fetch_assoc($query);
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lý chấm công</h2>        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lý chấm công</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách chấm công</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Sửa chấm công </h5>
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
                    <form action="" method="post">
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tên nhân viên</label>
                            <input type=hidden name="id_luong" value="<?=$id_luong?>" />
                            <div class="col-sm-10"><input type="text" class="form-control" name="id_nv" value="<?=$row['ten_nv']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tên chức vụ</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="id_cvu" value="<?=$s_ten_cvu?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập ngày nghỉ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ngay_nghi" value="<?=$s_ngay_nghi?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập ngày làm</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ngay_lam" value="<?=$s_ngay_lam?>" ></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tăng ca</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="time_tang_ca" value="<?=$s_time_tang_ca?>"></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Ngày sửa</label>
                            <div class="col-sm-10"><input type="date" name="update_at" id="" class="form-control" value="<?=$s_update_at?>"></div>
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
