<?php

$connect = new PDO("mysql:host=localhost; dbname=quanlynhansu", "root", "");


$limit = '5';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "
SELECT nv.id_nv,nv.username,nv.password,nv.ten_nv,nv.image,nv.ngay_sinh,nv.gioi_tinh,nv.sdt,nv.email,nv.que,nv.phong_ban,cv.ten_cv,team.ten_team,nv.hop_dong,nv.ngay_hieu_luc,nv.create_at,nv.update_at FROM nv JOIN cv ON nv.id_cvu=cv.id_cvu JOIN team ON nv.id_team=team.id_team
";

if($_POST['query'] != '')
{
  $query .= '
  WHERE ten_nv LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
  ';
}

$query .= 'ORDER BY id_nv ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
 <table class="table table-bordered">
<label> Số lượng nhân viên - '.$total_data.'</label>
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Username</th>
                <th>Tên nhân viên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>SĐT</th>
                <th>Quê quán</th>
                <th>Phòng ban</th>
                <th>Chức vụ</th>
                <th>Team</th>
                <th>Hợp đồng</th>
                <th>Ngày hiệu lực</th>
                <th>Ngày tạo</th>
                <th>Ngày sửa</th>
                <th>Hành động</th>
            </tr>
        </thead>
';
if($total_data > 0)
{
  $id=1;
  foreach($result as $row)
  {
    $output .= '
    <tbody>
    <tr>
        <td>' .($id++) . '</td>
        <td> <img src="../Assets/image/' . $row['image'] .'" style="width:80px;height:100px" /></td>
        <td>' . $row['username'] . '</td>
        <td>' . $row['ten_nv'] . '</td>
        <td>' . $row['ngay_sinh'] . '</td>
        <td>' . $row['gioi_tinh'] . '</td>
        <td>' . $row['sdt'] . '</td>
        <td>' . $row['que'] . '</td>
        <td>' . $row['phong_ban'] . '</td>
        <td>'.$row['ten_cv'].'</td>
        <td>'.$row['ten_team'].'</td>
        <td>'.$row['hop_dong'].'</td>
        <td>'.$row['ngay_hieu_luc'].'</td>
        <td>' .$row['create_at'] . '</td>
        <td>' .$row['update_at'] . '</td>
        <td>                                        
            <button type="button" class="btn btn-danger"onclick="xoa('.$row['id_nv'].')">Xóa nhân viên</button>
            <a type="button" class="btn btn-primary" href="hu.php?id_nv=' . $row['id_nv'] . '">Cập nhật nhân viên</a>
            <a type="button" class="btn btn-success" href="mk.php?id_nv=' . $row['id_nv'] . '">Cập nhật mật khẩu</a>
        </td>
    </tr>
    </tbody>
    ';
  }
}
else
{
  $output .= '
  </table>
  
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '

<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;

?>