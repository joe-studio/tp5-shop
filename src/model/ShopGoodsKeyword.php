<?php


namespace joeStudio\shop\model;


use joeStudio\admin\helper\LoginHelper;
use joeStudio\admin\logic\Login;
use think\Model;
use traits\model\SoftDelete;

class ShopGoodsKeyword extends Model
{
    use SoftDelete;

    protected $field = true;

    protected $auto = [];
    protected $insert = [];
    protected $update = [];

    protected $pk = 'keyword_id';
    protected $delete_time = "delete_time";

}