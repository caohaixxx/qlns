<?php
    include_once('../layout/header.php');
    require_once('../connect.php');
?>
<?php
    if(isset($_POST['id_luong'])){
        $id = $_POST['id_luong'];
        $sql='DELETE FROM luong where id_luong ='.$id;
        $query=mysqli_query($con,$sql);
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
<style>
    .a{
        float: left;
    }
    .b{
        margin-left: 400px;
    }
</style>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Danh sách chấm công </h5>
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
                              Thêm chấm công
                        </a>
                    </p>                        
                    </div>
                    <div class="b">
                        <div class="row">
                            <div class="col-sm-10">
                                <form action="" method="get">
                                    <div class="input-group mb-10">
                                        <input type="search" class="form-control form-control-sm" id="search" name="s" placeholder="Search..." />
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary" type="s">Go!</button>
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
                                <th>Tên nhân viên</th>
                                <th>Tên chức vụ</th>
                                <th>Ngày nghỉ</th>
                                <th>Ngày làm</th>
                                <th>Thời gian tăng ca</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            // PHẦN XỬ LÝ PHP
                            // BƯỚC 1: KẾT NỐI CSDL
                            $conn = mysqli_connect('localhost', 'root', '', 'quanlynhansu');
                    
                            // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                            $result = mysqli_query($conn, 'select count(id_luong) as total from luong');
                            $row = mysqli_fetch_assoc($result);
                            $total_records = $row['total'];
                    
                            // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $limit = 5;
                    
                            // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                            // tổng số trang
                            $total_page = ceil($total_records / $limit);
                    
                            // Giới hạn current_page trong khoảng 1 đến total_page
                            if ($current_page > $total_page){
                                $current_page = $total_page;
                            }
                            else if ($current_page < 1){
                                $current_page = 1;
                            }
                    
                            // Tìm Start
                            $start = ($current_page - 1) * $limit;
                    
                            // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
                            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                            $result = mysqli_query($conn, "SELECT * FROM luong LIMIT $start, $limit");

                            if (isset($_GET['s']) && $_GET['s'] != '') {
                                $result = mysqli_query($conn, 'SELECT luong.id_luong,nv.ten_nv,cv.ten_cv,luong.ngay_nghi,luong.ngay_lam,luong.time_tang_ca,luong.create_at,luong.update_at FROM luong JOIN nv ON nv.id_nv=luong.id_nv JOIN cv ON cv.id_cvu=nv.id_cvu where ten_nv like "%'.$_GET['s'].'%"');
                            } else {
                                $result = mysqli_query($conn,"SELECT luong.id_luong,nv.ten_nv,cv.ten_cv,luong.ngay_nghi,luong.ngay_lam,luong.time_tang_ca,luong.create_at,luong.update_at FROM luong JOIN nv ON nv.id_nv=luong.id_nv JOIN cv ON cv.id_cvu=nv.id_cvu LIMIT $start, $limit");
                            }                    
                            ?>
                            <?php 
                                // PHẦN HIỂN THỊ TIN TỨC
                                // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
                                $index=1;
                                foreach($result as $row){
                                    echo '<tr>
                                        <td>'.($index++).'</td>
                                        <td>'.$row['ten_nv'].'</td>
                                        <td>'.$row['ten_cv'].'</td>
                                        <td>'.$row['ngay_nghi'].'</td>
                                        <td>'.$row['ngay_lam'].'</td>
                                        <td>'.$row['time_tang_ca'].'</td>
                                        <td>'.$row['create_at'].'</td>
                                        <td>'.$row['update_at'].'</td>
                                        <td>                                        
                                            <button type="button" class="btn btn-danger"onclick="xoa('.$row['id_luong'].')">Xóa công</button>
                                            <a type="button" class="btn btn-primary" href="chamcongs.php?id_luong=' . $row['id_luong'] . '">Cập nhật công</a>
                                        </td>
                                    </tr>';
                                }
                            ?>          
                        </tbody>
                    </table>
                    <div class="container">
                        <ul class="pagination">
                            <?php
                                if ($current_page > 1 && $total_page > 1){
                                    echo ' <a href="chamcong.php?page='.($current_page-1).'"> Previous </a>';
                                }
                                for ($i = 1; $i <= $total_page; $i++){
                                    // Nếu là trang hiện tại thì hiển thị thẻ span
                                    // ngược lại hiển thị thẻ a
                                    if ($i == $current_page){
                                        echo '<span>'.$i.'</span> | ';
                                    }
                                    else{
                                        echo '<a class="" href="chamcong.php?page='.$i.'">'.$i.'</a> ';
                                    }
                                }
                                if ($current_page < $total_page && $total_page > 1){
                                    echo '<a href="chamcong.php?page='.($current_page+1).'">Next</a>  ';
                                }
                            ?>
                        </ul>
                    </div>                   
                </div>                    
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function xoa(id_luong) {
        $('#xoa').modal('show');
        $("#id_luong").val(id_luong);
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
                    <h4 class="modal-title">Xóa công</h4>
                </div>
                <form action="" method="post">
                    <!-- {{csrf_field()}} -->
                    <div class="modal-body">
                        <input type=hidden name="id_luong" id="id_luong" />
                        <p>Bạn có muốn xóa công này?</p>
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
                <h4 class="modal-title">Thêm chấm công </h4>
            </div>
            <br>
            <form action="chamcongs.php" method="post">
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Tên nhân viên</label>
                            <div class="col-sm-10"><select class="form-control" name="id_nv"  >
                                <option>-- Chọn nhân viên --</option>
                                <?php
                                    $sql = 'SELECT * from nv';
                                    $users =mysqli_query($con,$sql);
                                    foreach ($users as $data) {
                                        echo '<option value='. $data['id_nv'] . '>'. $data['ten_nv'] . '</option>';                              
                                    }
                                ?> 
                            </select> </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập ngày nghỉ</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ngay_nghi" placeholder="Ngày nghỉ" ></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập ngày làm</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="ngay_lam" placeholder="Ngày làm" ></div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Nhập tăng ca</label>
                            <div class="col-sm-10"><input type="text" class="form-control" name="time_tang_ca" placeholder="Thời gian tăng ca" ></div>
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