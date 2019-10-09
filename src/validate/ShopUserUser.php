<?php
namespace joeStudio\shop\validate;

use think\Validate;

class ShopUserUser extends Validate
{
    protected $output;

    protected $rule = [
        'openid'             =>  'require',

    ];

    protected $message = [


    ];

    protected $scene = [
        'register'  =>  ['openid']
    ];

}