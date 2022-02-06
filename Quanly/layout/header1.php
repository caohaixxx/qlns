<?php
  ob_start();
?>
<?php 
require_once('../connect.php');
include('../session1.php'); 

$result=mysqli_query($con, "select * from nv where id_nv='$session_id1'")or die('Error In Session');
$data=mysqli_fetch_array($result);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quản lý nhân sự</title>
    <link href="../Assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../Assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="../Assets/css/animate.css" rel="stylesheet">
    <link href="../Assets/css/style.css" rel="stylesheet">
    <style>
    .container-3{
  width: 500px;
  vertical-align: middle;
  white-space: nowrap;
  position: relative;
}
 
.container-3 input#search{
  width: 500px;
  height: 40px;
  background: #92b1b3;
  border: none;
  font-size: 10pt;
  float: left;
  color: #262626;
  padding-left: 45px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  color: #fff;
}
.container-3 input#search::-webkit-input-placeholder {
  color: #a53521;
}

.container-3 input#search:-moz-placeholder { /* Firefox 18- */
  color: #a53521;  
}

.container-3 input#search::-moz-placeholder {  /* Firefox 19+ */
  color: #a53521;  
}

.container-3 input#search:-ms-input-placeholder {  
  color: #a53521;  
}
.container-3 .icon{
  position: absolute;
  top: 50%;
  margin-left: 17px;
  margin-top: 11px;
  z-index: 1;
  color: black;
 
   -webkit-transition: all .55s ease;
  -moz-transition: all .55s ease;
  -ms-transition: all .55s ease;
  -o-transition: all .55s ease;
  transition: all .55s ease;
}
.container-3 input#search:focus, .container-3 input#search:active{
  outline:none; 
}

.container-3:hover .icon{
margin-top: 16px;
color: #4ec22b;

-webkit-transform:scale(1.5); /* Safari and Chrome */
-moz-transform:scale(1.5); /* Firefox */
-ms-transform:scale(1.5); /* IE 9 */
-o-transform:scale(1.5); /* Opera */
 transform:scale(1.5);
}

 .container {
    width: 500px;
    margin: auto;
    text-align: center;
    }
.pagination {
    width: 400px;
    margin-left: 50px;
}
.pagination a {
    display: block;
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
}
    
.pagination a.active {
        background-color: #4CAF50;
        color: white;
}
    
.pagination a:hover:not(.active) {
    background-color: #ddd;
} 
</style>

</head>
<body>
<div id="wrapper">
    <?php
        include('sidebar1.php')
    ?>
<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <?php
        include('navbar1.php')
        ?>
    </div>