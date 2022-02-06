<?php
    include_once('../layout/header.php');
    require_once('../connect.php');
?>
<?php
    if(isset($_POST['id_admin'])){
        $id = $_POST['id_admin'];
        $sql='DELETE FROM admin where id_admin ='.$id;
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
        <h2>Quản lý admin</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lý admin</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách admin</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Danh sách admin </h5>
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
                        <a href="adminss.php" class="btn btn-success">
                              Thêm admin
                        </a>
                    </p>                        
                    </div>
                    <div class="b">
                        <div class="row">
                            <div class="col-sm-10">
                                <form action="" method="get">
                                    <div class="input-group mb-10">
                                        <input type="search" class="form-control form-control-sm" id="search" name="s" placeholder="Tên username" />
                                        <input type="a" class="form-control form-control-sm" id="search" name="a" placeholder="Tên admin" />
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
                            <th>Image</th>
                            <th>Username</th>
                            <th>Tên admin</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>SĐT</th>
                            <th>Gmail</th>
                            <th>Quê quán</th>
                            <th>Chức vụ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($_GET['s']) && $_GET['s'] != '') {
                                $sql = 'SELECT `id_admin`, `username`, `password`, `image`, `ten_admin`, `ngay_sinh`, `gioi_tinh`, `sdt`, `email`, `que`, cv.ten_cv FROM `admin` JOIN cv ON cv.id_cvu=admin.id_cvu where username like "%'.$_GET['s'].'%" ';
                                if (isset($_GET['a']) && $_GET['a'] != ''){
                                    $sql = 'SELECT `id_admin`, `username`, `password`, `image`, `ten_admin`, `ngay_sinh`, `gioi_tinh`, `sdt`, `email`, `que`, cv.ten_cv FROM `admin` JOIN cv ON cv.id_cvu=admin.id_cvu';
                                }
                                if (isset($_GET['s']) && $_GET['s'] != '' && ($_GET['a']) && $_GET['a'] != '' ) {
                                        $sql = 'SELECT `id_admin`, `username`, `password`, `image`, `ten_admin`, `ngay_sinh`, `gioi_tinh`, `sdt`, `email`, `que`, cv.ten_cv FROM `admin` JOIN cv ON cv.id_cvu=admin.id_cvu';
                                }
                            } 
                            else {
                                $sql = 'SELECT `id_admin`, `username`, `password`, `image`, `ten_admin`, `ngay_sinh`, `gioi_tinh`, `sdt`, `email`, `que`, cv.ten_cv FROM `admin` JOIN cv ON cv.id_cvu=admin.id_cvu';
                            }
                            $admin=mysqli_query($con,$sql);
                            $id=1;
                            foreach($admin as $data){
                                echo '<tr>
                                    <td>'.$id++.'</td>
                                    <td> <img src="../Assets/image/' . $data['image'] .'" style="width:80px;height:100px" /></td>
                                    <td>'.$data['username'].'</td>
                                    <td>'.$data['ten_admin'].'</td>
                                    <td>'.$data['ngay_sinh'].'</td>
                                    <td>'.$data['gioi_tinh'].'</td>
                                    <td>'.$data['sdt'].'</td>
                                    <td>'.$data['email'].'</td>
                                    <td>'.$data['que'].'</td>
                                    <td>'.$data['ten_cv'].'</td>
                                    <td>                                        
                                        <button type="button" class="btn btn-danger"onclick="xoa('.$data['id_admin'].')">Xóa admin</button>
                                        <a type="button" class="btn btn-primary" href="admins.php?id_admin=' . $data['id_admin'] . '">Cập nhật admin</a>
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
    function xoa(id_admin) {
        $('#xoa').modal('show');
        $("#id_admin").val(id_admin);
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
                    <h4 class="modal-title">Xóa admin</h4>
                </div>
                <form action="" method="post">
                    <!-- {{csrf_field()}} -->
                    <div class="modal-body">
                        <input type=hidden name="id_admin" id="id_admin" />
                        <p>Bạn có muốn xóa admin này?</p>
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