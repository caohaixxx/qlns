<?php
include_once('../layout/header.php');
?>
<?php
    require_once('../connect.php');
?>
<?php
    if(isset($_POST['id_nv'])){
        $id = $_POST['id_nv'];
        $sql='DELETE FROM nv where id_nv ='.$id;
        $query=mysqli_query($con,$sql);
    }
?>
    <link href="../Assets/css/css.css" rel="stylesheet">
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
                <strong>Danh sách nhân viên</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Danh sách nhân viên </h5>
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
                    <div style="float: left;"> 
                        <p>
                            <a href="test.php" class="btn btn-success">
                            Thêm nhân viên
                            </a>
                        </p> 
                    </div>
                    <div class="form-group" style="float: right;margin-right:100px;width:800px">
                        <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Tìm kiếm nhân viên " />
                    </div>                           
                    <div class="table-responsive" id="dynamic_content">
            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function xoa(id_nv) {
        $('#xoa').modal('show');
        $("#id_nv").val(id_nv);
    };
</script>
<div class="modal fade" id="xoa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-header">
                    <h4 class="modal-title">Xóa Nhân viên</h4>
                </div>
                <form action="" method="post">
                    <!-- {{csrf_field()}} -->
                    <div class="modal-body">
                        <input type=hidden name="id_nv" id="id_nv" />
                        <p>Bạn có muốn xóa Nhân viên này?</p>
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
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

  });
</script>