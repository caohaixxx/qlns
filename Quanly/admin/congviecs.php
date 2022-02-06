<?php
    include_once('../layout/header.php');
?>
<?php  
    require_once('../connect.php');

    $id_project=$_GET['id_project'];
    $query=mysqli_query($con,"select * from `project` where id_project='$id_project'");
    $row=mysqli_fetch_assoc($query);

    if(isset($_POST['submit'])){

        $ten_project=$_POST['ten_project'];
        $thong_tin=$_POST['thong_tin'];
        $ghi_chu=$_POST['ghi_chu'];
        $id_project=$_POST['id_project'];
        $id_team=$_POST['id_team'];

        if($id_project != ''){
            //update
            $sql = "UPDATE `project` SET `ten_project`='$ten_project',`thong_tin`='$thong_tin',`ghi_chu`='$ghi_chu',`id_team`='$id_team' WHERE id_project=".$id_project;           
            $query=mysqli_query($con,$sql);
            if($query){
                header("location: congviec.php"); 
            }
            else{
                echo 'lỗi';
            } 
        } 
        else{
        $sql=("select * from project where ten_project='$ten_project'");      
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result)>0){
            
            echo '<script language="javascript">alert("Đã có project này rồi ! vui lòng nhập project khác"); window.location="congviecs.php";</script>';
            die ();
        }
        else
        {
        $sql=("INSERT INTO `project`(`id_project`, `ten_project`, `thong_tin`, `ghi_chu`,`id_team`) VALUES ('$id_project','$ten_project','$thong_tin','$ghi_chu','$id_team')");
        $query=mysqli_query($con,$sql);
        if($query){
            header("location: congviec.php"); 
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
                <?php if($id_project == ''){ ?>
                <?php }else {              
                ?>
                <div class="ibox-content">
                    <form action="" method="post">
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tên project</label>
                    <input type=hidden name="id_project" value="<?=$id_project?>" />
                        <div class="col-sm-10"><input type="text" class="form-control" name="ten_project" placeholder="Tên project" value="<?php echo $row['ten_project'] ?>" ></div>
                    </div>
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập thông tin</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="thong_tin" placeholder="Thông tin" value="<?php echo $row['thong_tin'] ?>" ></div>
                    </div>  
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập ghi chú</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="ghi_chu" placeholder="Ghi chú" value="<?php echo $row['ghi_chu'] ?>" ></div>
                    </div>    
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên team</label>
                        <div class="col-sm-10"><select class="form-control" name="id_team" value="<?php echo $row['id_team'] ?> ">
                            <option>-- Chọn team --</option>
                            <?php
                                $sql = 'SELECT * from team';
                                $users=mysqli_query($con,$sql);
                                foreach ($users as $data) {
                                    echo '<option value='. $data['id_team'] . '>'. $data['ten_team'] . '</option>';                              
                                }
                            ?> 
                        </select> </div>
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
