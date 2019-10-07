<?php
/**
 * Created by dh2y.
 * Blog: http://blog.csdn.net/sinat_22878395
 * Date: 2018/4/26 0026 16:26
 * For: 登录模块
 */

namespace joeStudio\shop\logic;

use filter\Output;
use joeStudio\admin\model\Admin;

class ShopGoodsPrice extends Output
{

    public function __construct(){

    }

    public function search($data){

        $specCategoryList = db('shopSpecCategory')->select();

        $hasPrice = $this->model->where([
            'goods_id'  =>  $data['goods_id']
        ])->find();



        $defaultSpecCategoryId = $hasPrice ? $hasPrice['spec_category_id'] : (db('shopSpecCategory')->column('category_id'))[0];

        $specList = $this->getSpecAttributeList($defaultSpecCategoryId);

        $AttributeGroupList = $this->getAttributeGroupList($defaultSpecCategoryId,$data['goods_id']);

        $output = [
            'specList'          =>  $specList['specList'],
            'specCategoryList'      =>  $specCategoryList,
            'attributeGroupList'    =>$AttributeGroupList['attributeGroupList'],
            'specCategoryId'        =>  $defaultSpecCategoryId
        ];

        return $output;
    }

    public function update($data){

        $goods_id = $data['goods_id'];unset($data['goods_id']);
        $specCategory_id = $data['specCategoryId'];unset($data['specCategoryId']);
        $price_list = $data['priceList'];unset($data['priceList']);
        $image_list = $data;

        $price = $this->model->where([
            'goods_id'  =>  $goods_id,
        ])->find();

        if($price['spec_category_id'] != $specCategory_id){
            $this->model->where([
                'goods_id'  =>  $goods_id
            ])->delete();
        }

        foreach($price_list as $key => $value){
            $price_list[$key]['goods_id'] = $goods_id;
            $price_list[$key]['spec_category_id'] = $specCategory_id;
            $image_list['image_'.$key] && $price_list[$key]['price_image_path'] = $image_list['image_'.$key];
            $price_list[$key]['price_attr_group'] = implode(',',$value['attribute_id']);

            if(!$price_list[$key]['price_id']){
                unset($price_list[$key]['price_id']);
            }
        }

        $res = $this->model->saveAll($price_list);

        $res ?
            $this->scene('form')->setStatus(true)->setMsg('编辑成功')->output()
            :
            $this->scene('form')->setStatus(false)->setMsg('更新数据失败')->output();
    }

    public function getSpecAttributeList($specCategoryId){
        $specList = db('shopSpecSpec')->where(['category_id'=>$specCategoryId])->select();

        foreach($specList as $key => $value){
            $specList[$key]['attributeList'] = db('shopSpecAttribute')->where(['spec_id'=>$value['spec_id']])->select();
        }

        $output = [
            'specList'  =>  $specList
        ];
        return $output;
    }

    public function getAttributeGroupList($specCategoryId,$goodsId){

        $specIdArr = db('shopSpecSpec')->where(['category_id'=>$specCategoryId])->field('spec_id')->select();

        foreach($specIdArr as $key => $value){

            $attributeList[$key] = db('shopSpecAttribute')->where(['spec_id'=>$value['spec_id']])->column('attribute_id');

        }

        $attributeIdGroup = $this->foo($attributeList);

        $hasAttribute = $this->model->where([
            'goods_id'  =>  $goodsId,
            'spec_category_id'  =>  $specCategoryId
        ])->count();

        foreach($attributeIdGroup as $key => $value){

            if($hasAttribute){
                $attributeGroupList[$key]['price'] = db('shopGoodsPrice')->where([
                    'goods_id'  =>  $goodsId,
                    'spec_category_id'  =>  $specCategoryId,
                    'price_attr_group'  =>  implode(',',$value)
                ])->find();
            }else{
                $attributeGroupList[$key]['price'] = [
                    'price_id'  => 0,
                    'price_reference'   =>  '',
                    'price_discount'    =>  '',
                    'price_sku'         =>  '',
                    'price_image_path'  =>  '',
                    'price_status'      =>  0

                ];
            }

            foreach($value as $k => $v) {
                $attributeGroupList[$key]['attribute_list'][$k]['attribute_id'] = $v;
                $attributeGroupList[$key]['attribute_list'][$k]['attribute_name'] = (db('shopSpecAttribute')->where(['attribute_id' => $v])->column('attribute_name'))[0];
            }
        }

        $output = [
            'attributeGroupList'    =>  $attributeGroupList
        ];

        return $output;
    }

    function foo($d) {
        $r = array_pop($d);
        while($d) {
            $t = array();
            $s = array_pop($d);
            if(! is_array($s)) $s = array($s);
            foreach($s as $x) {
                foreach($r as $y) $t[] = array_merge(array($x), is_array($y) ? $y : array($y));
            }
            $r = $t;
        }
        return $r;
    }

    function getPriceList($data){
        $specCategoryList = db('shopSpecCategory')->select();

        $specList = $this->getSpecAttributeList($data['specCategoryId']);

        $AttributeGroupList = $this->getAttributeGroupList($data['specCategoryId'],$data['goods_id']);

        $output = [
            'specList'          =>  $specList['specList'],
            'specCategoryList'      =>  $specCategoryList,
            'attributeGroupList'    =>$AttributeGroupList['attributeGroupList'],
            'specCategoryId'        =>  $data['specCategoryId']
        ];

        return $output;
    }

}