<?php
    include_once('../layout/header.php');
?>
<?php
    require_once("../connect.php");
?>
<?php
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

        $s_create_at = $_POST['create_at'];

        if(isset($_FILES['image'])){
            $file=$_FILES['image'];
            $file_name=$file['name'];
            move_uploaded_file($file['tmp_name'],'../Assets/image/'.$file_name);
        }  
            // Kiểm tra id_cvu hoặc id_nv có bị trùng hay không
            $sql = "SELECT * FROM admin WHERE username = '$username'";
                
            // Thực thi câu truy vấn
            $result = mysqli_query($con, $sql);
                
            // Nếu kết quả trả về lớn hơn 1 thì nghĩa là id_cvu hoặc id_nv đã tồn tại trong CSDL
            if (mysqli_num_rows($result) > 0)
            {
                // Sử dụng javascript để thông báo
                echo '<script language="javascript">alert("Acc này có ng dùng rồi"); window.location="admin.php";</script>';
                    
                // Dừng chương trình
                die ();
            }  
            else{
        $sql = "INSERT INTO `admin`(`id_admin`, `username`, `password`, `image`, `ten_admin`, `ngay_sinh`, `gioi_tinh`, `sdt`, `email`, `que`, `id_cvu`, `create_at`, `update_at`) VALUES 
        ('','$username','$pass_md5','$file_name','$sten_admin','$sngay_sinh','$sgioi_tinh','$ssdt','$semail','$sque','$sid_cvu','$s_create_at','$s_create_at')";      
        $query=mysqli_query($con,$sql);
        if($query){
            header("location: admin.php"); 
        }
        else{
            echo 'lỗi';
        }
    }
}
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lý admin</h2>        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lý admin</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Thêm admin</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Thêm  admin </h5>
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
                        <div class="col-sm-10"><input type="text" class="form-control" name="username" placeholder="Tên username" ></div>
                    </div>
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập password</label>
                        <div class="col-sm-10"><input type="password" class="form-control" name="password" placeholder="Nhập password" ></div>
                    </div>
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tên admin</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="ten_admin" placeholder="Tên admin" ></div>
                    </div>
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10"><input type="file" class="form-control" name="image"></div>
                    </div>
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Ngày sinh</label>
                        <div class="col-sm-10"><input type="date" name="ngay_sinh" id="" class="form-control"></div>
                    </div> 
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Giới tính</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="gioi_tinh" placeholder="Giới tính"></div>
                    </div>
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Số điện thoại</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="sdt" placeholder="Số điện thoại"></div>
                    </div>
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Gmail</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="email" placeholder="Nhập email"></div>
                    </div>
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Quê quán</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="que" placeholder="Nhập quê quán"></div>
                    </div>    
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên chức vụ</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_cvu"  >
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
                    <div class="form-group row"><label class="col-sm-2 col-form-label">Ngày nhập</label>
                        <div class="col-sm-10"><input type="date" name="create_at" id="" class="form-control"></div>
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