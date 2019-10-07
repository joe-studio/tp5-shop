<?php
namespace joeStudio\shop\validate;

use think\Validate;

class ShopGoodsCategory extends Validate
{
    protected $output;

    protected $rule = [
        'category_name'             =>  'require',
    ];

    protected $message = [
        'category_name.require'         =>  '分类名必须填写',
    ];

    protected $scene = [
        'insert'     =>  ['category_name'],
        'update'     =>  ['category_name'],
    ];

}