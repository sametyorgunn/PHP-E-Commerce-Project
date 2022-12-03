
 <?php include '../include/header.php'; ?>

        <div class="page-wrapper">
        <div class="container-fluid">
        
        <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Ürünler</h4>
        </div>
        
        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item active">Ürünler</li>
        </ol>

        <a href="Urunekle">
        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"> 
        <i class="ti-angle-double-right"></i> Ürün Ekle</button></a>
        </div>
        </div>
        </div>
                

        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <div class="table-responsive">

        <?php
        if (isset($_GET['urunDelete'])) {

        $sonuc=$db->delete("urun","id",$_GET['id'],$_GET['file_delete']);

        if ($sonuc['status']) { ?>

        <div class="alert alert-success"> Başarıyla silindi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Silme başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } } ?>


        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th width="10">ID</th>
        <th>Ürün Adı</th>
        <th width="150">Kategori</th>
        <th width="50">Ürün Kodu</th>
        <th width="50">Stok</th>
        <th width="100">Tarih</th>
        <th width="50">İşlem</th>
        </tr>
        </thead>
        <tbody>
        
        <?php $sql=$db->read("urun");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>

        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['urun_ad'] ?></td>
        <?php $sqls=$db->read("kategori");
        while ($row2=$sqls->fetch(PDO::FETCH_ASSOC)) {
            if ($row2['id']==$row['kategori']) { ?>
                <td><?php echo $row2['kategori_ad'] ?></td>
        <?php } } ?>
        <td><?php echo $row['urunkodu'] ?></td>
        <td><?php echo $row['urunstok'] ?></td>
        <td><?php echo $row['tarih'] ?></td>
        <td>
        <center>

        <font title="Ürünü Düzenle">
        <a href="Urunduzenle?id=<?php echo $row['id']; ?>">
        <button type="button" class="btn btn-sm btn-success"><i class="ti-pencil-alt"></i></button></a></font>

        <font title="Ürünü Sil">
        <a href="?urunDelete=true&id=<?php echo $row['id'] ?>&file_delete=<?php echo $row['resim'] ?>">
        <button type="button" class="btn btn-sm btn-danger"> <i class="ti-trash"></i> </button></a></font>
        </center>
        </td>
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
        </div>   

                
       <?php include '../include/footer.php'; ?>