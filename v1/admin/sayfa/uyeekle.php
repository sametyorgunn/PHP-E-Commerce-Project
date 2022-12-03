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

        <form method="POST">
        
        <?php 
        if (isset($_POST['uye_insert'])) {

        $sonuc=$db->insert("uye",$_POST,
        [ "form_name" => "uye_insert",
        "pass" => "password" ] );

        if ($sonuc['status']) {?>
        
        <script>
        window.location.href = "Uyeler";
        </script>
        
        <?php } else {?>

        <div class="alert alert-danger">
        Kayıt Başarısız.<?php echo $sonuc['error'] ?>
       </div>
        <?php } } ?>
        
        <div class="form-body">
        <div class="row p-t-20">
        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Üye Adı soyadı</label>
        <input type="text" id="firstName" name="adsoyad" class="form-control"></div>
        </div>

       <!-- <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Üye Soyadı</label>
        <input type="text" id="firstName" name="soyad" class="form-control"></div>
        </div> -->

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Mail</label>
        <input type="text" id="firstName" name="mail" class="form-control"></div>
        </div>


        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Password</label>
        <input type="text" id="firstName" name="password" class="form-control"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Telefon</label>
        <input type="text" id="firstName" name="telefon" class="form-control"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">T.C.</label>
        <input type="text" id="firstName" name="tc" class="form-control"></div>
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

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">İlçe</label>
        <input type="text" id="firstName" name="ilce" class="form-control"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">İl</label>
        <input type="text" id="firstName" name="il" class="form-control"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Adres</label>
        <textarea class="form-control" name="adres"></textarea></div>
        </div>

        
        </div>
                                      
        </div>
        <div class="form-actions">
        <button type="submit" name="uye_insert" class="btn btn-success"> <i class="ti-plus"></i> Kaydet</button>
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