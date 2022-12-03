        <?php include '../include/header.php'; ?>

        <div class="page-wrapper">
        <div class="container-fluid">

        <?php if (isset($_GET['bannerUpdate'])) { ?>


        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Banner Düzenle</h4>
        </div>
        
        <div class="card-body">

        <form method="POST" enctype="multipart/form-data">

        <?php 
        if (isset($_POST['banner_update'])) {
    
        $sonuc=$db->update("banner",$_POST,
        ["form_name" => "banner_update",
        "columns" => "id",
        "dir" => "banner",
        "file_name" => "resim",
        "file_delete" => "delete_file",]);

        if ($sonuc['status']) { ?>
           
        <div class="alert alert-success"> Başarıyla düzenlendi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }

        $sql=$db->wread("banner","id",$_GET['id']);
        $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

                
        <div class="form-body">
        <div class="row p-t-20">

        <div class="col-md-6">
        <div class="form-group">
        <label class="control-label">Resim</label>
        <input type="file" id="input-file-now" class="dropify" name="resim" 
        data-default-file="../images/banner/<?php echo $row['resim'] ?>"/></div>
        </div>


        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Tanım</label>
        <input type="text" id="firstName" disabled value="<?php echo $row['tanim'] ?>" class="form-control"></div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Yönlendirilecek Link</label>
        <input type="text" id="firstName" name="link" value="<?php echo $row['link'] ?>" class="form-control"></div>
        </div>

        </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-actions">
        <button type="submit" class="btn btn-success" name="banner_update"> <i class="ti-plus"></i> Kaydet</button>
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
        <h4 class="text-themecolor">Banner</h4>
        </div>
        
        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item active">Banner</li>
        </ol>

        </div>
        </div>
        </div>
                

        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <div class="table-responsive">


        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th width="10">ID</th>
        <th width="75">Resim</th>
        <th>Tanım</th>
        <th width="50">İşlem</th>
        </tr>
        </thead>                 
        <tbody>

        <?php $sql=$db->read("banner");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>
            
        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><img width="100" src="../images/banner/<?php echo $row['resim'] ?>"></td>
        <td><?php echo $row['tanim'] ?></td>
        <td>
        <center>
        <a href="?bannerUpdate=true&id=<?php echo $row['id'] ?>">
        <button type="button" class="btn btn-sm btn-success"><i class="ti-pencil-alt"></i></button></a>
        <center>
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