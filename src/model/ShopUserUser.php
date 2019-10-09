<?php


namespace joeStudio\shop\model;


use think\Model;
use traits\model\SoftDelete;

class ShopUserUser extends Model
{
    use SoftDelete;

    protected $field = true;

    protected $auto = [];
    protected $insert = ['create_time'];
    protected $update = ['last_login_time'];

    protected $pk = 'user_id';
    protected $delete_time = "delete_time";

    protected function setCreateTimeAttr(){
        return time();
    }

    protected function setLastLoginTimeAttr(){
        return time();
    }

}