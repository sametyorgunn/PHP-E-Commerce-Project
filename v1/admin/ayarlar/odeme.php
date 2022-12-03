        <?php include '../include/header.php'; ?>

        <div class="page-wrapper">

        <div class="container-fluid">

        <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Ödeme Sistemleri</h4>
        </div>
        
        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item">Ödeme Sistemleri</li>
        </ol>
                       
        </div>
        </div>
        </div>
                
        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Ödeme Ayarları</h4>
        </div>

        <div class="card-body">

        <form method="POST" enctype="multipart/form-data">

        <?php 
        if (isset($_POST['odeme_update'])) {
    
        $sonuc=$db->update("odeme",$_POST,
        ["form_name" => "odeme_update",
        "columns" => "id",]);

        if ($sonuc['status']) { ?>
           
        <div class="alert alert-success"> Başarıyla düzenlendi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }

        $sql=$db->wread("odeme","id",$_GET['0']);
        $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

        <div class="form-body">
        <div class="row p-t-20">
  
        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Havale İle Ödeme</label>
        <select class="form-control" name="havaleileodeme">
        <?php echo $row['havaleileodeme'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['havaleileodeme'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['havaleileodeme']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['havaleileodeme']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Kapıda Ödeme</label>
        <select class="form-control" name="kapidaodeme">
        <?php echo $row['kapidaodeme'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['kapidaodeme'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['kapidaodeme']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['kapidaodeme']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Kredi Kartı ile Ödeme</label>
        <select class="form-control" name="kartileodeme">
        <?php echo $row['kartileodeme'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['kartileodeme'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['kartileodeme']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['kartileodeme']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>
        </div>
        </div>
        </div>
        <hr>

        <div class="alert alert-danger">
        <label><b>IYZICO AYARLARI</b></label></div>

        <hr> 

        <div class="row">
           
        <div class="col-md-2">
        <div class="form-group">
        <label class="control-label">Durumu</label>
        <select class="form-control" name="iyzicodurum">
        <?php echo $row['iyzicodurum'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['iyzicodurum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['iyzicodurum']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['iyzicodurum']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>
        </div>
        </div>

        <div class="col-md-5">
        <div class="form-group">
        <label class="control-label">Api Key</label>
        <input type="text" class="form-control" name="iyzicoapikey" value="<?php echo $row['iyzicoapikey'] ?>">
        </div>
        </div>

        <div class="col-md-5">
        <div class="form-group">
        <label class="control-label">iyzico Secret Key</label>
        <input type="text" class="form-control" name="iyzicosecretkey" value="<?php echo $row['iyzicosecretkey'] ?>">
        </div>
        </div>

        </div>


        <div class="alert alert-info">
        <label><b>PAYTR AYARLARI</b></label></div>

        <hr> 

        <div class="row">
           
        <div class="col-md-2">
        <div class="form-group">
        <label class="control-label">Durumu</label>
        <select class="form-control" name="paytrdurum">
        <?php echo $row['paytrdurum'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['paytrdurum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['paytrdurum']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['paytrdurum']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Merchant ID</label>
        <input type="text" class="form-control" name="paytrmerchantid" value="<?php echo $row['paytrmerchantid'] ?>">
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Merchant Key</label>
        <input type="text" class="form-control" name="paytrmerchantkey" value="<?php echo $row['paytrmerchantkey'] ?>">
        </div>
        </div>

        <div class="col-md-4">
        <div class="form-group">
        <label class="control-label">Merchant Salt</label>
        <input type="text" class="form-control" name="paytrmerchantsalt" value="<?php echo $row['paytrmerchantsalt'] ?>">
        </div>
        </div>

        </div>




        <div class="alert alert-warning">
        <label><b>SHOPİER AYARLARI</b></label></div>

        <hr> 

        <div class="row">
           
        <div class="col-md-2">
        <div class="form-group">
        <label class="control-label">Durumu</label>
        <select class="form-control" name="shopierdurum">
        <?php echo $row['shopierdurum'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['shopierdurum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
        <option value="0" <?php if ($row['shopierdurum']==0) { echo 'selected=""'; } ?>>Pasif</option>
        <?php if ($row['shopierdurum']==0) {?>

        <?php } else {?>
        <?php  }  ?>
        </select>
        </div>
        </div>

        <div class="col-md-5">
        <div class="form-group">
        <label class="control-label">Shopier - API Key</label>
        <input type="text" class="form-control" name="shopierapikey" value="<?php echo $row['shopierapikey'] ?>">
        </div>
        </div>

        <div class="col-md-5">
        <div class="form-group">
        <label class="control-label">Shopier - Api Secret</label>
        <input type="text" class="form-control" name="shopierapisecret" value="<?php echo $row['shopierapisecret'] ?>">
        </div>
        </div>

        </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-actions">
        <button type="submit" class="btn btn-success" name="odeme_update"> <i class="ti-plus"></i> Kaydet</button>
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