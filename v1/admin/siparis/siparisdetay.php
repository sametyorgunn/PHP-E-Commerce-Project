    <?php include '../include/header.php'; ?>



    <?php
        $siparisId = $_GET["id"];
        $siparisdetaylari = $db->db_select("select * from siparisler where id = ? ",[$siparisId]);
    ?>
    <?php
    if($_POST)
    {
        $durumu = $_POST["durum"];
        $ekle = $db->db_update("UPDATE siparisler SET Siparis_durumu=? where id=?",[$durumu,$siparisId]);

    }

    ?>
<form method="post">
        <div class="page-wrapper">
           

            <div class="container-fluid">
               

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">#<?php echo $siparisdetaylari["sipariskodu"]?> Nolu Sipariş Detayları</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Sipariş Detayları</li>
                            </ol>
                          
                        </div>
                    </div>
                </div>
             

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <h3><b>Sipariş Kodu</b> <span class="pull-right">#<?php echo $siparisdetaylari["sipariskodu"]?></span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger"><?php echo $siparisdetaylari["adsoyad"]?></b></h3>
                                            <p class="text-muted m-l-5"><?php echo $siparisdetaylari["Adres"]?>
                                                <br/> <?php echo $siparisdetaylari["il"]?>
                                                <br>
                                                Telefon : <?php echo $siparisdetaylari["Telefon"]?>
                                                <br>
                                                Mail : <?php echo $siparisdetaylari["Mail"]?>
                                                <br>
                                                Sipariş Tarihi : <?php echo $siparisdetaylari["tarih"]?>
                                                 <br>
                                                 <div class="row">
                                                <div class="col-3">

                                                <label>Kargo Firması</label>
                                                <input type="text" class="form-control" name=""></div>
                                                
                                                <br>
                                                
                                                <div class="col-3">
                                                <label>Kargo Takip No</label>
                                                <input type="text" class="form-control" name=""></div>

                                                <br>
                                                <div class="col-3">
                                                <label>Ödeme Yöntemi</label>
                                                <input type="text" class="form-control" disabled value="<?php echo $siparisdetaylari["Odeme_Yontemi"]?>" name=""></div>

                                                <br>
                                                <div class="col-3">
                                                <label>Ödeme Yöntemi</label>
                                                <select name="durum" class="form-control">
                                                <option value="0">Onay Bekliyor</option>
                                                <option value="1">Ödeme Bekliyor</option>
                                                <option value="2">Ödeme Onaylandı</option>
                                                <option value="3">Sipariş Onaylandı</option>
                                                <option value="4">Ürün Tedarik Ediliyor</option>
                                                <option value="5">Sipariş Hazırlanıyor</option>
                                                <option value="6">Ürün Kargoya Verildi</option>
                                                <option value="7">Sipariş Tamamlandı</option>
                                                </select></div>

                                                </div>
                                                </p>
                                        </address>
                                    </div>
                                   
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="100" class="text-center">Ürün ID</th>
                                                    <th>Ürün Adı</th>
                                                    <th width="100" class="text-right">Adet</th>
                                                 <!--   <th width="200" class="text-right">Fiyat</th>
                                                    <th width="200" class="text-right">Toplam Fiyat</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach (json_decode($siparisdetaylari["urun_adi"])as $key =>$urunisimleri){ ?>
                                                    <?php foreach (json_decode($siparisdetaylari["urun_adet"])as $yenikey =>$urunadet) {?>
                                                        <?php if ($key == $yenikey) { ?>
                                                            <tr>
                                                                <td class="text-center"><?=$key?></td>
                                                                <td><?=$urunisimleri?></td>
                                                                <td class="text-right"><?=$urunadet?></td>
                                                            </tr>
                                                        <?php } ?>
                                                <?php }?>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                        $ayar = $db->db_select("select * from ayar where id =?",[0]);
                                        $kdv = $ayar["kdv"];
                                        $kargo = $ayar["kargofiyati"];

                                    ?>
                                    <div class="pull-right m-t-30 text-right">
                                        <p>Ara Toplam : <?php echo $siparisdetaylari["aratoplam"]?> TL</p>
                                        <p>Kargo Fiyatı : <?php echo $kargo?> TL </p>
                                         <p>KDV Ücreti : <?php $top = $siparisdetaylari["aratoplam"] + $kargo;$kdvucreti = ($top*$kdv)/100;  ?><?=$kdvucreti?> TL </p>
                                        <hr>
                                        <h3><b>Toplam Tutar :</b> <?php echo $siparisdetaylari["toplamtutar"]?> TL</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button class="btn btn-danger" type="submit"> Siparişi Kaydet </button>
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span>
                                            <i class="ti-printer"></i> Print</span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme working">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
</form>

        <?php include '../include/footer.php'; ?>