<?php include "../header.php" ?>


<?php
       $userid = $_SESSION["SiparisSorgulaUser"];
       $sql = $db->db_select("select * from siparisler where user_id = ?",[$userid]);
?>

<div id="nt_content">

  	<title> Sipariş Takip Detayları</title>
    <!--hero banner-->
    <div class="kalles-section page_section_heading">
        <div class="page-head tc pr oh cat_bg_img page_head_">
            <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/shop/collection-list/bg-heading.jpg"></div>
            <div class="container pr z_100">
                <h1 class="mb__5 cw">#<?=$sql["sipariskodu"]?> Nolu Sipariş Detayları</h1>
            </div>
        </div>
    </div>
    <!--end hero banner-->

    <!--page content-->
    <div class="container mt__40 mb__40 cb">
        <div class="kalles-term-exp mb__30">


            <div class="row">
                <div class="col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <p>Güvenlik nedeniyle bazı kişisel bilgileriniz yer almamaktadır. Detaylı bilgiyi Müşteri Hizmetlerimizden alabilirsiniz.</p>


                            <div class="">
                                <h5 class="mb-1">Sn. <strong><?=$sql["adsoyad"]?> .....</strong>,</h5>
                                Sipariş detayları ve fiyatlarının gösterildiği makbuz sayfası. </div>
                            <br>


                            <div class="card-body pl-0 pr-0">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button class="btn btn-danger">Kargoya Verildi</button>

                                    </div>

                                    <div class="col-sm-6 text-right">

                                        <span>Sipariş Tarihi</span><br>
                                        <strong><?=$sql["tarih"]?></strong>

                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>
                            <div class="row pt-4">
                                <div class="col-lg-6 ">

                                    <p class="h5 font-weight-bold">Adres Bilgileri</p>
                                    <address>
                                        <?=$sql["Adres"]?><br> </address>
                                </div>

                                <div class="table-responsive push">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <tr class=" ">

                                            <th width="300">Ürünler</th>
                                            <th width="50" class="text-center">Adet</th>
                                            <th width="100" class="text-right">Fiyat</th>
                                            <th width="100" class="text-right">Kargo</th>
                                            <th class="text-right" style="width: 1%">Toplam Fiyat</th>

                                        </tr>

                                        <?php foreach (json_decode($sql["urun_adi"])as $key =>$urunisimleri){ ?>
                                            <?php foreach (json_decode($sql["urun_adet"])as $yenikey =>$urunadet) {?>
                                                <?php if ($key == $yenikey) { ?>
                                                    <?php $kargoucret = $db->db_select("SELECT * FROM ayar where id = ?",[0]); ?>
                                                    <tr>
                                                        <td>
                                                            <a target="_blank" href=""><?=$urunisimleri?></a>
                                                        </td>
                                                        <td class="text-center"><?=$urunadet?></td>
                                                        <td class="text-right"><?=$sql["aratoplam"]?> TL</td>
                                                        <td class="text-right"><?=$kargoucret['kargofiyati']?> TL</td>
                                                        <td class="text-right"><center><?=$sql["toplamtutar"]?> TL</center></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php }?>
                                        <?php } ?>

                                        <tr>


                                            <td colspan="4" class="font-weight-bold text-uppercase text-right h6 mb-0">TOPLAM FİYAT</td>
                                            <td class="font-weight-bold text-right h6 mb-0"><?=$sql["toplamtutar"]?> TL</td>
                                            <div class="form-group">
                                            <div class="row">




                                        </tr>
                                        <tr>

                                        </tr>

                                    </table>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>






        </div>
        <!--end page content-->

    </div>


    <?php include "../footer.php" ?>

