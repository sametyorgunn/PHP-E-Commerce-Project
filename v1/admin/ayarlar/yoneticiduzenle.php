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
        
        <form method="POST" enctype="multipart/form-data">

        <?php 
        if (isset($_POST['admin_update'])) {
    
        $sonuc=$db->update("admin",$_POST,
        ["form_name" => "admin_update",
        "columns" => "id",
        "pass" => "password"]);

        if ($sonuc['status']) { ?>
           
        <div class="alert alert-success"> Başarıyla kaydedildi.</div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }

        $sql=$db->wread("admin","id",$_GET['id']);
        $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

        <div class="form-body">
        <div class="row p-t-20">
        

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Adı Soyadı</label>
        <input type="text" id="firstName" class="form-control" name="adsoyad" value="<?php echo $row['adsoyad'] ?>"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Mail</label>
        <input type="text" id="firstName" name="mail" value="<?php echo $row['mail'] ?>" class="form-control"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Şifre</label>
        <input type="text" id="firstName" name="password" class="form-control"></div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Telefon</label>
        <input type="text" id="firstName" name="telefon" value="<?php echo $row['telefon'] ?>" class="form-control"></div>
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

        <hr>
        <center><label><b>YÖNETİCİ YETKİLERİ</b></label></center>
        <hr>                            
        
        <div class="row">

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Ürünler</label>
        <select class="form-control" name="urunler">
        <?php echo $row['urunler'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['urunler'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['urunler']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['urunler']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>

        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Kategoriler</label>
        <select class="form-control" name="kategori">
        <?php echo $row['kategori'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['kategori'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['kategori']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['kategori']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>

        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Siparişler</label>
        <select class="form-control" name="siparis">
        <?php echo $row['siparis'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['siparis'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['siparis']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['siparis']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Üyeler</label>
        <select class="form-control" name="uyeler">
        <?php echo $row['uyeler'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['uyeler'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['uyeler']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['uyeler']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">İçerik</label>
        <select class="form-control" name="icerik">
        <?php echo $row['icerik'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['icerik'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['icerik']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['icerik']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Kampanyalar</label>
        <select class="form-control" name="kampanya">
        <?php echo $row['kampanya'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['kampanya'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['kampanya']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['kampanya']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Genel Ayarlar</label>
        <select class="form-control" name="genelayar">
        <?php echo $row['genelayar'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['genelayar'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['genelayar']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['genelayar']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>
        </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        </div>
        </div>
        
        <div class="form-actions">
        <button type="submit" class="btn btn-success" name="admin_update"> <i class="ti-plus"></i> Kaydet</button>
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