	<?php 
 	require_once 'class.crud.php';
 	$db=new crud();
	
	if (!isset($_SESSION['admin']) && isset($_COOKIE['uyeGiris'])) {
		

	$uyeGiris=json_decode($_COOKIE['uyeGiris']);

	$sonuc=$db->uyeGiris($uyeGiris->mail,$uyeGiris->password,TRUE);

	if ($sonuc['status']) {
	header("Location:Anasayfa");
	exit;
	
	} }

	if (!isset($_SESSION['admin']) && !isset($_COOKIE['uyeGiris'])) {
	header("Location:Giris"); exit; } ?>


	