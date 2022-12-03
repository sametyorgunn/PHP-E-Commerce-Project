        <?php include 'header.php'; ?>

        <?php 
        $sql=$db->qsql("SELECT * FROM ayar where id= 0");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

        <title><?php echo $row['title'] ?></title>
        <meta name="keywords" content="<?php echo $row['keywords'] ?>">
        <meta name="description" content="<?php echo $row['description'] ?>">

        <?php } ?>

        <div id="nt_content">

        <!-- main slide -->
        <div class="kalles-medical__main-slide kalles-section nt_section type_slideshow type_carousel">
        <div class="kalles-medical__main-slide-inside nt_full se_height_cus_h nt_first">
        <div class="fade_flick_1 slideshow row no-gutters equal_nt nt_slider js_carousel prev_next_0 btn_owl_1 dot_owl_2 dot_color_1 btn_vi_2" data-flickity='{ "fade":0,"cellAlign": "center","imagesLoaded": 0,"lazyLoad": 0,"freeScroll": 0,"wrapAround": true,"autoPlay" : 0,"pauseAutoPlayOnHover" : true, "rightToLeft": false, "prevNextButtons": false,"pageDots": true, "contain" : 1,"adaptiveHeight" : 1,"dragThreshold" : 5,"percentPosition": 1 }'>
          

        <?php 
        $sql=$db->qsql("SELECT * FROM slider ORDER BY sira");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

        <div class="kalles-medical__slide-01 col-12 slideshow__slide">
        <div class="oh pr nt_img_txt">
        <div class="js_full_ht4 img_slider_block dek_img_slide">
        <div class="bg_rp_norepeat bg_sz_cover lazyload item__position center center img_tran_ef pa l__0 t__0 r__0 b__0" 
        data-bgset="images/slider/<?php echo $row['resim'] ?>"></div>
        </div>
        
        <div class="js_full_ht4 img_slider_block mb_img_slide">
        <div class="bg_rp_norepeat bg_sz_cover lazyload item__position center center img_tran_ef pa l__0 t__0 r__0 b__0" 
        data-bgset="images/slider/<?php echo $row['resim'] ?>"></div>
        </div>
                           
        <a href="<?php echo $row['link'] ?>" class="pa t__0 l__0 b__0 r__0 pe_none"></a>
        </div>
        </div> <?php } ?>
        

        </div>
        </div>
        </div>
        <!-- end main slide -->

        <!-- banner section -->
        <div class="kalles-section nt_section type_banner2 type_packery">
        <div class="kalles-medical__banner container">
        <div class="mt__30 nt_banner_holder row fl_center js_packery hoverz_true cat_space_30" data-packery='{ "itemSelector": ".cat_space_item","gutter": 0,"percentPosition": true,"originLeft": true }'>
        <div class="grid-sizer"></div>
                    

        <?php 
        $sql=$db->qsql("SELECT * FROM banner where id= 1");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
        
        <div class="cat_space_item col-lg-4 col-md-6 col-12 pr_animated done kalles-medical__banner-01">
        <div class="nt_promotion oh pr">
        <div class="nt_bg_lz pr_lazy_img lazyload item__position" data-bgset="images/banner/<?php echo $row['resim'] ?>"></div>
        <a href="<?php echo $row['link'] ?>" class="pa t__0 l__0 r__0 b__0"></a>
        </div>
        </div> <?php } ?>

        
        <?php 
        $sql=$db->qsql("SELECT * FROM banner where id= 2");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

        <div class="cat_space_item col-lg-4 col-md-6 col-12 pr_animated done kalles-medical__banner-02">
        <div class="nt_promotion oh pr">
        <div class="nt_bg_lz pr_lazy_img lazyload item__position" data-bgset="images/banner/<?php echo $row['resim'] ?>"></div>
        <a href="<?php echo $row['link'] ?>" class="pa t__0 l__0 r__0 b__0"></a>
        </div>
        </div> <?php } ?>
        

        <?php 
        $sql=$db->qsql("SELECT * FROM banner where id= 3");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
        
        <div class="cat_space_item col-lg-4 col-md-6 col-12 pr_animated done kalles-medical__banner-03">
        <div class="nt_promotion oh pr">
        <div class="nt_bg_lz pr_lazy_img lazyload item__position" data-bgset="images/banner/<?php echo $row['resim'] ?>"></div>
        <a href="<?php echo $row['link'] ?>" class="pa t__0 l__0 r__0 b__0"></a>
        </div>
        </div> <?php } ?>


        </div>
        </div>
        </div>
        <!--end banner section-->

        <!--category section-->

        <div class="kalles-section nt_section type_carousel type_collection_list">
            <div class="kalles-medical__category-block container">
                <div class="row al_center fl_center title_10">
                    <div class="col-auto col-md"><h3 class="dib tc section-title fs__24">İndirimdeki Ürünler</h3></div>
                    <div class="col-auto"><a href="#"></a></div>
                </div>
                <div class="mt__30 nt_cats_holder row fl_center equal_nt hoverz_true ratio1_1 cat_space_20 cat_design_5 nt_slider js_carousel prev_next_3 btn_owl_1 dot_owl_2 dot_color_3 btn_vi_2" data-flickity='{"imagesLoaded": false, "adaptiveHeight": true, "contain": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": false,"percentPosition": true,"pageDots": true, "autoPlay" : false, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                    <?php
                    $sql=$db->qsql("SELECT * FROM urun where indirimyuzdeorani != 0");
                    while ($urun=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <div class="cat_grid_item cat_space_item cat_grid_item_1 col-lg-2 col-md-3 col-12">
                        <div class="cat_grid_item__content pr oh">
                            <a href="Urundetay/<?php echo $db->seo($urun['urun_ad']); ?>?id=<?php echo $urun['id'] ?>" class="db cat_grid_item__link">
                                <div class="cat_grid_item__overlay item__position nt_bg_lz lazyload center" data-bgset="images/urun/<?=$urun['resim']?>"></div>
                            </a>
                            <div class="cat_grid_item__wrapper pe_none">
                               <div class="product-info mt__15">
                                <h3 class="product-title pr fs__14 mg__0 fwm">
                                    <a class="cd chp" href="Urundetay/<?php echo $db->seo($urun['urun_ad']); ?>?id=<?php echo $urun['id'] ?>"><?php echo $urun['urun_ad'] ?> </a>
                                </h3>
                                <span class="price dib mb__5">
                                        <del><span class="money"><?php echo $urun['fiyat'] ?>TL</span></del>
                                        <ins><span class="money"><?php echo $urun['indirimlifiyat'] ?>TL</span></ins>
                                    </span>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--end category section-->

        <!--daily deal section-->
        <div class="kalles-section nt_section type_prs_countd_deal type_carousel tp_se_cdt">
            <div class="kalles-medical__deal-section container">
                <div class="medizin_laypout">
                    <div class="product-cd-header in_flex wrap al_center fl_center tc">
                        <h6 class="product-cd-heading section-title">Haftanın Fırsatları</h6>
                       
                    </div>
                    <div class="products nt_products_holder row fl_center row_pr_1 js_carousel nt_slider nt_cover ratio1_1 position_8 space_ prev_next_3 btn_owl_1 dot_owl_1 dot_color_1 btn_vi_2 equal_nt" data-flickity='{"imagesLoaded": 0,"adaptiveHeight": 0, "contain": 1, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": 1,"pageDots": false, "autoPlay" : 0, "pauseAutoPlayOnHover" : true, "rightToLeft": false }'>
                        <?php
                        $sql=$db->qsql("SELECT * FROM urun limit 5");
                        while ($urun=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

                        <div class="col-lg-15 col-md-3 col-6 pr_animated done mt__10 pr_grid_item product nt_pr desgin__1">
                            <div class="product-inner pr">
                                <div class="product-info mb__15">
                                    <h3 class="product-title pr fs__14 mg__0 fwm">
                                        <a class="cd chp" href="Urundetay/<?php echo $db->seo($urun['urun_ad']); ?>?id=<?php echo $urun['id'] ?>"><?php echo $urun['urun_ad'] ?></a>
                                    </h3>
                                    <span class="price dib mb__5">
                                        <del><span class="money"><?php echo $urun['fiyat'] ?>TL</span></del><ins><span class="money"><?php echo $urun['indirimlifiyat'] ?>TL</span></ins>
                                    </span>
                                </div>
                                <div class="product-image pr oh lazyload">
                                    <span class="tc nt_labels pa pe_none cw">
                                        <span class="onsale nt_label"><span><?php echo $urun['indirimyuzdeorani'] ?>%</span></span>
                                    </span>
                                    <a class="db" href="Urundetay/<?php echo $db->seo($urun['urun_ad']); ?>?id=<?php echo $urun['id'] ?>">
                                        <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload" data-bgset="images/urun/<?=$urun['resim']?>"></div>
                                    </a>
                                 
                                </div>
                                <div class="loop-product-stock">
                                    <div class="status-bar">
                                        <div class="sold-bar w_100-percent"></div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <!--end daily deal section-->

      


        <!--deal banner-->
        <div class="kalles-section nt_section type_banner2 type_packery">
        <div class="kalles-medical__deal-banner container">
        <div class="mt__30 nt_banner_holder row fl_center js_packery hoverz_true cat_space_30" data-packery='{ "itemSelector": ".cat_space_item","gutter": 0,"percentPosition": true,"originLeft": true }'>
        <div class="grid-sizer"></div>
        
        <?php 
        $sql=$db->qsql("SELECT * FROM banner where id= 4");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

        <div class="cat_space_item col-lg-8 col-md-6 col-12 pr_animated done kalles-medical-deal-banner__layout-01">
        <div class="nt_promotion oh pr">
        <div class="nt_bg_lz pr_lazy_img lazyload item__position" data-bgset="images/banner/<?php echo $row['resim'] ?>"></div>
        <a href="<?php echo $row['link'] ?>" class="pa t__0 l__0 r__0 b__0"></a>
        </div>
        </div> <?php } ?>
        

        <?php 
        $sql=$db->qsql("SELECT * FROM banner where id= 5");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

        <div class="cat_space_item col-lg-4 col-md-12 col-12 pr_animated done kalles-medical-deal-banner__layout-02">
        <div class="nt_promotion oh pr">
        <div class="nt_bg_lz pr_lazy_img lazyload item__position" data-bgset="images/banner/<?php echo $row['resim'] ?>"></div>
        <a href="<?php echo $row['link'] ?>" class="pa t__0 l__0 r__0 b__0"></a>
        </div>
        </div> <?php } ?>



        </div>
        </div>
        </div>
        <!--end deal banner-->

        <!--best selling items-->
        <div class="kellas-section nt_section type_featured_collection tp_se_cdt">
        <div class="kalles-medical__best-selling-items container">
        <div class="row al_center fl_center title_10">
        <div class="col-auto col-md"><h3 class="dib tc section-title fs__24">Yeni Ürünler</h3></div>
        </div>
        

        <div class="products nt_products_holder row fl_center row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 space_30">

        <?php
        $sql=$db->qsql("SELECT * FROM urun ORDER BY id desc limit 5");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

            <div class="col-lg-15 col-md-3 col-6 pr_animated done mt__30 pr_grid_item product nt_pr desgin__1">
                <div class="product-inner pr">
                    <div class="product-image pr oh lazyload">
                        <?php if($row['indirimyuzdeorani']==0 || $row['indirimyuzdeorani']==null )
                        {?>

                        <?php } else { ?>
                        <span class="tc nt_labels pa pe_none cw">
                            <span class="onsale nt_label"><span>-<?=$row['indirimyuzdeorani']?>%</span></span>
                        </span>
                        <?php } ?>
                        <a class="db" href="Urundetay/<?php echo $db->seo($row['urun_ad']); ?>?id=<?php echo $row['id'] ?>">
                            <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" data-bgset="images/urun/<?=$row['resim']?>"></div>
                        </a>
                    </div>
                    <div class="product-info mt__15">
                        <h3 class="product-title pr fs__14 mg__0 fwm">
                            <a class="cd chp" href="Urundetay"><?=$row['urun_ad']?></a>
                        </h3>
                        <span class="price dib mb__5">
                            <del><span class="money"><?=$row['fiyat']?> TL</span></del>
                            <ins><span class="money"><?=$row['indirimlifiyat']?> TL</span></ins>
                        </span>
                    </div>
                </div>
            </div>

        <?php } ?>
                  



                </div>
            </div>
        </div>
        <!--end best selling items-->


    </div>

    <?php include 'footer.php'; ?>

