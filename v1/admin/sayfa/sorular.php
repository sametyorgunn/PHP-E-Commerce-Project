
 <?php include '../include/header.php'; ?>

        <div class="page-wrapper">
        <div class="container-fluid">
        
        <?php 
        if (isset($_GET['soruInsert'])) {  ?>


        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Soru Ekle</h4>
        </div>
        
        <div class="card-body">

        <form method="POST" enctype="multipart/form-data">
       
        <?php
        ob_start();
        if (isset($_POST['sss_insert'])) {

        $sonuc = $db->insert("sss",$_POST,
        ["form_name" => "sss_insert"]);

        if ($sonuc['status']) { ?>
        
            
        <script>
        window.location.href = "Sorular";
        </script>

        <?php } else { ?>
        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>
        <?php } }  ?>

        <div class="form-body">
        <div class="row p-t-20">

        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Soru</label>
        <textarea class="form-control" name="soru"></textarea></div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Cevap</label>
        <textarea class="form-control" name="cevap"></textarea></div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Sıra</label>
        <input type="number" id="firstName" name="sira" class="form-control"></div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Durum</label>
        <select class="form-control" name="durum">
        <option value="1">Aktif</option>
        <option value="0">Pasif</option>
        </select>
        </div>
        </div>
        </div>
                                      
        </div>

        <div class="form-actions">
        <button type="submit" class="btn btn-success" name="sss_insert"> <i class="ti-plus"></i> Kaydet</button>
        <a href="javascript:javascript:history.go(-1)" class="btn btn-danger">İptal Et</a>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>

        <?php }  else if (isset($_GET['sssUpdate'])) { ?>


        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Soru Düzenle</h4>
        </div>
        
        <div class="card-body">

        <form method="POST">

        <?php 
        if (isset($_POST['sss_update'])) {
    
        $sonuc=$db->update("sss",$_POST,
        ["form_name" => "sss_update",
        "columns" => "id"]);

        if ($sonuc['status']) { ?>
           
        <div class="alert alert-success"> Başarıyla düzenlendi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }

        $sql=$db->wread("sss","id",$_GET['id']);
        $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

                
        <div class="form-body">
        <div class="row p-t-20">

        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Soru</label>
        <textarea class="form-control" name="soru"><?php echo $row['soru'] ?></textarea></div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Cevap</label>
        <textarea class="form-control" name="cevap"><?php echo $row['cevap'] ?></textarea></div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Sıra</label>
        <input type="number" id="firstName" name="sira" value="<?php echo $row['sira'] ?>" class="form-control"></div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Durum</label>
        <select class="form-control" name="durum">
        <?php echo $row['durum'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['durum']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>
        </div>
        </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                      
        </div>

        <div class="form-actions">
        <button type="submit" class="btn btn-success" name="sss_update"> <i class="ti-plus"></i> Kaydet</button>
        <a href="javascript:javascript:history.go(-1)" class="btn btn-danger">İptal Et</a>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>

        <?php }  ?>


        <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Soru Cevap</h4>
        </div>
        
        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item active">Soru Cevap</li>
        </ol>

        <a href="?soruInsert=true">
        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="ti-angle-double-right"></i> 
        Soru Ekle</button></a>

        </div>
        </div>
        </div>
                

        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <div class="table-responsive">

       <?php
        if (isset($_GET['sssDelete'])) {

        $sonuc=$db->delete("sss","id",$_GET['id']);

        if ($sonuc['status']) { ?>

        <div class="alert alert-success"> Başarıyla silindi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Silme başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } } ?>

        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th width="10">ID</th>
        <th>Soru Başlığı</th>
        <th width="50">İşlem</th>
        </tr>
        </thead>
        <tbody>
        
        <?php $sql=$db->read("sss");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>

        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['soru'] ?></td>
        <td>
        <center>
        <a href="?sssUpdate=true&id=<?php echo $row['id'] ?>">
        <button type="button" class="btn btn-sm btn-success"><i class="ti-pencil-alt"></i></button></a>

        <a href="?sssDelete=true&id=<?php echo $row['id'] ?>">
        <button type="button" class="btn btn-sm btn-danger"> <i class="ti-trash"></i> </button></a>
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