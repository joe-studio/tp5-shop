<?php
namespace joeStudio\shop\controller;

use filter\Output;
use joeStudio\admin\helper\CreateTable;
use joeStudio\admin\helper\LoginHelper;
use joeStudio\admin\logic\Login as loginObject;
use think\Controller;
use think\Hook;
use think\Request;
use think\View;

class Shop extends Controller
{

    protected $view;    //视图
    protected $input;
    protected $logic;

    public function __construct()
    {

        Hook::listen('check_login');
        Hook::listen('check_permission');
        Hook::listen('init_shop_input',$this->input);
        Hook::listen('init_shop_view',$this->view);
//        Hook::listen('init_output',$this->output);
        Hook::listen('init_shop_logic',$this->logic);
//        Hook::listen('init_model',$this->model);
//        Hook::listen('init_validate',$this->validate);

    }

}
