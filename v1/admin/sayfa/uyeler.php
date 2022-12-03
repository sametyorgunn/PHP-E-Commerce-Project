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
        <li class="breadcrumb-item active">Üyeler</li>
        </ol>

        <a href="Uyeekle">
        <button type="button" class="btn btn-info d-none d-lg-block m-l-15">
        <i class="ti-angle-double-right"></i> Üye Ekle</button></a>
        </div>
        </div>
        </div>
                
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <div class="table-responsive">

        <?php 
        if (isset($_GET['uyeDelete'])) {

        $sonuc=$db->delete("uye","id",$_GET['id']);

        if ($sonuc['status']) { ?>
           
        <script>
        window.location.href = "Uyeler";
        </script>

        <?php  } else { ?>

        <div class="alert alert-danger"> Silme başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } } ?> 

        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th width="10">ID</th>
        <th>Adı Soyadı</th>
        <th width="50">İşlem</th>
        </tr>
        </thead>
        <tbody>
        
        <?php $sql=$db->read("uye");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>

        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['adsoyad'] ?></td>
        <td>
        <center>
        <a href="Uyeduzenle?id=<?php echo $row['id']; ?>">
        <button type="button" class="btn btn-sm btn-success"><i class="ti-pencil-alt"></i></button></a>

        <a href="?uyeDelete=true&id=<?php echo $row['id'] ?>">
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