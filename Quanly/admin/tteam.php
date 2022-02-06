<?php
    include_once('../layout/header.php');
?>
<?php
    require_once("../connect.php");
?>
<?php
    $id_team=$_GET['id_team'];   
    $query=mysqli_query($con,"SELECT nv.ten_nv,team.ten_team FROM team JOIN nv ON nv.id_team=team.id_team WHERE team.id_team='$id_team'");
    $data=mysqli_fetch_array($query);
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lý team</h2>        
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lý team</a>
            </li>
            <li class="breadcrumb-item active">
                <strong> Xử lý team</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Thông tin team <?php echo $data['ten_team']?> </h5>
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
                                <th>#</th>
                                <th>Tên nhân viên</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id=1;
                            foreach($query as $data){
                                echo '<tr>
                                    <td>'.$id++.'</td>
                                    <td>'.$data['ten_nv'].'</td>
                            </tr>'; 
                            }
                            ?>   
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