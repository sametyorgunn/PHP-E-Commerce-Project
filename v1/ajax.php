<?php

include 'admin/include/dbconfig.php';

$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME."", "".DBUSER."", "".DBPWD."");
$db->exec("SET NAMES utf8");
$db->exec("SET CHARACTER SET utf8");
$db->exec("SET COLLATION_CONNECTION = 'utf8_general_ci'");
session_start();

if ($_POST['type']=='sepetekle') {



    $adet = $_POST['adet'];
    $urunid = $_POST['urunid'];
    $varyant = $_POST['varyant'];


    $sorgu = $db->query("SELECT * FROM urun WHERE id = '$urunid'")->fetch();


    foreach (json_decode($sorgu['varyant']) as $varyantbul) {
        $varyantson = json_decode(json_encode($varyantbul), true);
        if ($varyantson['id'] == $varyant) {
            $sorguvaryant = $db->query("SELECT * FROM varyant")->fetchAll();
            foreach ($sorguvaryant as $varyantadi) {
                $varyantsonuc[] = $varyantson[$varyantadi['varyant_ad']];
            }
            $varyantlifiyat = $varyantson['fiyat'];
        }
    }


    $urun_id = $sorgu["id"];
    $urun_ad = $sorgu['urun_ad'];
    $urun_adet = $adet;
    $urun_birim_fiyat = $sorgu["fiyat"];
    $urun_indirimli_fiyat = $sorgu["indirimlifiyat"];
    $uyeolmayan = $_COOKIE['uyeolmayan'];
    $user_id = $_SESSION['id'];


    if ($_COOKIE['login'] != 'success') {
        $control11 = $db->query("SELECT * FROM sepet WHERE urun_id = '$urunid' AND uyeolmayan = '$uyeolmayan'")->fetch();
        if(!$control11)
        {
            if (isset($varyantlifiyat) && !empty($varyantlifiyat)) {
                $sonfiyat = $varyantlifiyat;
            } else {
                $sonfiyat = $urun_indirimli_fiyat;
            }

            $stmt = $db->exec("INSERT INTO sepet SET 
                    urun_id='$urunid', 
                    urun_ad='$urun_ad', 
                    adet='$urun_adet',
                    birim_fiyat='$urun_birim_fiyat',
                    indirimli_fiyat='$sonfiyat',
                    varyant_id='$varyant',
                    urun_tipi='bos',
                    uyeolmayan='$uyeolmayan'");
        }  else {
            if ($_POST['sepet']=='sepetazalt') {
                $yeniadet =  $control11['adet'] - $adet;
                $stmt = $db->exec("UPDATE sepet SET adet = '$yeniadet' WHERE urun_id = '$urunid' AND uyeolmayan = '$uyeolmayan'");
            } else {
                $yeniadet = $adet + $control11['adet'];
                $stmt = $db->exec("UPDATE sepet SET adet = '$yeniadet' WHERE urun_id = '$urunid' AND uyeolmayan = '$uyeolmayan'");
            }
        }


        $row2='';
        $control = $db->query("SELECT * FROM sepet WHERE urun_id = '$urunid' AND uyeolmayan = '$uyeolmayan'")->fetch();
        $control2 = $db->query("SELECT * FROM sepet WHERE uyeolmayan = '$uyeolmayan'")->fetchAll();
        $control3 = $db->prepare("SELECT count(*) FROM sepet WHERE uyeolmayan = '$uyeolmayan'");
        $control3->execute();
        (int) $say = $control3->fetchColumn();
        $uruntip = $control11["urun_tipi"];
        foreach ($control2 as $hesap) {
            (int) $toplam[] = (int) $hesap["adet"] * (int) $hesap["indirimli_fiyat"];
        }
        $yenitoplam = array_sum($toplam);


    } else {
        $control11 = $db->query("SELECT * FROM sepet WHERE urun_id = '$urunid' AND user_id = '$user_id'")->fetch();
        if(!$control11)
        {
            if (isset($varyantlifiyat) && !empty($varyantlifiyat)) {
                $sonfiyat = $varyantlifiyat;
            } else {
                $sonfiyat = $urun_indirimli_fiyat;
            }

            $stmt = $db->exec("INSERT INTO sepet SET 
                    urun_id='$urunid', 
                    urun_ad='$urun_ad', 
                    adet='$urun_adet',
                    birim_fiyat='$urun_birim_fiyat',
                    indirimli_fiyat='$sonfiyat',
                    varyant_id='$varyant',
                    urun_tipi='bos',
                    user_id='$user_id'");
        }  else {
            if ($_POST['sepet']=='sepetazalt') {
                $yeniadet =  $control11['adet'] - $adet;
                $stmt = $db->exec("UPDATE sepet SET adet = '$yeniadet' WHERE urun_id = '$urunid' AND user_id = '$user_id'");
            } else {
                $yeniadet = $adet + $control11['adet'];
                $stmt = $db->exec("UPDATE sepet SET adet = '$yeniadet' WHERE urun_id = '$urunid' AND user_id = '$user_id'");
            }
        }

        $row2='';
        $control = $db->query("SELECT * FROM sepet WHERE urun_id = '$urunid' AND user_id = '$user_id'")->fetch();
        $control2 = $db->query("SELECT * FROM sepet WHERE user_id = '$user_id'")->fetchAll();
        $control3 = $db->prepare("SELECT count(*) FROM sepet WHERE user_id = '$user_id'");
        $control3->execute();
        (int) $say = $control3->fetchColumn();
        $uruntip = $control11["urun_tipi"];
        foreach ($control2 as $hesap) {
            (int) $toplam[] = (int) $hesap["adet"] * (int) $hesap["indirimli_fiyat"];
        }
        $yenitoplam = array_sum($toplam);
    }


    $response = array(
        'durum'=>'success',
        'urunadet'=>$say,
        'control'=>$uruntip,
        'toplam'=>$yenitoplam,
        'sonuc'=>
            '
            <div class="mini_cart_items js_cat_items lazyload">
                <div class="mini_cart_item js_cart_item flex al_center pr oh">
                    <div class="ld_cart_bar"></div>
                    <a href="#" class="mini_cart_img">
                        <img class="w__100 lazyload" data-src="images/urun/'.$sorgu['resim'].'" width="120" height="153" alt="" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjAiIGhlaWdodD0iMTUzIiB2aWV3Qm94PSIwIDAgMTIwIDE1MyI+PC9zdmc+"></a>

                    <div class="mini_cart_info">
                        <a href="#" class="mini_cart_title truncate">'.$control['urun_ad'].'</a>
                        <div class="mini_cart_meta"><p class="cart_meta_variant">Varyant Değeri</p>
                            <p class="cart_selling_plan">'.$varyantsonuc[0].' '.$varyantsonuc[1].' '.$varyantsonuc[2].' '.$varyantsonuc[3].'</p>
                            <div class="cart_meta_price price">
                                <div class="cart_price">
                                    <del>'.$control['birim_fiyat'].' TL</del>
                                    <!--ins to div add tl--> <ins class="fiyatguncel" id="indirimlifiyat'.$control['id'].'" value="'.$control['indirimli_fiyat'].'">'.$control['indirimli_fiyat'].' TL</ins>
                                </div>
                            </div>
                        </div>
                        '.$row2.'
                        <div class="mini_cart_actions">
                            <div class="quantity pr mr__10 qty__true">
                                <input id="urunadet'.$control['id'].'" name="adet" type="number" class="input-text qty text tc qty_cart_js uruntane" step="1" min="0" max="9999" value="'.$control['adet'].'">
                                <div class="qty tc fs__14">
                                    <button onclick="btnarttır('.$control['id'].','.$sorgu['id'].')" id="btnarttırr" type="button" class="adet plus db cb pa pd__0 pr__15 tr r__0">
                                        <i class="facl facl-plus"></i>
                                    </button>
                                    <button onclick="btnazalt('.$control['id'].','.$sorgu['id'].')" id="btnazaltt" type="button" class="adet minus db cb pa pd__0 pl__15 tl l__0 qty_1">
                                        <i class="facl facl-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>


                            <script>
                                function btnazalt(id,urunidd) {
                                    var adet = $("#urunadet"+id).val()
                                    var fiyat = $("#indirimlifiyat"+id).attr("value")
                                    var gucelfiyat = (parseInt(adet)-1) * fiyat
                                    $("#indirimlifiyat"+id).text(gucelfiyat)

                                    var total = 0;
                                    $(".fiyatguncel").each(function (){
                                        total += parseInt($(this).text())
                                        $("#toplamfiyat").text(total)
                                    })

                                    var type = "sepetekle";
                                    var sepet = "sepetazalt"
                                    adet = 1
                                    var urunid = urunidd
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax.php",
                                        data: {type,adet,urunid,sepet},
                                        dataType: "JSON",
                                        success: function (response) {
                                            if(response["durum"] == "success" ){

                                            }
                                            else {
                                                alert("Ürün Eklenemedi");
                                            }
                                        }
                                    });

                                }
                                function btnarttır(id,urunidd) {
                                    var adet = $("#urunadet"+id).val()
                                    var fiyat = $("#indirimlifiyat"+id).attr("value")
                                    var gucelfiyat = (parseInt(adet)+1) * fiyat
                                    $("#indirimlifiyat"+id).text(gucelfiyat)

                                    var total = 0;
                                    $(".fiyatguncel").each(function (){
                                        total += parseInt($(this).text())
                                        $("#toplamfiyat").text(total)
                                    })

                                    var type = "sepetekle";
                                    adet = 1
                                    var urunid = urunidd
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax.php",
                                        data: {type,adet,urunid},
                                        dataType: "JSON",
                                        success: function (response) {
                                            if(response["durum"] == "success" ){

                                            }
                                            else {
                                                alert("Ürün Eklenemedi");
                                            }
                                        }
                                    });

                                }
                            </script>



                            <form class="sepetsil" action="" method="post">
                                <input type="hidden" name="sepetsil" value="'.$control['id'].'">
                            </form>


                            <a href="#" onclick="sepetsil()" class="cart_ac_remove js_cart_rem ttip_nt tooltip_top_right"><span class="tt_txt">Ürünü Sil</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>
            '
    );

    echo json_encode($response);
}

if ($_POST['type']=='sepetsil') {

    $sepetid = $_POST['sepetid'];



    $sql = "DELETE FROM sepet WHERE id = ?";
    $stmt= $db->prepare($sql);
    $stmt->execute([$sepetid]);



    $control3 = $db->prepare("SELECT count(*) FROM sepet WHERE uyeolmayan = '$uyeolmayan'");
    $control3->execute();
    (int) $say = $control3->fetchColumn();

    $response = array(
        'durum'=>'success',
        'urunadet'=>$say,
        'sonuc'=>''
    );

    echo json_encode($response);
}

if ($_POST['type']=='varyantfiyat') {

    $varyantid = $_POST['value'];
    $urunid = $_POST['id'];

    $sorgu = $db->query("SELECT * FROM urun WHERE id = '$urunid'")->fetch();

    foreach (json_decode($sorgu['varyant']) as $varyant) {
        $varyantson = json_decode(json_encode($varyant), true);
        if ($varyantson['id'] == $varyantid) {
            $varyantfiyat = $varyantson['fiyat'].' TL';
        }
    }


    $response = array(
        'durum'=>'success',
        'sonuc'=>$varyantfiyat
    );

    echo json_encode($response);
}

if ($_POST['type']=='anasepetsil') {

    $sepetid = $_POST['id'];

    $query=$db->prepare("DELETE FROM sepet WHERE id=?");
    $sil=$query->execute([$sepetid]);


    $yenile = '<script>window.location.reload()</script>';

    $response = array(
        'durum'=>'success',
        'sonuc'=>$yenile
    );

    echo json_encode($response);
}

if ($_POST['type']=='kuponkoduekle') {

    $kuponkodu = $_POST['value'];
    $toplamtutar = $_POST['toplam'];

    $date = date('Y-m-d');

    $kupon = $db->query("SELECT * FROM kupon WHERE baslik = '$kuponkodu' AND bitistarihi > '$date'")->fetch();

    if (isset($kupon) && !empty($kupon)) {
        setcookie('kupon',$kupon['baslik']);
    }

    $yenitoplam = $toplamtutar - $kupon['tutar'];

    $response = array(
        'durum'=>'success',
        'sonuc'=>$yenitoplam.' TL'
    );

    echo json_encode($response);
}

