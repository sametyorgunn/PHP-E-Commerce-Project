        <?php include '../include/header.php'; ?>

        <?php if ($_FILES["logo"]["name"]!='') {
            $dosyaYukle=$_FILES["logo"]["tmp_name"];
            $klasor="../../images/logo/";
            $yeniad = time().$_FILES["logo"]["name"];
            move_uploaded_file($dosyaYukle,"$klasor".$yeniad);

            $update = $db->db_select("update ayar set Logo = ? where id = ?", [$yeniad, 0]);
        } ?>

        <?php if ($_FILES["favicon"]["name"]!='') {
            $dosyaYukle=$_FILES["favicon"]["tmp_name"];
            $klasor="../../images/logo/";
            $yeniad = time().$_FILES["favicon"]["name"];
            move_uploaded_file($dosyaYukle,"$klasor".$yeniad);

            $update = $db->db_select("update ayar set Favicon = ? where id = ?", [$yeniad, 0]);
        } ?>


        <div class="page-wrapper">

        <div class="container-fluid">
        <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Genel Ayarlar</h4>
        </div>
    
        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item">Genel Ayarlar</li>
        </ol>
                       
        </div>
        </div>
        </div>
                

        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Web Sitesi Genel Ayarları</h4>
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
                
        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Seo Title</label>
        <input required type="text" class="form-control" name="title" value="<?php echo $row['title'] ?>">
        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Seo Keywords</label>
        <input required type="text" class="form-control" name="keywords" value="<?php echo $row['keywords'] ?>">
        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Seo Description</label>
        <textarea required class="form-control" name="description"><?php echo $row['description'] ?></textarea>
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Telefon</label>
        <input required type="text" class="form-control" name="telefon" value="<?php echo $row['telefon'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">WhatsApp</label>
        <input required type="text" class="form-control" name="whatsapp" value="<?php echo $row['whatsapp'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Mail</label>
        <input required type="text" class="form-control" name="mail" value="<?php echo $row['mail'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Kdv</label>
        <input required type="text" class="form-control" name="kdv" value="<?php echo $row['kdv'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Kargo Fiyatı</label>
        <input required type="text" class="form-control" name="kargofiyati" value="<?php echo $row['kargofiyati'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Ücretsiz Kargo Fiyatı</label>
        <input required type="text" class="form-control" name="ucretsizkargofiyati" value="<?php echo $row['ucretsizkargofiyati'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">İlçe</label>
        <input required type="text" class="form-control" name="ilce" value="<?php echo $row['ilce'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">İl</label>
        <input required type="text" class="form-control" name="il" value="<?php echo $row['il'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Posta Kodu</label>
        <input required type="text" class="form-control" name="postakodu" value="<?php echo $row['postakodu'] ?>">
        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Adres</label>
        <textarea class="form-control" name="adres"><?php echo $row['postakodu'] ?></textarea>
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Facebook</label>
        <input required type="text" class="form-control" name="facebook" value="<?php echo $row['facebook'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Twitter</label>
        <input required type="text" class="form-control" name="twitter" value="<?php echo $row['twitter'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Instagram</label>
        <input required type="text" class="form-control" name="instagram" value="<?php echo $row['instagram'] ?>">
        </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Logo</label>
                <input type="file" class="form-control" name="logo">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">Favicon</label>
                <input type="file" class="form-control" name="favicon">
            </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        </div>
        <div class="form-actions">
        <button type="submit" name="ayar_update" class="btn btn-success"> <i class="ti-plus"></i> Kaydet</button>
                   
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>
              
        </div>
        </div>
       


       <?php include '../include/footer.php'; ?>