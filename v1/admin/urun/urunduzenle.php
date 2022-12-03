<?php include '../include/header.php'; ?>






<div class="page-wrapper">

    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Ürün Düzenle</h4>
            </div>

            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Anasayfa">Anasayfa</a></li>
                        <li class="breadcrumb-item"><a href="Urunler">Ürünler</a></li>
                        <li class="breadcrumb-item active">Ürün Düzenle</li>
                    </ol>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="m-b-0 text-white">Ürün Düzenle</h4>
                    </div>

                    <div class="card-body">
                        <?php



                        if (isset($_POST['urun_update'])) {




                            if ($_POST['kategori']!='' && $_POST['marka']!='' && $_POST['durum']!='' && $_POST['urunad']!='' && $_POST['altozet']!='' &&
                                $_POST['urunkod']!='' && $_POST['urunfiyat']!='' && $_POST['urunstok']!='' && $_POST['indirimyuzde']!='' &&
                                $_POST['urunvaryant']!='') {

                                $kategori = $_POST['kategori'];
                                $marka = $_POST['marka'];
                                $durum = $_POST['durum'];
                                $urunad = $_POST['urunad'];
                                $altozet = $_POST['altozet'];
                                $urunkod = $_POST['urunkod'];
                                $urunfiyat = $_POST['urunfiyat'];
                                $urunstok = $_POST['urunstok'];
                                $indirimyuzde = $_POST['indirimyuzde'];
                                $urunvaryant = $_POST['urunvaryant'];
                                $urunvaryantkod = $_POST['urunvaryantkod'];
                                $urunvaryantfiyat = $_POST['urunvaryantfiyat'];
                                $detay = $_POST['detay'];
                                $indirimfiyat = $urunfiyat * $indirimyuzde / 100;
                                $indirimfiyat = $urunfiyat - $indirimfiyat;

                                $grupadi = count($urunvaryantkod);

                                if ($_FILES["resimler"]['name'][0]!='') {
                                    if ($_FILES["resim"]['name']!='') {
                                        for($i=0; $i<count($_FILES["resimler"]["name"]); $i++) {
                                            $dosyaYukle=$_FILES["resimler"]["tmp_name"][$i];
                                            $klasor="../../images/urun/";
                                            $yeniad = time().$_FILES["resimler"]["name"][$i];
                                            move_uploaded_file($dosyaYukle,"$klasor".$yeniad);
                                            $resimler[] = $yeniad;
                                        }

                                        $dosyaYukle=$_FILES["resim"]["tmp_name"];
                                        $klasor="../../images/urun/";
                                        $yeniad2 = time().$_FILES["resim"]["name"];
                                        move_uploaded_file($dosyaYukle,"$klasor".$yeniad2);


                                        $ekle = $db->db_update("UPDATE urun SET varyantgrup = ?, resim = ?, kategori = ?, marka = ?, urun_ad = ?, altozet = ?,
                                        urunkodu = ?, urunstok = ?, fiyat = ?, indirimlifiyat = ?, indirimyuzdeorani = ?,
                                        varyant = ?, urunvaryantkod = ?, urunvaryantfiyat = ?, resimler = ?, detay = ?, durum = ? WHERE id = ?",
                                            [$grupadi,$yeniad2,$kategori,$marka,$urunad,$altozet,$urunkod,$urunstok,$urunfiyat,$indirimfiyat,$indirimyuzde,
                                                json_encode($urunvaryant),json_encode($urunvaryantkod),json_encode($urunvaryantfiyat),json_encode($resimler),$detay,$durum,$_GET['id']]);
                                    } else {
                                        for($i=0; $i<count($_FILES["resimler"]["name"]); $i++) {
                                            $dosyaYukle=$_FILES["resimler"]["tmp_name"][$i];
                                            $klasor="../../images/urun/";
                                            $yeniad = time().$_FILES["resimler"]["name"][$i];
                                            move_uploaded_file($dosyaYukle,"$klasor".$yeniad);
                                            $resimler[] = $yeniad;
                                        }

                                        $ekle = $db->db_update("UPDATE urun SET varyantgrup = ?, kategori = ?, marka = ?, urun_ad = ?, altozet = ?,
                                        urunkodu = ?, urunstok = ?, fiyat = ?, indirimlifiyat = ?, indirimyuzdeorani = ?,
                                        varyant = ?, urunvaryantkod = ?, urunvaryantfiyat = ?, resimler = ?, detay = ?, durum = ? WHERE id = ?",
                                            [$grupadi,$kategori,$marka,$urunad,$altozet,$urunkod,$urunstok,$urunfiyat,$indirimfiyat,$indirimyuzde,
                                                json_encode($urunvaryant),json_encode($urunvaryantkod),json_encode($urunvaryantfiyat),json_encode($resimler),$detay,$durum,$_GET['id']]);
                                    }
                                } elseif ($_FILES["resim"]['name']!='') {

                                    $dosyaYukle=$_FILES["resim"]["tmp_name"];
                                    $klasor="../../images/urun/";
                                    $yeniad = time().$_FILES["resim"]["name"];
                                    move_uploaded_file($dosyaYukle,"$klasor".$yeniad);


                                    $ekle = $db->db_update("UPDATE urun SET varyantgrup = ?, kategori = ?, marka = ?, resim = ?, urun_ad = ?, altozet = ?,
                                        urunkodu = ?, urunstok = ?, fiyat = ?, indirimlifiyat = ?, indirimyuzdeorani = ?,
                                        varyant = ?, urunvaryantkod = ?, urunvaryantfiyat = ?, detay = ?, durum = ? WHERE id = ?",
                                        [$grupadi,$kategori,$marka,$yeniad,$urunad,$altozet,$urunkod,$urunstok,$urunfiyat,$indirimfiyat,$indirimyuzde,
                                            json_encode($urunvaryant),json_encode($urunvaryantkod),json_encode($urunvaryantfiyat),$detay,$durum,$_GET['id']]);
                                } else {

                                    $ekle = $db->db_update("UPDATE urun SET varyantgrup = ?, kategori = ?, marka = ?, urun_ad = ?, altozet = ?,
                                        urunkodu = ?, urunstok = ?, fiyat = ?, indirimlifiyat = ?, indirimyuzdeorani = ?,
                                        varyant = ?, urunvaryantkod = ?, urunvaryantfiyat = ?, detay = ?, durum = ? WHERE id = ?",
                                        [$grupadi,$kategori,$marka,$urunad,$altozet,$urunkod,$urunstok,$urunfiyat,$indirimfiyat,$indirimyuzde,
                                            json_encode($urunvaryant),json_encode($urunvaryantkod),json_encode($urunvaryantfiyat),$detay,$durum,$_GET['id']]);
                                }

                                if ($ekle) { ?>

                                    <div class="alert alert-success"> Başarıyla düzenlendi. </div>


                                <?php  } else { ?>

                                    <div class="alert alert-danger"> Kayıt Başarısız</div>

                                <?php   }  ?>


                            <?php } else { ?>
                                <div class="alert alert-danger">Lütfen tüm alanları doldurunuz</div>
                            <?php } } ?>


                        <?php $sql2=$db->wread("urun","id",$_GET['id']);
                        $row2=$sql2->fetch(PDO::FETCH_ASSOC);  ?>

                        <?php $resimlersilindi = json_decode($row2['resimler']); ?>

                        <?php
                        if ($_POST['sil']) {
                            foreach (json_decode($row2['resimler']) as $key => $silresim) {
                                if ($_POST['sil']==$silresim) {
                                    unset($resimlersilindi[$key]);
                                }
                            }
                            $ekle = $db->db_update("UPDATE urun SET resimler = ? WHERE id = ?",
                                [json_encode($resimlersilindi),$_GET['id']]);
                        } ?>

                        <?php $sql2=$db->wread("urun","id",$_GET['id']);
                        $row2=$sql2->fetch(PDO::FETCH_ASSOC);  ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row p-t-20">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Vitrin Resmi</label>
                                            <input name="resim" type="file" id="input-file-now" class="dropify" 
                                            data-default-file="../images/urun/<?php echo $row2['resim'] ?>"/>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Kategori Seç</label>
                                            <select name="kategori" class="form-control" style="width: 100%; height:36px;">
                                                <option value="0">Seçim Yapılmadı</option>
                                                <?php $sql=$db->read("kategori");
                                                while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <option <?=$slected = ($row2['kategori'] == $row['id']) ? 'selected' : '';?> value="<?=$row['id']?>"><?=$row['kategori_ad']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Marka Seç</label>
                                            <select name="marka" class="form-control" style="width: 100%; height:36px;">
                                                <option value="0">Seçim Yapılmadı</option>
                                                <?php $sql=$db->read("marka");
                                                while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <option <?=$slected = ($row2['marka'] == $row['id']) ? 'selected' : '';?> value="<?=$row['id']?>"><?=$row['marka_ad']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Ürün Durumu</label>
                                            <select name="durum" class="form-control">
                                                <option <?=$slected = ($row2['durum'] == 1) ? 'selected' : '';?> value="1">Aktif</option>
                                                <option <?=$slected = ($row2['durum'] == 0) ? 'selected' : '';?> value="0">Pasif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Ürün Adı</label>
                                            <input required type="text" class="form-control" name="urunad" value="<?=$row2['urun_ad']?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Ürün Alt Özeti</label>
                                            <textarea name="altozet" class="form-control"><?=$row2['altozet']?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Ürün Kodu</label>
                                            <input required type="text" class="form-control" name="urunkod" value="<?=$row2['urunkodu']?>">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Ürün İndirimsiz Fiyatı</label>
                                            <input id="fiyat" required type="text" class="form-control" name="urunfiyat" value="<?=$row2['fiyat']?>">
                                        </div>
                                    </div>





                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Ürün Stok</label>
                                            <input required type="text" class="form-control" name="urunstok" value="<?=$row2['urunstok']?>">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">İndirim Yüzde Oranı</label>
                                            <input required type="text" class="form-control" name="indirimyuzde" value="<?=$row2['indirimyuzdeorani']?>">
                                        </div>
                                    </div>

                                    <?php

                                    $varyantsay = count(json_decode($row2['varyant']));

                                    ?>

                                    <div class="col-md-12"><hr>

                                    <div id="panel">
                                    <?php for ($i=1;$i<=$varyantsay;$i++) { ?>
                                    <?php foreach (json_decode($row2['varyant']) as $key => $urunvaryant) { ?>
                                        <?php $varyantson = json_decode(json_encode($urunvaryant), true); ?>
                                            <div class="row sil" id="copy">
                                                <?php $sql=$db->read("varyant");
                                                while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <?php $varyantadi = $row['varyant_ad'] ?>
                                                    <div class="col-2">
                                                        <label><?=$row['varyant_ad']?></label>
                                                        <input type="hidden" name="grupadi[]" value="<?=$row['id']?>">
                                                        <input type="hidden" name="urunvaryant[<?=$i?>][id]" value="<?=$i?>">
                                                        <select id="urunvaryant" name="urunvaryant[<?=$i?>][<?=$varyantadi?>]" class="form-control varyantsatir">
                                                            <option value="0">Seçim Yapılmadı</option>
                                                            <?php foreach (json_decode($row['deger']) as $key => $deger) { ?>
                                                                <?php if ($varyantson[$row['varyant_ad']] == $deger) { ?>
                                                                    <option selected value="<?=$deger?>"><?=$deger?></option>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                <?php } ?>

                                                <div class="col-2">
                                                    <label>Ürün Kodu</label>
                                                    <input class="form-control" type="text" name="urunvaryant[<?=$i?>][barkod]" value="<?=$varyantson['barkod']?>">
                                                </div>

                                                <div class="col-2">
                                                    <label>Varyant Değeri Fiyatı</label>
                                                    <input class="form-control" id="varyantfiyat" type="text" name="urunvaryant[<?=$i?>][fiyat]" value="<?=$varyantson['fiyat']?>">
                                                </div>

                                                <div class="col-2"><br><br>
                                                    <button type="button" onclick="urunvaryantsil()" class="btn btn-sm btn-danger"> <i class="ti-close"></i> </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>



                                    <br>


                                        <button type="button" onclick="varyantarttir()" name="olustur" class="btn btn-info"> <i class="ti-plus"></i> Yeni Varyant Ekle</button>

                                        <hr>

                                        <script>
                                            function varyantarttir() {

                                                let x = Math.floor((Math.random() * 100) + 1);



                                                $('#panel').append(
                                                    '<div class="row sil" id="copy">' +
                                                    '<?php $sql=$db->read("varyant");?>' +
                                                    '<?php while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>' +
                                                    '<?php $varyantadi = $row["varyant_ad"] ?>' +
                                                    '<div class="col-2">' +
                                                    '<label><?=$row["varyant_ad"]?></label>' +
                                                    '<input type="hidden" name="grupadi[]" value="'+x+'">' +
                                                    '<input type="hidden" name="urunvaryant['+x+'][id]" value="'+x+'">' +
                                                    '<select id="urunvaryant" name="urunvaryant['+x+'][<?=$varyantadi?>]" class="form-control varyantsatir">' +
                                                    '<option selected value="0">Seçim Yapılmadı</option>' +
                                                    '<?php foreach (json_decode($row["deger"]) as $key => $deger) { ?>' +
                                                    '<option value="<?=$deger?>"><?=$deger?></option>' +
                                                    '<?php } ?>' +
                                                    '</select>' +
                                                    '</div>' +
                                                    '<?php } ?>' +
                                                    '<div class="col-2">' +
                                                    '<label>Ürün Kodu</label>' +
                                                    '<input class="form-control" type="text" name="urunvaryant['+x+'][barkod]">' +
                                                    '</div>' +
                                                    '<div class="col-2">' +
                                                    '<label>Varyant Değeri Fiyatı</label>' +
                                                    '<input class="form-control" id="varyantfiyat" type="text" name="urunvaryant['+x+'][fiyat]">' +
                                                    '</div>' +
                                                    '<div class="col-2"><br><br>' +
                                                    '<button type="button" onclick="urunvaryantsil()" class="btn btn-sm btn-danger"> <i class="ti-close"></i> </button>' +
                                                    '</div>' +
                                                    '</div>');


                                                /*
                                                var type = "varyantarttir";
                                                $.ajax({
                                                    type: "POST",
                                                    url: "ajax.php",
                                                    data: {type},
                                                    dataType: "JSON",
                                                    success: function (response) {
                                                        if(response["durum"] == "success" ){
                                                            // window.location.reload();
                                                            var say = response['sonuc'];
                                                        }
                                                        else {
                                                            alert("Ürün Eklenemedi");
                                                        }
                                                    }
                                                });
                                                 */
                                            }
                                        </script>

                                        <script>
                                            function urunvaryantsil() {
                                                $(".sil").eq(1).remove();
                                            }
                                        </script>

                                <div>
                                    <div class="card card-flush py-4 mt-10">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Ürünün Şu anki Resimleri</h2>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0 ">
                                            <div class="col-md-12">
                                                <font title="Resmi Sil">
                                                    <div class="row">
                                                    <?php foreach (json_decode($row2['resimler']) as $resim) { ?>
                                                        <div class="col-md-2 mt-2">
                                                            <img class="w-100" src="../images/urun/<?php echo $resim ?>" alt="">
                                                            <br><br>
                                                            <button name="sil" value="<?=$resim?>" type="submit" class="btn btn-danger btn-sm resimSilBtn w-100">Sil</button>
                                                        </div>
                                                    <?php } ?>
                                                    </div>
                                                </font>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Çoklu Fotoğraf Yükle</label>
                                        <input name="resimler[]" type="file" multiple accept="image/*" id="images"/>
                                    </div>
                                </div>
                                <div id="preview"></div>
                                <br>

                                <script>
                                    const images = document.getElementById('images'),
                                        preview = document.getElementById('preview');

                                    images.addEventListener('change', function() {
                                        preview.innerHTML = '';
                                        [...this.files].map(file => {
                                            const reader = new FileReader();
                                            reader.addEventListener('load', function(){
                                                const image = new Image();
                                                image.height = 100;
                                                image.title = file.name;
                                                image.src = this.result;
                                                preview.appendChild(image);
                                            });
                                            reader.readAsDataURL(file);
                                        })
                                    });
                                </script>


                            </div>
                            <div class="form-actions">
                                <button type="submit" name="urun_update" class="btn btn-success"> <i class="ti-plus"></i> Kaydet</button>
                                <button type="button" class="btn btn-danger">İptal Et</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#fiyat').keyup(function () {
            var text = $(this).val()
            $('#varyantfiyat').val(text)

            if (text.length > 0) {
                $('#varyantfiyat').show()
            } else {
                $('#varyantfiyat').hide()
            }
        });
    </script>



<?php include '../include/footer.php'; ?>