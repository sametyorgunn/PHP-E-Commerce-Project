        <?php include '../include/header.php'; ?>

        <div class="page-wrapper">
        <div class="container-fluid">

        <?php 
        if (isset($_GET['havaleUpdate'])) {  ?>


        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Havale Detayları</h4>
        </div>
                
        <div class="card-body">
        
        <form method="POST" enctype="multipart/form-data">

        <?php 
        if (isset($_POST['havale_update'])) {
    
        $sonuc=$db->update("havale",$_POST,
        ["form_name" => "havale_update",
        "columns" => "id",]);

        if ($sonuc['status']) { ?>
           
        <div class="alert alert-success"> Başarıyla düzenlendi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }

        $sql=$db->wread("havale","id",$_GET['id']);
        $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

        <div class="form-body">
        <div class="row p-t-20">
                    
        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Sipariş Kodu</label>
        <input class="form-control" type="text" name="sipariskodu" value="<?php echo $row['sipariskodu'] ?>">
        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Adı Soyadı</label>
        <input class="form-control" type="text" name="adsoyad" value="<?php echo $row['adsoyad'] ?>">
        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Yatırılan Tutar</label>
        <input class="form-control" type="text" name="tutar" value="<?php echo $row['tutar'] ?>">
        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Telefon</label>
        <input class="form-control" type="text" name="telefon" value="<?php echo $row['telefon'] ?>">
        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Mail</label>
        <input class="form-control" type="text" name="mail" value="<?php echo $row['mail'] ?>">
        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Banka Adı</label>
        <input class="form-control" type="text" name="bankaad" value="<?php echo $row['bankaad'] ?>">
        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Havale Mesajı</label>
        <textarea class="form-control" name="mesaj"><?php echo $row['mesaj'] ?></textarea>
        </div>
        </div>

        <div class="col-md-3">
        <div class="form-group">
        <label class="control-label">Durum</label>
        <select class="form-control" name="durum">
        <?php echo $row['durum'] == '1' ? 'selected=""' : ''; ?>  -->
        <option value="1" <?php echo $row['durum'] == '1' ? 'selected=""' : ''; ?>>Onaylandı</option>
        <option value="0" <?php if ($row['durum']==0) { echo 'selected=""'; } ?>>Beklemede</option>
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
        <button type="submit" class="btn btn-success" name="havale_update"> <i class="ti-plus"></i> Kaydet</button>
        <a href="javascript:javascript:history.go(-1)" class="btn btn-danger">İptal Et</a>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>

        <?php } ?>
              
        <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Havale Bildirim</h4>
        </div>
        
        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item active">Havale Bildirim</li>
        </ol>

        </div>
        </div>
        </div>
                
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <div class="table-responsive">

        <?php 
        if (isset($_GET['havaleDelete'])) {

        $sonuc=$db->delete("havale","id",$_GET['id']);

        if ($sonuc['status']) { ?>
           
        <div class="alert alert-success"> Başarıyla silindi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Silme başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } } ?> 


        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th width="10">ID</th>
        <th>Adı Soyadı</th>
        <th width="100">Tutar</th>
        <th width="100">Tarih</th>
        <th width="100">Durum</th>
        <th width="50">İşlem</th>
        </tr>
        </thead>
        <tbody>
                                         
        <?php $sql=$db->read("havale");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>

        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['adsoyad'] ?></td>
        <td><?php echo $row['tutar'] ?></td>
        <td><?php echo $row['durum'] ?></td>
        <td>Edinburgh</td>
        <td>
        <center>
        <a href="?havaleUpdate=true&id=<?php echo $row['id'] ?>">
        <button type="button" class="btn btn-sm btn-success"><i class="ti-pencil-alt"></i></button></a>

        <a href="?havaleDelete=true&id=<?php echo $row['id'] ?>">
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