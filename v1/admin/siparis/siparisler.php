
 <?php include '../include/header.php'; ?>

 <?php

         if(isset($_GET["SiparisDelete"]))
         {
             $sonuc=$db->delete("siparisler","id",$_GET['id']);
         }

 ?>

        <div class="page-wrapper">
   

            <div class="container-fluid">
              

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Siparişler</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Siparişler</li>
                            </ol>

                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               <div class="table-responsive">
                                    <table id="example23"
                                        class="display nowrap table table-hover table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="40">Sipariş No</th>
                                                <th>Adı Soyadı</th>
                                                <th>Adres</th>
                                                <th width="100">Toplam Tutar</th>
                                                <th width="100">Tarih</th>
                                                <th width="150">Durum</th>
                                                <th width="200">Ödeme Türü</th>
                                                <th width="50">İşlem</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                          
                           <?php $sql=$db->read("siparisler");
        					while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>
                           
                                          <tr>
                                                <td>#<?php echo $row['sipariskodu'] ?></td>
                                                <td><?php echo $row['adsoyad'] ?> <?php echo $row['Soyad'] ?></td>
                                                <td><?php echo $row['Adres'] ?></td>
                                                <td><?php echo $row['toplamtutar'] ?> TL</td>
                                                <td><?php echo $row['tarih'] ?></td>
                                              <?php if($row["Siparis_durumu"]==0){ ?>
                                                <td>Onay Bekliyor</td>
                                              <?php } elseif($row["Siparis_durumu"]==1){?>
                                                  <td>ödeme bekliyor</td>
                                              <?php } elseif ($row["Siparis_durumu"]==2){?>
                                              <td>ödeme Onaylandı</td>
                                              <?php } elseif ($row["Siparis_durumu"]==3){?>
                                              <td>Sipariş onaylandı</td>
                                              <?php } elseif ($row["Siparis_durumu"]==4){?>
                                              <td>Ürün tedarik ediliyor</td>
                                              <?php } elseif ($row["Siparis_durumu"]==5){?>
                                              <td>Sipariş hazırlanıyor</td>
                                              <?php } elseif ($row["Siparis_durumu"]==6){?>
                                              <td>ürün kargoya verildi</td>
                                              <?php } elseif ($row["Siparis_durumu"]==7){?>
                                              <td>sipariş tamamlandı</td><?php }?>

                                              <td><?php echo $row['Odeme_Yontemi'] ?></td>

                                              <td>
                                                  <center>
                                                      <a href="SiparisDetay?id=<?php echo $row['id'] ?>">
                                                          <button type="button" class="btn btn-sm btn-success"><i class="ti-pencil-alt"></i></button></a>

                                                      <a href="?SiparisDelete=true&id=<?php echo $row['id'] ?>">
                                                          <button type="button" class="btn btn-sm btn-danger"> <i class="ti-trash"></i></button></a>
                                                  </center>
                                              </td>

                                            </tr> <?php } ?>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>   </div>   

                
       <?php include '../include/footer.php'; ?>