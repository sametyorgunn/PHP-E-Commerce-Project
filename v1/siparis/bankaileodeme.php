<?php include "../header.php" ?>

<?php if($_SESSION["sipariskodu"]!=null){ ?>
    <div id="nt_content">
      
      	<title> Banka İle Ödeme Sonucu</title>

        <!-- hero title -->
        <div class="kalles-section page_section_heading">
            <div class="page-head tc pr oh page_bg_img page_head_cart_heading">
                <div class="parallax-inner nt_parallax_false nt_bg_lz pa t__0 l__0 r__0 b__0 lazyload"
                     data-bgset="assets/images/shopping-cart/shopping-cart-head.jpg">
                </div>
                <div class="container pr z_100"><h1 class="tu mb__10 cw">BANKA HESABI İLE ÖDEME</h1></div>
            </div>
        </div>
        <!-- end hero title -->

        <!--cart section-->
        <div class="kalles-section cart_page_section container mt__60">
            <div class="alert alert-info">
                <center>SİPARİŞİNİZ BAŞARILI BİR ŞEKİLDE GERÇEKLEŞTİ.<br>
                    Sipariş No: #<?=$_SESSION["sipariskodu"]?> <br> Sipariş Takibi için Sipariş Numaranızı kaydetmeyi unutmayın.</center>
            </div>

            <center><a href="UyeliksizHavale"> <button class="btn btn-danger">ÖDEME BİLDİRİM FORMU</button></a></center>

            <div class="e-table">
                <div class="table-responsive table-lg">

                    <table class="table card-table table-vcenter text-nowrap border" id="example1">
                        <thead>
                        <tr>

                            <th>HESAP SAHİBİ</th>
                            <th>IBAN</th>
                            <th>BANKA</th>

                        </tr>

					<?php 
        $sql=$db->qsql("SELECT * FROM banka ORDER BY sira");
        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {  ?>

                        <tr>
                            <td><?php echo $row['hesapsahibi'] ?></td>
                            <td><?php echo $row['iban'] ?></td>
                            <td><?php echo $row['bankaadi'] ?></td>
                        </tr>
			<?php } ?>
                      
                          


                        </thead>
                        <tbody>





                    </table>

                </div>
            </div>






        </div>



    </div>



    </div>
    <?php }?>

    <br>
<?php include "../footer.php" ?>