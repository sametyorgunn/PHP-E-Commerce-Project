        <?php include '../include/header.php'; ?>

        <div class="page-wrapper">
        <div class="container-fluid">
        <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Yöneticiler</h4>
        </div>

        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item"><a href="Yonetici">Yöneticiler</a></li>
        <li class="breadcrumb-item active">Yönetici Ekle</li>
        </ol>
        </div>
        </div>
        </div>
                
        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Yönetici Ekle</h4>
        </div>

        <div class="card-body">
        
        <form method="POST">
        
        <?php 
        if (isset($_POST['admin_insert'])) {

        $sonuc=$db->insert("admin",$_POST,
        [ "form_name" => "admin_insert",
        "pass" => "password" ] );

        if ($sonuc['status']) {?>
        
        <script>
        window.location.href = "Yonetici";
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
        <label class="control-label">Adı Soyadı</label>
        <input type="text" id="firstName" name="adsoyad" class="form-control"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Mail</label>
        <input type="text" id="firstName" name="mail" class="form-control"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Şifre</label>
        <input type="text" id="firstName" name="password" class="form-control"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Telefon</label>
        <input type="text" id="firstName" name="telefon" class="form-control"></div>
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

        <hr>
        <center><label><b>YÖNETİCİ YETKİLERİ</b></label></center>
        <hr>                            
        
        <div class="row">

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Ürünler</label>
        <select class="form-control" name="urunler">
        <option value="1">Aktif</option>
        <option value="0">Pasif</option>
        </select>

        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Kategoriler</label>
        <select class="form-control" name="kategori">
        <option value="1">Aktif</option>
        <option value="0">Pasif</option>
        </select>

        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Siparişler</label>
        <select class="form-control" name="siparis">
        <option value="1">Aktif</option>
        <option value="0">Pasif</option>
        </select>
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Üyeler</label>
        <select class="form-control" name="uyeler">
        <option value="1">Aktif</option>
        <option value="0">Pasif</option>
        </select>
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">İçerik</label>
        <select class="form-control" name="icerik">
        <option value="1">Aktif</option>
        <option value="0">Pasif</option>
        
        </select>
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Kampanyalar</label>
        <select class="form-control" name="kampanya">
        <option value="1">Aktif</option>
        <option value="0">Pasif</option>
        </select>
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Genel Ayarlar</label>
        <select class="form-control" name="genelayar">
        <option value="1">Aktif</option>
        <option value="0">Pasif</option>
        </select>
        </div>
        </div>


        </div>
        </div>
        
        <div class="form-actions">
        <button type="submit" class="btn btn-success" name="admin_insert"> <i class="ti-plus"></i> Kaydet</button>
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