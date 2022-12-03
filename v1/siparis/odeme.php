<?php include '../header.php'; ?>

<?php if ($_COOKIE['login'] != 'success') { ?>


    <?php
    if($_POST){

        $adsoyad = $_POST['adsoyad'];
        $telefon = $_POST['Telefon'];
        $mail = $_POST['Mail'];
        $ilce = $_POST['ilce'];
        $il = $_POST['il'];
        $adres = $_POST['Adres'];
        $siparis_notu = $_POST['Siparis_notu'];
        $aratoplam = $_POST['aratoplam'];
        $kargoucret = $_POST['kargoucret'];
        $toplamtutar = $_POST['toplamtutar'];
        $odemeyontemi = $_POST['odemeyontemi'];
        $sipariskodu = rand(1000,9999);
        $siparistarihi = date('Y-m-d H:i:s');
        $userid = 0;
        $urunad=$_POST["urun_adi"];
        $adet = $_POST["urun_adet"];


        if (isset($_POST['siparis_ekle'])) {


            $ekle = $db->db_insert("INSERT INTO siparisler SET adsoyad = ?, Telefon = ?, Mail = ?, ilce = ?,
                       il = ?, Adres = ?, siparis_notu = ?, aratoplam = ?, toplamtutar = ?, Kargo_ucreti = ?, Odeme_Yontemi = ?,sipariskodu = ?,user_id = ?,tarih = ?,urun_adi = ?,urun_adet=?",
                [$adsoyad, $telefon, $mail, $ilce, $il, $adres, $siparis_notu, $aratoplam, $toplamtutar, $kargoucret, $odemeyontemi,$sipariskodu,$userid,$siparistarihi,json_encode($urunad),json_encode($adet)]);


            if ($ekle) { ?>
                <div class="alert alert-success"> Başarıyla eklendi. </div>
                <?php if($odemeyontemi=='Havale/EFT') {
                    $_SESSION["sipariskodu"] = $sipariskodu;
                    $person = $_COOKIE["uyeolmayan"];
                    $sepet = $db->delete("sepet","uyeolmayan",$person);
                    setcookie("kupon", "sil", time() - 3600);
                    header("location:Bankaodeme");
                }
                else if($odemeyontemi=='KapidaOdeme'){

                    $_SESSION["sipariskodu"] = $sipariskodu;
                    $person = $_COOKIE["uyeolmayan"];
                    $sepet = $db->delete("sepet","uyeolmayan",$person);
                    setcookie("kupon", "sil", time() - 3600);
                    header("location:Kapidaodeme");

                }
                else if($odemeyontemi=='KrediKarti'){
                    $_SESSION["sipariskodu"] = $sipariskodu;
                    $person = $_COOKIE["uyeolmayan"];
                    $sepet = $db->delete("sepet","uyeolmayan",$person);
                    setcookie("kupon", "sil", time() - 3600);

                    $odemeyontemleri = $db->db_select("select * from odeme where id = ?",[0]);
                    if($odemeyontemleri["shopierdurum"]==1)
                    {
                        header("location:odemeyapislemss");
                    }
                    else
                    {
                        header("location:odemeyapislems");
                    }


                }
                ?>



            <?php  } else { ?>

                <div class="alert alert-danger"> Kayıt Başarısız</div>

            <?php   } }  ?>
        <?php
    }
    ?>


		<title> Ödeme Sayfası</title>
    <form action="" method="post">
        <div id="nt_content">

            <!-- hero title -->
            <div class="kalles-section page_section_heading">
                <div class="page-head tc pr oh page_bg_img page_head_cart_heading">
                    <div class="parallax-inner nt_parallax_false nt_bg_lz pa t__0 l__0 r__0 b__0 lazyload" data-bgset="assets/images/shopping-cart/shopping-cart-head.jpg">
                    </div>
                    <div class="container pr z_100"><h1 class="tu mb__10 cw">ÖDEME SAYFASI</h1></div>
                </div>
            </div>
            <!-- end hero title -->


            <!--cart section-->
            <div class="kalles-section cart_page_section container mt__60">
                <div class="frm_cart_page check-out_calculator">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-7">
                            <div class="checkout-section">
                                <h3 class="checkout-section__title">Kullanıcı Bilgileri</h3>
                                <div class="row">
                                    <p class="checkout-section__field col-lg-6 col-12">
                                        <label for="f-name">Ad Soyad</label>
                                        <input type="text" name="adsoyad" id="f-name" value="" required>
                                    </p>

                                    <p class="checkout-section__field col-6">
                                        <label for="address_phone">Telefon</label>
                                        <input type="text" name="Telefon" value="" id="address_phone" required/>
                                    </p>


                                    <p class="checkout-section__field col-6">
                                        <label for="address_amail">Mail</label>
                                        <input type="text" name="Mail" value="" id="address_amail" required/>
                                    </p>


                                    <p class="checkout-section__field col-6">
                                        <label for="address_phone">İlçe</label>
                                        <input type="text" name="ilce" value="" id="address_phone" required/>
                                    </p>


                                    <p class="checkout-section__field col-6">
                                        <label for="address_amail">İl</label>
                                        <input type="text" name="il" value="" id="address_amail" required/>
                                    </p>

                                    <p class="checkout-section__field col-12">
                                        <label for="address_01">Adres</label>
                                        <input type="text" name="Adres" id="address_01" value="" class="mb__20" required>
                                    </p>


                                </div>
                            </div>

                            <div class="row">
                                <p class="checkout-section__field col-12">
                                    <textarea id="order_comments" name="Siparis_notu"
                                              placeholder="Sipariş Notu" rows="2" cols="5"></textarea>
                                </p>

                            </div>

                        </div>



                        <div class="col-12 col-md-6 col-lg-5 mt__50 mb__80 mt-md-0 mb-md-0">
                            <div class="order-review__wrapper">
                                <h3 class="order-review__title">Sipariş Bilgileri</h3>
                                <div class="checkout-order-review">
                                    <table class="checkout-review-order-table">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Ürün</th>
                                            <th class="product-total">Toplam Tutar</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php if($uyeolmayan = $_COOKIE['uyeolmayan']){
                                            $uyeolmayansepet = $db->db_select2("SELECT * FROM sepet where uyeolmayan = ?",[$uyeolmayan]);
                                            foreach ($uyeolmayansepet as $uyeolmayansepet2){ ?>

                                            <input hidden name="urun_adi[]" value="<?=$uyeolmayansepet2['urun_ad']?>" type="text">
                                            <input hidden name="urun_adet[]" value="<?=$uyeolmayansepet2['adet']?>" type="text">

                                            <tr class="cart_item">
                                                <td class="product-name"><?=$uyeolmayansepet2['urun_ad']?><strong class="product-quantity">× <?=$uyeolmayansepet2['adet']?></strong>
                                                </td><?php $tektoplamfiyat = $uyeolmayansepet2['adet'] * $uyeolmayansepet2['indirimli_fiyat'] ?><?php $toplamfiyat[] = $uyeolmayansepet2['adet'] * $uyeolmayansepet2['indirimli_fiyat'] ?>
                                                <td class="product-total"><span class="cart_price"><?=$tektoplamfiyat?> TL</span></td>
                                            </tr><?php } ?>

                                        <?php }  ?>


                                        </tbody>
                                        <tfoot>

                                        <tr class="cart-subtotal cart_item">
                                            <th>Ara Toplam</th>
                                            <input type="hidden" name="aratoplam" value="<?=array_sum($toplamfiyat)?>">
                                            <td><span class="cart_price"><?=array_sum($toplamfiyat)?> TL</span></td>
                                        </tr>
                                        <?php $kargoucret = $db->db_select("SELECT * FROM ayar where id = ?",[0]); ?>
                                        <tr class="cart_item">
                                            <th>Kargo Ücreti</th>
                                            <input type="hidden" name="kargoucret" value="<?=$kargoucret['kargofiyati']?>">
                                            <td><span class="cart_price"><?=$kargoucret['kargofiyati']?> TL</span></td>
                                        </tr>
                                        <?php if (isset($_COOKIE['kupon']) && !empty($_COOKIE['kupon'])) { ?>
                                            <?php $kuponkodu = $db->db_select("SELECT * FROM kupon where baslik = ?",[$_COOKIE['kupon']]); ?>
                                            <tr class="cart_item">
                                                <th>Kupon Kodu</th>
                                                <td><span class="cart_price"><?=$kuponkodu['tutar']?> TL</span></td>
                                            </tr>
                                            <?php $kupondansonra = $kuponkodu['tutar']; ?>
                                        <?php } else {
                                            $kupondansonra = 0;
                                        } ?>
                                        <tr class="order-total cart_item">
                                            <th>Toplam Tutar</th><?php $toplamtutar = array_sum($toplamfiyat) - $kupondansonra ?>
                                            <input type="hidden" name="toplamtutar" value="<?=$toplamtutar?>">
                                            <td><strong><span class="cart_price amount"><?=$toplamtutar?> TL</span></strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="checkout-payment">
                                        <ul class="payment_methods">

                                            <li class="payment_method">
                                                <input id="payment_method_bacs" type="radio" class="input-radio" name="odemeyontemi" value="Havale/EFT" checked="checked">
                                                <label for="payment_method_bacs">Banka Transferi</label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Banka Havale bilgilerimizi siparişi tamamladıktan sonra görüntüleyebilirsiniz.</p>
                                                </div>
                                            </li>

                                            <li class="payment_method">
                                                <input id="payment_method_kapi" type="radio" class="input-radio" name="odemeyontemi" value="KapidaOdeme">
                                                <label for="payment_method_bacs">Kapıda Ödeme</label>
                                                <div class="payment_box payment_method_bacs dn">
                                                    <p>Banka Havale bilgilerimizi siparişi tamamladıktan sonra görüntüleyebilirsiniz.</p>
                                                </div>
                                            </li>

                                            <li class="payment_method">
                                                <input id="payment_method_stripe" type="radio" class="input-radio" name="odemeyontemi" value="KrediKarti">
                                                <label for="payment_method_stripe">
                                                    Kredi Kartı
                                                    <img src="assets/images/shopping-cart/visa.svg" class="stripe-visa-icon stripe-icon" alt="Visa">
                                                    <img src="assets/images/shopping-cart/mastercard.svg" class="stripe-mastercard-icon stripe-icon" alt="Mastercard">
                                                    <img src="assets/images/shopping-cart/amex.svg" class="stripe-amex-icon stripe-icon" alt="American Express">
                                                    <img src="assets/images/shopping-cart/discover.svg" class="stripe-discover-icon stripe-icon" alt="Discover">
                                                    <img src="assets/images/shopping-cart/diners.svg" class="stripe-diners-icon stripe-icon" alt="Diners">
                                                    <img src="assets/images/shopping-cart/jcb.svg" class="stripe-jcb-icon stripe-icon" alt="JCB">
                                                </label>
                                                <div class="payment_box payment_method_bacs dn">

                                                    <div class="credit-card-form">
                                                        <div class="form-row form-row-wide">
                                                            <label for="stripe-card-element">Kart Numarası
                                                                <span class="required">*</span></label>
                                                            <div class="stripe-card-group">
                                                                <input type="text" name="card-number" id="stripe-card-element" value="" placeholder="1234 1234 1234 1234">
                                                                <i class="stripe-credit-card-brand stripe-card-brand" alt="Credit Card"></i>
                                                            </div>
                                                        </div>
                                                        <div class="form-row form-row-first">
                                                            <label for="stripe-exp-element">Son Kullanma Tarihi *</label>
                                                            <div class="stripe-card-group">
                                                                <input type="text" name="card-number" id="stripe-exp-element" value="" placeholder="MM/YY">
                                                            </div>
                                                        </div>
                                                        <div class="form-row form-row-last">
                                                            <label for="stripe-cvc-element">CV Kodu (CVC) *</label>
                                                            <div class="stripe-card-group">
                                                                <input type="text" name="card-number" id="stripe-cvc-element" value="" placeholder="CVC">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                        <label class="checkout-payment__confirm-terms-and-conditions">
                                            <input type="checkbox" name="terms" id="terms">
                                            <span>Kullanım koşullarını kabul ediyorum. <a href="#" class="terms-and-conditions-link">Satış Sözleşmesi</a></span>&nbsp;<span class="required">*</span>
                                        </label>
                                        <button type="submit" name="siparis_ekle" class="button button_primary btn checkout-payment__btn-place-order">Siparişi Tamamla</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end cart section-->

        </div>
    </form>

<?php } else { ?>

    // Üye Olan

    <?php
    $kisiId = $_SESSION["id"];
    $kisi = $db->db_select("SELECT * FROM siparisler where user_id = ?",[$kisiId]);
    ?>
    <?php
    if($_POST){

        $adsoyad = $_POST['adsoyad'];
        $telefon = $_POST['Telefon'];
        $mail = $_POST['Mail'];
        $ilce = $_POST['ilce'];
        $il = $_POST['il'];
        $adres = $_POST['Adres'];
        $siparis_notu = $_POST['Siparis_notu'];
        $aratoplam = $_POST['aratoplam'];
        $kargoucret = $_POST['kargoucret'];
        $toplamtutar = $_POST['toplamtutar'];
        $odemeyontemi = $_POST['odemeyontemi'];
        $sipariskodu = rand(1000,9999);
        $siparistarihi = date('Y-m-d H:i:s');
        $userid = $_SESSION["id"];
        $urunad=$_POST["urun_adi"];
        $adet = $_POST["urun_adet"];

        if (isset($_POST['siparis_ekle'])) {


            $ekle = $db->db_insert("INSERT INTO siparisler SET adsoyad = ?, Telefon = ?, Mail = ?, ilce = ?,
                       il = ?, Adres = ?, siparis_notu = ?, aratoplam = ?, toplamtutar = ?, Kargo_ucreti = ?, Odeme_Yontemi = ?,sipariskodu = ?,user_id = ?,tarih = ?,urun_adi=?,urun_adet=?",
                [$adsoyad, $telefon, $mail, $ilce, $il, $adres, $siparis_notu, $aratoplam, $toplamtutar, $kargoucret, $odemeyontemi,$sipariskodu,$userid,$siparistarihi,json_encode($urunad),json_encode($adet)]);


            if ($ekle) { ?>

                <div class="alert alert-success"> Başarıyla eklendi. </div>
                <?php if($odemeyontemi=='Havale/EFT') {
                    $_SESSION["sipariskodu"] = $sipariskodu;

                    $person = $_SESSION["id"];
                    $sepet = $db->delete("sepet","user_id",$person);
                    setcookie("kupon", "sil", time() - 3600);
                    header("location:Bankaodeme");
                }
                else if($odemeyontemi=='KapidaOdeme'){
                    $_SESSION["sipariskodu"] = $sipariskodu;
                    $person = $_SESSION["id"];
                    $sepet = $db->delete("sepet","user_id",$person);
                    setcookie("kupon", "sil", time() - 3600);
                    header("location:Kapidaodeme");

                }
                else if($odemeyontemi=='KrediKarti'){
                    $_SESSION["sipariskodu"] = $sipariskodu;
                    $person = $_SESSION["id"];
                    $sepet = $db->delete("sepet","user_id",$person);
                    setcookie("kupon", "sil", time() - 3600);

                    $odemeyontemleri = $db->db_select("select * from odeme where id = ?",[0]);
                    if($odemeyontemleri["shopierdurum"]==1)
                    {
                        header("location:odemeyapislemss");
                    }
                    else
                    {
                        header("location:odemeyapislems");
                    }


                }
                ?>





            <?php  } else { ?>

                <div class="alert alert-danger"> Kayıt Başarısız</div>

            <?php   } }  ?>
        <?php
    }
    ?>

    <form action="" method="post">
        <div id="nt_content">

            <!-- hero title -->
            <div class="kalles-section page_section_heading">
                <div class="page-head tc pr oh page_bg_img page_head_cart_heading">
                    <div class="parallax-inner nt_parallax_false nt_bg_lz pa t__0 l__0 r__0 b__0 lazyload" data-bgset="assets/images/shopping-cart/shopping-cart-head.jpg">
                    </div>
                    <div class="container pr z_100"><h1 class="tu mb__10 cw">ÖDEME SAYFASI</h1></div>
                </div>
            </div>
            <!-- end hero title -->


            <!--cart section-->
            <div class="kalles-section cart_page_section container mt__60">
                <div class="frm_cart_page check-out_calculator">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-7">
                            <div class="checkout-section">
                                <h3 class="checkout-section__title">Kullanıcı Bilgileri</h3>
                                <div class="row">
                                    <p class="checkout-section__field col-lg-6 col-12">
                                        <label for="f-name">Ad Soyad</label>
                                        <input type="text" name="adsoyad" id="f-name" value="<?=$kisi["adsoyad"]?>" required>
                                    </p>

                                    <p class="checkout-section__field col-6">
                                        <label for="address_phone">Telefon</label>
                                        <input type="text" name="Telefon" value="<?=$kisi["Telefon"]?>" id="address_phone" required/>
                                    </p>


                                    <p class="checkout-section__field col-6">
                                        <label for="address_amail">Mail</label>
                                        <input type="text" name="Mail" value="<?=$kisi["Mail"]?>" id="address_amail" required/>
                                    </p>


                                    <p class="checkout-section__field col-6">
                                        <label for="address_phone">İlçe</label>
                                        <input type="text" name="ilce" value="<?=$kisi["ilce"]?>" id="address_phone" required/>
                                    </p>


                                    <p class="checkout-section__field col-6">
                                        <label for="address_amail">İl</label>
                                        <input type="text" name="il" value="<?=$kisi["il"]?>" id="address_amail" required/>
                                    </p>

                                    <p class="checkout-section__field col-12">
                                        <label for="address_01">Adres</label>
                                        <input type="text" name="Adres" id="address_01" value="<?=$kisi["Adres"]?>" class="mb__20" required>
                                    </p>


                                </div>
                            </div>

                            <div class="row">
                                <p class="checkout-section__field col-12">
                                    <textarea id="order_comments" name="Siparis_notu"
                                              placeholder="Sipariş Notu" rows="2" cols="5"></textarea>
                                </p>

                            </div>

                        </div>



                        <div class="col-12 col-md-6 col-lg-5 mt__50 mb__80 mt-md-0 mb-md-0">
                            <div class="order-review__wrapper">
                                <h3 class="order-review__title">Sipariş Bilgileri</h3>
                                <div class="checkout-order-review">
                                    <table class="checkout-review-order-table">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Ürün</th>
                                            <th class="product-total">Toplam Tutar</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                                $userid = $_SESSION["id"];
                                                $row3 = $db->db_select2("select * from sepet where user_id = ?",[$userid]);
                                        foreach($row3 as $urunlerss){
                                            ?>

                                                <tr class="cart_item">
                                                    <td class="product-name"><?=$urunlerss['urun_ad']?><strong class="product-quantity">× <?=$urunlerss['adet']?></strong>
                                                    </td><?php $tektoplamfiyat = $urunlerss['adet'] * $urunlerss['indirimli_fiyat'] ?><?php $toplamfiyat[] = $urunlerss['adet'] * $urunlerss['indirimli_fiyat'] ?>
                                                    <td class="product-total"><span class="cart_price"><?=$tektoplamfiyat?> TL</span></td>
                                                </tr>
                                        <?php } ?>
                                        <input hidden name="urun_adi[]" type="text" value="<?=$urunlerss["urun_ad"]?>">
                                        <input hidden name="urun_adet[]" type="text" value="<?=$urunlerss["adet"]?>">



                                        </tbody>
                                        <tfoot>

                                        <tr class="cart-subtotal cart_item">
                                            <th>Ara Toplam</th>
                                            <input type="hidden" name="aratoplam" value="<?=array_sum($toplamfiyat)?>">
                                            <td><span class="cart_price"><?=array_sum($toplamfiyat)?> TL</span></td>
                                        </tr>
                                        <tr class="cart_item">
                                            <th>Kargo Ücreti</th><?php $kargoucret=$db->db_select("select * from ayar where id=?",[0]); ?>
                                            <input type="hidden" name="kargoucret" value="<?=$kargoucret?>">
                                            <td><span class="cart_price"><?=$kargoucret["kargofiyati"]?> TL</span></td>
                                        </tr>
                                        <?php if (isset($_COOKIE['kupon']) && !empty($_COOKIE['kupon'])) { ?>
                                            <?php $kuponkodu = $db->db_select("SELECT * FROM kupon where baslik = ?",[$_COOKIE['kupon']]); ?>
                                            <tr class="cart_item">
                                                <th>Kupon Kodu</th>
                                                <td><span class="cart_price"><?=$kuponkodu['tutar']?> TL</span></td>
                                            </tr>
                                            <?php $kupondansonra = $kuponkodu['tutar']; ?>
                                        <?php } else {
                                            $kupondansonra = 0;
                                        } ?>
                                        <tr class="order-total cart_item">
                                            <th>Toplam Tutar</th><?php $toplamtutar = $kargoucret["kargofiyati"] + array_sum($toplamfiyat) - $kupondansonra ?>
                                            <input type="hidden" name="toplamtutar" value="<?=$toplamtutar?>">
                                            <td><strong><span class="cart_price amount"><?=$toplamtutar?> TL</span></strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="checkout-payment">
                                        <ul class="payment_methods">

                                            <li class="payment_method">
                                                <input id="payment_method_bacs" type="radio" class="input-radio" name="odemeyontemi" value="Havale/EFT" checked="checked">
                                                <label for="payment_method_bacs">Banka Transferi</label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Banka Havale bilgilerimizi siparişi tamamladıktan sonra görüntüleyebilirsiniz.</p>
                                                </div>
                                            </li>

                                            <li class="payment_method">
                                                <input id="payment_method_kapi" type="radio" class="input-radio" name="odemeyontemi" value="KapidaOdeme">
                                                <label for="payment_method_bacs">Kapıda Ödeme</label>
                                                <div class="payment_box payment_method_bacs dn">
                                                    <p>Banka Havale bilgilerimizi siparişi tamamladıktan sonra görüntüleyebilirsiniz.</p>
                                                </div>
                                            </li>

                                            <li class="payment_method">
                                                <input id="payment_method_stripe" type="radio" class="input-radio" name="odemeyontemi" value="KrediKarti">
                                                <label for="payment_method_stripe">
                                                    Kredi Kartı
                                                    <img src="assets/images/shopping-cart/visa.svg" class="stripe-visa-icon stripe-icon" alt="Visa">
                                                    <img src="assets/images/shopping-cart/mastercard.svg" class="stripe-mastercard-icon stripe-icon" alt="Mastercard">
                                                    <img src="assets/images/shopping-cart/amex.svg" class="stripe-amex-icon stripe-icon" alt="American Express">
                                                    <img src="assets/images/shopping-cart/discover.svg" class="stripe-discover-icon stripe-icon" alt="Discover">
                                                    <img src="assets/images/shopping-cart/diners.svg" class="stripe-diners-icon stripe-icon" alt="Diners">
                                                    <img src="assets/images/shopping-cart/jcb.svg" class="stripe-jcb-icon stripe-icon" alt="JCB">
                                                </label>
                                                <div class="payment_box payment_method_bacs dn">

                                                    <div class="credit-card-form">
                                                        <div class="form-row form-row-wide">
                                                            <label for="stripe-card-element">Kart Numarası
                                                                <span class="required">*</span></label>
                                                            <div class="stripe-card-group">
                                                                <input type="text" name="card-number" id="stripe-card-element" value="" placeholder="1234 1234 1234 1234">
                                                                <i class="stripe-credit-card-brand stripe-card-brand" alt="Credit Card"></i>
                                                            </div>
                                                        </div>
                                                        <div class="form-row form-row-first">
                                                            <label for="stripe-exp-element">Son Kullanma Tarihi *</label>
                                                            <div class="stripe-card-group">
                                                                <input type="text" name="card-number" id="stripe-exp-element" value="" placeholder="MM/YY">
                                                            </div>
                                                        </div>
                                                        <div class="form-row form-row-last">
                                                            <label for="stripe-cvc-element">CV Kodu (CVC) *</label>
                                                            <div class="stripe-card-group">
                                                                <input type="text" name="card-number" id="stripe-cvc-element" value="" placeholder="CVC">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                        <label class="checkout-payment__confirm-terms-and-conditions">
                                            <input type="checkbox" name="terms" id="terms">
                                            <span>Kullanım koşullarını kabul ediyorum. <a href="#" class="terms-and-conditions-link">Satış Sözleşmesi</a></span>&nbsp;<span class="required">*</span>
                                        </label>
                                        <button type="submit" name="siparis_ekle" class="button button_primary btn checkout-payment__btn-place-order">Siparişi Tamamla</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end cart section-->

        </div>
    </form>

<?php } ?>

<?php include '../footer.php'; ?>
