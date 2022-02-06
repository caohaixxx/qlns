<?php session_start();
require_once('../connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | Quản Lý</title>
    <!-- <link rel="shortcut icon" href="favicon.icon" /> -->
    <meta charset="UTF-8">
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- global level css -->
    <link rel="stylesheet" href="../Assets/css/bootstrap.css">
    <link rel="stylesheet" href="../Assets/backend/css/font-awesome.css">
    <link href="../Assets/backend/css/admin-login.css" rel="stylesheet">
    <style>
        p{
            font-size: 20px;
            color: blue;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="full-content-center">
            <div class="box bounceInLeft animated">
                <p>Đăng Nhập</p>
                <form action="" method="post">
			    <!-- {{ csrf_field() }} -->
                    <div class="form-group">
                        <label class="sr-only"></label>
                        <input type="type" class="form-control" name="username" minlength="4" placeholder="Tên Đăng Nhập" required="">
                    </div>
                    <div class="form-group">
                        <label class="sr-only"></label>
                        <input type="password" class="form-control" name="password" placeholder="Mật Khẩu" required="">
                    </div>
                    <div class="checkbox text-left" style="margin-left: 20px;">
                        <label>
                        <input type="checkbox" name="remember"> Nhớ Mật Khẩu
                        </label>
                    </div>
                    <input type="submit" name="login" class="btn btn-block btn-warning" value="Đăng Nhập">
                </form>
                <p class="text-right"><a href="#" class="text-warning forgot_color">Quên Mật Khẩu?</a></p>
            </div>
        </div>
    </div>
    <!-- global js -->
    <link href="../Assets/js/bootstrap.min.js" type="text/javascript">
    <link href="http://kego.erpvn.biz/public/login/js/bootstrap.min.js" type="text/javascript">
</body>
</html>
  <?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['username']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
			$pass_md5 = md5($password);
			$query 		= mysqli_query($con, "SELECT * FROM nv WHERE  password='$pass_md5' and username='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
            if ($num_row > 0) 
            {
                $_SESSION['id_nv']=$row['id_nv'];
					header("Location: trangchu.php");					
                    }             
			else
				{
					echo 'Invalid Username and Password Combination';
                }
            }
  ?>