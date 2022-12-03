	<?php include "../header.php"; ?>
	
	<?php if ($_COOKIE['login'] = 'success') { ?>


	<?php
    $uyeid = $_SESSION["id"];
    $sql4 = $db->db_select("SELECT * FROM uye WHERE id = ?", [$uyeid]); ?>
 	
	<title>Üyelik Paneli</title>

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
														
	
	
	<h2 class="card-title">Hoşgeldiniz;</h2>
	<div class="main-profile-bio mb-0">
														
	<p class="lead">"Hesabım" sayfasından sipariş işlemlerinizi takip edebilir; üyelik bilgisi güncelleme, şifre ve adres değişikliği gibi hesap ayarlarınızı kolayca yapabilirsiniz. </p>

	</div>
	</div>
	</div>
												
	<div class="card-body border-top">
	
	<h5 class="font-weight-semibold">SİPARİŞLERİM</h5>

		
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
  		<th>Tarih</th>
  		<th>Tutar</th>
  		<th></th>
		
		</tr>
		</thead>
		<tbody>
		 
	
		<?php
        $user_idsi = $sql4["id"];
        $sql5 = $db->db_select2("SELECT * FROM siparisler WHERE user_id = ? ", [$_SESSION["id"]]);
        foreach ($sql5 as $sql1){ ?>
          
		<tr>
		
		<td class="align-middle w-5">
		<center><?=$sql1["sipariskodu"]?></center>
		</td>
		
		<td><?=$sql1["tarih"]?></td>
		
		<td><?=$sql1["toplamtutar"]?></td>


		</td>
		<td><center><a href="Siparisdetay?id=<?=$sql1["id"]?>"><button class="btn btn-primary btn-xs">Detay</button></a></center></td>
													
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
		</div>
		</div>
		</div>
		</div>
		</div>
		</div><!-- end app-content-->
		</div>
		
		<?php include "../footer.php" ?>