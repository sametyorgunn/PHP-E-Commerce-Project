    <?php include '../header.php'; 

    $sql=$db->wread("sozlesme","id",$_GET['id']);
    $row=$sql->fetch(PDO::FETCH_ASSOC); ?>

    <title><?php echo $row['baslik'] ?></title>

    <div id="nt_content">

        <!--hero banner-->
        <div class="kalles-section page_section_heading">
            <div class="page-head tc pr oh cat_bg_img page_head_">
                <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/shop/shop-banner.jpg"></div>
                <div class="container pr z_100">
                    <h1 class="mb__5 cw"><?php echo $row['baslik'] ?></h1>
                </div>
            </div>
        </div>
        <!--end hero banner-->

        <!--page content-->
        <div class="kalles-section container mt__20 mb__60">
            <div class="row fl_center cb">
               
                <div class=" col-12 col-md-12 txtn mt__25">
                    <p class="mg__0">
                    <?php echo $row['detay'] ?>
                    </p>
                </div>
              
                

            </div>
        </div>
        <!--end page content-->

    </div>

   <?php include '../footer.php'; ?>