
        <?php include '../include/header.php'; ?>

        <div class="page-wrapper">
        <div class="container-fluid">

        <?php 
        if (isset($_GET['varyantInsert'])) {  ?>


        <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">Varyant Grubu Ekle</h4>
        </div>
        
        <div class="card-body">
       
        <?php if (isset($_POST['varyant_insert'])) {

        $varyant_ad = $_POST['varyant_ad'];
        $sira  = $_POST['sira'];
        $durum  = $_POST['durum'];
        $deger = $_POST['deger'];

         $ekle = $db->db_insert("INSERT INTO varyant SET varyant_ad = ?, sira = ?, durum = ?, deger = ?",[$varyant_ad, $sira, $durum, json_encode($deger)]);


        if ($ekle) { ?>

        <div class="alert alert-success"> Başarıyla eklendi. </div>


        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız</div>

        <?php   } }  ?>

        <form action="" method="POST" enctype="multipart/form-data">



        <div class="form-body">
            <div class="row p-t-20">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Varyant Grup Adı</label>
                        <input type="text" id="firstName" name="varyant_ad" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Sıra</label>
                        <input type="number" id="firstName" name="sira" class="form-control">
                    </div>
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

            <div class="row p-t-20" id="panel">
                <div class="col-sm-9">
                    <input type="text" class="form-control mb-3" name="deger[]" placeholder="Varyant Değerini Yazın">
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-danger mb-3" onclick="varyantsil()" type="button"> <i class="ti-minus"></i> </button>
                </div>
            </div>

            <div class="col-md-9">
                <div class="form-group"><br>
                    <button class="btn btn-info" onclick="varyantgetir()" type="button"><i class="ti-plus"></i>Varyant Değeri Ekle</button>
                </div>
            </div>
        </div>


            <script>
                function varyantgetir()
                {
                    var varyant = "varyantgetir";
                    $.ajax({
                        type: "POST",
                        url: "func.php",
                        data: {varyant},
                        dataType: "JSON",
                        success: function (response) {
                            if(response['durum'] == 'success' ){
                                $('#panel').append(response['sonuc']);
                            }
                        }
                    });
                }

                function varyantsil() {
                    $("#sil1").remove();
                    $("#sil2").remove();
                }
            </script>

        <div class="form-actions">
        <button type="submit" class="btn btn-success" name="varyant_insert"> <i class="ti-plus"></i> Kaydet</button>
        <a href="javascript:javascript:history.go(-1)" class="btn btn-danger">İptal Et</a>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>

        

        <?php }  else if (isset($_GET['varyantUpdate'])) { ?>



            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h4 class="m-b-0 text-white">Varyant Grubu Düzenle</h4>
                        </div>

                        <div class="card-body">

                            <?php if (isset($_POST['varyant_insert'])) {

                                $varyant_ad = $_POST['varyant_ad'];
                                $sira  = $_POST['sira'];
                                $durum  = $_POST['durum'];
                                $deger = $_POST['deger'];

                                $ekle = $db->db_update("UPDATE varyant SET varyant_ad = ?, sira = ?, durum = ?, deger = ? WHERE id = ?",
                                    [$varyant_ad, $sira, $durum, json_encode($deger), $_GET['id']]);


                                if ($ekle) { ?>

                                    <div class="alert alert-success"> Başarıyla eklendi. </div>


                                <?php  } else { ?>

                                    <div class="alert alert-danger"> Kayıt Başarısız</div>

                                <?php   } }  ?>

                            <?php $sql=$db->wread("varyant","id",$_GET['id']);
                            $row=$sql->fetch(PDO::FETCH_ASSOC);  ?>

                            <form action="" method="POST" enctype="multipart/form-data">



                                <div class="form-body">
                                    <div class="row p-t-20">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Varyant Grup Adı</label>
                                                <input type="text" id="firstName" name="varyant_ad" class="form-control" value="<?=$row['varyant_ad']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Sıra</label>
                                                <input type="number" id="firstName" name="sira" class="form-control" value="<?=$row['sira']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">Durum</label>
                                                <select class="form-control" name="durum">
                                                    <option <?= $selected = ($row['durum'] == 1) ? 'selected' : ''; ?> value="1">Aktif</option>
                                                    <option <?= $selected = ($row['durum'] == 0) ? 'selected' : ''; ?> value="0">Pasif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-t-20" id="panel">
                                        <?php foreach (json_decode($row['deger']) as $key => $deger) { ?>
                                        <div class="col-sm-9" id="sil<?=$key?>">
                                            <input type="text" class="form-control mb-3" name="deger[]" placeholder="Varyant Değerini Yazın" value="<?=$deger?>">
                                        </div>
                                        <div class="col-sm-3" id="sil<?=$key?>">
                                            <button class="btn btn-danger mb-3" onclick="varyantsil(<?=$key?>)" type="button"> <i class="ti-minus"></i> </button>
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group"><br>
                                            <button class="btn btn-info" onclick="varyantgetir()" type="button"><i class="ti-plus"></i>Varyant Değeri Ekle</button>
                                        </div>
                                    </div>
                                </div>


                                <script>
                                    function varyantgetir()
                                    {
                                        var varyant = "varyantgetir";
                                        $.ajax({
                                            type: "POST",
                                            url: "func.php",
                                            data: {varyant},
                                            dataType: "JSON",
                                            success: function (response) {
                                                if(response['durum'] == 'success' ){
                                                    $('#panel').append(response['sonuc']);
                                                }
                                            }
                                        });
                                    }

                                    function varyantsil(deger) {
                                        var sil = '#sil'+deger;
                                        $(sil).remove();
                                        $(sil).remove();
                                    }
                                </script>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success" name="varyant_insert"> <i class="ti-plus"></i> Kaydet</button>
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
        <h4 class="text-themecolor">Varyant Yönetimi</h4>
        </div>
        
        <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
        <li class="breadcrumb-item active">Varyant Yönetimi</li>
        </ol>

        <a href="?varyantInsert=true">
        <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="ti-angle-double-right"></i> 
        Varyant Ekle</button></a>
        </div>
        </div>
        </div>
                    

        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <div class="table-responsive">

        <?php
        if (isset($_GET['varyantDelete'])) {

        $sonuc=$db->delete("varyant","id",$_GET['id']);

        if ($sonuc['status']) { ?>

        <div class="alert alert-success"> Başarıyla silindi. </div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Silme başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } } ?>

        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th width="10">ID</th>
        <th>Varyant Adı</th>
        <th width="50">İşlem</th>
        </tr>
        </thead>
        <tbody>
        
        <?php $sql=$db->read("varyant");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>

        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['varyant_ad'] ?></td>
        <td>
        <center>
        <a href="?varyantUpdate=true&id=<?php echo $row['id'] ?>">
        <button type="button" class="btn btn-sm btn-success"><i class="ti-pencil-alt"></i></button></a>

        <a href="?varyantDelete=true&id=<?php echo $row['id'] ?>">
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