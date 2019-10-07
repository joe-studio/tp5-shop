<?php
namespace joeStudio\shop\validate;

use think\Validate;

class ShopGoodsImage extends Validate
{
    protected $output;

    protected $rule = [
        'spec_name'             =>  'require',
        'category_id'                 =>  'require',
    ];

    protected $message = [
        'spec_name.require'         =>  '规格名必须填写',
        'category_id.require'             =>  '规格分组必须选择,没有分组请先创建',
    ];

    protected $scene = [
        'insert'     =>  ['spec_name','category_id'],
        'update'     =>  ['spec_name','category_id'],
    ];

}