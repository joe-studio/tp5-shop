<?php
namespace joeStudio\shop\validate;

use think\Validate;

class ShopUserAddress extends Validate
{
    protected $output;

    protected $rule = [
        'address_consignee'             =>  'require',
        'address_province'             =>  'require',
        'address_city'             =>  'require',
        'address_district'             =>  'require',
        'address_details'             =>  'require',
        'address_mobile'             =>  'require|regex:^[1][0-9]{10}$',
    ];

    protected $message = [
        'address_consignee.require'             =>  '联系人必须填写',
        'address_province.require'             =>  '省份必须选择',
        'address_city.require'                  =>  '城市必须选择',
        'address_district.require'             =>  '地区必须选择',
        'address_details.require'             =>  '详细地址必须填写',
        'address_mobile.require'             =>  '联系方式必须填写',
        'address_mobile.regex'              =>  '手机格式不正确'
    ];

    protected $scene = [

    ];

}