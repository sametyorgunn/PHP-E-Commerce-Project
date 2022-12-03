
            <!-- footer -->
            <footer id="nt_footer" class="bgbl footer-1">
            <div id="kalles-section-footer_top" class="kalles-section footer__top type_instagram">
            <div class="footer__top_wrap footer_sticky_false footer_collapse_true nt_bg_overlay pr oh pb__30 pt__80">
            <div class="container pr z_100">
            <div class="row">
            <div class="col-lg-3 col-md-6 col-12 mb__50 order-lg-1 order-1">
            <div class="widget widget_text widget_logo">
            
            <h3 class="widget-title fwsb flex al_center fl_between fs__16 mg__0 mb__30 dn_md">
            <span class="txt_title">Bilgiler</span>
            <span class="nav_link_icon ml__5"></span></h3>
            
            <div class="widget_footer">
            <div class="footer-contact">
            <p>
            
            <a class="d-block" href="Anasayfa">
            <img class="w__100 mb__15 lazyload lz_op_ef max-width__135px" src="data:image/svg+xml,%3Csvg%20viewBox%3D%220%200%20293%2065%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3C%2Fsvg%3E" data-src="images/logo/<?=$ayar['Logo']?>" alt="Kalles template"></a></p>
            
            <?php 
            $sql=$db->qsql("SELECT * FROM ayar where id= 0");
            while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

            <p>
            <i class="pegk pe-7s-map-marker"> </i>
            <span><?php echo $row['adres'] ?> <?php echo $row['ilce'] ?> <?php echo $row['il'] ?></span>
            </p>
            
            <p><i class="pegk pe-7s-mail"></i>
            <span><a href="mailto:<?php echo $row['mail'] ?>"><?php echo $row['mail'] ?></a></span></p>
            
            <p><i class="pegk pe-7s-call"></i> <span><?php echo $row['telefon'] ?> </span></p>
           
            <div class="nt-social">
            <a target="_blank" href="<?php echo $row['facebook'] ?>" class="facebook cb ttip_nt tooltip_top">
            <i class="facl facl-facebook"></i></a>
            
            <a target="_blank" href="<?php echo $row['twitter'] ?>" class="twitter cb ttip_nt tooltip_top">
            <i class="facl facl-twitter"></i></a>
            
            <a target="_blank" href="<?php echo $row['instagram'] ?>" class="instagram cb ttip_nt tooltip_top">
            <i class="facl facl-instagram"></i></a>
            
            <?php } ?>
            </div>
            </div>
            </div>
            </div>
            </div>
       

            <div class="col-lg-2 col-md-6 col-12 mb__50 order-lg-2 order-1">
            <div class="widget widget_nav_menu">
            <h3 class="widget-title fwsb flex al_center fl_between fs__16 mg__0 mb__30">
            <span class="txt_title">Kategoriler</span>
            <span class="nav_link_icon ml__5"></span>
            </h3>
            
            <div class="menu_footer widget_footer">
            <ul class="menu">

            <?php 
            $sql=$db->qsql("SELECT * FROM kategori where ust=0 LIMIT 7");
            while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
            <li class="menu-item">
            <a href="Kategori/<?php echo $db->seo($row['kategori_ad']); ?>?id=<?php echo $row['id'] ?>">
            <?php echo $row['kategori_ad'] ?></a></li>
            <?php } ?>
                                 

            </ul>
            </div>
            </div>
            </div>
            
            <div class="col-lg-2 col-md-6 col-12 mb__50 order-lg-3 order-1">
            <div class="widget widget_nav_menu">
            <h3 class="widget-title fwsb flex al_center fl_between fs__16 mg__0 mb__30">
            <span class="txt_title">Müşteri Hizmetleri</span>
            <span class="nav_link_icon ml__5"></span></h3>
            
            <div class="menu_footer widget_footer">
            <ul class="menu">
            <?php 
            $sql=$db->qsql("SELECT * FROM sayfa");
            while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

            <li class="menu-item">
            <a href="Kurumsal/<?php echo $db->seo($row['baslik']); ?>/<?php echo $row['id'] ?>">
            <?php echo $row['baslik'] ?></a></li> 
            <?php } ?>   
            <li class="menu-item"><a href="iletisim">İletişim</a></li>
            <li class="menu-item"><a href="siparistakip">Sipariş Takip</a></li>

            

            </ul>
            </div>
            </div>
            </div>
            

            <div class="col-lg-2 col-md-6 col-12 mb__50 order-lg-4 order-1">
            <div class="widget widget_nav_menu">
            <h3 class="widget-title fwsb flex al_center fl_between fs__16 mg__0 mb__30">
            <span class="txt_title">Sözleşmeler</span>
            <span class="nav_link_icon ml__5"></span></h3>
            <div class="menu_footer widget_footer">
            
            <ul class="menu">

            <?php 
            $sql=$db->qsql("SELECT * FROM sozlesme");
            while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
            <li class="menu-item">
            <a href="Sozlesme/<?php echo $db->seo($row['baslik']); ?>/<?php echo $row['id'] ?>">
            <?php echo $row['baslik'] ?></a></li>
            <?php } ?>  


            </ul>
            </div>
            </div>
            </div>
            

            <div class="col-lg-3 col-md-6 col-12 mb__50 order-lg-5 order-1">
            <div class="widget widget_text">
            <h3 class="widget-title fwsb flex al_center fl_between fs__16 mg__0 mb__30">
            <span class="txt_title">E-Bülten</span>
            <span class="nav_link_icon ml__5"></span></h3>
            
            <div class="widget_footer newl_des_1">
            <p>Kampanya ve İndirimlerden haberdar olabilmek için mail bültenine kayıt olun!</p>

                <?php
                    if($_POST)
                    {
                        $mail = $_POST["mail"];

                        if(isset($mail)){
                            $ekle = $db->db_insert("insert into mailbulteni set mail = ?",[$mail]);
                        }
                    }
                ?>
            <form method="post" id="contact_form" class="mc4wp-form pr z_100">
            <div class="mc4wp-form-fields">
            <div class="signup-newsletter-form row no-gutters pr oh ">
            
            <div class="col col_email">
            <input type="email" name="mail" placeholder="Mail Adresiniz" value="" class="tc tl_md input-text" required="required">
            </div>
            
            <div class="col-auto">
            <button type="submit" class="btn_new_icon_false w__100 submit-btn truncate">
            <span>KAYIT OL</span> </button>
            
            </div>
            </div>
            </div>
            </form>
                                  
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            
            <div id="kalles-section-footer_bot" class="kalles-section footer__bot">
            <div class="footer__bot_wrap pt__20 pb__20">
            <div class="container pr tc">
            <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col_1">Copyright © 2022 - Tüm hakları saklıdır. </div>
                   
            </div>
            </div>
            </div>
            </div>

            </footer>
            <!-- end footer -->

            </div>

            <!--mask overlay-->
            <div class="mask-overlay ntpf t__0 r__0 l__0 b__0 op__0 pe_none"></div>
            <!--end mask overlay-->


            <!-- mini cart box -->
            <div id="nt_cart_canvas" class="nt_fk_canvas dn">
            <div class="nt_mini_cart nt_js_cart flex column h__100 btns_cart_1">
            <div class="mini_cart_header flex fl_between al_center">
            <div class="h3 fwm tu fs__16 mg__0">ALIŞVERİŞ SEPETİ</div>
            <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
            </div>




            <div class="mini_cart_wrap">
            <div class="mini_cart_content fixcl-scroll">
            <div class="fixcl-scroll-content">
            <div class="empty tc mt__40 dn"><i class="las la-shopping-bag pr mb__10"></i>
            <p>Sepetiniz Boş.</p>
            <p class="return-to-shop mb__15">
            <a class="button button_primary tu js_add_ld" href="#">Alışverişe Başla!</a>
            </p>
            </div>
                <?php if ($_COOKIE['login'] != 'success') { ?>
                    <div id="success">
                    <?php $uyeolmayan = $_COOKIE['uyeolmayan'];
                    $sql=$db->qsql("SELECT * FROM sepet WHERE uyeolmayan = $uyeolmayan");
                    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
                        <?php $sql2=$db->wread("urun","id",$row['urun_id']);
                        $row2=$sql2->fetch(PDO::FETCH_ASSOC);?>

                        <div class="mini_cart_items js_cat_items lazyload">

                            <div class="mini_cart_item js_cart_item flex al_center pr oh">
                                <div class="ld_cart_bar"></div>
                                <a href="#" class="mini_cart_img">
                                    <img class="w__100 lazyload" data-src="images/urun/<?=$row2['resim']?>" width="120" height="153" alt="" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjAiIGhlaWdodD0iMTUzIiB2aWV3Qm94PSIwIDAgMTIwIDE1MyI+PC9zdmc+"></a>

                                <div class="mini_cart_info">
                                    <a href="#" class="mini_cart_title truncate"><?=$row['urun_ad']?></a>
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
                                    <div class="mini_cart_meta"><p class="cart_meta_variant"></p>
                                        <p class="cart_selling_plan"></p>
                                        <div class="cart_meta_price price">
                                            <div class="cart_price">
                                                <del><?=$row['birim_fiyat']?> TL</del>
                                                <!--ins to div add tl--> <ins class="fiyatguncel" id="indirimlifiyat<?=$row['id']?>" value="<?=$row['indirimli_fiyat']?>"><?=$row['adet'] * $row['indirimli_fiyat']?> TL</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $toplamfiyat[] = $row['adet'] * $row['indirimli_fiyat']; $toplam = array_sum($toplamfiyat) ?>
                                    <div class="mini_cart_actions">
                                        <div class="quantity pr mr__10 qty__true">
                                            <input id="urunadet<?=$row['id']?>" name="adet" type="number" class="input-text qty text tc qty_cart_js uruntane urunadet2" step="1" min="0" max="9999" value="<?=$row['adet']?>">
                                            <div class="qty tc fs__14">
                                                <button onclick="btnarttır(<?=$row['id']?>,<?=$row2['id']?>)" id="btnarttırr" type="button" class="adet plus db cb pa pd__0 pr__15 tr r__0">
                                                    <i class="facl facl-plus"></i>
                                                </button>
                                                <button onclick="btnazalt(<?=$row['id']?>,<?=$row2['id']?>)" id="btnazaltt" type="button" class="adet minus db cb pa pd__0 pl__15 tl l__0 qty_1">
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
                                                        if(response['durum'] == "success" ){

                                                        }
                                                        else {
                                                            alert("Ürün Eklenemedi");
                                                        }
                                                    }
                                                });

                                            }
                                            function btnarttır(id,urunidd) {
                                                debugger
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
                                                        if(response['durum'] == "success" ){

                                                        }
                                                        else {
                                                            alert("Ürün Eklenemedi");
                                                        }
                                                    }
                                                });

                                            }
                                        </script>



                                        <form class="sepetsil" action="" method="post">
                                            <input type="hidden" id="silinecek<?=$row['id']?>" name="sepetsil" value="<?=$row['id']?>">
                                        </form>



                                        <a href="#" onclick="sepetsil(<?=$row['id']?>)" class="cart_ac_remove js_cart_rem ttip_nt tooltip_top_right"><span class="tt_txt">Ürünü Sil</span>
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

                    <?php } ?>
                    </div>
                <?php } else { ?>
                <div id="success">
                    <?php $uyeolan = $_SESSION['id'];
                    $sql=$db->qsql("SELECT * FROM sepet WHERE user_id = $uyeolan");
                    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
                        <?php $sql2=$db->wread("urun","id",$row['urun_id']);
                        $row2=$sql2->fetch(PDO::FETCH_ASSOC);?>
                            <div id="success">
                        <div class="mini_cart_items js_cat_items lazyload">

                            <div class="mini_cart_item js_cart_item flex al_center pr oh">
                                <div class="ld_cart_bar"></div>
                                <a href="#" class="mini_cart_img">
                                    <img class="w__100 lazyload" data-src="images/urun/<?=$row2['resim']?>" width="120" height="153" alt="" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjAiIGhlaWdodD0iMTUzIiB2aWV3Qm94PSIwIDAgMTIwIDE1MyI+PC9zdmc+"></a>

                                <div class="mini_cart_info">
                                    <a href="#" class="mini_cart_title truncate"><?=$row['urun_ad']?></a>
                                    <div class="mini_cart_meta"><p class="cart_meta_variant">Varyant Değeri</p>
                                        <p class="cart_selling_plan">
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
                                        </p>
                                        <div class="cart_meta_price price">
                                            <div class="cart_price">
                                                <del><?=$row['birim_fiyat']?> TL</del>
                                                <!--ins to div add tl--> <ins class="fiyatguncel" id="indirimlifiyat<?=$row['id']?>" value="<?=$row['indirimli_fiyat']?>"><?=$row['adet'] * $row['indirimli_fiyat']?> TL</ins>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $toplamfiyat[] = $row['adet'] * $row['indirimli_fiyat']; $toplam = array_sum($toplamfiyat) ?>
                                    <div class="mini_cart_actions">
                                        <div class="quantity pr mr__10 qty__true">
                                            <input id="urunadet<?=$row['id']?>" name="adet" type="number" class="input-text qty text tc qty_cart_js uruntane urunadet2" step="1" min="0" max="9999" value="<?=$row['adet']?>">
                                            <div class="qty tc fs__14">
                                                <button onclick="btnarttır(<?=$row['id']?>,<?=$row2['id']?>)" id="btnarttırr" type="button" class="adet plus db cb pa pd__0 pr__15 tr r__0">
                                                    <i class="facl facl-plus"></i>
                                                </button>
                                                <button onclick="btnazalt(<?=$row['id']?>,<?=$row2['id']?>)" id="btnazaltt" type="button" class="adet minus db cb pa pd__0 pl__15 tl l__0 qty_1">
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
                                            <input type="hidden" id="silinecek<?=$row['id']?>" name="sepetsil" value="<?=$row['id']?>">
                                        </form>


                                        <a href="#" onclick="sepetsil(<?=$row['id']?>)" class="cart_ac_remove js_cart_rem ttip_nt tooltip_top_right"><span class="tt_txt">Ürünü Sil</span>
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
                        </div>

                    <?php } ?>
            </div>
                <?php } ?>



               

            </div>
            </div>

            <div class="mini_cart_footer js_cart_footer">
            <div class="js_cat_dics"></div>
            <div class="total row fl_between al_center">
            <div class="col-auto"><strong>TOPLAM TUTAR:</strong></div>
            <div class="col-auto tr js_cat_ttprice">
            <div class="cart_tot_price"><span id="toplamfiyat"><?=array_sum($toplamfiyat)?></span><span>TL</span></div>
            </div>
            </div>
             
            <a href="Sepet" class="button btn-cart mt__10 mb__10 js_add_ld d-inline-flex 
            justify-content-center align-items-center cd-imp">SEPETİ GÖRÜNTÜLE</a>
                <?php if ($_COOKIE['login'] == 'success') { ?>
                    <a href="Odeme" class="button btn-checkout mt__10 mb__10 js_add_ld d-inline-flex justify-content-center align-items-center text-white">ÖDEMEYE GEÇ</a>
                <?php } else { ?>
                    <a href="UyeliksizGiris" class="button btn-checkout mt__10 mb__10 js_add_ld d-inline-flex justify-content-center align-items-center text-white">ÖDEMEYE GEÇ</a>
                <?php } ?>

              
            </div>
            </div>


  
            <!--mini cart tool cart gift-->
            <div class="mini_cart_gift pe_none">
            <div class="shipping_calculator tc">
            <p class="field">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="cd dib pr">
            <polyline points="20 12 20 22 4 22 4 12"></polyline>
            <rect x="2" y="7" width="20" height="5"></rect>
            <line x1="12" y1="22" x2="12" y2="7"></line>
            <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
            <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
            </svg>
            <span class="gift_wrap_text mt__10 db"><span class="cd">Do you want a gift wrap?</span> Only $5.00</span>
            </p>
            
            <p class="field">
            <a href="shop-filter-sidebar.html" class="w__100 tu tc button button_primary truncate js_addtc">Add A Gift Wrap</a></p>
            <p class="field"> <input type="button" class="button btn_back js_cart_tls_back" value="Cancel"> </p>
            </div>
            </div>

            </div>
            </div>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>

                function sepetsil(id)
                {
                    var type = "sepetsil";
                    var sepetid = document.getElementById("silinecek"+id).value
                    $.ajax({
                        type: "POST",
                        url: "ajax.php",
                        data: {type,sepetid},
                        dataType: "JSON",
                        success: function (response) {
                            if(response['durum'] == "success" ){
                                $('#success').append(response['sonuc']);
                                $("#urunadetyenileme").text(response['urunadet']);
                            }
                            else {
                                alert("Ürün Eklenemedi");
                            }
                        }
                    });
                }


                function sepetekle(id)
                {
                    var type = "sepetekle";
                    var adet = document.getElementById("adett").value
                    var urunid = document.getElementById("urunid").value
                    var kontrol = document.getElementById("kontrol").value
                    if (kontrol == 'bir') {
                        var varyant = document.getElementById("varyant").value
                        if (varyant != 'secilmedi') {
                            $.ajax({
                                type: "POST",
                                url: "ajax.php",
                                data: {type,adet,urunid,varyant},
                                dataType: "JSON",
                                success: function (response) {
                                    if(response['durum'] == "success" ){
                                        if(response['control']=='bos')
                                        {
                                            var tane =document.getElementById("adett").value
                                            $("#urunadet"+id).append(tane)
                                        }
                                        else
                                        {
                                            $('#success').append(response['sonuc']);
                                            $("#toplamfiyat").text(response['toplam']);
                                        }

                                        $("#urunadetyenileme").text(response['urunadet']);

                                    }
                                    else {
                                        alert("Ürün Eklenemedi");
                                    }
                                }
                            });
                        } else {
                            alert("Lütfen Varyant Seçiniz")
                        }
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "ajax.php",
                            data: {type,adet,urunid},
                            dataType: "JSON",
                            success: function (response) {
                                if(response['durum'] == "success" ){
                                    if(response['control']=='bos')
                                    {
                                        var tane =document.getElementById("adett").value
                                        $("#urunadet"+id).append(tane)
                                    }
                                    else
                                    {
                                        $('#success').append(response['sonuc']);
                                        $("#toplamfiyat").text(response['toplam']);
                                    }

                                    $("#urunadetyenileme").text(response['urunadet']);

                                }
                                else {
                                    alert("Ürün Eklenemedi");
                                }
                            }
                        });
                    }

                }

            </script>

            <!-- search box -->
            
            <div id="nt_search_canvas" class="nt_fk_canvas dn">
            <div class="nt_mini_cart flex column h__100">
            <div class="mini_cart_header flex fl_between al_center">
            <h3 class="widget-title tu fs__16 mg__0 font-poppins">WEB SİTESİNDE ÜRÜN ARA</h3>
            <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
            </div>
            <div class="mini_cart_wrap">
            <div class="search_header mini_search_frm pr js_frm_search" role="search">
           
            <div class="frm_search_input pr oh">
            <input class="search_header__input js_iput_search placeholder-black" autocomplete="off" type="text" name="q" 
            placeholder="Ürün Ara">
            <button class="search_header__submit js_btn_search" type="submit">
            <i class="iccl iccl-search"></i></button>
            </div>
            <div class="ld_bar_search"></div>
            </div>
         

            </div>
            </div>
            </div>
            <!-- end search box -->


            <!-- mobile toolbar -->
            <div id="kalles-section-toolbar_mobile" class="kalles-section">
            <div class="kalles_toolbar kalles_toolbar_label_true ntpf r__0 l__0 b__0 flex fl_between al_center">
      
      
            <div class="type_toolbar_cart kalles_toolbar_item">
            <a href="#" class="push_side" data-id="#nt_cart_canvas">
			<span class="toolbar_icon">
			<span class="jsccount toolbar_count">5</span>
			</span>
            <span class="kalles_toolbar_label">Sepet</span>
            </a>
            </div>
            
            <div class="type_toolbar_account kalles_toolbar_item">
            <a href="#" class="push_side" data-id="#nt_login_canvas">
            <span class="toolbar_icon"></span>
            <span class="kalles_toolbar_label">Hesabım</span>
            </a>
            </div>
            
            <div class="type_toolbar_search kalles_toolbar_item">
            <a href="#" class="push_side" data-id="#nt_search_canvas">
            <span class="toolbar_icon"></span>
            <span class="kalles_toolbar_label">Ara</span>
            </a>
            </div>
            </div>
            </div>
            <!-- end mobile toolbar -->

            <!-- mobile menu -->

            <div id="nt_menu_canvas" class="nt_fk_canvas nt_sleft dn lazyload">
                <i class="close_pp pegk pe-7s-close ts__03 cd"></i>
                <div class="mb_nav_tabs flex al_center mb_cat_true">

                    <div class="mb_nav_title pr mb_nav_ul flex al_center fl_center active" data-id="#kalles-section-mb_nav_js">
                        <span class="db truncate">KATEGORİLER</span>
                    </div>

                </div>
                <div id="kalles-section-mb_nav_js" class="mb_nav_tab active">
                    <div id="kalles-section-mb_nav" class="kalles-section">
                        <ul id="menu_mb_ul" class="nt_mb_menu">

                            <?php $kategori = $db->db_select2("SELECT * FROM kategori WHERE ust = ?", [0]); ?>
                            <?php foreach ($kategori as $kategoriust) { ?>
                                <?php $kategori2 = $db->db_select2("SELECT * FROM kategori WHERE ust = ?", [$kategoriust['id']]); ?>
                                <li class="menu-item menu-item-has-children only_icon_false">
                                    <a href="Kategori/<?php echo $db->seo($kategoriust['kategori_ad']); ?>?id=<?php echo $kategoriust['id'] ?>">
                                        <span class="nav_link_txt flex al_center"><?=$kategoriust['kategori_ad']?></span><span class="nav_link_icon ml__5"></span></a>
                                <?php foreach ($kategori2 as $kategorialt) { ?>
                                    <?php if ($kategoriust['id'] == $kategorialt['ust']) { ?>
                                        <ul class="sub-menu">

                                            <li class="menu-item menu-item only_icon_false">  <!-- -has-children only den once menu-item-has-children -->
                                                <a href="Kategori/<?php echo $db->seo($kategorialt['kategori_ad']); ?>?id=<?php echo $kategorialt['id'] ?>">
                                                    <span class="nav_link_txt flex al_center"><?=$kategorialt['kategori_ad']?></span><!--<span class="nav_link_icon ml__5"></span>--></a>
                                            </li>

                                        </ul>
                                    <?php } ?>
                                <?php } ?>
                                </li>
                            <?php } ?>

                            <li class="menu-item menu-item-btns menu-item-acount">
                                <a href="#" class="push_side" data-id="#nt_login_canvas"><span class="iconbtns">Giriş / Kayıt Ol</span></a></li>

                            <li class="menu-item menu-item-infos">
                                <div class="menu_infos_text">
                                    <i class="pegk pe-7s-call fwb mr__10"></i>+01 23456789<br><i class="pegk pe-7s-mail fwb mr__10"></i>
                                    <a class="cg" href="mailto:claue@domain.com">claue@domain.com</a>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>

            </div>
            <!-- end mobile menu -->


            <!-- back to top button-->
            <a id="nt_backtop" class="pf br__50 z__100 des_bt1" href="#"><span class="tc br__50 db cw"><i class="pr pegk pe-7s-angle-up"></i></span></a>
            


            <!--<script src="assets/js/jquery-3.5.1.min.js"></script>-->
            <script src="assets/js/jquery-3.6.1.min.js"></script>
            <script src="assets/js/jarallax.min.js"></script>
            <script src="assets/js/packery.pkgd.min.js"></script>
            <script src="assets/js/jquery.hoverIntent.min.js"></script>
            <script src="assets/js/magnific-popup.min.js"></script>
            <script src="assets/js/flickity.pkgd.min.js"></script>
            <script src="assets/js/lazysizes.min.js"></script>
            <script src="assets/js/js-cookie.min.js"></script>
            <script src="assets/js/jquery.countdown.min.js"></script>
            <script src="assets/js/photoswipe.min.js"></script>
            <script src="assets/js/photoswipe-ui-default.min.js"></script>
            <script src="assets/js/drift.min.js"></script>
            <script src="assets/js/isotope.pkgd.min.js"></script>
            <script src="assets/js/resize-sensor.min.js"></script>
            <script src="assets/js/theia-sticky-sidebar.min.js"></script>
            <script src="assets/js/interface.js"></script>
            

            </body>
            </html>
