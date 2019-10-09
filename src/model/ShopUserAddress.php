<?php


namespace joeStudio\shop\model;


use think\Model;
use traits\model\SoftDelete;

class ShopUserAddress extends Model
{
    use SoftDelete;

    protected $field = true;

    protected $auto = [];
    protected $insert = [];
    protected $update = [];

    protected $pk = 'store_id';
    protected $delete_time = "delete_time";

}