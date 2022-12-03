    <?php include '../include/header.php'; ?>
        



        <div class="page-wrapper">
            
            <div class="container-fluid">
            
            <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Gösterge Paneli</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Gösterge Paneli</li>
                            </ol>
                        </div>
                    </div>
                </div>
  

                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-screen-desktop"></i></h3>
                                            <p class="text-muted">ONAY BEKLEYEN SİPARİŞ</p>
                                        </div>
                                        <div class="ml-auto">
                                        <?php
                                            $onaybekleyen = $db->db_select2("select * from siparisler where Siparis_durumu = ?",[0]);
                                        ?>
                                            <h2 class="counter text-primary"><?php echo count($onaybekleyen)?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-note"></i></h3>
                                            <p class="text-muted">TOPLAM ÜYE</p>
                                        </div>
                                        <?php
                                        $sql4 = $db->db_select2("SELECT * FROM uye where aaa=?",[0]);
                                        ?>
                                        <div class="ml-auto">
                                            <h2 class="counter text-cyan"><?php echo count($sql4) ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <?php
                                                $havale = $db->db_select2("select * from havale where durum=?",[1]);
                                            ?>
                                            <h3><i class="icon-doc"></i></h3>
                                            <p class="text-muted">HAVALE BİLDİRİMİ</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-purple"><?php echo count($havale) ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-purple" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <?php
                                        $iletisim = $db->db_select2("SELECT * FROM iletisim where durum=?",[0]);
                                        ?>
                                        <div>
                                            <h3><i class="icon-bag"></i></h3>
                                            <p class="text-muted">İLETİŞİM FORMU</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-success"><?php echo count($iletisim) ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

        

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- Comment widgets -->
                    <!-- ============================================================== -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Son Siparişler</h5>
                            </div>


                    <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>

                                        <tr>
                                            <th class="text-center">Sipariş Kodu</th>
                                            <th>AD SOYAD</th>
                                            <th>Adres</th>
                                            <th>SİPARİŞ TUTARI</th>

                                            <th>TARİH</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  $sql=$db->db_select2("SELECT * FROM siparisler where Siparis_durumu = ? ORDER BY id desc limit 10",[0]);
                                    foreach ($sql as $siparis) {  ?>

                                        <tr>
                                            <td class="text-center">#<?=$siparis["sipariskodu"]?></td>
                                            <td class="txt-oflo"><?=$siparis["adsoyad"]?></td>
                                            <td class="txt-oflo"><?=$siparis["Adres"]?></td>

                                            <td><?=$siparis["toplamtutar"]?>TL</td>
                                            <td class="txt-oflo"><?=$siparis["tarih"]?></td>
                                            <td></td>
                               
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title">Son Üyeler</h5>
                                        <h6 class="card-subtitle">Son kayıt olan 10 Üye</h6>
                                    </div>
                                 
                                </div>
                            </div>
                           
                            <div class="table-responsive">
                                <table class="table table-hover no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>AD SOYAD</th>
                                            <th>TELEFON</th>
                                            <th>Mail</th>
                                            <th>ADRES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $uyeler = $db->db_select2("select * from uye where durum = ? order by id desc limit 10",[1]);
                                        foreach ($uyeler as $uye){
                                    ?>
                                        <tr>
                                            <td class="text-center"><?=$uye["id"]?></td>
                                            <td class="txt-oflo"><?=$uye["adsoyad"]?></td>
                                            <td><?=$uye["telefon"]?></td>
                                            <td><?=$uye["mail"]?></td>
                                            <td class="txt-oflo"><?=$uye["adres"]?></td>
                               
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        
           
        </div>
        </div>
       


       <?php include '../include/footer.php'; ?>