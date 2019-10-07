<?php
namespace joeStudio\shop\validate;

use think\Validate;

class ShopStoreStore extends Validate
{
    protected $output;

    protected $rule = [
        'store_name'             =>  'require',
    ];

    protected $message = [
        'store_name.require'         =>  '店铺名必须填写',
    ];

    protected $scene = [
        'insert'     =>  ['store_name'],
        'update'     =>  ['store_name'],
    ];

}