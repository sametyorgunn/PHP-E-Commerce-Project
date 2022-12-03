    <?php require_once 'ayar.php';  ?>
    <?php session_start();
    if (empty($_COOKIE['uyeolmayan']) && $_COOKIE['login'] != 'success')  {
        setcookie("uyeolmayan",rand(10, 1000));
    } ?>

    <?php $ayar = $db->db_select("SELECT * FROM ayar where id = ?", [0]); ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <base href="https://www.muratcemgenc.com.tr/v1/">
    <meta charset="utf-8">
    <base href="http://localhost:8080/r10/index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="images/logo/<?=$ayar['Logo']?>>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-icon.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/defined.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/home-medical.css">
    <link rel="stylesheet" href="assets/css/home-shoes.css">
    <link rel="stylesheet" href="assets/css/shop.css">
    <link rel="stylesheet" href="assets/css/shopping-cart.css">
    <link rel="stylesheet" href="assets/css/home-default.css">
    <link rel="stylesheet" href="assets/css/single-masonry-theme.css">
    <link rel="stylesheet" href="assets/css/single-product.css">
    
    </head>

   

      <body class="kalles-template header_full_true des_header_3 cart_pos_side css_scrollbar label_style_rectangular wrapper_cus lazy_icons header_sticky_true hide_scrolld_true des_header_9 top_bar_true prs_bordered_grid_1 search_pos_canvas btnt4_style_2 zoom_tp_2 css_scrollbar template-cart kalles_toolbar_true hover_img2 swatch_style_rounded swatch_list_size_small label_style_rounded wrapper_full_width header_full_true hide_scrolld_true lazyload">





    <div id="nt_wrapper">

    <!-- header -->
    <header id="ntheader" class="ntheader header_9 h_icon_la">
    <div class="ntheader_wrapper pr z_200">
    <div id="kalles-section-header_top" class="kalles-section">
    <div class="h__top bgbl pt__10 pb__10 fs__12 flex fl_center al_center">
    <div class="container">
    <div class="row al_center">
    <div class="col-lg-4 col-12 tc tl_lg col-md-12 dn_false_1024">
    <?php 
    $sql=$db->qsql("SELECT * FROM ayar where id= 0");
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

    <div class="header-text"><i class="pegk pe-7s-call"></i> <?php echo $row['telefon'] ?>
    <i class="pegk pe-7s-mail ml__15"></i>
    <a class="cg" href="mailto:<?php echo $row['mail'] ?>"><?php echo $row['mail'] ?></a>
    </div>
    <?php } ?>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <div id="kalles-section-header_9" class="kalles-section sp_header_mid">
    <div class="header__mid header__mid9">
    <div class="container">
    <div class="row al_center css_h_se">
    <div class="col-md-4 col-3 dn_lg">
    
    <a href="#" data-id='#nt_menu_canvas' class="push_side push-menu-btn  lh__1 flex al_center">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16">
    <rect width="30" height="1.5"></rect>
    <rect y="7" width="20" height="1.5"></rect>
    <rect y="14" width="30" height="1.5"></rect>
    </svg>
    </a></div>
    
    <div class="col-lg-auto col-md-4 col-6 tc tl_lg">
    <div class=" branding ts__05 lh__1">
    <a class="dib" href="Anasayfa">
    <img class="w__100 logo_normal dn db_lg" src="images/logo/<?=$ayar['Logo']?>">
    <img class="w__100 logo_sticky dn" src="images/logo/<?=$ayar['Logo']?>">
    <img class="w__100 logo_mobile dn_lg w__100" src="images/logo/<?=$ayar['Logo']?>">
    </a>
    </div>
    </div>
    
    <div class="col dn db_lg">
    <nav class="nt_navigation tl hover_side_up nav_arrow_false">
    <ul id="nt_menu_id" class="nt_menu in_flex wrap al_center">
    <li class="type_mega menu_wid_cus menu-item has-children menu_has_offsets menu_center pos_center">
    <a class="lh__1 flex al_center pr" href="Anasayfa">Anasayfa</a> </li>

  
    <?php 
    $sql=$db->qsql("SELECT * FROM kategori where ust=0");
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

    <li class="type_dropdown menu-item has-children menu_has_offsets menu_right pos_right">
    <a class="lh__1 flex al_center pr" href="Kategori/<?php echo $db->seo($row['kategori_ad']); ?>?id=<?php echo $row['id'] ?>">
    <?php echo $row['kategori_ad'] ?></a>
        <?php
        $sql2=$db->qsql("SELECT * FROM kategori where ust!=0");
        while ($row2=$sql2->fetch(PDO::FETCH_ASSOC)) {
        if ($row2['ust'] == $row['id']) { ?>
    <div class="sub-menu">
    <div class="lazy_menu lazyload">

    <div class="menu-item">
    <a href="Kategori/<?php echo $db->seo($row2['kategori_ad']); ?>?id=<?php echo $row2['id'] ?>"><?php echo $row2['kategori_ad'] ?></a></div>

    </div>
    </div>
        <?php } } ?>
    </li> <?php } ?>
                                   
    </ul>
    </nav>
    </div>
    



    <div class="col-lg-auto col-md-4 col-3 tr">
    <div class="nt_action in_flex al_center cart_des_1">
    <div class="frm_search_ac pr widget dn db_lg">

        <?php
            if($_POST["arama"])
            {
                $aranan = $_POST["arama"];
                $_SESSION["aranankelime"] = $aranan;
                header("location:Arama");
            }
        ?>

    <form method="post" class="search_header mini_search_frm pr js_frm_search flex al_center" role="search">
    <div class="frm_search_input pr oh">
    <input class="search_header__input js_iput_search" autocomplete="off" type="text" name="arama" placeholder="Ürün Ara...">
    <button class="search_header__submit js_btn_search pe_none" type="submit">
    <i class="iccl iccl-search"></i></button>
    </div>
    
    <div class="ld_bar_search"></div>
    </form>
    
    <div class="search_h_break pa w__100"></div>
    <div class="search_header__prs fwsb cd pa dn js_prs_search product_list_widget"></div>
    </div>
    
    <a class="icon_search push_side cb chp dn_lg" data-id="#nt_search_canvas" href="#"><i class="las la-search"></i></a>
    <div class="my-account ts__05 pr dn db_md">
    <a class="cb chp db push_side" href="UyeGiris"><i class="las la-user"></i></a>
    </div>

        <?php $uyeolmayan = $_COOKIE['uyeolmayan'];
        $sql=$db->qsql("SELECT * FROM sepet WHERE uyeolmayan = $uyeolmayan");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
            $sepetarray[] = $row['id'];
         } ?>

    <div class="icon_cart pr">
    <a class="push_side pr cb chp db" id="sepetiac" href="#" data-id="#nt_cart_canvas"><i class="las la-shopping-cart pr">
    <span id="urunadetyenileme" class="op__0 ts_op pa tcount bgb br__50 cw tc"><?=count($sepetarray)?></span></i></a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </header>
    <!-- end header -->