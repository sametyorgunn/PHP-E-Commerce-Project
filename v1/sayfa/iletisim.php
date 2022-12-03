    <?php include '../header.php'; ?>

    <?php
            if($_POST)
            {
                $adsoyad = $_POST["adsoyad"];
                $mail = $_POST["mail"];
                $telefon = $_POST["telefon"];
                $mesaj = $_POST["mesaj"];
                $tarih = date("Y-m-d H:i:s");
                $durum = 0;


                $sql = $db->db_insert("insert into iletisim set adsoyad = ?,mail = ?,telefon = ?,mesaj = ?,durum = ?,tarih = ?",[$adsoyad,$mail,$telefon,$mesaj,$durum,$tarih]);

            }
    ?>

	<title> İletişim Sayfası</title>
    <div id="nt_content">

        <!--hero banner-->
        <div class="kalles-section page_section_heading">
            <div class="page-head tc pr oh cat_bg_img page_head_">
                <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/shop/shop-banner.jpg"></div>
                <div class="container pr z_100">
                    <h1 class="mb__5 cw">Bizimle iletişime geçin</h1>
                    <p class="mg__0">Follow your passion, and success will follow you</p>
                </div>
            </div>
        </div>
        <!--end hero banner-->

        <!--page content-->
        <div class="kalles-section container mb__50 cb">
            <div class="row fl_center">
                <div class="contact-form col-12 col-md-6 order-1 order-md-0">
                    <form method="post" class="contact-form">
                        <h3 class="mb__20 mt__40">İLETİŞİM FORMU</h3>
                        <p>
                            <label for="ct-name">Ad Soyad</label>
                            <input required="required" type="text" name="adsoyad" id="ct-name" value="">
                        </p>
                        <p>
                            <label for="ct-email">Mail</label>
                            <input required="required" type="email" name="mail" id="ct-email" value="">
                        </p>
                        <p>
                            <label for="ct-phone">Telefon</label>
                            <input type="tel" id="ct-phone" name="telefon" pattern="[0-9\-]*" value="">
                        </p>
                        <p>
                            <label for="ct-message">Mesaj</label>
                            <textarea rows="20" id="ct-message" name="mesaj" required="required"></textarea>
                        </p>
                        <input type="submit" class="button w__100" value="Gönder">
                    </form>
                </div>
                <div class="contact-content col-12 col-md-6 order-0 order-md-1">
                    <h3 class="mb__20 mt__40">İLETİŞİM BİLGİLERİ</h3>
                    <p class="mb__5 d-flex"><i class="las la-home fs__20 mr__10 text-primary"></i> 95125 Başakşehir İstanbul</p>
                    <p class="mb__5 d-flex"><i class="las la-phone fs__20 mr__10 text-primary"></i> 0 850 300 00 00</p>
                    <p class="mb__5 d-flex"><i class="las la-envelope fs__20 mr__10 text-primary"></i> mail@demo.com</p>
                    <p class="mb__5 d-flex"><i class="las la-clock fs__20 mr__10 text-primary"></i> Everyday 9:00-17:00</p>
                </div>
            </div>
        </div>
        <!--end page content-->

    </div>


    <?php include '../footer.php'; ?>