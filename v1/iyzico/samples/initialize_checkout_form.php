<?php
require_once('../../admin/include/class.crud.php');
$db=new crud();
session_start();

$sipariskodu = $_SESSION["sipariskodu"];
#$siparistoplam = $_SESSION["sprs_toplam"];
$sipariscek = $db->db_select("select * from siparisler where sipariskodu = ?",[$sipariskodu]);
$toplamtutar = $sipariscek["toplamtutar"];
$kisiadsoyad = $sipariscek["adsoyad"];
$kisiadres = $sipariscek["Adres"];
$kisitel = $sipariscek["Telefon"];
$siparisId = $sipariscek["id"];
require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setPrice("1");
$request->setPaidPrice("$toplamtutar");
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setBasketId("B67832");
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);

$request->setCallbackUrl("https://www.muratcemgenc.com.tr/eticaret/Kartodeme?id=$siparisId");
$request->setEnabledInstallments(array(2, 3, 6, 9));

$buyer = new \Iyzipay\Model\Buyer();
$buyer->setId("BY789");
$buyer->setName("Burak");
$buyer->setSurname("Güngör");
$buyer->setGsmNumber("+905350000000");
$buyer->setEmail("email@email.com");
$buyer->setIdentityNumber("74300864791");
$buyer->setLastLoginDate("2015-10-05 12:43:35");
$buyer->setRegistrationDate("2013-04-21 15:12:09");
$buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
$buyer->setIp("85.34.78.112");
$buyer->setCity("Istanbul");
$buyer->setCountry("Turkey");
$buyer->setZipCode("34732");
$request->setBuyer($buyer);

$shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName("$kisiadsoyad");
$shippingAddress->setCity("Istanbul");
$shippingAddress->setCountry("Turkey");
$shippingAddress->setAddress("$kisiadres");
$shippingAddress->setZipCode("34742");
$request->setShippingAddress($shippingAddress);

$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName("$kisiadsoyad");
$billingAddress->setCity("Istanbul");
$billingAddress->setCountry("Turkey");
$billingAddress->setAddress("$kisiadres");
$billingAddress->setZipCode("34742");
$request->setBillingAddress($billingAddress);

$basketItems = array();
$firstBasketItem = new \Iyzipay\Model\BasketItem();
$firstBasketItem->setId("BI101");
$firstBasketItem->setName("Binocular");
$firstBasketItem->setCategory1("Collectibles");
$firstBasketItem->setCategory2("Accessories");
$firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
$firstBasketItem->setPrice("0.3");
$basketItems[0] = $firstBasketItem;

$secondBasketItem = new \Iyzipay\Model\BasketItem();
$secondBasketItem->setId("BI102");
$secondBasketItem->setName("Game code");
$secondBasketItem->setCategory1("Game");
$secondBasketItem->setCategory2("Online Game Items");
$secondBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
$secondBasketItem->setPrice("0.5");
$basketItems[1] = $secondBasketItem;

$thirdBasketItem = new \Iyzipay\Model\BasketItem();
$thirdBasketItem->setId("BI103");
$thirdBasketItem->setName("Usb");
$thirdBasketItem->setCategory1("Electronics");
$thirdBasketItem->setCategory2("Usb / Cable");
$thirdBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
$thirdBasketItem->setPrice("0.2");
$basketItems[2] = $thirdBasketItem;
$request->setBasketItems($basketItems);

# make request
$checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, Config::options());

# print result
print_r($checkoutFormInitialize);