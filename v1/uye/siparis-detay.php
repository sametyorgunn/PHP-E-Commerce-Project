	<?php include "../header.php";  ?>

    <?php if ($_COOKIE['login'] = 'success') { ?>


        <?php
        $siparisId= $_GET["id"];
        $uyeid = $_SESSION["id"];
        $sql4 = $db->db_select("SELECT * FROM uye WHERE id = ?", [$uyeid]);
        ?>
		

		<title>Sipariş Detayları</title>



		<!-- App-content opened -->
		<div class="main-content">
		<div class="container">

	    <!--Page header-->
		<div class="page-header d-lg-flex d-block">
		<div class="page-leftheader">
		<br>
		<!--End Page header-->

		<?php include "uyesidebar.php" ?>


	    <div class="col-xl-9 col-lg-8 col-md-9">
		<div class="main-content-body main-content-body-profile card mg-b-20">


		
		<div class="row">
		<div class="col-md-12">
		<div class="card overflow-hidden">
		<div class="card-body">
            <?php $sql5 = $db->db_select("SELECT * FROM siparisler WHERE id = ?", [$siparisId]);?>


            <h2 class="text-muted font-weight-bold">#<?=$sql5["sipariskodu"]?> Nolu Sipariş Detayları</h2>

            <br>
		<div class="">
		<h5 class="mb-1">Sn. <strong><?=$sql5["adsoyad"]?></strong>,</h5>
		Sipariş detayları ve fiyatlarının gösterildiği makbuz sayfası. </div>
		<br>
		
		
		<div class="card-body pl-0 pr-0">
		<div class="row">
		<div class="col-sm-6">
		<!--<button class="btn btn-danger">ASDASD</button> -->
		<br>
		<br>
		<span>Sipariş Kodu</span><strong>: <?=$sql5["sipariskodu"]?></strong>
		
		</div>

		<div class="col-sm-6 text-right">
		
		<span>Sipariş Tarihi</span><br>
		<strong> <?=$sql5["tarih"]?></strong>
		
		</div>
		</div>
		</div>
		
		<div class="dropdown-divider"></div>
		<div class="row pt-4">
		<div class="col-lg-6 ">
		
		<p class="h5 font-weight-bold">Adres Bilgileri</p>
		<address>
            <?=$sql5["Adres"]?> <?=$sql5["ilce"]?> <?=$sql5["il"]?><br> </address>
		</div>

		<div class="table-responsive push">
		<table class="table table-bordered table-hover text-nowrap">
		<tr class=" ">
		
		<th class="text-center " style="width: 1%">Ürün Resmi</th>
		<th>Ürünler</th>
		<th class="text-center" style="width: 1%">Adet</th>
		<th class="text-right" style="width: 1%">Kargo ücreti</th>
		<th class="text-right" style="width: 1%">Toplam Fiyat</th>
		
		</tr>

                <tr>
		<td>   <center><a target="_blank" href=" "><img width="100" src=" "></a></center></td>
		

		<td>
		<a target="_blank" href="#"> dsfdsfsdf</a>
	
		
		</td>
		<td class="text-center"><?=$sql5["urun_adet"]?></td>
		<td class="text-right"><?=$sql5["Kargo_ucreti"]?> TL</td>
		<td class="text-right"><center><?=$sql5["aratoplam"]?> TL</center></td>
		</tr>
								

      
		<tr>
			
			
		<td colspan="4" class="font-weight-bold text-uppercase text-right h4 mb-0">TOPLAM FİYAT</td>
		<td class="font-weight-bold text-right h4 mb-0"><?=$sql5["toplamtutar"]?> TL</td>
		<div class="form-group">
		<div class="row">
				
		<div class="col-xl-3">
		
		
		</tr>
		<tr>
	
		</tr>
		
		</table>
		
		</div>
	
		
		</div>
		</div>
		</div>
		</div>
		</div>
		</div></div>
		</div>
	

		</div>
		</div>
		</div>

        <?php }?>
		<?php include "../footer.php" ?>