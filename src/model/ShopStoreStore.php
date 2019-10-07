<?php


namespace joeStudio\shop\model;


use think\Model;
use traits\model\SoftDelete;

class ShopStoreStore extends Model
{
    use SoftDelete;

    protected $field = true;

    protected $auto = ['create_time'];
    protected $insert = [];
    protected $update = ['store_status'];

    protected $pk = 'store_id';
    protected $delete_time = "delete_time";

    protected function setStoreStatusAttr($value){
        return $value ? 1 : 0;
    }

    protected function setCreateTimeAttr(){
        return time();
    }

}