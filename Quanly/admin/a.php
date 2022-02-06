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
SELECT nv.id_nv,nv.ten_nv,nv.ngay_sinh,nv.gioi_tinh,nv.phong_ban,cv.ten_cv,luong.ngay_nghi,luong.ngay_lam,luong.time_tang_ca, (hs_luong_cv*ngay_lam)+(hs_l_tangca*time_tang_ca)+phu_cap-(ngay_nghi*300000) AS Luongnhanvien FROM nv JOIN cv ON cv.id_cvu=nv.id_cvu JOIN luong ON luong.id_nv=nv.id_nv
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
                <th>Tên nhân viên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Phòng ban</th>
                <th>Chức vụ</th>
                <th>Ngày nghỉ</th>
                <th>Ngày làm</th>
                <th>Tăng ca </th>
                <th>Lương</th>
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
        <td>' . $row['ten_nv'] . '</td>
            <td>' . $row['ngay_sinh'] . '</td>
            <td>' . $row['gioi_tinh'] . '</td>
            <td>' . $row['phong_ban'] . '</td>
            <td>'.$row['ten_cv'].'</td>
            <td>' .$row['ngay_nghi'] . '</td>
            <td>' .$row['ngay_lam'] . '</td>
            <td>' .$row['time_tang_ca'] . '</td>
            <td>' .$row['Luongnhanvien'] . '</td>
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