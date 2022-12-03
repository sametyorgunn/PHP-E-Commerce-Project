<?php include "../header.php";  ?>

<?php if ($_COOKIE['login'] = 'success') { ?>


<?php
    $uyeid = $_SESSION["id"];
    $sql4 = $db->db_select("SELECT * FROM uye WHERE id = ?", [$uyeid]);
    ?>

	    <title>Siparişlerim</title>

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
														
	
	
		<h4 class="card-title">Siparişlerim;</h4>
		<div class="main-profile-bio mb-0">
		
		<p class="lead">Siparişlerinizi bu sayfamızdan kontrol edebilir, herhangi bir sorun ile karşılaştığınızda Sol Menü'de bulunan Destek Talep formundan bize ulaşabilirsiniz. </p>
	

		
		</div>
		</div>
		</div>
		</div>
		<div class="e-table">
		<div class="table-responsive table-lg">
		
		<table class="table card-table table-vcenter text-nowrap border" id="example1">
		<thead>
		<tr>
		
		<th>Sipariş No</th>
		<th>Adres</th>
  		<th>Tarih</th>
  		<th>Tutar</th>
  		<th></th>
		
		</tr>
		</thead>
		<tbody>
       <?php $sql=$db->qsql("SELECT * FROM sepet siparisler where "); ?>


       <?php

           $user_idsi = $sql4["id"];
           $sql5 = $db->db_select2("SELECT * FROM siparisler WHERE user_id = ? ", [$_SESSION["id"]]);
           foreach ($sql5 as $sql1){

       ?>
		<tr>
		<td class="align-middle w-5" width="50">
		<center><?=$sql1["sipariskodu"]?></center>
		</td>
		
		<td><?=$sql1["Adres"]?></td>
		<td><?=$sql1["tarih"]?></td>

		<td><?=$sql1["toplamtutar"]?> TL</td>


		</td>
		<td><center><a href="Siparisdetay?id=<?=$sql1["id"]?>">
			<button class="btn btn-primary btn-xs">Detay</button></a></center></td>
													
		</tr>
        <?php }?>
		</tbody>
		
		</table>
		
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		<!-- End Row -->


		</div>
		</div>
		</div>
												
	
		</div><!-- main-profile-contact-list -->

		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div><!-- end app-content-->
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>

        <?php } else{
    header("location: UyeGiris");
}?>
<?php include "../footer.php" ?>
