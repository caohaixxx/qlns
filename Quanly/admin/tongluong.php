<?php
    include_once('../layout/header.php');
?>
<?php
    require_once('../connect.php');
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Quản lý lương</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Quản lý lương</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Thống kê lương</strong>
            </li>
        </ol>
    </div>
</div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Thống kê lương</h5>
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
                        <div style="float: left;">
                            <form method="post" action="excel.php">
                                <p>
                                    <button type="submit" id="export_excel" name="export_excel" value="Xuất Excel "
                                    class="btn btn-info"> Xuất Excel
                                    </button>
                                </p>                           
                            </form>
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
<?php
    include_once('../layout/footer.php');
?>
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"a.php",
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