<?php
namespace joeStudio\shop\validate;

use think\Validate;

class ShopGoodsDetailsImage extends Validate
{
    protected $output;

    protected $rule = [
        'goods_id'               => 'require',
        'image_list'             =>  'require',
    ];

    protected $message = [
        'image_list.require'         =>  '未上传图片',
    ];

    protected $scene = [
        'insert'     =>  ['image_list','goods_id'],
        'update'    =>['']
    ];

}