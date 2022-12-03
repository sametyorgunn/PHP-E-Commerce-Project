		<?php include "../header.php"; ?>

		<title>Havale Bildiri Formu </title>

			<!--hero banner-->
        <div class="kalles-section page_section_heading">
        <div class="page-head tc pr oh cat_bg_img page_head_">
        <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" 
        data-bgset="assets/images/shop/shop-banner.jpg"></div>
        
        <div class="container pr z_100">
        <h1 class="mb__5 cw">Üyelik Paneli</h1>
        </div>
        </div>
        </div>
        
        <div class="main-content">
		<div class="container">

		<div class="page-header d-lg-flex d-block">
		<div class="page-leftheader">
		<br>
		
		<?php include "uyesidebar.php" ?>
	
		<div class="col-xl-9 col-lg-8 col-md-12">
		<div class="main-content-body main-content-body-profile card mg-b-20">
	
		<div class="main-profile-body">
		<div class="tab-content">
		<div class="tab-pane show active" id="about">
		<div class="card-body">
		<div class="mb-5">
														
	
		<h4 class="card-title">Havale Ödeme Bildirimi;</h4>
		<div class="main-profile-bio mb-0">
	
		<p class="lead">Siparişlerinizde ödeme yönetimini havale olarak tercih ettiğinizde buradan ödeme bildirimi yapabilirsiniz.</p>
	
		
		<?php if (isset($_POST['havale_insert'])) {
        $sonuc=$db->insert("havale",$_POST,
        ["form_name" => "havale_insert"]);

        if ($sonuc['status']) { ?>

        <div class="alert alert-success"> Havale Bildiriminiz Başarıyla gönderildi.</div>

        <?php  } else { ?>

        <div class="alert alert-danger"> Kayıt Başarısız <?php echo $sonuc['error'] ?></div>

        <?php   } }  ?>     

        <form method="POST" data-parsley-validate class="form-horizontal form-label-left">
	
  		<input type="text" class="form-control" name="sipariskodu" placeholder="Sipariş Numarası" required="">
		<br>
		
        <div class="form-group">
		<div class="row">
		<div class="col-xl-3">
		</div>
		
		<div class="col-xl-12">

		<select id="heard" class="form-control" name="bankaad">

		<?php $sql=$db->read("banka");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>
		<option value="<?php echo $row['id'] ?>"><?php echo $row['bankaadi'] ?></option>
		<?php } ?>
		
		
	
					
		</select>
		</div>
		</div>
   		<br>
    	<input type="text" class="form-control" name="tutar" placeholder="Ödeme Tutarı" required=""> 
        <br>
    	<input type="text" class="form-control" name="adsoyad" placeholder="Ödemeyi Yapan Ad Soyad" required=""> 
    	<br>
		<textarea type="text" class="form-control" placeholder="Mesajınız" name="mesaj" required=""></textarea>
		<br>

		<button type="submit" name="havale_insert" class="btn btn-success">Formu Gönder</button>
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