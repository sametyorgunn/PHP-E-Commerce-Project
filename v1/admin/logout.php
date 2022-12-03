<?php 
session_start();
unset($_SESSION['admin']);
setcookie("adminGiris",json_encode($admin),strtotime("-30 day"),"/");
header("Location:Giris");
exit;
 ?>