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
        $sten_nv = $_POST['ten_nv'];
        $sngay_sinh = $_POST['ngay_sinh'];
        $sgioi_tinh = $_POST['gioi_tinh'];
        $ssdt = $_POST['sdt'];
        $semail = $_POST['email'];
        $sque = $_POST['que'];
        $sphong_ban = $_POST['phong_ban'];
        if(!empty($_POST['id_cvu'])) {
            $sid_cvu = $_POST['id_cvu'];
        }
        if(!empty($_POST['id_team'])) {
            $sid_team = $_POST['id_team'];
        }
        $shop_dong = $_POST['hop_dong'];
        $sngay_hieu_luc = $_POST['ngay_hieu_luc'];
        $s_update_at = $_POST['update_at'];

        if(empty($_FILES['image']['name'])){
            $images=$data['image'];
        }
        else{
            $file=$_FILES['image'];
            $file_name=$file['name'];
            move_uploaded_file($file['tmp_name'],'../Assets/image/'.$file_name);
            $images=$file_name;
        } 
        $sql = "UPDATE `nv` SET `username`='$username',`password`='$md5_pass',`image`='$images', `ten_nv`='$sten_nv',`ngay_sinh`='$sngay_sinh',`gioi_tinh`='$sgioi_tinh',`sdt`='$ssdt',`email`='$semail',`que`='$sque',`phong_ban`='$sphong_ban',`id_cvu`='$sid_cvu',`id_team`='$sid_team',`hop_dong`='$shop_dong',`ngay_hieu_luc`='$sngay_hieu_luc',`update_at`='$s_update_at'  WHERE id_nv=".$id_nv;
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
                <strong> Xử lý nhân viên</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Xử lý nhân viên </h5>
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
                            <div class="col-sm-10"><input type="text" class="form-control" name="username"  value="<?php echo $row['username']?>"></div>
                        </div>                      
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên chức vụ</label><div class="col-sm-10">     
                            <select class="form-control" name="id_cvu" value="<?php echo $row ['id_cvu']?>">
                                <option>-- Chọn chức vụ--</option>
                                <?php
                                    $sql = 'SELECT * from cv';
                                    $users =mysqli_query($con,$sql);
                                    foreach ($users as $data) {
                                        echo '<option value='. $data['id_cvu'] . '>'. $data['ten_cv'] . '</option>' ;                              
                                    }
                                ?> 
                            </select> 
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10"><input type="file" class="form-control" name="image" value="<?php echo $row['image']?>" >
                            <img src="../Assets/image/<?php echo $row['image']?>" width="100px" >
                        </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên nhân viên</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ten_nv"  value="<?php echo $row['ten_nv']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Ngày sinh</label>
                            <div class="col-sm-10"><input type="date" class="form-control" name="ngay_sinh"  value="<?php echo $row['ngay_sinh']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Giới tính</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="gioi_tinh"  value="<?php echo $row['gioi_tinh']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="sdt"  value="<?php echo $row['sdt']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Gmail</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="email"  value="<?php echo $row['email']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Quê quán</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="que"  value="<?php echo $row['que']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Phòng ban</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="phong_ban"  value="<?php echo $row['phong_ban']?>"></div>
                        </div>  
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên team</label><div class="col-sm-10">     
                            <select class="form-control" name="id_team">
                                <option>-- Chọn Team --</option>
                                <?php
                                    $sql = 'SELECT * from team';
                                    $users=mysqli_query($con,$sql);
                                    foreach ($users as $data) {
                                        echo '<option value='. $data['id_team'] . '>'. $data['ten_team'] . '</option>';                              
                                    }
                                ?> 
                            </select> 
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Hợp đồng</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="hop_dong"  value="<?php echo $row['hop_dong']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Ngày hiệu lực</label>
                            <div class="col-sm-10"><input type="date" class="form-control" name="ngay_hieu_luc"  value="<?php echo $row['ngay_hieu_luc']?>"></div>
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