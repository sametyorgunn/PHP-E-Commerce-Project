        <?php include '../include/header.php'; ?>

        <div class="page-wrapper">

        <div class="container-fluid">

        <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Mail Ayarları</h4>
        </div>
        
        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item">Mail Ayarları</li>
        </ol>
                       
        </div>
        </div>
        </div>
                
        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Mail Ayarları</h4>
        </div>

        <div class="card-body">

        <form method="POST" enctype="multipart/form-data">

        <?php 
        if (isset($_POST['ayar_update'])) {
    
        $sonuc=$db->update("ayar",$_POST,
        ["form_name" => "ayar_update",
        "columns" => "id",]);

        if ($sonuc['status']) { ?>
           
        <div class="alert alert-success"> Başarıyla düzenlendi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }

        $sql=$db->wread("ayar","id",$_GET['0']);
        $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

       

        <div class="form-body">
        <div class="row p-t-20">
  
        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Mail Host</label>
        <input type="text" class="form-control" name="mailhost" value="<?php echo $row['mailhost'] ?>">
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Mail Kullanıcı Adı</label>
        <input type="text" class="form-control" name="mailkadi" value="<?php echo $row['mailkadi'] ?>">
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Mail Şifre</label>
        <input type="text" class="form-control" name="mailsifre" value="<?php echo $row['mailsifre'] ?>">
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Mail Port</label>
        <input type="text" class="form-control" name="mailport" value="<?php echo $row['mailport'] ?>">
        </div>
        </div>


        </div>



        </div>

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-actions">
        <button type="submit" class="btn btn-success" name="ayar_update"> <i class="ti-plus"></i> Kaydet</button>
        <button type="button" class="btn btn-danger">İptal Et</button>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>
              
        </div>
        </div>
       


       <?php include '../include/footer.php'; ?>