<?php
    include_once('../layout/header.php');
?>
<?php  
    require_once('../connect.php');

    $id_team=$_GET['id_team'];
    $query=mysqli_query($con,"select * from `team` where id_team='$id_team'");
    $row=mysqli_fetch_assoc($query);

    $s_create_at=$s_update_at=$ten_team=NULL;
    if(isset($_POST['submit'])){

        $ten_team=$_POST['ten_team'];
        $s_create_at = $_POST['create_at'];

        $s_update_at = $_POST['update_at'];
        if($id_team != ''){
            //update
            $sql = "UPDATE `team` SET `ten_team`='$ten_team',`update_at`='$s_update_at' WHERE id_team=".$id_team;           
            $query=mysqli_query($con,$sql);
            if($query){
                header("location: team.php"); 
            }
            else{
                echo 'lỗi';
            } 
        } 
        else{
            $sql=("select * from team where ten_team='$ten_team'");      
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result)>0){
            
            echo '<script language="javascript">alert("Đã có team này rồi ! vui lòng nhập team khác"); window.location="teams.php";</script>';
            die ();
        }
        else
        {
        $sql=("INSERT INTO `team`(`id_team`, `ten_team`, `create_at`, `update_at`) VALUES ('$id_team','$ten_team','$s_create_at','$s_create_at')");
        $query=mysqli_query($con,$sql);
        if($query){
            header("location: team.php"); 
        }
        else{
            echo 'lỗi';
        }
    }
}
        }

        
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
                    <h5>Thêm chấm công </h5>
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
                <?php if($id_team == ''){ ?>
                <?php }else {              
                ?>
                <div class="ibox-content">
                    <form action="" method="post">
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tên team</label>
                            <input type=hidden name="id_team" value="<?=$id_team?>" />
                            <div class="col-sm-10"><input type="text" class="form-control" name="ten_team" placeholder="Tên team" value="<?php echo $row['ten_team'] ?>" ></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Ngày sửa</label>
                                <div class="col-sm-10"><input type="date" name="update_at" id="" class="form-control" value="<?php echo $row['update_at'] ?>"></div>
                            </div>  
                        <div class="modal-footer"> 
                            <button class="btn btn-primary" type="submit" name="submit">Lưu lại</button> 
                        </div>  
                    </form>          
                </div>
                <?php } ?>     
            </div>
        </div>
    </div>
</div>
<?php
    include_once('../layout/footer.php');
?>
