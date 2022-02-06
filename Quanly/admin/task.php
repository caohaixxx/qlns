<?php
    include_once('../layout/header.php');
    require_once('../connect.php');
?>
<?php
    if(isset($_POST['id_task'])){
        $id = $_POST['id_task'];
        $sql='DELETE FROM task where id_task ='.$id;
        $query=mysqli_query($con,$sql);
    }
?>

<style>
    .a{
        float: left;
    }
    .b{
        margin-left: 400px;
    }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lý task</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lý task</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách task</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Danh sách task </h5>
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
                    <div class="a">
                    <p>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#add">
                              Thêm task
                        </a>
                    </p>                        
                    </div>
                    <div class="b">
                        <div class="row">
                            <div class="col-sm-10">
                                <form action="" method="get">
                                    <div class="input-group mb-10">
                                        <input type="Nhập tên task ..." class="form-control form-control-sm" id="search" name="s" placeholder="Tên task" />
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary">Go!</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                   
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên task</th>
                            <th>Tên nhân viên</th>
                            <th>Tên project</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_GET['s']) && $_GET['s'] != '') {
                                $sql = 'SELECT task.id_task,task.ten_task,nv.ten_nv,project.ten_project FROM task JOIN nv ON task.id_nv=nv.id_nv JOIN project ON task.id_project=project.id_project where ten_task like "%'.$_GET['s'].'%"';
                            } 
                            else {
                                $sql = 'SELECT task.id_task,task.ten_task,nv.ten_nv,project.ten_project FROM task JOIN nv ON task.id_nv=nv.id_nv JOIN project ON task.id_project=project.id_project';
                            }
                            $task=mysqli_query($con,$sql);
                            $id=1;
                            foreach($task as $data){
                                echo '<tr>
                                    <td>'.$id++.'</td>
                                    <td>'.$data['ten_task'].'</td>
                                    <td>'.$data['ten_nv'].'</td>
                                    <td>'.$data['ten_project'].'</td>
                                    <td>  
                                        <button type="button" class="btn btn-danger" onclick="xoa('.$data['id_task'].')">Xóa task</button>
                                        <a type="button" class="btn btn-primary" href="tasks.php?id_task=' . $data['id_task'] . '">Cập nhật task</a>
                                    </td>
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
<script type="text/javascript">
    function xoa(id_task) {
        $('#xoa').modal('show');
        $("#xoa [name='id_task']").val(id_task);
    };
</script>
<?php
    include_once('../layout/footer.php');
?>
<div class="modal fade" id="xoa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-header">
                    <h4 class="modal-title">Xóa task</h4>
                </div>
                <form action="" method="post">
                    <!-- {{csrf_field()}} -->
                    <div class="modal-body">
                        <input type=hidden name="id_task" value="'.$data['id_task'].'" />
                        <p>Bạn có muốn xóa task này?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Đồng ý</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
            <div class="card-header">
                <h4 class="modal-title">Thêm task </h4>
            </div>
            <br>
            <form action="tasks.php" method="post">
                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tên task</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="ten_task" placeholder="Tên task" ></div>
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
    </div>
</div>

