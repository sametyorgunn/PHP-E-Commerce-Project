<?php include '../header.php'; ?>




<?php if ($_COOKIE['login'] != 'success') { ?>



    <?php if ($_POST)
    {
        $silinecek1 = $_POST['silartik'];

        $silinecek = $_POST['sepetsil'];
        $sql4 = $db->delete("sepet", "id", $silinecek1);
    }
    ?>


		<title> Alışveriş Sepeti</title>
    <div id="nt_content">

        <!-- hero title -->
        <div class="kalles-section page_section_heading">
            <div class="page-head tc pr oh page_bg_img page_head_cart_heading">
                <div class="parallax-inner nt_parallax_false nt_bg_lz pa t__0 l__0 r__0 b__0 lazyload" data-bgset="assets/images/shopping-cart/shopping-cart-head.jpg">
                </div>
                <div class="container pr z_100"><h1 class="tu mb__10 cw">ALIŞVERİŞ SEPETİ</h1></div>
            </div>
        </div>
        <!-- end hero title -->

        <!--cart section-->
        <div class="kalles-section cart_page_section container mt__60">
            <form action="#" method="post" class="frm_cart_ajax_true frm_cart_page nt_js_cart pr oh ">
                <div class="cart_header">
                    <div class="row al_center">
                        <div class="col-5">Ürün</div>
                        <div class="col-3 tc">Fiyat</div>
                        <div class="col-2 tc">Adet</div>
                        <div class="col-2 tc tr_md">Toplam Tutar</div>
                    </div>
                </div>
                <div class="cart_items js_cat_items">
                    <?php $uyeolmayan = $_COOKIE['uyeolmayan'];
                    $sql=$db->qsql("SELECT * FROM sepet WHERE uyeolmayan = '$uyeolmayan'");
                    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
                        <?php $sql2=$db->wread("urun","id",$row['urun_id']);
                        $row2=$sql2->fetch(PDO::FETCH_ASSOC);  ?>
                        <div class="cart_item js_cart_item">
                            <div class="ld_cart_bar"></div>
                            <div class="row al_center">
                                <div class="col-12 col-md-12 col-lg-5" id="sepetbura">
                                    <div class="page_cart_info flex al_center">
                                        <a href="javascript:void(0)">
                                            <img class="lazyload w__100 lz_op_ef" src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%201128%201439%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E" data-src="images/urun/<?=$row2['resim']?>" alt="">
                                        </a>
                                        <div class="mini_cart_body ml__15">
                                            <h5 class="mini_cart_title mg__0 mb__5"><a href="javascript:void(0)"><?=$row['urun_ad']?></a></h5>
                                            <?php foreach (json_decode($row2['varyant']) as $secilivaryant) { ?>
                                                <?php $varyantson = json_decode(json_encode($secilivaryant), true); ?>
                                                <?php if ($row['varyant_id'] == $varyantson['id']) { ?>
                                                    <?php $sql4=$db->read("varyant");
                                                    while ($row4=$sql4->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <?php if ($varyantson[$row4['varyant_ad']] != "0") { ?>
                                                            <?=$varyantson[$row4['varyant_ad']]?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                            <div class="mini_cart_meta"><p class="cart_selling_plan"></p></div>
                                            <div class="mini_cart_tool mt__10">
                                            <!--    <form method="post"> -->
                                                    <button type="button" onclick="artiksilkanka(<?=$row['id']?>)" name="sepetsil" value="<?=$row['id']?>" class="silsepet" style="border: 0px; background-color: #ff000d;"> <span style="color: #ffffff"> Sil </span>  </button>
                                            <!--    </form>  -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function artiksilkanka(id) {
                                        var type = "anasepetsil";
                                        $.ajax({
                                            type: "POST",
                                            url: "ajax.php",
                                            data: {type,id},
                                            dataType: "JSON",
                                            success: function (response) {
                                                if(response["durum"] == "success" ){
                                                    window.location.reload();
                                                }
                                                else {
                                                    alert("Ürün Eklenemedi");
                                                }
                                            }
                                        });
                                    }
                                </script>

                                <div class="col-12 col-md-4 col-lg-3 tc__ tc_lg">
                                    <div class="cart_meta_prices price">
                                        <div id="indirimlifiyatsepet<?=$row['id']?>" class="cart_price" value="<?=$row['indirimli_fiyat']?>"><?=$row['indirimli_fiyat']?></div>
                                    </div>
                                </div>
                                <?php $toplamfiyat[0] = 0; $toplam = $row['adet'] * $row['indirimli_fiyat']; ?>

                                <?php
                                if (in_array($toplam, $toplamfiyat)) { ?>
                                    <?php $toplamfiyat[] = $toplam ?>
                                <?php } ?>


                                <div class="col-12 col-md-4 col-lg-2 tc mini_cart_actions">
                                    <div class="quantity pr mr__10 qty__true">
                                        <input id="urunadet2<?=$row['id']?>" type="number" class="input-text qty text tc qty_cart_js" name="adet" value="<?=$row['adet']?>">
                                        <div class="qty tc fs__14">
                                            <button onclick="btnarttir1(<?=$row['id']?>,<?=$row2['id']?>)" id="arttir" type="button" class="plus db cb pa pd__0 pr__15 tr r__0">
                                                <i class="facl facl-plus"></i></button>
                                            <button onclick="btnazalt2(<?=$row['id']?>,<?=$row2['id']?>)" id="azalt" type="button" class="minus db cb pa pd__0 pl__15 tl l__0 qty_1">
                                                <i class="facl facl-minus"></i></button>
                                        </div><?php $tektoplamfiyat = $row['adet'] * $row['indirimli_fiyat'] ?>
                                    </div><?php $toplamfiyat[] = $row['adet'] * $row['indirimli_fiyat'] ?>
                                </div>
                                <div class="col-12 col-md-4 col-lg-2 tc__ tr_lg">
                                    <span id="ücret2<?=$row['id']?>" class="cart-item-price fwm cd js_tt_price_it fiyatguncel2"><?=$tektoplamfiyat?> TL</span>
                                </div>
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script></script>


                        <script>
                            function btnazalt2(id,urunidd) {
                                debugger
                                var adet = $("#urunadet2"+id).val()
                                var fiyat = $("#indirimlifiyatsepet"+id).attr("value")
                                var gucelfiyat = (parseInt(adet)-1) * fiyat
                                $("#ücret2"+id).text(gucelfiyat+' TL')

                                var total = 0;
                                $(".fiyatguncel2").each(function (){
                                    total += parseInt($(this).text())
                                    $("#toplamfiyat2").text(total+' TL')
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
                                        if(response['durum'] == "success" ){

                                        }
                                        else {
                                            alert("Ürün Eklenemedi");
                                        }
                                    }
                                });

                            }
                            function btnarttir1(id,urunidd) {
                                debugger
                                var adet = $("#urunadet2"+id).val()
                                var fiyat = $("#indirimlifiyatsepet"+id).attr("value")
                                var gucelfiyat = (parseInt(adet)+1) * fiyat
                                $("#ücret2"+id).text(gucelfiyat+' TL')

                                var total = 0;
                                $(".fiyatguncel2").each(function (){
                                    total += parseInt($(this).text())
                                    $("#toplamfiyat2").text(total+' TL')
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
                                        if(response['durum'] == "success" ){

                                        }
                                        else {
                                            alert("Ürün Eklenemedi");
                                        }
                                    }
                                });

                            }
                        </script>



                    <?php } ?>
                </div>
                <div class="cart__footer mt__60">
                    <div class="row">
                        <div class="col-12 col-md-6 cart_actions tl_md tc order-md-2 order-2 mb__50">
                            <label for="kuponkodu" class="cart-couponcode__label db cd mt__20 mb__10">
                                Kupon:</label>
                            <input type="text" name="kuponkodu" id="kuponkodu" placeholder="Kupon Kodunuz var ise giriniz."><br><br>
                            <button type="button" onclick="kuponkoduekle(<?=array_sum($toplamfiyat)?>);" id="kuponkodubuton" class="btn btn-success col-md-2">uygula</button>
                        </div>

                        <script>
                            function kuponkoduekle(toplam) {
                                var e = document.getElementById("kuponkodu");
                                var value = e.value;

                                var type = "kuponkoduekle";
                                $.ajax({
                                    type: "POST",
                                    url: "ajax.php",
                                    data: {type,value,toplam},
                                    dataType: "JSON",
                                    success: function (response) {
                                        if(response["durum"] == "success" ){
                                            $('#toplamfiyat2').text(response['sonuc']);
                                        }
                                        else {
                                            alert("Kupon Eklenemedi");
                                        }
                                    }
                                });
                            }
                        </script>

                        <div class="col-12 tr_md tc order-md-4 order-4 col-md-6">

                            <div class="total row in_flex fl_between al_center cd fs__18 tu">
                                <div id="toplamtutar" class="col-auto"><strong>Toplam Tutar:</strong></div>
                                <div class="col-auto tr js_cat_ttprice fs__20 fwm">
                                    <div id="toplamfiyat2" class="cart_tot_price"><?=array_sum($toplamfiyat)?> TL</div>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="clearfix"></div>
                            <?php if ($_COOKIE['login'] == 'success') { ?>
                                <a class="btn_checkout button button_primary tu mt__10 mb__10 js_add_ld w__30" href="Odeme">
                                    <center>ÖDEMEYE GEÇ</center></a>
                            <?php } else { ?>
                                <a class="btn_checkout button button_primary tu mt__10 mb__10 js_add_ld w__30" href="UyeliksizGiris">
                                    <center>ÖDEMEYE GEÇ</center></a>
                            <?php } ?>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </form>

        </div>

        <!--end cart section-->


    </div>

<?php } else { ?>



    <div id="nt_content">

        <!-- hero title -->
        <div class="kalles-section page_section_heading">
            <div class="page-head tc pr oh page_bg_img page_head_cart_heading">
                <div class="parallax-inner nt_parallax_false nt_bg_lz pa t__0 l__0 r__0 b__0 lazyload" data-bgset="assets/images/shopping-cart/shopping-cart-head.jpg">
                </div>
                <div class="container pr z_100"><h1 class="tu mb__10 cw">ALIŞVERİŞ SEPETİ</h1></div>
            </div>
        </div>
        <!-- end hero title -->

        <!--cart section-->
        <div class="kalles-section cart_page_section container mt__60">
            <form action="#" method="post" class="frm_cart_ajax_true frm_cart_page nt_js_cart pr oh ">
                <div class="cart_header">
                    <div class="row al_center">
                        <div class="col-5">Ürün</div>
                        <div class="col-3 tc">Fiyat</div>
                        <div class="col-2 tc">Adet</div>
                        <div class="col-2 tc tr_md">Toplam Tutar</div>
                    </div>
                </div>
                <div class="cart_items js_cat_items">
                    <?php $uyeolan = $_SESSION['id'];
                    $sql=$db->qsql("SELECT * FROM sepet WHERE user_id = $uyeolan");
                    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
                        <?php $sql2=$db->wread("urun","id",$row['urun_id']);
                        $row2=$sql2->fetch(PDO::FETCH_ASSOC);  ?>
                        <div class="cart_item js_cart_item">
                          <div class="ld_cart_bar"></div>
                            <div class="row al_center">
                                <div class="col-12 col-md-12 col-lg-5">
                                    <div class="page_cart_info flex al_center">
                                        <a href="javacript:void(0)">
                                            <img class="lazyload w__100 lz_op_ef" src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%201128%201439%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E" data-src="images/urun/<?=$row2['resim']?>" alt="">
                                        </a>
                                        <div class="mini_cart_body ml__15">
                                            <h5 class="mini_cart_title mg__0 mb__5"><a href="#"><?=$row['urun_ad']?></a></h5>
                                            <?php foreach (json_decode($row2['varyant']) as $secilivaryant) { ?>
                                                <?php $varyantson = json_decode(json_encode($secilivaryant), true); ?>
                                                <?php if ($row['varyant_id'] == $varyantson['id']) { ?>
                                                    <?php $sql4=$db->read("varyant");
                                                    while ($row4=$sql4->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <?php if ($varyantson[$row4['varyant_ad']] != "0") { ?>
                                                            <?=$varyantson[$row4['varyant_ad']]?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                            <div class="mini_cart_meta"><p class="cart_selling_plan"></p></div>
                                            <div class="mini_cart_tool mt__10">
                                                <form method="post">
                                                    <button type="submit" id="" name="sepetsil" value="<?=$row['id']?>" class="silsepet" style="border: 0px; background-color: #ff000d;"> <span style="color: #ffffff"> Sil </span>  </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-3 tc__ tc_lg">
                                    <div class="cart_meta_prices price">
                                        <div id="indirimlifiyat<?=$row['id']?>" class="cart_price" value="<?=$row['indirimli_fiyat']?>"><?=$row['indirimli_fiyat']?></div>
                                    </div>
                                </div>
                                <?php $toplamfiyat[0] = 0; $toplam = $row['adet'] * $row['indirimli_fiyat']; ?>

                                <?php
                                if (in_array($toplam, $toplamfiyat)) { ?>
                                    <?php $toplamfiyat[] = $toplam ?>
                                <?php } ?>

                                <div class="col-12 col-md-4 col-lg-2 tc mini_cart_actions">
                                    <div class="quantity pr mr__10 qty__true">
                                        <input id="urunadet<?=$row['id']?>" type="number" class="input-text qty text tc qty_cart_js" name="adet" value="<?=$row['adet']?>">
                                        <div class="qty tc fs__14">
                                            <button onclick="btnarttir(<?=$row['id']?>,<?=$row2['id']?>)" id="arttir" type="button" class="plus db cb pa pd__0 pr__15 tr r__0">
                                                <i class="facl facl-plus"></i></button>
                                            <button onclick="btnazaltt(<?=$row['id']?>,<?=$row2['id']?>)" id="azalt" type="button" class="minus db cb pa pd__0 pl__15 tl l__0 qty_1">
                                                <i class="facl facl-minus"></i></button>
                                        </div><?php $tektoplamfiyat = $row['adet'] * $row['indirimli_fiyat'] ?>
                                    </div><?php $toplamfiyat[] = $row['adet'] * $row['indirimli_fiyat'] ?>
                                </div>
                                <div class="col-12 col-md-4 col-lg-2 tc__ tr_lg">
                                    <span id="ücret<?=$row['id']?>" class="cart-item-price fwm cd js_tt_price_it fiyatguncela"><?=$tektoplamfiyat?> TL</span>
                                </div>
                            </div>
                        </div>
                        <form id="sepetsilAform<?=$row['id']?>" action="" method="post">
                            <input type="hidden" name="sepetsil" value="<?=$row['id']?>">
                        </form>

                        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script></script>
                        <script>

                            $(document).ready(function (){
                                var total = 0;
                                $(".fiyatguncela").each(function (){
                                    total += parseInt($(this).text())
                                    $("#toplamfiyat").text(gucelfiyat)
                                })
                            })

                            function btnazaltt(id,urunidd) {

                                var adet = $("#urunadet"+id).val()
                                var fiyat = $("#indirimlifiyat"+id).attr("value")
                                var gucelfiyat = (parseInt(adet)-1) * fiyat
                                $("#ücret"+id).text(gucelfiyat+' TL')

                                var total = 0;
                                $(".fiyatguncela").each(function (){
                                    total += parseInt($(this).text())
                                    $("#toplamfiyat").text(total+' TL')
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
                                        if(response['durum'] == "success" ){

                                        }
                                        else {
                                            alert("Ürün Eklenemedi");
                                        }
                                    }
                                });

                            }
                            function btnarttir(id,urunidd) {

                                var adet = $("#urunadet"+id).val()
                                var fiyat = $("#indirimlifiyat"+id).attr("value")
                                var gucelfiyat = (parseInt(adet)+1) * fiyat
                                $("#ücret"+id).text(gucelfiyat+' TL')

                                var total = 0;
                                $(".fiyatguncela").each(function (){
                                    total += parseInt($(this).text())
                                    $("#toplamfiyat").text(total+' TL')
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
                                        if(response['durum'] == "success" ){

                                        }
                                        else {
                                            alert("Ürün Eklenemedi");
                                        }
                                    }
                                });

                            }
                        </script>

                        <script>
                           function sepetsilA(id) {
                               debugger
                                $("#sepetsilAform"+id).submit();
                            }
                        </script>



                    <?php } ?>
                </div>
                <div class="cart__footer mt__60">
                    <div class="row">
                        <div class="col-12 col-md-6 cart_actions tl_md tc order-md-2 order-2 mb__50">
                            <label for="kuponkodu" class="cart-couponcode__label db cd mt__20 mb__10">
                                Kupon:</label>
                            <input type="text" name="kuponkodu2" id="kuponkodu2" placeholder="Kupon Kodunuz var ise giriniz."><br><br>
                            <button type="button" onclick="kuponkoduekle2(<?=array_sum($toplamfiyat)?>);" id="kuponkodubuton" class="btn btn-success col-md-2">uygula</button>
                        </div>

                        <script>
                            function kuponkoduekle2(toplam) {
                                var e = document.getElementById("kuponkodu2");
                                var value = e.value;

                                var type = "kuponkoduekle";
                                $.ajax({
                                    type: "POST",
                                    url: "ajax.php",
                                    data: {type,value,toplam},
                                    dataType: "JSON",
                                    success: function (response) {
                                        if(response["durum"] == "success" ){
                                            $('#toplamfiyat').text(response['sonuc']);
                                        }
                                        else {
                                            alert("Kupon Eklenemedi");
                                        }
                                    }
                                });
                            }
                        </script>


                        <div class="col-12 tr_md tc order-md-4 order-4 col-md-6">

                            <div class="total row in_flex fl_between al_center cd fs__18 tu">
                                <div id="toplamtutar" class="col-auto"><strong>Toplam Tutar:</strong></div>
                                <div class="col-auto tr js_cat_ttprice fs__20 fwm">
                                    <div id="toplamfiyat" class="cart_tot_price"><?=array_sum($toplamfiyat)?> TL</div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <?php if ($_COOKIE['login'] == 'success') { ?>
                                <a class="btn_checkout button button_primary tu mt__10 mb__10 js_add_ld w__30" href="Odeme">
                                    <center>ÖDEMEYE GEÇ</center></a>
                            <?php } else { ?>
                                <a class="btn_checkout button button_primary tu mt__10 mb__10 js_add_ld w__30" href="UyeliksizGiris">
                                    <center>ÖDEMEYE GEÇ</center></a>
                            <?php } ?>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!--end cart section-->


    </div>
<?php } ?>


    <?php include '../footer.php'; ?>