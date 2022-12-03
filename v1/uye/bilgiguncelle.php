<?php if ($_COOKIE['login'] == 'success') { ?>
		<?php include "../header.php"; ?>



		<title>Bilgileri Güncelleme Sayfası</title>

				<!--hero banner-->
        <div class="kalles-section page_section_heading">
        <div class="page-head tc pr oh cat_bg_img page_head_">
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/shop/shop-banner.jpg"></div>
        
        <div class="container pr z_100">
        <h1 class="mb__5 cw">Üyelik Paneli</h1>
        </div>
        </div>
        </div>
        <!--end hero banner-->

		<!-- App-content opened -->
		<div class="main-content">
		<div class="container">

		<!--Page header-->
		<div class="page-header d-lg-flex d-block">
		<div class="page-leftheader">
		<br>
		<!--End Page header-->

		<?php include "uyesidebar.php" ?>
	
		<div class="col-xl-9 col-lg-8 col-md-12">
		<div class="main-content-body main-content-body-profile card mg-b-20">
	
		<!-- main-profile-body -->
		<div class="main-profile-body">
		<div class="tab-content">
		<div class="tab-pane show active" id="about">
		<div class="card-body">
		<div class="mb-5">
														
	
	
		<h4 class="card-title">Üyelik Bilgileri;</h4>
		<div class="main-profile-bio mb-0">
	
		<p class="lead">Üyelik bilgilerinizi bu sayfamızdan düzenleyebilirsiniz. </p>
	
		<form method="POST" enctype="multipart/form-data">

            <?php
            if (isset($_POST['uye_update'])) {


                $adsoyad = $_POST['adsoyad'];
                $tc = $_POST['tc'];
                $telefon = $_POST['telefon'];
                $adres = $_POST['adres'];
                $ilce = $_POST['ilce'];
                $il = $_POST['il'];


                $ekle = $db->db_update("UPDATE uye SET adsoyad = ?, telefon = ?, tc = ?, adres = ?, ilce = ?, il = ? WHERE id = ?",[$adsoyad,$telefon,$tc,$adres,$ilce,$il,$_SESSION['id']]);

                if ($ekle) { ?>

                    <div class="alert alert-success"> Başarıyla eklendi. </div>


                <?php  } else { ?>

                    <div class="alert alert-danger"> Kayıt Başarısız</div>

                <?php   } }

	   # $sql=$db->wread("uye","id",$_SESSION['id']);
	  #  $row=$sql->fetch(PDO::FETCH_ASSOC);
            #
            $userid = $_SESSION["id"];
            $row = $db->db_select("select * from uye where id = ? ",[$userid])  ?>
	

	   	<div class="form-row">
		<div class="col-md-6">
		<label class="col-form-label">Adınız Soyadınız</label>
		<input type="text" class="form-control" name="adsoyad" 
		value="<?php echo $row['adsoyad'] ?>">
		</div>

   		<div class="col-md-6">
   		<label class="col-form-label">T.C. Kimlik Numaranız</label>
	    <input type="text" class="form-control" name="tc" 
	    value="<?php echo $row['tc'] ?>">
		</div>
		
		<div class="col-md-6">
		<br>
   		<label class="col-form-label">E-Mail Adresiniz</label>
	    <input type="text" class="form-control" name="mail" disabled=""
	    value="<?php echo $row['mail'] ?>">
		</div>

		<div class="col-md-6">
		<br>
   		<label class="col-form-label">Telefon Numaranız</label>
	    <input type="text" class="form-control" name="telefon"
	    value="<?php echo $row['telefon'] ?>">
		</div>

		<div class="col-md-12">
		<br>
   		<label class="col-form-label">Teslimat Adresiniz</label>
	    <input type="text" class="form-control" name="adres"
	    value="<?php echo $row['adres'] ?>">
		</div>

		<div class="col-md-6">
		<br>
   		<label class="col-form-label">İlçe</label>
	    <input type="text" class="form-control" name="ilce"
	    value="<?php echo $row['ilce'] ?>">
		</div>
		
		<div class="col-md-6">
		<br>
   		<label class="col-form-label">İl</label>
	    <input type="text" class="form-control" name="il"
	    value="<?php echo $row['il'] ?>">
		</div>

		</div>
		</div>

		<br>
		<button type="submit" name="uye_update" class="btn btn-success">Bilgilerimi Güncelle</button>
    	</form>
    	



		</div>
		</div>
		</div>
													
		
		</div>

		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>

		<?php include "../footer.php" ?>
<?php } else { header("Location: UyeGiris"); } ?>
