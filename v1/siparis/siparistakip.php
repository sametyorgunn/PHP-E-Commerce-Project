<?php include "../header.php" ?>


<?php
    if($_POST)
    {
        $mail = $_POST["Mail"];
        $sipariskodu = $_POST["sipariskodu"];

        $siparis = $db->db_select("SELECT * FROM siparisler where sipariskodu = ? AND Mail = ?",[$sipariskodu,$mail]);
        if($siparis)
        {

            $_SESSION["SiparisSorgulaUser"] = $siparis["user_id"];
            header("location: siparistakipdetay");
        }
        else
        {?>
            <div class="alert alert-danger"> sipariş bulunamadı!!</div>
        <?php
        }


    }
?>

<div id="nt_content">
  
   		<title> Sipariş Takip</title>

    <!--hero banner-->
    <div class="kalles-section page_section_heading">
        <div class="page-head tc pr oh cat_bg_img page_head_">
            <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/shop/collection-list/bg-heading.jpg"></div>
            <div class="container pr z_100">
                <h1 class="mb__5 cw">Sipariş Takip</h1>
            </div>
        </div>
    </div>
    <!--end hero banner-->

    <!--page content-->
    <div class="container mt__40 mb__40 cb">
        <div class="kalles-term-exp mb__30">

        <form method="post">
            <center>
                <div class="col-6">
                    <p>
                        <input class="search_header__input" type="mail" name="Mail" placeholder="Mail Adresi">
                    </p>
                </div>

                <div class="col-6">
                    <p>
                        <input class="search_header__input js_iput_search" type="text" name="sipariskodu" placeholder="Sipariş Takip Numarası">
                    </p>
                </div>

                <button type="submit" class="btn btn-danger btn-sm">SORGULA</button>
            </center>
        </form>






        </div>
        <!--end page content-->

    </div>


    <?php include "../footer.php" ?>

