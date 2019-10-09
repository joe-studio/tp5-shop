<?php


namespace joeStudio\admin\model;


use joeStudio\admin\helper\LoginHelper;
use joeStudio\admin\logic\Login;
use think\Model;
use traits\model\SoftDelete;

class AdminMenu extends Model
{
    use SoftDelete;

    protected $field = true;

    protected $auto = [];
    protected $insert = [];
    protected $update = ['menu_status'];

    protected $pk = 'menu_id';
    protected $delete_time = "delete_time";

    protected function setMenuStatusAttr($value){
        return $value ? 1 : 0;
    }
}