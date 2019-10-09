<?php
namespace joeStudio\shop\validate;

use think\Validate;

class ShopGoodsCategory extends Validate
{
    protected $output;

    protected $rule = [
        'category_name'             =>  'require',
        'category_image_path'             =>  'require',
    ];

    protected $message = [
        'category_name.require'         =>  '分类名必须填写',
        'category_image_path'           =>  '必须上传图片'
    ];

    protected $scene = [
        'insert'     =>  ['category_name','category_image_path'],
        'update'     =>  ['category_name'],
    ];

}