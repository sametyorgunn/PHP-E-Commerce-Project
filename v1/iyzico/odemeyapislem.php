<?php
if($_POST){

require_once('iyzico/IyzipayBootstrap.php');
IyzipayBootstrap::init();
$options = new \iyzico\src\Iyzipay\Options();
//$options->setApiKey("DF3Ymk55smkbIu9Ua1oT7ceUHrmQlTGU");//deneme hesabı urli
//$options->setSecretKey("ofecpCC22Itp05DlKWFvmk7ugdfiosGa");//deneme hesabı urli
//$options->setBaseUrl("https://merchant.iyzipay.com/");//deneme hesabı urli
//$options->setBaseUrl("https://api.iyzipay.com");

//Gerçek Hesaba geçtiğinizde aşarıdakileri çalışır. Yukarıdaki setApikey,Secretkey ve Baseurl iptal etmelisiniz
$options->setApiKey("DF3Ymk55smkbIu9Ua1oT7ceUHrmQlTGU");//iyziconun size tanımladığı api keyleri
$options->setSecretKey("ofecpCC22Itp05DlKWFvmk7ugdfiosGa");//iyziconun size tanımladığı api keyleri
$options->setBaseUrl("https://api.iyzipay.com");//iyziconun size tanımladığı api keyleri


$objects            = array();
$response           = array();
date_default_timezone_set('Europe/Istanbul');
$ip=$_SERVER["REMOTE_ADDR"];//
$trh=time();
if($_POST['type']=="1"){//ödeme işlemi
$kartno      = $_POST["kartno"];
$kartnosay   = strlen($kartno);//Kaç karakter sayısı
$knoilkalti  = substr($kartno, 0,6);//ilk altı hane
$sipid       = $_POST["sipid"];//sipariş id
$odemetutar  = $_POST["odemetutar"];//sipariş odemetutar
$adsoyad     = $_POST["adsoyad"];//sipariş ad
$cvc         = $_POST["cvc"];//sipariş cvc imzası
$yil         = $_POST["yil"];//sipariş yil
$ay          = $_POST["ay"];//sipariş ay
$siparisid   = $_POST["siparisid"];//sipariş kodu
$sipakod     = 123456789;//;
$userid      = 1;//zorunlu
$alici_adi   = "John";//zorunlu
$alici_soyad = "Doe";//zorunlu
$alici_gsm   = "+905350000000";//zorunsuz
$alici_email = "email@email.com";//zorunlu
$alici_tcno  = "74300864791";//zorunlu
$alici_adres = "Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1";//zorunlu
$alici_sehir = "Istanbul";//zorunlu
$alici_ulke  = "Turkey";//zorunlu
$urunid      = 55;
$urunebatid  = 17;
$magazaid   = 0;
$misafirid  = 0;
$tutar      = "100";
$ttutar     = "100";
$taksit     = 9;
$urunad     = "Sır Halı";
//temel bilgiler
$request = new \iyzico\samples\CreatePaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);

$request->setConversationId($sipakod);//zorunlu -Sipariş İd
$request->setPrice($tutar);//zorunlu -Ödeme sepet tutarı.
$request->setPaidPrice($ttutar);//zorunlu -İndirim vade farkı vs. hesaplanmış POS’tan geçecek nihai tutar.
$request->setCurrency(\Iyzipay\Model\Currency::TL);//Zorunlu- Ödemenin alınacağı para birimi default TRY
$request->setInstallment($taksit);//zorunlu -Taksit bilgisi, tek çekim için 1 gönderilmelidir. Geçerli değerler: 1, 2, 3, 6, 9.
$request->setBasketId($sipid);//zorunsuz -sepetini tanımlamak için kullanılan id'dir. Sipariş numarası ya da anlamlı bir değer olabilir.
$request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);//zorunsuz -Ödeme kanalı. Geçerli değerler enum içinde sunulmaktadır:
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);//zorunsuz -Ödeme grubu,
//$request->setCallbackUrl("http://evimdegor.com/iyzipay/tamamla.php");// cekim islemi yapildiktan sonra geri donus yapilacak adres
//$request->setEnabledInstallments(array(2, 3, 6, 9)); //kullanilabilir taksit secenekleri
//Kart Bilgileri
$paymentCard = new \Iyzipay\Model\PaymentCard();
$paymentCard->setCardHolderName($adsoyad);//zorunlu - Kart sahibinin adı
$paymentCard->setCardNumber($kartno);//Ödemenin alınacağı kart numarası.
//$paymentCard->setExpireMonth(substr($kartyaz["sonkultar"], 0,2));//zorunlu - ödemenin alınacağı kartın son kullanma tarihi ayı.
//$paymentCard->setExpireYear(substr($kartyaz["sonkultar"] , -2));//zorunlu - Ödemenin alınacağı kartın son kullanma tarihi yılı.
$paymentCard->setExpireMonth($ay);//zorunlu - ödemenin alınacağı kartın son kullanma tarihi ayı.
$paymentCard->setExpireYear($yil);//zorunlu - Ödemenin alınacağı kartın son kullanma tarihi yılı.
$paymentCard->setCvc($cvc);//zorunlu - Ödemenin alınacağı kartın güvenlik kodu.
$paymentCard->setRegisterCard(0);//zorunsuz -Ödeme esnasında kartın kaydedilip kaydedilmeyeceğini belirleyen parametre.
$request->setPaymentCard($paymentCard);
//alici bilgileri
$buyer = new \Iyzipay\Model\Buyer();
$buyer->setId($userid);//zorunlu - alıcıya ait id.
$buyer->setName($alici_adi);//zorunlu - alıcıya ait ad.
$buyer->setSurname($alici_soyad);//zorunlu - alıcıya ait soyad.
$buyer->setGsmNumber($alici_gsm);//Zorunsuz- Üye işyeri tarafındaki alıcıya ait GSM numarası.
$buyer->setEmail($alici_email);//zorunlu -Üye işyeri tarafındaki alıcıya ait e-posta bilgisi.
$buyer->setIdentityNumber($alici_tcno);//zorunlu - Üye işyeri tarafındaki alıcıya ait kimlik (TCKN) numarası.
//$buyer->setLastLoginDate("2015-10-05 12:43:35");//Zorunsuz -Üye işyeri tarafındaki alıcıya ait son giriş tarihi. Tarih formatı
//$buyer->setRegistrationDate("2013-04-21 15:12:09");//Zorunsuz -Üye işyeri tarafındaki alıcıya ait kayıt tarihi. Tarih formatı
$buyer->setRegistrationAddress($alici_adres);//zorunlu -Üye işyeri tarafındaki alıcıya ait kayıt adresi.
$buyer->setIp($ip);//zorunlu - Üye işyeri tarafındaki alıcıya ip numarası.
$buyer->setCity($alici_sehir);//zorunlu -Üye işyeri tarafındaki alıcıya ait şehir bilgisi.
$buyer->setCountry($alici_ulke);//zorunlu -Üye işyeri tarafındaki alıcıya ait ülke bilgisi.
//$buyer->setZipCode("34732");//Zorunsuz - Üye işyeri tarafındaki alıcıya ait posta kodu.
$request->setBuyer($buyer);
// teslimat bilgileri
$shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName($alici_adi." ".$alici_soyad);//Zorunlu-Üye işyeri tarafındaki teslimat adresinin, ad soyad bilgisi.
$shippingAddress->setCity($alici_sehir);//Zorunlu-Üye işyeri tarafındaki teslimat adresi şehir bilgisi.
$shippingAddress->setCountry($alici_ulke);//Zorunlu-Üye işyeri tarafındaki teslimat adresi ülke bilgisi.
$shippingAddress->setAddress($alici_adres);//Zorunlu-Üye işyeri tarafındaki teslimat adresi.
//$shippingAddress->setZipCode("34742");//Zorunsuz-Üye işyeri tarafındaki teslimat adresi.
$request->setShippingAddress($shippingAddress);
//fatura bilgileri
/*$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName("Jane Doe");//
$billingAddress->setCity("Istanbul");
$billingAddress->setCountry("Turkey");
$billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
$billingAddress->setZipCode("34742");*/
$request->setBillingAddress($shippingAddress);

$basketItems = array();
$firstBasketItem = new \Iyzipay\Model\BasketItem();
$firstBasketItem->setId($urunid);//Üye işyeri tarafındaki sepetteki ürüne ait id.
$firstBasketItem->setName($urunad);//Üye işyeri tarafındaki sepetteki ürüne ait isim.
$firstBasketItem->setCategory1("Halı");//Üye işyeri tarafındaki sepetteki ürüne ait kategori 1.
$firstBasketItem->setCategory2("Ev Tekstili");//Üye işyeri tarafındaki sepetteki ürüne ait kategori 2.
$firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);//Üye işyeri tarafındaki sepetteki ürüne ait tip.
$firstBasketItem->setPrice($tutar);//Üye işyeri tarafındaki sepetteki ürüne ait tutar.
$basketItems[0] = $firstBasketItem;
$request->setBasketItems($basketItems);

$payment = \Iyzipay\Model\Payment::create($request, $options);
$detaylar = $payment->getRawResult();
$resultJson = json_decode($detaylar,true);//$resultJson = json_decode($detaylar);
/*----Sonuç-----*/
//paymentid ve paymenttransactionid dönen veriler olacak bunları sakla ******
$paymentid = $resultJson["paymentId"];//paymentid Ödemeye ait id
$paymenttransactionid=$resultJson["itemTransactions"][0]["paymentTransactionId"];
//paymenttransactionid Ödeme kırılımına ait id, Ödeme kırılımının iadesi, onayı, onay geri çekmesi Tercihen itemId ile ilişkili bir şekilde tutulmalıdır.
$status=$resultJson["status"];
if($status=="success"){
$errorCode=0;
$errorMessage=0;
}else{
$errorCode=$resultJson["errorCode"];
$errorMessage=$resultJson["errorMessage"];
}
$merchantPayoutAmount=$resultJson["itemTransactions"][0]["merchantPayoutAmount"];//merchantPayoutAmount bizim hesaba yatan tutar
$posislemucret=$resultJson["itemTransactions"][0]["iyziCommissionFee"];//Ödemeye ait iyzico işlem ücreti 0.25.
$poskomtutar=$resultJson["itemTransactions"][0]["iyziCommissionRateAmount"];//Ödemeye ait iyzico işlem komisyon tutarı 11.105.
$fraudStatus=$resultJson["fraudStatus"];//Geçerli değerler: 0, -1 ve 1. Üye işyeri sadece 1 olan işlemlerde ürünü kargoya vermelidir, 0 olan işlemler için bilgilendirme beklemelidir.
if($fraudStatus==1){
$onay=1;
}else{ $onay=0; }
//id magazaid sipad sipakod kartid userid misafirid paymentid paymenttransactionid errorCode errorMessage status fraudStatus tutar taksit taksitlitutar posislemucret poskomtutar tarih ip onay
//$uyesor=@mysql_query("select * from site_users where gsm=".$gsm." ");
$odeekle=@mysql_query("insert into odemeler (magazaid,sipad,sipakod,kartid,userid,misafirid,paymentid,paymenttransactionid,errorCode,errorMessage,status,fraudStatus,tutar,taksit,taksitlitutar,posislemucret,poskomtutar,benimhesabimayatan,tarih,ip,onay) values
('$magazaid','$sipid','$sipakod','$kartid','$userid','$misafirid','$paymentid','$paymenttransactionid','$errorCode','$errorMessage','$status','$fraudStatus','$tutar','$taksit','$ttutar','$posislemucret','$poskomtutar','$merchantPayoutAmount','$trh','$ip','$onay')");
if($odeekle){//odeekle eklendi ve
$vetas=1;
}else{
$vetas=0;
}
/*----#Sonuç-----*/
$Sonucvarmi = array('Sonucvarmi'=>1,'VT'=>$vetas,'Islem'=>"Odeme islemi",'paymentId'=>$paymentid,'paymenttransactionid'=>$paymenttransactionid,'datas'=>$resultJson);

}else if($_POST['type']=="2"){//taksit sorgulama işlemi

$kartno     = $_POST["kartno"];
$kartno     = substr($kartno, 0,6);
$siparisid  = $_POST["siparisid"];
$odemetutar = $_POST["odemetutar"];

$request = new \Iyzipay\Request\RetrieveInstallmentInfoRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($siparisid);
$request->setBinNumber($kartno);//493841 / 554960
$request->setPrice($odemetutar);//ödeme tutarı

$installmentInfo = \Iyzipay\Model\InstallmentInfo::retrieve($request, $options);
$detaylar = $installmentInfo->getRawResult();
$resultJson = json_decode($detaylar,true);
//$resultJson = json_decode($detaylar);
/*-----Sonuç-----*/
$status     = $resultJson["status"];
$taksitler  = $resultJson["installmentDetails"][0]["installmentPrices"];
$bankName   = $resultJson["installmentDetails"][0]["bankName"];
$bankCode   = $resultJson["installmentDetails"][0]["bankCode"];
$kartipi    = $resultJson["installmentDetails"][0]["cardAssociation"];
$kartname   = $resultJson["installmentDetails"][0]["cardFamilyName"];
$kartno     = $resultJson["installmentDetails"][0]["binNumber"];
$say=count($taksitler);
//$taksitiki=$resultJson["installmentDetails"][0]["installmentPrices"][4]["installmentPrice"];
//var_dump($resultJson);
if($status=="success"){
$onay = 1;
$errorCode=0;
$errorMessage=0;
}else{
$onay = 0;
$errorCode=$resultJson["errorCode"];
$errorMessage=$resultJson["errorMessage"];
}
/*----#Sonuç-----*/
$Sonucvarmi = array('Sonucvarmi'=>$onay,'İşlem'=>"Taksit Sorgulama", 'status'=>$status,'bankadi'=>$bankName,'bankCode'=>$bankCode,'kartipi'=>$kartipi,'kartname'=>$kartname,'kartno'=>$kartno,'errorCode'=>$errorCode,'errorMessage'=>$errorMessage,'taksitarraysayi'=>$say,'taksitler'=>$taksitler);//,'datas'=>$resultJson

}else if($_POST['type']=="3"){//bin sorgulama işlemi
$siparisid = $_POST["siparisid"];
$kartno    = $_POST["kartno"];//ilk altı hane
$kartno     = substr($kartno, 0,6);

$request = new \Iyzipay\Request\RetrieveBinNumberRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($siparisid);//Sipariş id
$request->setBinNumber($kartno); //493841 vakıfbank

$binNumber = \Iyzipay\Model\BinNumber::retrieve($request, $options);
$detaylar = $binNumber->getRawResult();
$resultJson = json_decode($detaylar);//($detaylar,true);
$Sonucvarmi = array('Sonucvarmi'=>1,'Mesaj'=>"Bin Sorgulama",'datas'=>$resultJson);

}else if($_POST['type']=="4"){//iade sorgulama işlemi
$PaymentTransactionId=224099;//$_POST["PaymentTransactionId"];
$setPrice=100;//$_POST["tutar"];
$sipakod=24468346;//$_POST["sipakod"];
$request = new \Iyzipay\Request\CreateRefundRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($sipakod);
$request->setPaymentTransactionId($PaymentTransactionId);
$request->setPrice($setPrice);
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setIp($ip);

$refund = \Iyzipay\Model\Refund::create($request, $options);
$detaylar = $refund->getRawResult();
//$resultJson = json_decode($detaylar);
$resultJson = json_decode($detaylar,true);
/*-----Sonuç-----*/
$status     = $resultJson["status"];
$price      = $resultJson["price"];
//'status'=>$status,'iptaledilentutar'=>$price,'parabirimi'=>$currency,
if($status=="success"){
$onay = 1;
$errorCode=0;
$errorMessage=0;
}else{
$onay = 0;
$errorCode=$resultJson["errorCode"];
$errorMessage=$resultJson["errorMessage"];
}
/*----#Sonuç-----*/
$Sonucvarmi = array('Sonucvarmi'=>1,'Islem'=>"iade Sorgulama",'status'=>$status,'iadedilentutar'=>$price,'datas'=>$resultJson);
}else if($_POST['type']=="5"){//iptal sorgulama işlemi
$paymentid=177455;//$_POST["paymentid"];//zorunlu iyzico işlem id
$sipakod=24468346;//$_POST["sipakod"];
$request = new \Iyzipay\Request\CreateCancelRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($sipakod);
$request->setPaymentId($paymentid);
$request->setIp($ip);

$cancel = \Iyzipay\Model\Cancel::create($request, $options);
$detaylar = $cancel->getRawResult();
$resultJson = json_decode($detaylar,true);
//$resultJson = json_decode($detaylar);
/*-----Sonuç-----*/
$status     = $resultJson["status"];
$price      = $resultJson["price"];
$currency   = $resultJson["currency"];
//'status'=>$status,'iptaledilentutar'=>$price,'parabirimi'=>$currency,
if($status=="success"){
$onay = 1;
$errorCode=0;
$errorMessage=0;
}else{
$onay = 0;
$errorCode=$resultJson["errorCode"];
$errorMessage=$resultJson["errorMessage"];
}
/*----#Sonuç-----*/
$Sonucvarmi = array('Sonucvarmi'=>$onay,'Islem'=>"iptal Sorgulama",'status'=>$status,'iptaledilentutar'=>$price,'parabirimi'=>$currency);//'datas'=>$resultJson
}else if($_POST['type']=="6"){//ödeme yapıldımı sorgulama işlemi

# create request class
$request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setToken("token");

# make request
$checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, $options);
$detaylar = $checkoutForm->getRawResult();
$resultJson = json_decode($detaylar);//($detaylar,true);
$Sonucvarmi = array('Sonucvarmi'=>1,'Mesaj'=>"Ödeme Yapıldımı",'datas'=>$resultJson);
}else if($_POST['type']=="7"){//ödeme var mı sorgulama işlemi
$sipakod   = $_POST["sipakod"];
$paymentId = $_POST["paymentId"];
$request = new \Iyzipay\Request\RetrievePaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($sipakod);//Sipariş Numarası
$request->setPaymentId($paymentId);//iyzico tarafından işleme verilen benzersiz ödeme numarası.
$request->setPaymentConversationId($sipakod);//Sipariş Numarası

$payment = \Iyzipay\Model\Payment::retrieve($request, $options);
$detaylar = $payment->getRawResult();
//$resultJson = json_decode($detaylar);
$resultJson = json_decode($detaylar,true);
/*----Sonuç-----*/
$status=$resultJson["status"];
$tutar=$resultJson["price"];
$taksitlitutar=$resultJson["paidPrice"];
$taksit=$resultJson["installment"];
$kartip=$resultJson["cardAssociation"];
$kart=$resultJson["cardFamily"];
$kartilkaltino=$resultJson["binNumber"];
if($status=="success"){
$errorCode=0;
$errorMessage=0;
}else{
$errorCode=$resultJson["errorCode"];
$errorMessage=$resultJson["errorMessage"];
}
$merchantPayoutAmount=$resultJson["itemTransactions"][0]["merchantPayoutAmount"];//merchantPayoutAmount bizim hesaba yatan tutar
$posislemucret=$resultJson["itemTransactions"][0]["iyziCommissionFee"];//Ödemeye ait iyzico işlem ücreti 0.25.
$poskomtutar=$resultJson["itemTransactions"][0]["iyziCommissionRateAmount"];//Ödemeye ait iyzico işlem komisyon tutarı 11.105.
$blockageRate=$resultJson["itemTransactions"][0]["blockageRate"];//blokaj oranı
$blockageRateAM=$resultJson["itemTransactions"][0]["blockageRateAmountMerchant"];//blokaj tutarının, üye işyerine yansıyan rakamı.
$fraudStatus=$resultJson["fraudStatus"];//Geçerli değerler: 0, -1 ve 1. Üye işyeri sadece 1 olan işlemlerde ürünü kargoya vermelidir, 0 olan işlemler için bilgilendirme beklemelidir.
if($fraudStatus==1){ $onay=1; }else{  $onay=0; }
//'blokajoranı'=>$blockageRate,'blokajtutarı'=>$blockageRateAM,
/*----Sonuç-----*/

$Sonucvarmi = array('Sonucvarmi'=>$onay,'İşlem'=>"Ödeme Var mı",'Statü'=>$status,'tutar'=>$tutar,'taksitlitutar'=>$taksitlitutar,'taksit'=>$taksit,'iyziucret'=>$posislemucret,'iyzitutar'=>$poskomtutar,'Bizim Hesap'=>$merchantPayoutAmount,'blokajoranı'=>$blockageRate,'blokajtutarı'=>$blockageRateAM,'HataKodu'=>$errorCode,'HataMesaj'=>$errorMessage,'kartipi'=>$kartip,'kart'=>$kart,'kartilkaltino'=>$kartilkaltino);//'datas'=>$resultJson
}else{
$Sonucvarmi = array('Sonucvarmi'=>0,'Mesaj'=>"İşlem Yok",'datas'=>0);
}
//**********************************Post Bitişi******************************************
}else{//Post ile veri gelmezse
$Sonucvarmi = array('Sonucvarmi'=>0,'Mesaj'=>"Bağlantı Başarısız",'datas'=>0);
}

array_push($objects, $Sonucvarmi);
$response['objects'] = $objects;
echo json_encode($response);