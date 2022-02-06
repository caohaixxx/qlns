<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id_admin']) || (trim($_SESSION['id_admin']) == '')) {
    header("location:index.php");
    exit();
}
$session_id=$_SESSION['id_admin'];

?>