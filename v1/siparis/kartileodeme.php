<?php include "../header.php" ?>

<?php

        $id = $_GET["id"];
        $sipariskod = $db->db_select("select * from siparisler where id=?",[$id]);
        $insrt = $db->db_select("update siparisler SET Siparis_durumu = ? WHERE id = ?",[2,$id]);






?>

    <div id="nt_content">
      
      	<title> Kredi Kartı İle Ödeme Sonucu</title>

        <!-- hero title -->
        <div class="kalles-section page_section_heading">
            <div class="page-head tc pr oh page_bg_img page_head_cart_heading">
                <div class="parallax-inner nt_parallax_false nt_bg_lz pa t__0 l__0 r__0 b__0 lazyload"
                     data-bgset="assets/images/shopping-cart/shopping-cart-head.jpg">
                </div>
                <div class="container pr z_100"><h1 class="tu mb__10 cw">KREDİ KARTI İLE ÖDEME</h1></div>
            </div>
        </div>
        <!-- end hero title -->

        <!--cart section-->
        <div class="kalles-section cart_page_section container mt__60">
            <div class="alert alert-info">
                <center>SİPARİŞİNİZ BAŞARILI BİR ŞEKİLDE GERÇEKLEŞTİ.<br>
                    Sipariş No: #<?=$sipariskod["sipariskodu"]?><br> Sipariş Takibi için Sipariş Numaranızı kaydetmeyi unutmayın.</center>
            </div>

            <center><div class="kalles-section cart_page_section container mt__30">
                    <div class="alert alert-success">
                        Sipariş tutarının .... Yüzdesi Kızılay Derneğine adınıza bağaş yapılacaktır. <br>
                        Siparişinizin durumunu öğrenmek için Sipariş Takip sayfamızı kullanabilirsiniz. </div></center>



        </div>



    </div>



    </div>
    <br>
<?php include "../footer.php" ?>