<?php include "header.php" ?>

		<title> Havale Bildirim Formu </title>
    <div id="nt_content">

        <!--hero banner-->
        <div class="kalles-section page_section_heading">
            <div class="page-head tc pr oh cat_bg_img page_head_">
                <div class="parallax-inner nt_parallax_false lazyload nt_bg_lz pa t__0 l__0 r__0 b__0" data-bgset="assets/images/shop/collection-list/bg-heading.jpg"></div>
                <div class="container pr z_100">
                    <h1 class="mb__5 cw">Havale Bildirim Formu</h1>
                </div>
            </div>
        </div>
        <!--end hero banner-->

        <!--page content-->
        <div class="container mt__40 mb__40 cb">
            <div class="kalles-term-exp mb__30">
                <h4 class="card-title">Ödeme Bildirim Formu;</h4>
                <div class="main-profile-bio mb-0">

                    <p class="lead">Siparişlerinizde ödeme yönetimini havale olarak tercih ettiğinizde buradan ödeme bildirimi yapabilirsiniz. </p>



                    <div class="form-row">
                        <div class="col-md-6">
                            <label class="col-form-label">Sipariş Numarası</label>
                            <input type="text" class="search_header__input">
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label">Banka Seçiniz</label>
                            <select name="" id="">
                               <?php 
        $sql=$db->qsql("SELECT * FROM banka ORDER BY sira");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>
 <option value="id"><?php echo $row['bankaadi'] ?></option>
			<?php } ?>
                             
                               
                              
                              
                            </select>
                        </div>

                        <br> <br> <br> <br>
                        <div class="col-md-6">
                            <label class="col-form-label">Ödenen Tutar</label>
                            <input type="text" class="search_header__input">
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label">Ödemeyi Yapan</label>
                            <input type="text" class="search_header__input">
                        </div>
                        <br> <br> <br> <br>
                        <div class="col-md-12">
                            <label class="col-form-label">Mesajınız</label>
                            <textarea class="search_header__input" rows="3" name=""></textarea>
                        </div>

                    </div>
                </div>

                <br>
                <input type="hidden" name="kullanici_id" value="56">
                <button type="submit" class="btn btn-danger btn-sm">Formu Gönder</button>

            </div>





        </div>
        <!--end page content-->

    </div>


<?php include "footer.php" ?>

