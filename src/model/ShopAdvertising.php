<?php


namespace joeStudio\shop\model;


use think\Model;
use traits\model\SoftDelete;

class ShopAdvertising extends Model
{
    use SoftDelete;

    protected $field = true;

    protected $auto = ['create_time'];
    protected $insert = [];
    protected $update = ['advertising_status'];

    protected $pk = 'advertising_id';
    protected $delete_time = "delete_time";

    protected function setAdvertisingStatusAttr($value){
        return $value ? 1 : 0;
    }

    protected function setCreateTimeAttr(){
        return time();
    }

}