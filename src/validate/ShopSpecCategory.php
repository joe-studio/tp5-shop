<?php
namespace joeStudio\shop\validate;

use think\Validate;

class ShopSpecCategory extends Validate
{
    protected $output;

    protected $rule = [
        'category_name'             =>  'require',
    ];

    protected $message = [
        'category_name.require'         =>  '规格分类名必须填写',
    ];

    protected $scene = [
        'insert'     =>  ['category_name'],
        'update'     =>  ['category_name'],
    ];

}