<?php
namespace joeStudio\shop\validate;

use think\Validate;

class ShopSpecAttribute extends Validate
{
    protected $output;

    protected $rule = [
        'attribute_name'             =>  'require',
        'spec_id'                 =>  'require',
    ];

    protected $message = [
        'attribute_name.require'         =>  '属性名必须填写',
        'spec_id.require'             =>  '规格必须选择,没有分组请先创建',
    ];

    protected $scene = [
        'insert'     =>  ['attribute_name','spec_id'],
        'update'     =>  ['attribute_name','spec_id'],
    ];

}