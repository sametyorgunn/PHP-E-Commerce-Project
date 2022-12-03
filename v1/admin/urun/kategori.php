
 <?php include '../include/header.php'; ?>

        <div class="page-wrapper">
        <div class="container-fluid">
        
        <?php 
        if (isset($_GET['kategoriInsert'])) {  ?>


        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Kategori Ekle</h4>
        </div>
        
        <div class="card-body">

        <form method="POST" enctype="multipart/form-data">
       
        <?php
        ob_start();
        if (isset($_POST['kategori_insert'])) {

        $sonuc = $db->insert("kategori",$_POST,
        ["form_name" => "kategori_insert",
        "slug" => "kategori_slug",
        "title" => "kategori_ad"]);

        if ($sonuc['status']) { ?>
        
            
        <script>
        window.location.href = "Kategoriler";
        </script>

        <?php } else { ?>
        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>
        <?php } }  ?>

        <div class="form-body">
        <div class="row p-t-20">

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Ana Kategori</label>
                                                    
        <select class="form-control" name="ust">
        <option value="0">Ana Kategori Yok</option>

        <?php $sql=$db->read("kategori");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>
        
        <option value="<?php echo $row['id'] ?>"><?php echo $row['kategori_ad'] ?></option>
        
        <?php } ?>
        </select>

        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Kategori Adı</label>
        <input type="text" required id="firstName" name="kategori_ad" class="form-control"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Sıra</label>
        <input type="number" required id="firstName" name="sira" class="form-control"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Keywords</label>
        <input type="text" id="firstName" name="keywords" class="form-control"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Description</label>
        <textarea class="form-control" name="description"></textarea></div>
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
        <button type="submit" class="btn btn-success" name="kategori_insert"> <i class="ti-plus"></i> Kaydet</button>
        <a href="javascript:javascript:history.go(-1)" class="btn btn-danger">İptal Et</a>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>

        <?php }  else if (isset($_GET['kategoriUpdate'])) { ?>


        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Kategori Düzenle</h4>
        </div>
        
        <div class="card-body">

        <form method="POST">

        <?php 
        if (isset($_POST['kategori_update'])) {
    
        $sonuc=$db->update("kategori",$_POST,
        ["form_name" => "kategori_update",
        "columns" => "id"]);

        if ($sonuc['status']) { ?>
           
        <div class="alert alert-success"> Başarıyla düzenlendi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }

        $sql=$db->wread("kategori","id",$_GET['id']);
        $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

        <div class="form-body">
        <div class="row p-t-20">

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Ana Kategori</label>

        <select name="ust" class="form-control">
        <option value="0">Ana Kategori Yok</option>
        <?php $sorgu=$db->read("kategori");
        while ($satir=$sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
        <?php if ($satir['ust']==0) { ?>
        <?php $selected = ($satir['id'] == $row['ust']) ? 'selected' : ''; ?>
        <option <?=$selected?> value="<?=$satir['id']?>"><?=$satir['kategori_ad']?></option>
        <?php } } ?>
        </select>

        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Kategori Adı</label>
        <input type="text" required id="firstName" name="kategori_ad" value="<?php echo $row['kategori_ad'] ?>" class="form-control"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Sıra</label>
        <input type="number" required id="firstName" name="sira" value="<?php echo $row['sira'] ?>" class="form-control"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Keywords</label>
        <input type="text" id="firstName" name="keywords" value="<?php echo $row['keywords'] ?>" class="form-control"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Description</label>
        <textarea class="form-control" name="description"><?php echo $row['description'] ?></textarea></div>
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
        <button type="submit" class="btn btn-success" name="kategori_update"> <i class="ti-plus"></i> Kaydet</button>
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
        <h4 class="text-themecolor">Kategoriler</h4>
        </div>
        
        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item active">Kategoriler</li>
        </ol>

        <a href="?kategoriInsert=true">
        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="ti-angle-double-right"></i> 
        Kategori Ekle</button></a>

        </div>
        </div>
        </div>
                

        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <div class="table-responsive">

       <?php
        if (isset($_GET['kategoriDelete'])) {

        $sonuc=$db->delete("kategori","id",$_GET['id']);

        if ($sonuc['status']) { ?>

        <div class="alert alert-success"> Başarıyla silindi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Silme başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } } ?>

        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th width="10">ID</th>
        <th>Kategori Adı</th>
        <th width="150">Üst Kategori</th>
        <th width="50">İşlem</th>
        </tr>
        </thead>
        <tbody>


        <?php $sql=$db->read("kategori");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>
        <?php $sorgu=$db->wread("kategori","id",$row['ust']);
        $sonuc=$sorgu->fetch(PDO::FETCH_ASSOC) ?>

        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['kategori_ad'] ?></td>
            <?php if ($row['ust']==0) { ?>
        <td>Ana Kategori</td>
            <?php } else { ?>
            <td><?php echo $sonuc['kategori_ad'] ?></td>
            <?php } ?>
        <td>
        <center>
        <a href="?kategoriUpdate=true&id=<?php echo $row['id'] ?>">
        <button type="button" class="btn btn-sm btn-success"><i class="ti-pencil-alt"></i></button></a>

        <a href="?kategoriDelete=true&id=<?php echo $row['id'] ?>">
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