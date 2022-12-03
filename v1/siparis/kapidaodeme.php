<?php include "../header.php" ?>


<?php if($_SESSION["sipariskodu"]!=null){ ?>

    <div id="nt_content">
      
      	<title>Kapıda Ödeme Sayfası</title>

        <!-- hero title -->
        <div class="kalles-section page_section_heading">
            <div class="page-head tc pr oh page_bg_img page_head_cart_heading">
                <div class="parallax-inner nt_parallax_false nt_bg_lz pa t__0 l__0 r__0 b__0 lazyload"
                     data-bgset="assets/images/shopping-cart/shopping-cart-head.jpg">
                </div>
                <div class="container pr z_100"><h1 class="tu mb__10 cw">KAPIDA ÖDEME</h1></div>
            </div>
        </div>
        <!-- end hero title -->

        <!--cart section-->
        <div class="kalles-section cart_page_section container mt__60">
            <div class="alert alert-info">
                <center>SİPARİŞİNİZ BAŞARILI BİR ŞEKİLDE GERÇEKLEŞTİ.<br>
                    Sipariş No: #<?=$_SESSION["sipariskodu"]?> <br> Sipariş Takibi için Sipariş Numaranızı kaydetmeyi unutmayın.</center>
            </div>

            <center><div class="kalles-section cart_page_section container mt__30">
                    <div class="alert alert-success">
                      
                        Siparişinizin ödemesini "KAPIDA ÖDEME" olarak belirlediniz. Siparişinizi teslim aldığınızda Ödemenizi gerçekleştirebilirsiniz.
                    </div></center>



        </div>



    </div>



    </div>
<?php } ?>
    <br>
<?php include "../footer.php" ?>