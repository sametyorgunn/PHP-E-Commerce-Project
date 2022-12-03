<?php if ($_COOKIE['login'] != 'success') { ?>
<?php include "../header.php" ?>

<?php
require_once '../admin/include/class.crud.php';
$db=new crud(); ?>

<title> Üye Giriş Sayfası</title>

<div id="nt_content">

    <!--hero banner-->
    <div class="kalles-section page_section_heading">
        <div class="page-head tc pr oh cat_bg_img page_head_">
            <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/shop/collection-list/bg-heading.jpg"></div>
            <div class="container pr z_100">
                <h1 class="mb__5 cw">Üye Giriş</h1>
            </div>
        </div>
    </div>
    <!--end hero banner-->

    <!--page content-->
    <div class="container cb">
        <div class="row">
            <div class="col-12 col-md-6 login-form mt__60 mb-0 mb-md-5">

                <?php
                if (isset($_POST['uyepanel'])) {

                    $mail = $_POST['mail'];
                    $password = $_POST['password'];

                    $sql = $db->wread("uye", "mail", $mail);
                    $row = $sql->fetch(PDO::FETCH_ASSOC);

                    $sql2 = $db->wread("uye", "password", md5(sha1($password)));
                    $row2 = $sql2->fetch(PDO::FETCH_ASSOC);

                    if ($row && $row2) {
                        $_SESSION["login"] = 'success';
                        $_SESSION["id"] = $row['id'];
                        $_SESSION["adsoyad"] = $row['adsoyad'];
                        setcookie("login",'success');
                        setcookie("uyeolmayan", "selam dünya", time() - 3600);
                        ?> <div class="alert alert-success"> Giriş Başarılı. </div> <?php

                        header("Location: Hesabim");
                    } else { ?>
                        <div class="alert alert-danger"> Kullanıcı Adı Veya Şifre Hatalı. </div>
                    <?php } } ?>

                <form action="" method="POST">

                    <div id="CustomerLoginForm" class="kalles-wrap-form">

                        <h2>GİRİŞ</h2>
                        <p class="form-row">
                            <label for="lg-email">Email Adresi <span class="required">*</span></label>
                            <input type="text" class="search_header__input" name="mail" required
                                <?php echo 'placeholder="Kullanıcı Adınız"'; ?>>

                        <p class="form-row">
                            <label for="lg-pw">Şifreniz <span class="required">*</span></label>
                            <input id="password" type="password" class="search_header__input" name="password" required
                                <?php echo 'placeholder="Şifreyi Giriniz"'; ?>>


                        <p><a href="#RecoverPasswordForm" class="btn-change-login-form">Şifremi Unuttum</a> </p>
                        <button class="btn btn-primary btn-sm" type="submit" name="uyepanel">Giriş Yap</button></center>
                    </div>
                </form>

                <div id="RecoverPasswordForm" class="kalles-wrap-form dn">
                    <h2>Şifrenizi Yenileyin</h2>
                    <p>Lütfen e-mail adresinizi giriniz. E-posta yoluyla yeni bir şifre oluşturmak için bir bağlantı gönderilecek.</p>

                    <p class="form-row">
                        <label for="rs-email">Email adresiniz</label>
                        <input type="email" value="" name="kullanici_mail" id="rs-email" class="input-full"> </p>
                    <button type="submit" name="sifremiunuttum" class="btn btn-primary">Şifre Talep Et</button>
                    <a href="#CustomerLoginForm" class="button ml__15 btn-change-login-form">İptal Et</a>
                </div>
            </div>

            <div class="col-12 col-md-6 login-form mt__60 mb__60">
                <div id="CustomerRegisterForm">

                    <!-- Login Form Right Text !-->
                    <div class="user_page_right_text_div">
                        <div style="font-size: 18px; font-weight: bold; color: #000; margin-bottom: 25px;">Üye Değil misiniz?</div>
                        <div style="font-size: 14px;">Üyelik ücretsizdir. Eğer kayıt yaptırmadıysanız birka&ccedil; dakika i&ccedil;inde sitemize &uuml;ye olup giriş yapabilirsiniz.</div>
                        <div style="margin-top: 25px;">
                            <a href="UyeKayit"> <button class="btn btn-danger btn-sm btn-hover-secondary btn-width-100" type="submit">HEMEN ÜYE OL</button></a>
                        </div>
                        <div style="margin-top: 25px;">
                            <a href="siparistakip"> <button class="btn btn-danger btn-sm btn-hover-secondary btn-width-100" type="submit">SİPARİŞİNİ TAKİP ET</button></a>
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