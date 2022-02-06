<?php
    include_once('../layout/header1.php');
?>
<?php
    require_once('../connect.php');
?>
<?php

    if(isset($_POST['submit'])){
        $sid=$_POST['id_nv'];
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

        $sql = "UPDATE `nv` SET `image`='$images', `ten_nv`='$sten_nv',`ngay_sinh`='$sngay_sinh',`gioi_tinh`='$sgioi_tinh',`sdt`='$ssdt',`email`='$semail',`que`='$sque',`phong_ban`='$sphong_ban',`hop_dong`='$shop_dong',`ngay_hieu_luc`='$sngay_hieu_luc',`update_at`='$s_update_at'  WHERE id_nv=".$sid;
        echo $sql;
        $query=mysqli_query($con,$sql);
        if($query){
            header("location: thongtin.php"); 
        }
        else{
            echo 'lỗi';
        }
    }
?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Thông tin cá nhân </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="master.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Thông tin cá nhân </a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Thông tin </strong>
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
                        <div class="row">
                        <div class="col-lg-4 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="img-fluid" src="../Assets/image/<?php echo $data['image']; ?> ?>" alt="Card image cap" style="height:auto;width:auto">
                            <div class="card-body">
                                <h3 class="card-title" style="font-family: 'Roboto Condensed', sans-serif;">Ảnh đại diện</h3>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-8 col-sm-12 col-xs-12">
                            <h4 class="mb-4" style="font-family: 'Roboto Condensed', sans-serif;">Xin chào, <strong> <?php echo $data['ten_nv']; ?> </strong>!</h4>
                            <h5 class="mb-4" style="font-family: 'Roboto Condensed', sans-serif;">Tên tài khoản: <strong> <?php echo $data['username']; ?> </strong></h5>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên người dùng</label>
                            <input type=hidden name="id_nv" value="<?=$data['id_team']?>" />
                            <div class="col-sm-10"><h4><?php echo  $data['username'] ?></h4></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên nv</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ten_nv"  value="<?php echo $data['ten_nv']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Ngày sinh</label>
                            <div class="col-sm-10"><input type="date" class="form-control" name="ngay_sinh"  value="<?=$data['ngay_sinh']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Giới tính</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="gioi_tinh"  value="<?=$data['gioi_tinh']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="sdt"  value="<?=$data['sdt']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Gmail</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="email"  value="<?=$data['email']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Quê quán</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="que"  value="<?=$data['que']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Phòng ban</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="phong_ban"  value="<?=$data['phong_ban']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Hợp đồng</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="hop_dong"  value="<?=$data['hop_dong']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Ngày hiệu lực</label>
                            <div class="col-sm-10"><input type="date" class="form-control" name="ngay_hieu_luc"  value="<?=$data['ngay_hieu_luc']?>"></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Ngày sửa</label>
                            <div class="col-sm-10"><input type="date" name="update_at" id="" class="form-control"  value="<?=$data['update_at']?>"></div>
                        </div> 

                        <div class="modal-footer"> 
                            <button class="btn btn-primary" type="submit" name="submit">Lưu lại</button> 
                        </div> 
                        </div>
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