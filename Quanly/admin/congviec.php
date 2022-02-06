<?php
    include_once('../layout/header.php');
    require_once('../connect.php');
?>
<?php
    if(isset($_POST['id_project'])){
        $id = $_POST['id_project'];
        $sql='DELETE FROM project where id_project ='.$id;
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
        <h2>Quản lý project</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lý project</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách project</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Danh sách Project </h5>
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
                              Thêm Project
                        </a>
                    </p>                        
                    </div>
                    <div class="b">
                        <div class="row">
                            <div class="col-sm-10">
                                <form action="" method="get">
                                    <div class="input-group mb-10">
                                        <input type="text" class="form-control form-control-sm" name="s" placeholder="Tên Project" />
                                        <input type="text" class="form-control form-control-sm" name="a" placeholder="Tên Team" />
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
                            <th>Tên project</th>
                            <th>Thông tin</th>
                            <th>Ghi chú</th>
                            <th>Team</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_GET['s']) && $_GET['s'] != '') {
                                $sql = 'SELECT project.id_project,project.ten_project,project.thong_tin,project.ghi_chu,team.ten_team FROM project JOIN team ON team.id_team=project.id_team where ten_project like "%'.$_GET['s'].'%"';
                                if (isset($_GET['a']) && $_GET['a'] != ''){
                                    $sql = 'SELECT project.id_project,project.ten_project,project.thong_tin,project.ghi_chu,team.ten_team FROM project JOIN team ON team.id_team=project.id_team where ten_team like "%'.$_GET['a'].'%"';
                                }
                                if (isset($_GET['s']) && $_GET['s'] != '' && ($_GET['a']) && $_GET['a'] != '' ) {
                                        $sql = 'SELECT project.id_project,project.ten_project,project.thong_tin,project.ghi_chu,team.ten_team FROM project JOIN team ON team.id_team=project.id_team where ten_project like "%'.$_GET['s'].'%" AND ten_team like "%'.$_GET['a'].'%" ';
                                }
                            } 
                            else {
                                $sql = 'SELECT project.id_project,project.ten_project,project.thong_tin,project.ghi_chu,team.ten_team FROM project JOIN team ON team.id_team=project.id_team';
                            }
                            $project=mysqli_query($con,$sql);
                            $id=1;
                            foreach($project as $data){
                                echo '<tr>
                                    <td>'.$id++.'</td>
                                    <td>'.$data['ten_project'].'</td>
                                    <td>'.$data['thong_tin'].'</td>
                                    <td>'.$data['ghi_chu'].'</td>
                                    <td>'.$data['ten_team'].'</td>
                                    <td>                                        
                                        <button type="button" class="btn btn-danger"onclick="xoa('.$data['id_project'].')">Xóa công</button>
                                        <a type="button" class="btn btn-primary" href="congviecs.php?id_project=' . $data['id_project'] . '">Cập nhật công</a>
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
    function xoa(id_project) {
        $('#xoa').modal('show');
        $("#id_project").val(id_project);
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
                    <h4 class="modal-title">Xóa project</h4>
                </div>
                <form action="" method="post">
                    <!-- {{csrf_field()}} -->
                    <div class="modal-body">
                        <input type=hidden name="id_project" id="id_project" />
                        <p>Bạn có muốn xóa project này?</p>
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
                <h4 class="modal-title">Thêm project </h4>
            </div>
            <br>
                <form action="congviecs.php" method="post">
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tên project</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="ten_project" placeholder="Tên project" ></div>
                    </div>
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập thông tin</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="thong_tin" placeholder="Thông tin" ></div>
                    </div>  
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập ghi chú</label>
                        <div class="col-sm-10"><input type="text" class="form-control" name="ghi_chu" placeholder="Ghi chú" ></div>
                    </div>    
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên team</label>
                            <div class="col-sm-10"><select class="form-control" name="id_team"  >
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
    </div>
</div>