<?php
namespace joeStudio\shop\api\miniapp;

use app\wxapp\model\UserAddress;
use joeStudio\shop\model\ShopAdvertising;
use joeStudio\shop\validate\ShopUserAddress;
use think\Session;

class Advertising extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function search(){

        $advertisingList = (new ShopAdvertising())->where([
            'advertising_status'    =>  1
        ])->select();


        $this->scene('miniApp')->setData($advertisingList)->output();

    }
}