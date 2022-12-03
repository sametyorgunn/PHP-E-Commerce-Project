
        <?php include '../include/header.php'; ?>

        <div class="page-wrapper">
                
        <div class="container-fluid">

        <?php 
        if (isset($_GET['kampanyaInsert'])) {  ?>

        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Sepette İndirim Kuponu</h4>
        </div>
        <div class="card-body">
               
        <?php if (isset($_POST['kampanya_insert'])) {
        $sonuc=$db->insert("kupon",$_POST,
        ["form_name" => "kampanya_insert"]);

        if ($sonuc['status']) { ?>

        <script>
        window.location.href = "Kampanyalar";
        </script>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }  ?> 

        <form method="POST">

        <div class="form-body">
        <div class="row p-t-20">
                    
        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Kampanya Adı</label>
        <input required type="text" class="form-control" name="baslik">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">İndirim Tutar</label>
        <input required type="text" class="form-control" name="tutar">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Başlangıç Tarihi</label>
        <input required type="date" class="form-control" name="baslangictarihi">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Bitiş Tarihi</label>
        <input required type="date" class="form-control" name="bitistarihi">
        </div>
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
        <button type="submit" class="btn btn-success" name="kampanya_insert"> <i class="ti-plus"></i> Kaydet</button>
        <a href="javascript:javascript:history.go(-1)" class="btn btn-danger">İptal Et</a>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>

        <?php }  else if (isset($_GET['kampanyaUpdate'])) { ?>

        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Sepette İndirim Kuponu</h4>
        </div>
        <div class="card-body">
               
        <form method="POST" enctype="multipart/form-data">

       <?php 
       if (isset($_POST['kampanya_update'])) {
    
       $sonuc=$db->update("kupon",$_POST,
       ["form_name" => "kampanya_update",
       "columns" => "id",]);

       if ($sonuc['status']) { ?>
           
       <div class="alert alert-success"> Başarıyla düzenlendi. </div>

       <?php  } else { ?>

       <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

       <?php   } }

        $sql=$db->wread("kupon","id",$_GET['id']);
        $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

        <div class="form-body">
        <div class="row p-t-20">
                    
        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Kampanya Adı</label>
        <input required type="text" class="form-control" name="baslik" value="<?php echo $row['baslik'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">İndirim Tutar</label>
        <input required type="text" class="form-control" name="tutar" value="<?php echo $row['tutar'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Başlangıç Tarihi</label>
        <input required type="date" class="form-control" name="baslangictarihi" value="<?php echo $row['baslangictarihi'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Bitiş Tarihi</label>
        <input required type="date" class="form-control" name="bitistarihi" value="<?php echo $row['bitistarihi'] ?>">
        </div>
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
        <button type="submit" name="kampanya_update" class="btn btn-success"> <i class="ti-plus"></i> Kaydet</button>
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
        <h4 class="text-themecolor">Sepette İndirim</h4>
        </div>
        
        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item active">Sepette İndirim</li>
        </ol>

        <a href="?kampanyaInsert=true">
        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="ti-angle-double-right"></i> 
        Kampanya Ekle</button></a>
        </div>
        </div>
        </div>
                
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <div class="table-responsive">

        <?php 
        if (isset($_GET['kampanyaDelete'])) {

        $sonuc=$db->delete("kupon","id",$_GET['id']);

        if ($sonuc['status']) { ?>
           
        <div class="alert alert-success"> Başarıyla silindi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Silme başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } } ?> 

        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th width="10">ID</th>
        <th>Kampanya Adı</th>
        <th width="50">İşlem</th>
        </tr>
        </thead>
        <tbody>
        
        <?php $sql=$db->read("kupon");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>

        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['baslik'] ?></td>
        <td>
        <center>
        <a href="?kampanyaUpdate=true&id=<?php echo $row['id'] ?>">
        <button type="button" class="btn btn-sm btn-success"><i class="ti-pencil-alt"></i></button></a>

        <a href="?kampanyaDelete=true&id=<?php echo $row['id'] ?>">
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