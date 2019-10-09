<?php
namespace joeStudio\shop\api\miniapp;

use app\wxapp\model\UserAddress;
use joeStudio\shop\validate\ShopUserAddress;
use think\Session;

class Address extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(){

        //查看参数
        $insertData = json_decode($this->input['insertData'],true);

        $addressValidate = new ShopUserAddress();
        $res = $addressValidate->batch()->check($insertData);

        !$res && $this->scene('miniApp')->setStatus(false)->setMsg($addressValidate->getError())->output();

        $res = (new \joeStudio\shop\model\ShopUserAddress())->save($insertData);

        $res ?
        $this->scene('miniApp')->setStatus(true)->setMsg('操作成功')->output()
            :
            $this->scene('miniApp')->setStatus(false)->setMsg('操作失败')->output();
    }

    public function search(){
        $this->scene('miniApp')->setStatus(false)->setMsg($this->user_id)->output();
    }
}