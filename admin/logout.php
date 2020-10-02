<?php
session_start();
if(isset($_SESSION['ad_id'])){
    unset($_SESSION['ad_id']);
    header("location:login.php");
}else{
    unset($_SESSION['v_id']);
header("location:login.php");
}

?>