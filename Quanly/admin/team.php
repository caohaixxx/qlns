<?php
    include_once('../layout/header.php');
    require_once('../connect.php');
?>
<?php
    if(isset($_POST['id_team'])){
        $id = $_POST['id_team'];
        $sql='DELETE FROM team where id_team ='.$id;
        $query=mysqli_query($con,$sql);
    }
?>
<?php

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
        <h2>Quản lý team</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lý team</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách team</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Danh sách team </h5>
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
                              Thêm team
                        </a>
                    </p>                        
                    </div>
                    <div class="b">
                        <div class="row">
                            <div class="col-sm-10">
                                <form action="" method="get">
                                    <div class="input-group mb-10">
                                        <input type="Nhập tên team ..." class="form-control form-control-sm" id="search" name="s" placeholder="Tên team" />
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
                            <th>Tên team</th>
                            <th>Ngày tạo</th>
                            <th>Ngày nhập</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_GET['s']) && $_GET['s'] != '') {
                                $sql = 'SELECT * FROM team where ten_team like "%'.$_GET['s'].'%"';
                            } 
                            else {
                                $sql = 'SELECT * FROM team';
                            }
                            $team=mysqli_query($con,$sql);
                            $id=1;
                            foreach($team as $data){
                                echo '<tr>
                                    <td>'.$id++.'</td>
                                    <td>'.$data['ten_team'].'</td>
                                    <td>'.$data['create_at'].'</td>
                                    <td>'.$data['update_at'].'</td>
                                    <td>  
                                        <a type="button" class="btn btn-warning" href="tteam.php?id_team=' . $data['id_team'] . '">Thông tin</a>               
                                        <button type="button" class="btn btn-danger"onclick="xoa('.$data['id_team'].')">Xóa team</button>
                                        <a type="button" class="btn btn-primary" href="teams.php?id_team=' . $data['id_team'] . '">Cập nhật team</a>
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
    function xoa(id_team) {
        $('#xoa').modal('show');
        $("#xoa [name='id_team']").val(id_team);
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
                    <h4 class="modal-title">Xóa team</h4>
                </div>
                <form action="" method="post">
                    <!-- {{csrf_field()}} -->
                    <div class="modal-body">
                        <input type=hidden name="id_team" value="'.$data['id_team'].'" />
                        <p>Bạn có muốn xóa team này?</p>
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
                <h4 class="modal-title">Thêm team </h4>
            </div>
            <br>
            <form action="teams.php" method="post">
                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tên team</label>
                    <div class="col-sm-10"><input type="text" class="form-control" name="ten_team" placeholder="Tên team" ></div>
                </div>
                <div class="form-group row"><label class="col-sm-2 col-form-label">Ngày nhập</label>
                        <div class="col-sm-10"><input type="date" name="create_at" id="" class="form-control"></div>
                    </div>  
                <div class="modal-footer"> 
                    <button class="btn btn-primary" type="submit" name="submit">Lưu lại</button> 
                </div>  
            </form>   
        </div>
    </div>
</div>

