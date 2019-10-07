<?php
namespace joeStudio\shop\validate;

use think\Validate;

class ShopGoodsGoods extends Validate
{
    protected $output;

    protected $rule = [
        'goods_name'             =>  'require',
        'category_id'                 =>  'require',
        'goods_price_reference'                 =>  'require',
    ];

    protected $message = [
        'goods_name.require'         =>  '商品名必须填写',
        'category_id.require'             =>  '商品分类必须选择,没有分类请先创建',
        'goods_price_reference.require'             =>  '参考原价必须填写',
    ];

    protected $scene = [
        'insert'     =>  ['goods_name','category_id','goods_price_reference'],
        'update'     =>  ['goods_name','category_id','goods_price_reference'],
    ];

}