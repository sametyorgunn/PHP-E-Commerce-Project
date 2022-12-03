
 <?php include '../include/header.php'; ?>

        <div class="page-wrapper">
        <div class="container-fluid">
        

        <?php 
        if (isset($_GET['sozlesmeInsert'])) {  ?>

        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Sayfa Ekle</h4>
        </div>
        <div class="card-body">
        
        <?php if (isset($_POST['sozlesme_insert'])) {
    
        $sonuc=$db->insert("sozlesme",$_POST,
        ["form_name" => "sozlesme_insert",
        "slug" => "sozlesme_slug",
        "title" => "baslik"]);

        if ($sonuc['status']) { ?>
           
        <script>
        window.location.href = "Sozlesmeler";
        </script>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }  ?>       
                                    
        <form method="POST" enctype="multipart/form-data">
        

        <div class="form-body">
        <div class="row p-t-20">
        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Sözleşme Başlığı</label>
        <input type="text" id="firstName" name="baslik" class="form-control"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <textarea id="mymce" name="detay"></textarea></div>
        </div>

        
        <div class="col-md-12">
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
        <button type="submit" class="btn btn-success" name="sozlesme_insert"> <i class="ti-plus"></i> Kaydet</button>
        <a href="javascript:javascript:history.go(-1)" class="btn btn-danger">İptal Et</a>
        </div>
        
        </form>
        </div>
        </div>
        </div>
        </div>


        <?php }  else if (isset($_GET['sozlesmeUpdate'])) { ?>

        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Sayfa Düzenle</h4>
        </div>
        <div class="card-body">
        
        <?php 
        if (isset($_POST['sozlesme_update'])) {
    
        $sonuc=$db->update("sozlesme",$_POST,
        ["form_name" => "sozlesme_update",
        "columns" => "id",]);

        if ($sonuc['status']) { ?>
           
        <div class="alert alert-success"> Başarıyla düzenlendi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }

        $sql=$db->wread("sozlesme","id",$_GET['id']);
        $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

        <form method="POST" enctype="multipart/form-data">
        

        <div class="form-body">
        <div class="row p-t-20">
        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Sözleşme Başlığı</label>
        <input type="text" id="firstName" name="baslik" value="<?php echo $row['baslik'] ?>" class="form-control"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <textarea id="mymce" name="detay"><?php echo $row['detay'] ?></textarea></div>
        </div>

        
        <div class="col-md-12">
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
        </div>

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <div class="form-actions">
        <button type="submit" class="btn btn-success" name="sozlesme_update"> <i class="ti-plus"></i> Kaydet</button>
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
        <h4 class="text-themecolor">Sözleşmeler</h4>
        </div>
        

        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item active">Sözleşmeler</li>
        </ol>

        <a href="?sozlesmeInsert=true">
        <button type="button" class="btn btn-info d-none d-lg-block m-l-15">
        <i class="ti-angle-double-right"></i> Sözleşme Ekle</button></a>
        </div>
        </div>
        </div>
                

        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <div class="table-responsive">

        <?php
        if (isset($_GET['sozlesmeDelete'])) {

        $sonuc=$db->delete("sozlesme","id",$_GET['id']);

        if ($sonuc['status']) { ?>

        <div class="alert alert-success"> Başarıyla silindi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Silme başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } } ?>

        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th width="10">ID</th>
        <th>Sözlesme Adı</th>
        <th width="50">İşlem</th>
        </tr>
        </thead>                 
        <tbody>

        <?php $sql=$db->read("sozlesme");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>

        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['baslik'] ?></td>
        <td>
        <center>
        <a href="?sozlesmeUpdate=true&id=<?php echo $row['id'] ?>">
        <button type="button" class="btn btn-sm btn-success"><i class="ti-pencil-alt"></i></button></a>

        <a href="?sozlesmeDelete=true&id=<?php echo $row['id'] ?>">
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