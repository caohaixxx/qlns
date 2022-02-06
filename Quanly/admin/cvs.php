<?php
include_once('../layout/header.php');
?>
<?php  
  require_once('../connect.php');
   
 $id_cvu=$_GET['id_cvu'];   
 $query=mysqli_query($con,"select *from cv where id_cvu ='$id_cvu'");
 $data=mysqli_fetch_assoc($query);   

    if(!empty($_POST)){      
        if(isset($_POST['id_cvu'])){
            $id_cvu = $_POST['id_cvu'];
        }
        if(isset($_POST['ten_cv'])){
            $s_ten_cv = $_POST['ten_cv'];
        }
        if(isset($_POST['hs_luong_cv'])){
            $s_hs_luong_cv = $_POST['hs_luong_cv'];
        }
        if(isset($_POST['hs_l_tangca'])){
            $s_hs_l_tangca = $_POST['hs_l_tangca'];
        }
        if(isset($_POST['phu_cap'])){
            $s_phu_cap = $_POST['phu_cap'];
        }
        if(isset($_POST['create_at'])){
            $s_create_at = $_POST['create_at'];
        }
        if(isset($_POST['update_at'])){
            $s_update_at = $_POST['update_at'];
        }
        
        $s_ten_cv= str_replace('\'','\\\'',$s_ten_cv);
        $s_hs_l_tangca= str_replace('\'','\\\'',$s_hs_l_tangca);
        $s_hs_luong_cv= str_replace('\'','\\\'',$s_hs_luong_cv);
        $s_phu_cap= str_replace('\'','\\\'',$s_phu_cap);

        if($id_cvu != ''){
            //update
            $sql = "UPDATE `cv` SET `ten_cv`='$s_ten_cv',`hs_luong_cv`='$s_hs_luong_cv',`hs_l_tangca`='$s_hs_l_tangca',`phu_cap`='$s_phu_cap',`update_at`='$s_update_at' WHERE id_cvu=".$id_cvu;
            $query=mysqli_query($con,$sql);
            header("location: cv.php");  
        }     
        else{
            $conn = mysqli_connect('localhost', 'root', '', 'quanlynhansu') or die ('Lỗi kết nối');
            mysqli_set_charset($conn, "utf8");
      
            // Kiểm tra hs_luong_cv hoặc ten_cv có bị trùng hay không
            $sql = "SELECT * FROM cv WHERE ten_cv = '$s_ten_cv'";
                
            // Thực thi câu truy vấn
            $result = mysqli_query($conn, $sql);
                
            // Nếu kết quả trả về lớn hơn 1 thì nghĩa là hs_luong_cv hoặc ten_cv đã tồn tại trong CSDL
            if (mysqli_num_rows($result) > 0)
            {
                // Sử dụng javascript để thông báo
                echo '<script language="javascript">alert("Đã có chức vụ này rồi ! vui lòng nhập chức vụ khác"); window.location="user.php";</script>';
                    
                // Dừng chương trình
                die ();
            }
            else{
            //insert 
            $sql = "INSERT INTO `cv`(`id_cvu`,`ten_cv`,`hs_luong_cv`, `hs_l_tangca`, `phu_cap`, `create_at`, `update_at`) VALUES ('$id_cvu','$s_ten_cv','$s_hs_luong_cv','$s_hs_l_tangca','$s_phu_cap','$s_create_at','$s_create_at')";
            $query=mysqli_query($con,$sql);
            header("location: cv.php");           
            }                 
        }       
    }
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lý chức vụ</h2>        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lý chức vụ</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Sửa chức vụ</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Sửa chức vụ </h5>
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
                            <input type=hidden name="id_cvu" value="<?php echo $id_cvu?>" />
                            <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tên chức vụ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ten_cv" value="<?php echo $data['ten_cv']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập hệ số lương</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="hs_luong_cv" value="<?php echo $data['hs_luong_cv']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập lương tăng ca</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="hs_l_tangca" value="<?php echo $data['hs_l_tangca']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập phụ cấp</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="phu_cap" value="<?php echo $data['phu_cap']?>"></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Ngày sửa</label>
                            <div class="col-sm-10"><input type="date" name="update_at" id="" class="form-control" value="<?php echo $data['update_at']?>"></div>
                        </div>                        
                        <div class="modal-footer"> 
                            <button class="btn btn-primary" type="submit">Lưu lại</button> 
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