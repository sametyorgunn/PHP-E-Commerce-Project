            <?php session_start();
    
            if (isset($_SESSION['admin'])) {
            header("Location:Anasayfa");
            exit; }
            require_once 'include/class.crud.php';
            $db=new crud(); ?>   

            <!DOCTYPE html>
            <html lang="en">

            <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
            <title>Yönetim Paneli Girişi</title>
            <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
            <link href="dist/css/style.min.css" rel="stylesheet">
         
            </head>

            <body class="skin-default card-no-border">
   
  
            <section id="wrapper" class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">
            <div class="login-register">
                <center><img width="300" src="../images/tasarim/logo.png"></center><br>
            <div class="login-box card">
            <div class="card-body">
            
            <h3 class="text-center m-b-20">GİRİŞ YAPIN</h3>
            <div class="form-group ">

            <?php 
            if (isset($_COOKIE['uyegiris'])) {
            $giris=json_decode($_COOKIE['uyegiris']); }

            if (isset($_POST['uyegiris'])) {

            $sonuc=$db->uyegiris(htmlspecialchars($_POST['mail']),htmlspecialchars($_POST['password']),$_POST['remember_me']);

            if ($sonuc['status']) {

            header("Location:Anasayfa");
            
            exit; } else { ?>

            <div class="alert alert-primary">
            Hatalı Giriş Denemesi! Bilgilerinizi Kontrol edin. </div>

            <?php } } ?>    

             <form action="" method="POST" class="form-horizontal form-material">

            <div class="form-group">
            <div class="fxt-transformY-50 fxt-transition-delay-1">
            <input type="text" class="form-control" name="mail" required 
            <?php if (isset($_COOKIE['uyegiris'])) {
            echo 'value="'.$giris->mail.'"'; } else { echo 'placeholder="Kullanıcı Adınız"'; } ?>>
            </div> </div>
            
            <div class="form-group">
            <div class="fxt-transformY-50 fxt-transition-delay-2">
            <input id="password" type="password" class="form-control" name="password" required 
            <?php if (isset($_COOKIE['uyegiris'])) {
            echo 'value="'.$giris->password.'"'; } else { echo 'placeholder="Şifreyi Giriniz"'; } ?>>
           
            </div>
            </div>

            <div class="form-group text-center">
            <div class="col-xs-12 p-b-20">
            <button class="btn btn-block btn-lg btn-info btn-rounded"name="uyegiris" type="submit">
            GİRİŞ YAP</button>
            </div>
            </div>
                    
            </form>
            </div>
            </div>
            </div>
            </section>
    
   
            <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
            <script src="assets/node_modules/popper/popper.min.js"></script>
            <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
            
            <script type="text/javascript">
            $(function() {
            $(".preloader").fadeOut(); });
            $(function() {
            $('[data-toggle="tooltip"]').tooltip() });
            $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn(); });
            </script>
           
            </body>
            </html>