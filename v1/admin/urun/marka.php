
 <?php include '../include/header.php'; ?>

        <div class="page-wrapper">
        <div class="container-fluid">

        <?php 
        if (isset($_GET['markaInsert'])) {  ?>


        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Marka Ekle</h4>
        </div>
        
        <div class="card-body">
       
        <form method="POST">
       
        <?php
        ob_start();
        if (isset($_POST['marka_insert'])) {

        $sonuc = $db->insert("marka",$_POST,
        ["form_name" => "marka_insert"]);

        if ($sonuc['status']) { ?>
        
            
        <script>
        window.location.href = "Markalar";
        </script>

        <?php } else { ?>
        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>
        <?php } }  ?>
        
        <div class="form-body">
        <div class="row p-t-20"> 


        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Marka Adı</label>
        <input type="text" id="firstName" name="marka_ad" class="form-control"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Sıra</label>
        <input type="number" id="firstName" name="sira" class="form-control"></div>
        </div>

        <div class="col-md-4">
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
        <button type="submit" class="btn btn-success" name="marka_insert"> <i class="ti-plus"></i> Kaydet</button>
        <a href="javascript:javascript:history.go(-1)" class="btn btn-danger">İptal Et</a>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>

        <?php }  else if (isset($_GET['markaUpdate'])) { ?>


        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Marka Düzenle</h4>
        </div>
        
        <div class="card-body">

        <form method="POST">

        <?php 
        if (isset($_POST['marka_update'])) {
    
        $sonuc=$db->update("marka",$_POST,
        ["form_name" => "marka_update",
        "columns" => "id"]);

        if ($sonuc['status']) { ?>
           
        <div class="alert alert-success"> Başarıyla düzenlendi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }

        $sql=$db->wread("marka","id",$_GET['id']);
        $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

                
        <div class="form-body">
        <div class="row p-t-20">

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Marka Adı</label>
        <input type="text" id="firstName" name="marka_ad" value="<?php echo $row['marka_ad'] ?>" class="form-control"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Sıra</label>
        <input type="number" id="firstName" name="sira" value="<?php echo $row['sira'] ?>" class="form-control"></div>
        </div>

        <div class="col-md-4">
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
        <button type="submit" class="btn btn-success" name="marka_update"> <i class="ti-plus"></i> Kaydet</button>
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
        <h4 class="text-themecolor">Marka Yönetimi</h4>
        </div>
        
        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item active">Marka Yönetimi</li>
        </ol>

        <a href="?markaInsert=true">
        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="ti-angle-double-right"></i> 
        Marka Ekle</button></a>
        </div>
        </div>
        </div>
                    

        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <div class="table-responsive">

        <?php
        if (isset($_GET['markaDelete'])) {

        $sonuc=$db->delete("marka","id",$_GET['id']);

        if ($sonuc['status']) { ?>

        <div class="alert alert-success"> Başarıyla silindi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Silme başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } } ?>

        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th width="10">ID</th>
        <th>Marka Adı</th>
        <th width="50">İşlem</th>
        </tr>
        </thead>
        <tbody>
        

        <?php $sql=$db->read("marka");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>

        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['marka_ad'] ?></td>
        <td>
        <center>
        <a href="?markaUpdate=true&id=<?php echo $row['id'] ?>">
        <button type="button" class="btn btn-sm btn-success"><i class="ti-pencil-alt"></i></button></a>

        <a href="?markaDelete=true&id=<?php echo $row['id'] ?>">
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