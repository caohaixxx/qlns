<?php
    include_once('../layout/header.php');
?>
<?php
    require_once('../connect.php');

    if(isset($_POST["ExportType"]))
        {	 
            switch($_POST["ExportType"])
            {
                case "export-to-excel" :
                    // Submission from
                    $filename = $_POST["ExportType"] . ".xls";		 
                    header("Content-Type: application/vnd.ms-excel");
                    header("Content-Disposition: attachment; filename=\"$filename\"");
                    ExportFile($data);
                    //$_POST["ExportType"] = '';
                    exit();
                default :
                    die("Unknown action : ".$_POST["action"]);
                    break;
            }
        }
        function ExportFile($records) {
            $heading = false;
                if(!empty($records))
                  foreach($records as $row) {
                    if(!$heading) {
                      // display field/column names as a first row
                      echo implode("\t", array_keys($row)) . "\n";
                      $heading = true;
                    }
                    echo implode("\t", array_values($row)) . "\n";
                  }
                exit;
        }
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lý nhân viên</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lý nhân viên</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Thống kê nhân viên</strong>
            </li>
        </ol>
    </div>
</div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Thống kê nhân viên</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <form method="post" action="export.php">
                                <p>
                                    <button type="submit" id="export_excel" name="export_excel" value="Xuất Excel "
                                    class="btn btn-info"> Xuất Excel
                                    </button>
                                </p>                           
                            </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên nhân viên</th>
                                        <th>Ngày sinh</th>
                                        <th>Giới tính</th>
                                        <th>SĐT</th>
                                        <th>Email</th>
                                        <th>Quê quán</th>
                                        <th>Phòng ban</th>
                                        <th>Team</th>
                                        <th>Chức vụ</th>
                                        <th>Hợp đồng</th>
                                        <th>Ngày hiệu lực</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php
                                        $sql = 'SELECT nv.ten_nv,nv.ngay_sinh,nv.gioi_tinh,nv.email,nv.sdt,nv.que,nv.phong_ban,cv.ten_cv,team.ten_team,nv.hop_dong,nv.ngay_hieu_luc FROM nv JOIN cv ON nv.id_cvu=cv.id_cvu JOIN team ON nv.id_team=team.id_team';
                                        $users = mysqli_query($con,$sql);
                                        $id=1;
                                        foreach ($users as $data) {
                                            echo '<tr>
                                                <td>' .($id++) . '</td>
                                                <td>' . $data['ten_nv'] . '</td>
                                                <td>' . $data['ngay_sinh'] . '</td>
                                                <td>' . $data['gioi_tinh'] . '</td>
                                                <td>' . $data['sdt'] . '</td>
                                                <td>' . $data['email'] . '</td>
                                                <td>' . $data['que'] . '</td>
                                                <td>' . $data['phong_ban'] . '</td>
                                                 <td>'.$data['ten_team'].'</td>
                                                 <td>'.$data['ten_cv'].'</td>
                                               
                                                <td>' .$data['hop_dong'] . '</td>
                                                <td>' .$data['ngay_hieu_luc'] . '</td>
                                            </tr>';
                                        }
                                        ?>
                                    </tr>     
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script  type="text/javascript">
$(document).ready(function() {
jQuery('#Export to excel').bind("click", function() {
var target = $(this).attr('id');
switch(target) {
	case 'export-to-excel' :
	$('#hidden-type').val(target);
	//alert($('#hidden-type').val());
	$('#export-form').submit();
	$('#hidden-type').val('');
	break
}
});
    });
</script>
<?php
    include_once('../layout/footer.php');
?>