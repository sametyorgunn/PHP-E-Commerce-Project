<?php if ($_COOKIE['login'] != 'success') { ?>
<?php include "../header.php" ?>
		
		<title> Kayıt Ol</title>

        <div id="nt_content">

        <!--hero banner-->
        <div class="kalles-section page_section_heading">
        <div class="page-head tc pr oh cat_bg_img page_head_">
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" 
        data-bgset="assets/images/shop/collection-list/bg-heading.jpg"></div>
        
        <div class="container pr z_100">
        <h1 class="mb__5 cw">Kayıt Ol</h1>
        </div>
        </div>
        </div>
        <!--end hero banner-->

        <div class="container cb">
        <div class="row">
        <div class="col-12 col-md-6 login-form mt__60 mb-0 mb-md-5">
        <div id="CustomerLoginForm" class="kalles-wrap-form">

        <div class="user_page_right_text_div">
        <div style="font-size: 18px; font-weight: bold; color: #000; margin-bottom: 25px;">Sipariş vermek için Üye Olun!</div>
        <div style="font-size: 14px; margin-bottom: 30px;">Sitemize &uuml;yelik &uuml;cretsizdir. Eğer kayıt yaptırmadıysanız birka&ccedil; dakika i&ccedil;inde sitemize &uuml;ye olup giriş yapabilirsiniz.</div>
        <ul style="padding: 0!important; padding-left: 20px !important; font-size: 14px;">
        <li>&Ouml;nceki siparişlerinize kolayca ulaşabilirsiniz.</li>
        <li>Destek bildiriminde bulunarak tenik ekibimizle iletişime ge&ccedil;ebilirsiniz</li>
        <li>Kolayca adınıza adres tanımlaması yapabilir, faturalarınız i&ccedil;in ayrıca adresler oluşturabilirsiniz</li>
        </ul>
        </div>
        </div><br>

        <div style="font-size: 18px; font-weight: bold; color: #000; margin-bottom: 25px;">Zaten Üye Misiniz ?</div>
        <a href="UyeGiris">
        <button class="btn btn-danger btn-sm btn-hover-secondary btn-width-100" type="submit">ÜYE GİRİŞİ</button></a>

        </div>

        <div class="col-12 col-md-6 login-form mt__60 mb__60">
        <form method="POST">
        
        <?php 
        if (isset($_POST['uye_insert'])) {


            $adsoyad = $_POST['adsoyad'];
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $durum = 1;

            $sql = $db->wread("uye", "mail", $mail);
            $row = $sql->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                $ekle = $db->db_insert("INSERT INTO uye SET adsoyad = ?, mail = ?, password = ?,durum=?",[$adsoyad, $mail, md5(sha1($password)),$durum]);
            } else { ?>
                <div class="alert alert-danger"> Mail Adresi Kullanımda. </div>
            <?php }



            if ($ekle) { ?>

                <div class="alert alert-success"> Başarıyla eklendi. </div>


            <?php  } else { ?>

                <div class="alert alert-danger"> Kayıt Başarısız</div>

            <?php   } }  ?>

        <div id="CustomerRegisterForm">
        <h2>Kayıt Ol</h2>

        <p class="form-row">
        <label for="rgs-f_name">Adınız Soyadınız</label>
        <input type="text" class="search_header__input" name="adsoyad" autocomplete="given-name"> </p>


        <p class="form-row">
        <label for="reg-email">Email <span class="required">*</span></label>
        <input type="email" class="search_header__input" name="mail" autocomplete="email" aria-required="true"> </p>

        <p class="form-row">
        <label for="reg-pw">Şifre <span class="required">*</span></label>
        <input type="password" name="password" class="search_header__input" aria-required="true"> </p>

        <center>  
        <button type="submit" name="uye_insert" 
        class="btn btn-primary btn-sm btn-hover-secondary btn-width-100">
        Kayıt İşlemini Yap</button></center>

        </form>
        </div>
        </div>
        </div>
        </div>

        </div>
        </div>
        </div>
        </div>


        <?php include "../footer.php" ?>

<?php } else { header("Location: Hesabim"); } ?>

