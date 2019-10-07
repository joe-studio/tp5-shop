<?php


namespace joeStudio\shop\model;


use joeStudio\admin\helper\LoginHelper;
use joeStudio\admin\logic\Login;
use think\Model;
use traits\model\SoftDelete;

class ShopGoodsGoods extends Model
{
    use SoftDelete;

    protected $field = true;

    protected $auto = ['create_time'];
    protected $insert = [];
    protected $update = [];

    protected $pk = 'goods_id';
    protected $delete_time = "delete_time";

    protected function setCreateTimeAttr(){
        return time();
    }

    protected function setGoodsStatusAttr($value){
        return $value ? 1 : 0;
    }
}