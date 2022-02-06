<?php
    include_once('../layout/header.php');
?>
<?php
    require_once("../connect.php");
?>
<?php
    $id_admin=$_GET['id_admin'];   
    $query=mysqli_query($con,"SELECT * FROM admin where id_admin='$id_admin'");
    $row=mysqli_fetch_assoc($query);  

    if(isset($_POST['submit'])){

        $sten_admin = $_POST['ten_admin'];
        $sngay_sinh = $_POST['ngay_sinh'];
        $sgioi_tinh = $_POST['gioi_tinh'];
        $ssdt = $_POST['sdt'];
        $semail = $_POST['email'];
        $sque = $_POST['que'];
        $username = $_POST['username'];
        if(!empty($_POST['id_cvu'])) {
            $sid_cvu = $_POST['id_cvu'];
        }
        $password = $_POST['password'];
        $pass_md5 = md5($password);

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
        $sql = "UPDATE `admin` SET `username`='$username',`password`='$pass_md5',`image`='$images',`ten_admin`='$sten_admin',`ngay_sinh`='$sngay_sinh',`gioi_tinh`='$sgioi_tinh',`sdt`='$ssdt',`email`='$semail',`que`='$sque',`id_cvu`='$sid_cvu',`update_at`='$s_update_at' WHERE id_admin=".$id_admin;
        $query=mysqli_query($con,$sql);
        if($query){
            header("location: admin.php"); 
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
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập username</label>
                            <input type=hidden name="id_admin" value="<?=$id_admin?>" />    
                            <div class="col-sm-10"><input type="text" class="form-control" name="username" placeholder="Tên username" value="<?php echo $row['username'] ?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập password</label>
                            <div class="col-sm-10"><input type="password" class="form-control" name="password" placeholder="Nhập password" value="<?php echo $row['password'] ?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tên admin</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ten_admin" placeholder="Tên admin" value="<?php echo $row['ten_admin'] ?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10"><input type="file" class="form-control" name="image" value="<?php echo $row['image'] ?>"></div>
                            <img src="../Assets/image/<?php echo $row['image'] ?>" width="100px" >
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Ngày sinh</label>
                            <div class="col-sm-10"><input type="date" name="ngay_sinh" id="" class="form-control" value="<?php echo $row['ngay_sinh'] ?>"></div>
                        </div> 
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Giới tính</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="gioi_tinh" placeholder="Giới tính" value="<?php echo $row['gioi_tinh'] ?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="sdt" placeholder="Số điện thoại" value="<?php echo $row['sdt'] ?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Gmail</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="email" placeholder="Nhập email" value="<?php echo $row['email'] ?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Quê quán</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="que" placeholder="Nhập quê quán" value="<?php echo $row['que'] ?>"></div>
                        </div>    
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên chức vụ</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_cvu" value="<?php echo $row['id_cvu'] ?>" >
                                    <option>-- Chọn chức vụ --</option>
                                    <?php
                                        $sql = 'SELECT * from cv';
                                        $users=mysqli_query($con,$sql);
                                        foreach ($users as $data) {
                                            echo '<option value='. $data['id_cvu'] . '>'. $data['ten_cv'] . '</option>';                              
                                        }
                                    ?> 
                                </select> '
                            </div>
                        </div>     
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Ngày sửa</label>
                            <div class="col-sm-10"><input type="date" name="update_at" id="" class="form-control " value="<?php echo $row['update_at'] ?>"></div>
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