<?php
    include('../layout/header1.php')
?>
<?php  
  require_once('../connect.php');  

    if(!empty($_POST)){    
        if(isset($_POST['id_nv'])){
            $s_id = $_POST['id_nv'];
        }
        if(isset($_POST['password'])){
            $s_password = $_POST['password'];
        }
        if(isset($_POST['spassword'])){
            $ss_password = $_POST['spassword'];
        }  
        $pass_md5 = md5($ss_password);
        //update
        $sql = "UPDATE `nv` SET `password`='$pass_md5' WHERE id_nv=".$s_id;
        $query=mysqli_query($con,$sql);
        header("location: index.php");
    }
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Đổi mật khẩu</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Đổi mật khẩu</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Đổi mật khẩu</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Đổi mật khẩu </h5>
                </div>
                <div class="ibox-content">
                    <form action="" method="post">
                            <input type=hidden name="id_nv" value=" <?=$data['id_nv'] ?>" />
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Mật khẩu cũ</label>
                            <div class="col-sm-10"><input type="password" class="form-control" name="password" value="<?=$data['password']?>"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập password mới </label>
                            <div class="col-sm-10"><input type="password" class="form-control" name="spassword" ></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label"> Nhập lại mật khẩu</label>
                            <div class="col-sm-10"><input type="password" name="spassword" id="" class="form-control"></div>
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
    include('../layout/footer.php')
?>