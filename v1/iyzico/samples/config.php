<?php

require_once(dirname(__DIR__).'/IyzipayBootstrap.php');


IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        require_once('../../admin/include/class.crud.php');

        $db=new crud();
        $odemeyontemi = $db->db_select("select * from odeme where id=?",[0]);
        $iyzicoApiKey= $odemeyontemi["iyzicoapikey"];
        $iyzicoApiSecretKey= $odemeyontemi["iyzicosecretkey"];

        $options = new \Iyzipay\Options();
        $options->setApiKey("$iyzicoApiKey");
        $options->setSecretKey("$iyzicoApiSecretKey");
        $options->setBaseUrl('https://api.iyzipay.com');

        return $options;
    }
}