<?php
namespace joeStudio\shop\validate;

use think\Validate;

class ShopAdvertising extends Validate
{
    protected $output;

    protected $rule = [
        'advertising_image_path'             =>  'require',
    ];

    protected $message = [
        'advertising_image_path.require'         =>  '图片必须上传',
    ];

    protected $scene = [
        'insert'     =>  ['advertising_image_path'],
        'update'     =>  [''],
    ];

}