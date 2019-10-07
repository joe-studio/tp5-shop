<?php


namespace joeStudio\shop\model;


use think\Model;
use traits\model\SoftDelete;

class ShopSpecCategory extends Model
{
    use SoftDelete;

    protected $field = true;

    protected $auto = ['create_time'];
    protected $insert = [];
    protected $update = ['category_status'];

    protected $pk = 'category_id';
    protected $delete_time = "delete_time";

    protected function setCategoryStatusAttr($value){
        return $value ? 1 : 0;
    }

    protected function setCreateTimeAttr(){
        return time();
    }

}