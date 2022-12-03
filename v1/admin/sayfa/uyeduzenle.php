        <?php include '../include/header.php'; ?>

        <div class="page-wrapper">

            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Üyeler</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="Uyeler">Üyeler</a></li>
                                <li class="breadcrumb-item active">Üye Ekle</li>
                            </ol>
                       
                        </div>
                    </div>
                </div>
                

        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Üye Ekle</h4>
        </div>
        
        <div class="card-body">

        
        <form method="POST" enctype="multipart/form-data">

       <?php 
       if (isset($_POST['uye_update'])) {
    
       $sonuc=$db->update("uye",$_POST,
       ["form_name" => "uye_update",
       "columns" => "id",
        "pass" => "password"]);

       if ($sonuc['status']) { ?>
           
       <div class="alert alert-succes"> Başarıyla kaydedildi.</div>

       <?php  } else { ?>

       <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

       <?php   } }

        $sql=$db->wread("uye","id",$_GET['id']);
        $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

        
        <div class="form-body">
        <div class="row p-t-20">
        
        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Üye Adı</label>
        <input type="text" id="firstName" name="adsoyad" class="form-control" value="<?php echo $row['adsoyad'] ?>"></div>
        </div>

     <!--   <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Üye Soyadı</label>
        <input type="text" id="firstName" name="soyad" class="form-control" value="<?php echo $row['soyad'] ?>"></div>
        </div> -->

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Mail</label>
        <input type="text" id="firstName" name="mail" class="form-control" value="<?php echo $row['mail'] ?>"></div>
        </div>


        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Password</label>
        <input type="text" name="password" class="form-control"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Telefon</label>
        <input type="text" id="firstName" name="telefon" class="form-control" value="<?php echo $row['telefon'] ?>"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">T.C.</label>
        <input type="text" id="firstName" name="tc" class="form-control" value="<?php echo $row['tc'] ?>"></div>
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

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">İlçe</label>
        <input type="text" id="firstName" name="ilce" class="form-control" value="<?php echo $row['ilce'] ?>"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">İl</label>
        <input type="text" id="firstName" name="il" class="form-control" value="<?php echo $row['il'] ?>"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Adres</label>
        <textarea class="form-control" name="adres"><?php echo $row['adres'] ?></textarea></div>
        </div>

        
        </div>

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                      
        </div>
        <div class="form-actions">
        <button type="submit" name="uye_update" class="btn btn-success"> <i class="ti-plus"></i> Kaydet</button>
        <a href="javascript:javascript:history.go(-1)" class="btn btn-danger">İptal Et</a>
        </div>
        
        </form>
        
        </div>
        </div>
        </div>
        </div>
              
        </div>
        </div>     

        <?php include '../include/footer.php'; ?>