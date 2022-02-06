<?php
    include_once('../layout/header.php');
?>
<?php
    require_once("../connect.php");
?>
<?php
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

        $s_create_at = $_POST['create_at'];

        if(isset($_FILES['image'])){
            $file=$_FILES['image'];
            $file_name=$file['name'];
            move_uploaded_file($file['tmp_name'],'../Assets/image/'.$file_name);
        }  
            // Kiểm tra id_cvu hoặc id_nv có bị trùng hay không
            $sql = "SELECT * FROM nv WHERE username = '$username'";
                
            // Thực thi câu truy vấn
            $result = mysqli_query($con, $sql);
                
            // Nếu kết quả trả về lớn hơn 1 thì nghĩa là id_cvu hoặc id_nv đã tồn tại trong CSDL
            if (mysqli_num_rows($result) > 0)
            {
                // Sử dụng javascript để thông báo
                echo '<script language="javascript">alert("Acc này có ng dùng rồi"); window.location="nhanvien.php";</script>';
                    
                // Dừng chương trình
                die ();
            }  
            else{
        $sql = "INSERT INTO nv(username,password,image, ten_nv, ngay_sinh, gioi_tinh, sdt, email, que, phong_ban, id_cvu,id_team, hop_dong, ngay_hieu_luc,  create_at, update_at) VALUES 
        ('$username','$md5_pass','$file_name','$sten_nv','$sngay_sinh','$sgioi_tinh','$ssdt','$semail','$sque','$sphong_ban','$sid_cvu','$sid_team','$shop_dong','$sngay_hieu_luc','$s_create_at','$s_create_at')";      
        $query=mysqli_query($con,$sql);
        if($query){
            header("location: nhanvien.php"); 
        }
        else{
            echo 'lỗi';
        }
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
                    <h5>Thêm  nhân viên </h5>
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
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10"><input type="file" class="form-control" name="image"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="username" placeholder="Nhập username"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label"> Nhập Password</label>
                            <div class="col-sm-10"><input type="password" class="form-control" name="password" placeholder="Nhập password"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên nhân viên</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ten_nv" placeholder="Nhập tên nhân viên"></div>
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
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Phòng ban</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="phong_ban" placeholder="Nhập phòng ban"></div>
                        </div>  
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên chức vụ</label><div class="col-sm-10">     
                            <select class="form-control" name="id_cvu">
                                <option>-- Chọn chức vụ --</option>
                                <?php
                                    $sql = 'SELECT * from cv';
                                    $users = mysqli_query($con,$sql);
                                    foreach ($users as $data) {
                                        echo '<option value='. $data['id_cvu'] . '>'. $data['ten_cv'] . '</option>';                              
                                    }
                                ?> 
                            </select> 
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên team</label><div class="col-sm-10">     
                            <select class="form-control" name="id_team">
                                <option>-- Chọn Team --</option>
                                <?php
                                    $sql = 'SELECT * from team';
                                    $users = mysqli_query($con,$sql);
                                    foreach ($users as $data) {
                                        echo '<option value='. $data['id_team'] . '>'. $data['ten_team'] . '</option>';                              
                                    }
                                ?> 
                            </select> 
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Hợp đồng</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="hop_dong" placeholder="Hợp đồng mấy năm"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Ngày hiệu lực</label>
                            <div class="col-sm-10"><input type="date" class="form-control" name="ngay_hieu_luc"></div>
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