<?php include "../header.php"; ?>

		<title>Banka Hesap Numaralarımız </title>

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
														
	
	
		<h4 class="card-title">Banka Hesap Numaralarımız;</h4>
		<div class="main-profile-bio mb-0">
	
		<p class="lead">İşlemlerin daha hızlı tamamlanabilmesi için lütfen; Havale Bildirim formundan bizimle iletişime geçin.</p>
	
	
		</div>
		</div>
   		<div class="container">
  		<table class="table">
  		<thead>
  		<tr>
  		<th>Banka Adı</th>
  		<th>Hesap Sahibi</th>
  		<th>IBAN</th>
  		</tr>	
  		</thead>

  		<tbody>

  		<?php $sql=$db->read("banka");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
  		<td><?php echo $row['bankaadi'] ?></td>
  		<td width="300"><?php echo $row['hesapsahibi'] ?></td>
  		<td><?php echo $row['iban'] ?></td>
		</tr> 
		<?php } ?>



	    </tbody>
        </table>
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
<?php include "../footer.php" ?>