<?php
    include_once('../layout/header1.php');
?>
<?php
require_once('../connect.php');
$sid=$sten_nv=$sngay_sinh=$sgioi_tinh=$ssdt=$semail=$sque=$sphong_ban=$shop_dong=$sngay_hieu_luc=$sid_nguoidung='';


$query=mysqli_query($con,"SELECT nv.id_nv,nv.ten_nv,nv.ngay_sinh,nv.gioi_tinh,nv.sdt,nv.email,nv.que,nv.phong_ban,nv.hop_dong,nv.ngay_hieu_luc FROM nv where id_nv=".$data['id_nv']); 
$data=mysqli_fetch_array($query);

   if(!empty($_POST)){      

       if(isset($_POST['id_nv'])){
           $sid = $_POST['id_nv'];
       }
       if(isset($_POST['ten_nv'])){
           $sten_nv = $_POST['ten_nv'];
       }
       if(isset($_POST['ngay_sinh'])){
           $sngay_sinh = $_POST['ngay_sinh'];
       }
       if(isset($_POST['gioi_tinh'])){
           $sgioi_tinh = $_POST['gioi_tinh'];
       }
       if(isset($_POST['sdt'])){
           $ssdt = $_POST['sdt'];
       }
       if(isset($_POST['email'])){
           $semail = $_POST['email'];
       }
       if(isset($_POST['que'])){
           $sque = $_POST['que'];
       }
       if(isset($_POST['phong_ban'])){
            $sphong_ban = $_POST['phong_ban'];
        }
        if(isset($_POST['hop_dong'])){
            $shop_dong = $_POST['hop_dong'];
        }
        if(isset($_POST['ngay_hieu_luc'])){
            $sngay_hieu_luc = $_POST['ngay_hieu_luc'];
        }
        
        

        $sid= str_replace('\'','\\\'',$sid);
        $sten_nv= str_replace('\'','\\\'',$sten_nv);
        $ssdt= str_replace('\'','\\\'',$ssdt);
        $semail= str_replace('\'','\\\'',$semail);
        $sque= str_replace('\'','\\\'',$sque);
        $sphong_ban= str_replace('\'','\\\'',$sphong_ban);

       if($sid != ''){
           //update
           $sql = "UPDATE `nv` SET `ten_nv`='$sten_nv',`ngay_sinh`='$sngay_sinh',`gioi_tinh`='$sgioi_tinh',`sdt`='$ssdt',`email`='$semail',`que`='$sque',`phong_ban`='$sphong_ban',`hop_dong`='$shop_dong',`ngay_hieu_luc`='$sngay_hieu_luc'  WHERE id_nv=".$sid;
           $query=mysqli_query($con,$sql);
          header("location: nhanvien.php");  
        
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
                    <form action="" method="post">                        
                            <input type=hidden name="id_nv" value="<?=$data['id_nv']?>" />                
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên nhân viên</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ten_nv"  value="<?=$data['ten_nv']?>"></div>
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