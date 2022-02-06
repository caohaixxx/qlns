<?php
    include_once('../layout/header.php');
?>
<?php  
    require_once('../connect.php');

    $id_task=$_GET['id_task'];
    $query=mysqli_query($con,"select * from `task` where id_task='$id_task'");
    $row=mysqli_fetch_assoc($query);

    if(isset($_POST['submit'])){

        $ten_task=$_POST['ten_task'];
        $s_id_nv = $_POST['id_nv'];

        $s_id_project = $_POST['id_project'];
        if($id_task != ''){
            //update
            $sql = "UPDATE `task` SET `ten_task`='$ten_task',`id_nv`='$s_id_nv',`id_project`='$s_id_project' WHERE id_task=".$id_task;           
            $query=mysqli_query($con,$sql);
            if($query){
                header("location: task.php"); 
            }
            else{
                echo 'lỗi';
            } 
        } 
        else
        {
        $sql=("INSERT INTO `task`(`id_task`, `ten_task`, `id_nv`, `id_project`) VALUES ('$id_task','$ten_task','$s_id_nv','$s_id_project')");
        $query=mysqli_query($con,$sql);
        if($query){
            header("location: task.php"); 
        }
        else{
            echo 'lỗi';
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
                <?php if($id_task == ''){ ?>
                <?php }else {              
                ?>
                <div class="ibox-content">
                    <form action="" method="post">
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tên task</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="ten_task" placeholder="Tên task" value="<?php echo $row['ten_task'] ?>" ></div>
                </div>
                <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên Nhân viên</label>
                    <div class="col-sm-10"><select class="form-control" name="id_nv"  >
                        <option>-- Chọn nhân viên --</option>
                        <?php
                            $sql = 'SELECT * from nv';
                            $users=mysqli_query($con,$sql);
                            foreach ($users as $data) {
                                echo '<option value='. $data['id_nv'] . '>'. $data['ten_nv'] . '</option>';                              
                            }
                        ?> 
                    </select> </div>
                </div> 
                <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên Project</label>
                    <div class="col-sm-10"><select class="form-control" name="id_project"  >
                        <option>-- Chọn Project --</option>
                        <?php
                            $sql = 'SELECT * from project';
                            $users=mysqli_query($con,$sql);
                            foreach ($users as $data) {
                                echo '<option value='. $data['id_project'] . '>'. $data['ten_project'] . '</option>';                              
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
