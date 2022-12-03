<?php
require_once('../admin/include/class.crud.php');
$db=new crud();
session_start();

$odemeyontemi = $db->db_select("select * from odeme where id=?",[0]);
$shopierApiKey= $odemeyontemi["shopierapikey"];
$shopierApiSecretKey= $odemeyontemi["shopierapisecret"];

$sipariskodu = $_SESSION["sipariskodu"];
$siparis = $db->db_select("select * from siparisler where sipariskodu = ?",[$sipariskodu]);

$userisim = $siparis["adsoyad"];
$userMail = $siparis["Mail"];
$userTel = $siparis["Telefon"];
$userToplam = $siparis["toplamtutar"];
$userAdres = $siparis["Adres"];
$userSiparisno = $siparis["sipariskodu"];
$userUrunAdi = $siparis["urun_adi"];
$siparisId = $siparis["id"];


$isim = $userisim ;
$mail = $userMail;
$tel = $userTel;
$_SESSION['tutar'] = $tutar = $userToplam;
$adres = $userAdres;
$_SESSION['eskibakiye'] = "0";
$sipno = rand();
$urun = $userUrunAdi;


include 'shopierAPI.php';
$shopier = new Shopier($shopierApiKey, $shopierApiSecretKey);

$shopier->setBuyer([
'id' => $sipariskodu,
'paket' => $urun, 
'first_name' => $isim, 'last_name'=>$isim,'email' => $mail, 'phone' => $tel]);
$shopier->setOrderBilling([
'billing_address' => $adres, //Kullanıcının adresi
'billing_city' => 'İstanbul',
'billing_country' => 'Türkiye', 
'billing_postcode' => '34000', 
]);
$shopier->setOrderShipping([
'shipping_address' => $adres, 
'shipping_city' => 'İstanbul', 
'shipping_country' => 'Türkiye', 
'shipping_postcode' => '34000', 
]);
$insrt2 = $db->db_select("update siparisler SET Siparis_durumu = ? WHERE sipariskodu = ?",[2,$sipariskodu]);

die($shopier->run($sipariskodu, $tutar, 'Kartodeme'));

?>
