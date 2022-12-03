<?php 
session_start();
unset($_SESSION['login']);
setcookie("login", "selam dünya", time() - 3600);
session_destroy();
header("Location:UyeGiris");
exit;
 ?>