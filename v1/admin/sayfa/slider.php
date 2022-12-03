
 <?php include '../include/header.php'; ?>

        <div class="page-wrapper">
        <div class="container-fluid">
        
        <?php 
        if (isset($_GET['sliderInsert'])) {  ?>


        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Slider Ekle</h4>
        </div>
        
        <div class="card-body">
        
        <?php
        ob_start();
        if (isset($_POST['slider_insert'])) {

        $sonuc = $db->insert("slider",$_POST,
        ["form_name" => "slider_insert",
        "dir" => "slider",
        "file_name" => "resim"]);

        if ($sonuc['status']) { ?>
        
        <div class="alert alert-success"> Slider başarıyla eklendi. </div>
              
        <script>
        window.location.href = "Slider";
        </script>

        <?php } else { ?>
        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>
        <?php } }  ?>

        <form method="POST" enctype="multipart/form-data">
        
        <div class="form-body">
        <div class="row p-t-20">

        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Resim</label>
        <input type="file" id="input-file-now" class="dropify" name="resim" /></div>
        </div>


        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Başlık</label>
        <input type="text" id="firstName" name="baslik" class="form-control"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Yönlendirilecek Link</label>
        <input type="text" id="firstName" name="link" class="form-control"></div>
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
        <button type="submit" class="btn btn-success" name="slider_insert"> <i class="ti-plus"></i> Kaydet</button>
        <a href="javascript:javascript:history.go(-1)" class="btn btn-danger">İptal Et</a>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>

        <?php }  else if (isset($_GET['sliderUpdate'])) { ?>


        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Slider Düzenle</h4>
        </div>
        
        <div class="card-body">

        <form method="POST" enctype="multipart/form-data">

        <?php 
        if (isset($_POST['slider_update'])) {
    
        $sonuc=$db->update("slider",$_POST,
        ["form_name" => "slider_update",
        "columns" => "id",
        "dir" => "slider",
        "file_name" => "resim",
        "file_delete" => "delete_file",]);

        if ($sonuc['status']) { ?>
           
        <div class="alert alert-success"> Başarıyla düzenlendi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }

        $sql=$db->wread("slider","id",$_GET['id']);
        $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

                
        <div class="form-body">
        <div class="row p-t-20">

        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Resim</label>
        <input type="file" id="input-file-now" class="dropify" name="resim" 
        data-default-file="../images/slider/<?php echo $row['resim'] ?>"/></div>
        </div>


        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Başlık</label>
        <input type="text" id="firstName" name="baslik" value="<?php echo $row['baslik'] ?>" class="form-control"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Yönlendirilecek Link</label>
        <input type="text" id="firstName" name="link" value="<?php echo $row['link'] ?>" class="form-control"></div>
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
        <button type="submit" class="btn btn-success" name="slider_update"> <i class="ti-plus"></i> Kaydet</button>
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
        <h4 class="text-themecolor">Slider</h4>
        </div>
        
        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item active">Slider</li>
        </ol>

        <a href="?sliderInsert=true">
        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="ti-angle-double-right"></i> Slider Ekle</button></a>
        </div>
        </div>
        </div>
                

        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <div class="table-responsive">

        <?php
        if (isset($_GET['sliderDelete'])) {

        $sonuc=$db->delete("slider","id",$_GET['id'],$_GET['file_delete']);

        if ($sonuc['status']) { ?>

        <div class="alert alert-success"> Başarıyla silindi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Silme başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } } ?>


        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th width="10">ID</th>
        <th width="75">Resim</th>
        <th>Başlık</th>
        <th width="50">İşlem</th>
        </tr>
        </thead>
        <tbody>
        

        <?php $sql=$db->read("slider");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>

        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><img width="50" src="../images/slider/<?php echo $row['resim'] ?>"></td>
        <td><?php echo $row['baslik'] ?></td>
        <td>
        <center>
        <a href="?sliderUpdate=true&id=<?php echo $row['id'] ?>">
        <button type="button" class="btn btn-sm btn-success"><i class="ti-pencil-alt"></i></button></a>

        <a href="?sliderDelete=true&id=<?php echo $row['id'] ?>&file_delete=<?php echo $row['resim'] ?>">
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