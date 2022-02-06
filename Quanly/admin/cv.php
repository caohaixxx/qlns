<?php
include_once('../layout/header.php');
?>
<?php
    require_once('../connect.php');
    $result = mysqli_query($con, "SELECT * FROM cv");
    mysqli_close($con);
?>  
<?php
    if(isset($_POST['id_cvu'])){
        $id = $_POST['id_cvu'];
        $sql='DELETE FROM cv where id_cvu ='.$id;
        $query=mysqli_query($con,$sql);
    }
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lý chức vụ</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lý chức vụ</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách chức vụ</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
                <div class="ibox-title">
                    <h5>Danh sách chức vụ </h5>
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
                     <p>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#add">
                              Thêm chức vụ
                        </a>
                    </p> 
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên chức vụ</th>
                                <th>Hệ số lương </th>
                                <th>Lương tăng ca</th>
                                <th>Phụ cấp</th>
                                <th>Ngày nhập</th>
                                <th>Ngày sửa</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id=1;
                                while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td> <?= ($id++) ?></td>
                                <td><?= $row['ten_cv'] ?></td>
                                <td><?= $row['hs_luong_cv'] ?></td>
                                <td><?= $row['hs_l_tangca'] ?></td>
                                <td><?= $row['phu_cap'] ?></td>
                                <td><?= $row['create_at']?></td>
                                <td><?= $row['update_at'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger"onclick="xoa('<?= $row['id_cvu'] ?>')">Xóa chức vụ</button>
                                    <a type="button" class="btn btn-primary" href="cvs.php?id_cvu=<?=$row['id_cvu']?>">Cập nhật chức vụ</a>
                                </td>
                            </tr>
                        <?php } ?>               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function xoa(id_cvu) {
        $('#xoa').modal('show');
        $("#id_cvu").val(id_cvu);
    };
</script>
<div class="modal fade" id="xoa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-header">
                    <h4 class="modal-title">Xóa chức vụ</h4>
                </div>
                <form action="" method="post">
                    <!-- {{csrf_field()}} -->
                    <div class="modal-body">
                        <input type=hidden name="id_cvu" id="id_cvu" />
                        <p>Bạn có muốn xóa chức vụ này?</p>
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
<?php
include_once('../layout/footer.php');
?>
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
            <div class="card-header">
                <h4 class="modal-title">Thêm công việc </h4>
            </div>
            <br>
            <form action="cvs.php" method="post">
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên chức vụ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ten_cv" placeholder="Nhập tên chức vụ"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Hệ số lương</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="hs_luong_cv" placeholder="Hệ số lương"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Lương tăng ca</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="hs_l_tangca" placeholder="Lương tăng ca"></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Phụ cấp</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="phu_cap" placeholder="Phụ cấp"></div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">Ngày nhập</label>
                            <div class="col-sm-10"><input type="date" name="create_at" id="" class="form-control" value="<?=$s_update_at?>"></div>
                        </div>                       
                        <div class="modal-footer"> 
                            <button class="btn btn-primary" type="submit" name="dangky" >Lưu lại</button> 
                        </div>  
                    </form>  
        </div>
    </div>
</div>