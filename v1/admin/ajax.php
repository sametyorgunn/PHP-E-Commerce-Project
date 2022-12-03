<?php

include 'include/dbconfig.php';

$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME."", "".DBUSER."", "".DBPWD."");
$db->exec("SET NAMES utf8");
$db->exec("SET CHARACTER SET utf8");
$db->exec("SET COLLATION_CONNECTION = 'utf8_general_ci'");
session_start();

if ($_POST['type']=='varyantarttir') {

    $sorgu = $db->query("SELECT * FROM varyantgetir WHERE id = '1'")->fetch();

    $yenisay = $sorgu['say'] + 1;

    $stmt = $db->exec("UPDATE varyantgetir SET say = '$yenisay' WHERE id = '1'");

    $response = array(
        'durum'=>'success',
        'sonuc'=>$yenisay
    );

    echo json_encode($response);
}

if ($_POST['type']=='varyantazalt') {

    $sorgu = $db->query("SELECT * FROM varyantgetir WHERE id = '1'")->fetch();

    $yenisay = $sorgu['say'] - 1;

    $stmt = $db->exec("UPDATE varyantgetir SET say = '$yenisay' WHERE id = '1'");

    $response = array(
        'durum'=>'success',
        'sonuc'=>''
    );

    echo json_encode($response);
}