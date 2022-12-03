    <?php session_start();
    require_once 'setconfig.php'; ?>
    
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Yönetim Paneli</title>
    <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="assets/node_modules/dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="assets/node_modules/html5-editor/bootstrap-wysihtml5.css" />
    <link href="assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="assets/node_modules/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="assets/node_modules/nestable/nestable.css" rel="stylesheet" type="text/css" />
    <link href="assets/node_modules/switchery/dist/switchery.min.css" rel="stylesheet"/>
    <link href="assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </head>

    <body class="horizontal-nav boxed skin-megna fixed-layout">
    <div class="preloader">
    <div class="loader">
    <div class="loader__figure"></div>
    <p class="loader__label">İşte E-Ticaret</p>
    </div>
    </div>
    
    <div id="main-wrapper">
    
    <header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
    

    <div class="navbar-header">
    <a class="navbar-brand" href="Anasayfa">
    <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
    <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
    </b>
    <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
    <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
    </div>
    
    <div class="navbar-collapse">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)">
    <i class="ti-menu"></i></a> </li>
    <li class="nav-item"> <a class="nav-link sidebartoggler d-none waves-effect waves-dark" href="javascript:void(0)">
    <i class="icon-menu"></i></a> </li>
    <li class="nav-item">
    </li>
    </ul>
    
    <ul class="navbar-nav my-lg-0">

    <li class="nav-item dropdown u-pro">
    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" class=""> <span class="hidden-md-down"><?php echo $_SESSION['admin'] ['adsoyad'] ?> &nbsp;<i class="ti-angle-double-down"></i></span> </a>
    <div class="dropdown-menu dropdown-menu-right animated flipInY">
    <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> Hesabım</a>
    <a href="Cikis" class="dropdown-item"><i class="ti-wallet"></i> Çıkış Yap</a>
    </div>
    </li>
    
    </ul>
    </div>
    </nav>
    </header>
     

    <aside class="left-sidebar">
    <div class="scroll-sidebar">
    <nav class="sidebar-nav">
    <ul id="sidebarnav">

                    
    <li> <a class="waves-effect waves-dark" href="Anasayfa" aria-expanded="false">
    <i class="icon-speedometer"></i><span class="hide-menu">Anasayfa </span></a> </li>

    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
    <i class="ti-files"></i><span class="hide-menu">Ürünler</span></a>
    
    <ul aria-expanded="false" class="collapse">
    <li><a href="Urunler">Ürün Yönetimi</a></li>
    <li><a href="Varyant">Varyant Sistemi</a></li>
    <li><a href="Markalar">Marka Yönetimi</a></li>
    </ul>
    </li>


    <li> <a class="has-arrow waves-effect waves-dark two-column" href="Kategoriler" aria-expanded="false">
    <i class="ti-palette"></i><span class="hide-menu">Kategoriler </span></a></li>

 
    <li> <a class="has-arrow waves-effect waves-dark" href="Siparisler" aria-expanded="false">
    <i class="ti-layout-media-right-alt"></i><span class="hide-menu">Sipariş Yönetimi</span></a> </li>

    <li> <a class="has-arrow waves-effect waves-dark" href="Uyeler" aria-expanded="false">
    <i class="ti-layout-accordion-merged"></i><span class="hide-menu">Üyeler</span></a> </li>
    


    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">İçerik</span></a>
    <ul aria-expanded="false" class="collapse">
    <li><a href="Slider">Slider</a></li>
    <li><a href="Banner">Banner</a></li>
    <li><a href="Sayfalar">Sayfalar</a></li>
    <li><a href="Sozlesmeler">Sözleşmeler</a></li>
    <li><a href="Sorular">Sıkça Sorulan Sorular</a></li>
    </ul>
    </li>
    

    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
    <i class="ti-files"></i><span class="hide-menu">Bildirimler</span></a>
    
    <ul aria-expanded="false" class="collapse">
    <li><a href="Havale">Havale Bildirimleri</a></li>
    <li><a href="iletisim">İletişim Formu</a></li>
    </ul>
    </li>

    <li> <a class="has-arrow waves-effect waves-dark" href="Kampanyalar" aria-expanded="false">
    <i class="ti-files"></i><span class="hide-menu">Kampanyalar</span></a></li>

    
    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-pie-chart"></i><span class="hide-menu">Genel Ayarlar</span></a>
    <ul aria-expanded="false" class="collapse">
    <li><a href="Ayar">Web Sitesi Ayarları</a></li>
    <li><a href="Yonetici">Yöneticiler</a></li>
    <li><a href="OdemeSistem">Ödeme Sistemleri</a></li>
    <li><a href="Bankalar">Banka Hesapları</a></li>
    <li><a href="MailAyar">Mail Ayarları</a></li>
    <li><a href="SmsAyar">Sms Ayarları</a></li>
   
    </ul>
    </li>
       
    </ul>
    </nav>
    </div>
    </aside>