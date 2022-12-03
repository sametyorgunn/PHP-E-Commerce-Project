    <?php include '../header.php'; ?>

    <div id="nt_content">
      
      <title>Kategori Adı</title> 
      <meta name="keywords" content="    ">
      <meta name="description" content="    ">
      
        <!--category menu-->
        <div class="kalles-section cat-shop pr tc">
            <div class="dn" id="cat_kalles">
                <ul class="cat_lv_0">
                    <?php $id = $_GET['id'];
                    $sql=$db->qsql("SELECT * FROM kategori where ust=$id");
                    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
                        <li class="cat-item"><a class="cat_link dib" href="Kategori/<?php echo $db->seo($row['kategori_ad']); ?>?id=<?=$row['id']?>"><?=$row['kategori_ad']?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!--end category menu-->
      
      


        
        <!--shop banner-->
        <div class="kalles-section page_section_heading">
        <div class="page-head tc pr oh cat_bg_img page_head_">
        
        <?php 
        $sql=$db->qsql("SELECT * FROM banner where id= 6");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0"
        data-bgset="images/banner/<?php echo $row['resim'] ?>"></div> <?php } ?>
        <div class="container pr z_100">
            <?php $kategori = $db->db_select("select * from kategori where id = ?",[$id]);?>
            <?php if ($kategori['ust'] != 0) { ?>
                <?php $kategoriust = $db->db_select("select * from kategori where id = ?",[$kategori['ust']]);?>
                <h1 class="mb__5 cw"><?=$kategoriust['kategori_ad'] . ' / ' .$kategori['kategori_ad']?></h1>
            <?php } else { ?>
                <h1 class="mb__5 cw"><?=$kategori['kategori_ad']?></h1>
            <?php } ?>
        </div>
        </div>
        </div>
        <!--end shop banner-->

        <div class="container container_cat pop_default cat_default mb__60">

            <!--grid control-->
            <div class="cat_toolbar row fl_center al_center mt__30">
                <div class="cat_filter col op__0 pe_none">
                 
                </div>
                <div class="cat_view col-auto">
                    <div class="dn dev_desktop">
                        <a href="#" data-mode="list" data-dev="dk" data-col="listt4" class="pr mr__10 cat_view_page view_list view_listt4"></a>
                        <a href="#" data-mode="grid" data-dev="dk" data-col="6" class="pr mr__10 cat_view_page view_6"></a>
                        <a href="#" data-mode="grid" data-dev="dk" data-col="4" class="pr mr__10 cat_view_page view_4"></a>
                        <a href="#" data-mode="grid" data-dev="dk" data-col="3" class="pr mr__10 cat_view_page view_3 active"></a>
                        <a href="#" data-mode="grid" data-dev="dk" data-col="15" class="pr mr__10 cat_view_page view_15"></a>
                        <a href="#" data-mode="grid" data-dev="dk" data-col="2" class="pr cat_view_page view_2"></a>
                    </div>
                    <div class="dn dev_tablet dev_view_cat">
                        <a href="#" data-dev="tb" data-col="listt4" class="pr mr__10 cat_view_page view_list view_listt4"></a>
                        <a href="#" data-dev="tb" data-col="6" class="pr mr__10 cat_view_page view_6"></a>
                        <a href="#" data-dev="tb" data-col="4" class="pr mr__10 cat_view_page view_4"></a>
                        <a href="#" data-dev="tb" data-col="3" class="pr cat_view_page view_3"></a>
                    </div>
                    <div class="flex dev_mobile dev_view_cat">
                        <a href="#" data-dev="mb" data-col="listt4" class="pr mr__10 cat_view_page view_list view_listt4"></a>
                        <a href="#" data-dev="mb" data-col="12" class="pr mr__10 cat_view_page view_12"></a>
                        <a href="#" data-dev="mb" data-col="6" class="pr cat_view_page view_6"></a>
                    </div>
                </div>
                <div class="cat_sortby cat_sortby_js col tr kalles_dropdown kalles_dropdown_container">
                    <a class="in_flex fl_between al_center sortby_pick kalles_dropDown_label" href="#">
                        <span class="lbl-title sr_txt dn">Sırala</span>
                        <span class="lbl-title sr_txt_mb">Sırala</span>
                        <i class="ml__5 mr__5 facl facl-angle-down"></i>
                    </a>
                    <div class="nt_sortby dn">
                        <svg class="ic_triangle_svg" viewBox="0 0 20 9" role="presentation">
                            <path d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z" fill="#ffffff"></path>
                        </svg>
                        <div class="h3 mg__0 tc cd tu ls__2 dn_lg db">Sırala<i class="pegk pe-7s-close fs__50 ml__5"></i>
                        </div>
                        <div class="nt_ajaxsortby wrap_sortby kalles_dropdown_options">
                        <a data-label="Düşükten Yükseğe Sırala" class="kalles_dropdown_option truncate" href="#">Düşükten Yükseğe Sırala</a>
                        <a data-label="Yüksekten, Düşüğe Sırala" class="kalles_dropdown_option truncate" href="#">Yüksekten, Düşüğe Sırala</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end grid control-->


            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="kalles-section tp_se_cdt">


                        <!--products list-->
                        <div class="on_list_view_false products nt_products_holder row fl_center row_pr_1 cdt_des_1 round_cd_false nt_cover ratio_nt position_8 space_30 nt_default">




                <?php
                $sql=$db->qsql("SELECT * FROM urun where durum=1 and kategori=$id");
                while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>


                <div class="col-lg-3 col-md-3 col-6 pr_animated done mt__30 pr_grid_item pr_list_item product nt_pr desgin__1">
                <div class="product-inner pr">
                
                <div class="product-image pr oh lazyload">
                    <?php if($row['indirimyuzdeorani']==0 || $row['indirimyuzdeorani']==null )
                    {?>

                    <?php } else { ?>
                        <span class="tc nt_labels pa pe_none cw"><span class="onsale nt_label"><span>-<?=$row['indirimyuzdeorani']?>%</span></span></span>

                    <?php } ?>
                <a class="db" href="Urundetay/<?php echo $db->seo($row['urun_ad']); ?>?id=<?php echo $row['id'] ?>">
                <div class="pr_lazy_img main-img nt_img_ratio nt_bg_lz lazyload padding-top__100" 
                data-bgset="images/urun/<?=$row['resim']?>"></div>
                </a>
                </div>

                <div class="product-info">
                <div class="product-info__inner">
                <h3 class="product-title pr fs__14 mg__0 fwm">
                <a class="cd chp" href="Urundetay/<?php echo $db->seo($row['urun_ad']); ?>?id=<?php echo $row['id'] ?>"><?=$row['urun_ad']?></a> </h3>

                <span class="price dib mb__5"><del><span class="money"><?=$row['fiyat']?> TL</span></del>
                <ins><span class="money"><?=$row['indirimlifiyat']?> TL</span></ins></span>
                
                <div class="rte dn">
                <p class="mb__5"><?=$row['altozet']?></p>
                </div>
                </div>
                </div>
                </div>
                </div>


                <?php } ?>




                </div>
                <!--end products list-->

                
                <!--navigation-->
                <div class="products-footer tc mt__40 mb__60">
                <nav class="nt-pagination w__100 tc paginate_ajax">
                <ul class="pagination-page page-numbers">
                <li><span class="page-numbers current">1</span></li>
                <li><a class="page-numbers" href="#">2</a></li>
                <li><a class="page-numbers" href="#">3</a></li>
                </ul>
                </nav>
                </div>
                <!--end navigation-->

                </div>
                </div>
                </div>
                </div>
                </div>


                <?php include '../footer.php'; ?>