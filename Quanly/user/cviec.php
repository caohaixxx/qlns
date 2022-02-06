<?php
    include_once('../layout/header1.php');
?>
<?php
require_once('../connect.php');
require_once('../session1.php');
?>
 <?php
 $sql="SELECT task.id_task,task.ten_task,nv.ten_nv,project.ten_project FROM task JOIN project ON project.id_project=task.id_project JOIN nv ON nv.id_nv=task.id_nv where nv.id_nv='$session_id1'";
 $result=mysqli_query($con,$sql);
 $data=mysqli_fetch_array($result);
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lý lương</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="master.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Thông tin lương</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Thông tin công việc</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
                <div class="ibox ">
                <div class="ibox-title">
                    <h5> Thông tin lương</h5>
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td> ID task</td>
                                <td> Tên task</td>
                                <td> Tên nhân viên</td>
                                <td> Tên project</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>                   
                                <td> <?php echo $data['id_task'] ?></td>
                                <td> <?php echo $data['ten_task'] ?></td>
                                <td> <?php echo $data['ten_nv'] ?></td>
                                <td> <?php echo $data['ten_project'] ?></td>
                                </tr>              
                        </tbody>
                    </table> 
                </div>
                </div>
        </div>
    </div>
</div>
<?php
    include_once('../layout/footer.php');
?>