<?php
namespace joeStudio\shop\validate;

use think\Validate;

class ShopGoodsPrice extends Validate
{
    protected $output;

    protected $rule = [
    ];

    protected $message = [
    ];

    protected $scene = [
        'insert'     =>  [''],
        'update'    =>['']
    ];

}