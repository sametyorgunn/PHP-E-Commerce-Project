    <?php include '../header.php'; ?>

    <?php $sql=$db->wread("urun","id",$_GET['id']);
    $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>


    <?php


    if ($_POST) {

        $uyeolmayan = $_COOKIE['uyeolmayan'];
        $uyeolan = $_SESSION['id'];
        $urunid = $row['id'];
        $urunad = $row['urun_ad'];
        $adet = $_POST['adet'];
        $birimfiyat = $row['fiyat'];
        if ($row['indirimlifiyat']!=0) {
            $indirimfiyat = $row['indirimlifiyat'];
        } else {
            $indirimfiyat = $birimfiyat;
        }
        $varyantid = json_encode($_POST['urunvaryant']);
        $uruntip = 'bos';

        if ($_COOKIE['login'] != 'success') {

            $sql2 = $db->wread("sepet", "urun_id", $row['id']);
            $row2 = $sql2->fetch(PDO::FETCH_ASSOC);

            $sql3 = $db->wread("sepet", "uyeolmayan", $uyeolmayan);
            $row3 = $sql3->fetch(PDO::FETCH_ASSOC);

            $sql4 = $db->db_select("SELECT * FROM sepet WHERE urun_id = ? AND uyeolmayan = ?", [$row['id'],$uyeolmayan]);

            if (!$sql4) {
                $ekle = $db->db_insert("INSERT INTO sepet SET urun_id = ?, urun_ad = ?, adet = ?, birim_fiyat = ?, indirimli_fiyat = ?, varyant_id = ?, urun_tipi = ?, uyeolmayan = ?",
                    [$urunid,$urunad,$adet,$birimfiyat,$indirimfiyat,$varyantid,$uruntip,$uyeolmayan]);
            } else {
                $yeniadet = $adet + $sql4['adet'];
                $guncelle = $db->db_update("UPDATE sepet SET adet = ? WHERE urun_id = ? AND uyeolmayan = ?",
                    [$yeniadet,$urunid,$uyeolmayan]);
            }
        } else {
            $sql2 = $db->wread("sepet", "urun_id", $row['id']);
            $row2 = $sql2->fetch(PDO::FETCH_ASSOC);

            $sql3 = $db->wread("sepet", "user_id", $uyeolan);
            $row3 = $sql3->fetch(PDO::FETCH_ASSOC);

            $sql4 = $db->db_select("SELECT * FROM sepet WHERE urun_id = ? AND user_id = ?", [$row['id'],$uyeolan]);

            if (!$sql4) {
                $ekle = $db->db_insert("INSERT INTO sepet SET urun_id = ?, urun_ad = ?, adet = ?, birim_fiyat = ?, indirimli_fiyat = ?, varyant_id = ?, urun_tipi = ?, user_id = ?",
                    [$urunid,$urunad,$adet,$birimfiyat,$indirimfiyat,$varyantid,$uruntip,$uyeolan]);
            } else {
                $yeniadet = $adet + $sql4['adet'];
                $guncelle = $db->db_update("UPDATE sepet SET adet = ? WHERE urun_id = ? AND user_id = ?",
                    [$yeniadet,$urunid,$uyeolan]);
            }
        }

    }


    ?>

    <div id="nt_content">
        <div class="sp-single sp-single-1 des_pr_layout_1 mb__60">

            <!-- breadcrumb -->
            <div class="bgbl pt__20 pb__20 lh__1">
            <div class="container">
            <div class="row al_center">
            <div class="col">
            <?php
                $kategoriId = $row["kategori"];
                $breadcrump = $db->db_select("select * from kategori where id = ?",[$kategoriId]);
            ?>
            <nav class="sp-breadcrumb">

            <a href="Anasayfa">Anasayfa</a><i class="facl facl-angle-right"></i>
                <?php
                    $kat = $db->db_select("select * from kategori where id = ?",[$kategoriId]);
                    $ustkat =  $db->db_select2("select * from kategori where id = ?",[$kat["ust"]]);
                foreach ($ustkat as $item) {?>
            <a href="Kategori/<?=$breadcrump["kategori_slug"]?>?id=<?=$kategoriId?>"><?php echo $item["kategori_ad"]?><i class="facl facl-angle-right"></i><?php echo $kat["kategori_ad"]?></a><i class="facl facl-angle-right"></i><?=$row['urun_ad']?>
                <?php }?>
            </nav>
            </div>
                     
            </div>
            </div>
            </div>
            <!-- end breadcrumb -->

            <div class="container container_cat cat_default">
                <div class="row product mt__40">
                    <div class="col-md-12 col-12 thumb_left">
                        <div class="row mb__50 pr_sticky_content">

            <!-- product thumbnails -->
            <div class="col-md-6 col-12 pr product-images img_action_zoom pr_sticky_img kalles_product_thumnb_slide">
            <div class="row theiaStickySidebar">
            
            <div class="col-12 col-lg col_thumb">

            <div class="p-thumb p-thumb_ppr images sp-pr-gallery equal_nt nt_contain ratio_imgtrue position_8 nt_slider pr_carousel" data-flickity='{"initialIndex": ".media_id_001","fade":true,"draggable":">1","cellAlign": "center","wrapAround": true,"autoPlay": false,"prevNextButtons":true,"adaptiveHeight": true,"imagesLoaded": false, "lazyLoad": 0,"dragThreshold" : 6,"pageDots": false,"rightToLeft": false }'>
            <div class="img_ptw p_ptw p-item sp-pr-gallery__img w__100 nt_bg_lz lazyload padding-top__127_66 media_id_001" data-mdid="001" data-height="1440" data-width="1128" data-ratio="0.7833333333333333" data-mdtype="image"
             data-src="images/urun/<?=$row['resim']?>" data-bgset="images/urun/<?=$row['resim']?>" data-cap="Blush Beanie - color pink , size S"></div>
            <?php foreach(json_decode($row["resimler"]) as $resimler){ ?>
                <div class="img_ptw p_ptw p-item sp-pr-gallery__img w__100 nt_bg_lz lazyload padding-top__127_66 media_id_001" data-mdid="001" data-height="1440" data-width="1128" data-ratio="0.7833333333333333" data-mdtype="image"
                data-src="images/urun/<?=$resimler?>" data-bgset="images/urun/<?=$resimler?>" data-cap="Blush Beanie - color pink , size S"></div>
            <?php } ?>

            </div>

            <div class="p_group_btns pa flex">
            <button class="br__40 tc flex al_center fl_center show_btn_pr_gallery ttip_nt tooltip_top_left">
            <i class="las la-expand-arrows-alt"></i><span class="tt_txt">Click to enlarge</span>
            </button>
            </div>
            </div>

            <div class="col-12 col-lg-auto col_nav nav_medium t4_show">
            <div class="p-nav ratio_imgtrue row equal_nt nt_cover position_8 nt_slider pr_carousel" data-flickityjs='{"initialIndex": ".media_id_001","cellSelector": ".n-item:not(.is_varhide)","cellAlign": "left","asNavFor": ".p-thumb","wrapAround": true,"draggable": ">1","autoPlay": 0,"prevNextButtons": 0,"percentPosition": 1,"imagesLoaded": 0,"pageDots": 0,"groupCells": 3,"rightToLeft": false,"contain":  1,"freeScroll": 0}'></div>
            <button type="button" aria-label="Previous" class="btn_pnav_prev pe_none">
            <i class="las la-angle-up"></i>
            </button>
            
            <button type="button" aria-label="Next" class="btn_pnav_next pe_none">
            <i class="las la-angle-down"></i></button>
            </div>
            <div class="dt_img_zoom pa t__0 r__0 dib"></div>
            </div>
            </div>
            <!-- end product thumbnails -->


            <!-- product info -->
            <div class="col-md-6 col-12 product-infors pr_sticky_su">
            <div class="theiaStickySidebar">
            <div class="kalles-section-pr_summary kalles-section summary entry-summary mt__30">
            <h1 class="product_title entry-title fs__16"><?=$row['urun_ad']?></h1>
            <div class="flex wrap fl_between al_center price-review">
                <?php if (isset($row['indirimlifiyat'])) { ?>
                    <span class="price dib mb__5">
                        <del><span class="money"><?=$row['fiyat']?> TL</span></del>
                        <ins><span class="money varyantfiyat"><?=$row['indirimlifiyat']?> TL</span></ins>
                    </span>
                <?php } else { ?>
                    <span class="price dib mb__5">
                        <ins><span class="money varyantfiyat"><?=$row['fiyat']?> TL</span></ins>
                    </span>
                <?php } ?>

            </div>
                <?php $sql4 = $db->db_select("SELECT * FROM kategori WHERE id = ?", [$row['kategori']]); ?>

                <div>

                <h4 class="product_title entry-title fs__16">Kategori :<?=$sql4['kategori_ad']?></h4>
                 </div>
            

            <div class="pr_short_des">
            <p class="mg__0"><?=$row['altozet']?></p>
            </div>
            <form id="formveri" action="" class="sepetekle" method="post">

            <div class="btn-atc atc-slide btn_des_1 btn_txt_3">
            <div id="callBackVariant_ppr">
            <div class="nt_cart_form variations_form variations_form_ppr">
            <div class="dropdown_picker_js variations mb__40 style__simple size_medium">
            <div class="swatch is-label kalles_swatch_js">


            <?php $urunvaryant = $db->db_select("SELECT * FROM urun WHERE id = ?", [$_GET['id']]); ?>
            <?php $kontrol2 = 'sifir' ?>
            <?php if ($urunvaryant['varyant']!='0') { ?>
                <?php $kontrol2 = 'bir' ?>
                <?php $sql=$db->read("varyant");
                while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>
                    <?php foreach (json_decode($urunvaryant['varyant']) as $varyantsecimbak) { ?>
                        <?php $varyantsonbak = json_decode(json_encode($varyantsecimbak), true); ?>
                        <?php foreach (json_decode($row['deger']) as $varyantbak) { ?>
                            <?php if ($varyantbak == $varyantsonbak[$row['varyant_ad']]) { ?>
                                <?php $varyantkontrolet[] = $row['varyant_ad'] ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if (in_array($row['varyant_ad'],$varyantkontrolet)) { ?>
                        <div class="col-12">
                            <h3><?=$row['varyant_ad']?></h3>
                            <select onclick="varyantsecim(<?=$_GET['id']?>)" class="varyantsecim<?=$row['id']?>"  id="varyant" name="urunvaryant[]">
                                <option selected value="secilmedi">Seçim Yapılmadı</option>
                                <?php foreach (json_decode($urunvaryant['varyant']) as $varyantsecim) { ?>
                                    <?php $varyantson = json_decode(json_encode($varyantsecim), true); ?>
                                    <option value="<?=$varyantson['id']?>"><?=$varyantson[$row['varyant_ad']]?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <input type="hidden" id="kontrol" value="<?=$kontrol2?>">

            </div>
            </div>


                <script>
                    function varyantsecim(id) {

                        var e = document.getElementById("varyant");
                        var value = e.value;
                        var text = e.options[e.selectedIndex].text;

                        var type = "varyantfiyat";
                        $.ajax({
                            type: "POST",
                            url: "ajax.php",
                            data: {type,value,id},
                            dataType: "JSON",
                            success: function (response) {
                                if(response["durum"] == "success" ){
                                    $('.varyantfiyat').text(response['sonuc']);
                                }
                                else {
                                    alert("Ürün Eklenemedi");
                                }
                            }
                        });
                    }
                </script>



                <div class="variations_button in_flex column w__100 buy_qv_false">
                    <div class="flex wrap">
                        <div class="quantity pr mr__10 order-1 qty__true d-inline-block" id="sp_qty_ppr">
                            <input name="adet" id="adett" type="number" class="input-text qty text tc qty_pr_js qty_cart_js" name="quantity" value="1">
                            <div class="qty tc fs__14">
                                <button type="button" class="plus db cb pa pd__0 pr__15 tr r__0">
                                    <i class="facl facl-plus"></i>
                                </button>
                                <button type="button" class="minus db cb pa pd__0 pl__15 tl l__0">
                                    <i class="facl facl-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!--
                        <button type="submit" data-time="6000" data-ani="shake" class="single_add_to_cart_button button truncate w__100 mt__20 order-4 d-inline-block animated">
                            <span class="txt_add ">SEPETE EKLE</span>
                        </button>
                        -->
                        <input type="hidden" id="urunid" value="<?=$_GET['id']?>">

                        <button onclick="sepetekle(<?=$urunvaryant["id"]?>,<?=$row['id']?>)" type="button" name="sepet_ekle" id="sepeteklee" class="single_add_to_cart_button button truncate w__100 mt__20 d-inline-block animated">SEPETE EKLE</button>
                    </div>
                </div>

            </form>


                <div >

                </div>





            </div>
            </div>
            </div>

            <!-- description and review -->
            <div id="wrap_des_pr">
            <div class="container container_des">
            
            <div class="kalles-section-pr_description kalles-section kalles-tabs sp-tabs nt_section">
      
            <!-- tab contents -->
            <div class="panel entry-content sp-tab des_mb_2 des_style_1 active" id="tab_product_description">
            <div class="js_ck_view"></div>
            
            <div class="heading bgbl dn">

            <a class="tab-heading flex al_center fl_between pr cd chp fwm" href="#tab_product_description">
            <span class="txt_h_tab">Ürün Açıklaması</span><span class="nav_link_icon ml__5"></span></a>
            </div>

            <div class="sp-tab-content">
            <p style="color: black" class="mb__20 cb">
                <?=$urunvaryant["detay"]?>
            </p>
                                

            </div>
            </div>
                        


            <!-- end tab contents -->
            </div>
            </div>
            </div>
            <!-- end description and review -->


            </div>
            </div>
            </div>
            <!-- end product info -->

            </div>
            </div>
            </div>
            </div>


            <div class="clearfix"></div>

            <hr>
            <!--product recommendations section-->
            <div class="kalles-section tp_se_cdt">
                <div class="related product-extra mt__60 lazyload">
                    <div class="container">
                        <div class="wrap_title des_title_1">
                            <h3 class="section-title tc pr flex fl_center al_center fs__24 title_1">
                                <span class="mr__10 ml__10">Benzer Ürünler</span></h3>
                            <span class="dn tt_divider"><span></span><i class="dn clprfalse title_1 la-gem"></i><span></span></span><span class="section-subtitle db tc sub-title"></span>
                        </div>
                        <div class="products nt_products_holder nt_slider row row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 space_30 prev_next_0 btn_owl_1 dot_owl_1 dot_color_1 btn_vi_1 is-draggable" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": false,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>


                            <?php $durum=1;
                            $benzerurunler = $db->db_select2("select * from urun where durum = ? order by id desc limit 4",[$durum]);
                            foreach($benzerurunler as $urun){
                            ?>
                            <div class="col-lg-3 pr_animated col-md-3 col-6 mt__30 pr_grid_item product nt_pr desgin__1 done">

                                <div class="product-inner pr">
                                    <div class="product-image pr oh lazyload">
                                        <a class="d-block" href="Urundetay/<?php echo $db->seo($urun['urun_ad']); ?>?id=<?php echo $urun['id'] ?>">
                                            <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__127_571" data-bgset="images/urun/<?=$urun["resim"]?>"></div>
                                        </a>
                                        <div class="hover_img pa pe_none t__0 l__0 r__0 b__0 op__0">
                                            <div class="pr_lazy_img back-img pa nt_bg_lz lazyload padding-top__127_571" data-bgset="images/urun/<?=$urun["resim"]?>"></div>
                                        </div>
                                        <div class="nt_add_w ts__03 pa ">
                                            <a href="#" class="wishlistadd cb chp ttip_nt tooltip_right"><span class="tt_txt">favorilere ekle</span><i class="facl facl-heart-o"></i></a>
                                        </div>
                                        <div class="hover_button op__0 tc pa flex column ts__03">
                                            <a class="pr nt_add_qv js_add_qv cd br__40 pl__25 pr__25 bgw tc dib ttip_nt tooltip_top_left" href="Urundetay/<?php echo $db->seo($urun['urun_ad']); ?>?id=<?php echo $urun['id'] ?>"><span class="tt_txt">Ürünü Gör</span><i class="iccl iccl-eye"></i><span>Ürünü Gör</span></a>
                                        <!--    <a href="#" class="pr pr_atc cd br__40 bgw tc dib js__qs cb chp ttip_nt tooltip_top_left"><span class="tt_txt">Sepete Ekle</span><i class="iccl iccl-cart"></i><span>Sepete Ekle</span></a> -->
                                        </div>
                                        <div class="product-attr pa ts__03 cw op__0 tc">
                                            <p class="truncate mg__0 w__100">S, M, L</p></div>
                                    </div>
                                    <div class="product-info mt__15">
                                        <h3 class="product-title pr fs__14 mg__0 fwm">
                                            <a class="cd chp" href="Urundetay/<?php echo $db->seo($urun['urun_ad']); ?>?id=<?php echo $urun['id'] ?>"><?=$urun["urun_ad"]?></a>
                                        </h3>
                                        <span class="price dib mb__5"><?=$urun["indirimlifiyat"]?>TL</span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                        </div>
                    </div>
                </div>
            </div>
            <!--end product recommendations section-->

            
        </div>
    </div>

   <?php include '../footer.php'; ?>