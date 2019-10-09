<?php
namespace joeStudio\shop\api\miniapp;

use app\wxapp\model\UserAddress;
use joeStudio\shop\model\ShopGoodsCategory;
use joeStudio\shop\model\ShopGoodsGoods;
use joeStudio\shop\model\ShopGoodsKeyword;
use joeStudio\shop\validate\ShopUserAddress;
use think\Session;

class Goods extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

   public function search(){

        $goodsModel = new ShopGoodsGoods();

       //筛选条件
       $map = [];

       isset($this->input['goods_name'])   && $map['goods_name'] = ['like', "%{$this->input['goods_name']}%"];
       isset($this->input['category_id']) && $map['category_id'] = $this->input['category_id'];
       isset($this->input['goods_status']) && $this->input['goods_status'] ? $map['goods_status']  = 0 : $map['goods_status']  = 1;

       if(isset($this->input['goods_name']) && $this->input['goods_name']){

           $keywordModel = new ShopGoodsKeyword();

           $keyword = $keywordModel->where([
               'keyword_name'   =>  $this->input['goods_name'],
               'user_id'        =>  $this->user_id
           ])->find();

           if(!$keyword){
               $keywordModel->save([
                   'keyword_name'   =>  $this->input['goods_name'],
                   'user_id'        =>  $this->user_id
               ]);
           }else{
               $keywordModel->save([
                   'search_num' =>  $keyword['search_num'] + 1
               ],$keyword['keyword_id']);
           }

       }

       //从数据库查询数据
       $goodsList = $goodsModel->where($map)->paginate($this->input['rows'],false,['query'=>$this->input]);

        $this->scene('miniApp')->setData($goodsList)->output();
   }

   public function categorySearch(){
       $goodsCategoryModel = new ShopGoodsCategory();

       //从数据库查询数据
       $categoryList = $goodsCategoryModel->select();

       $this->scene('miniApp')->setData($categoryList)->output();
   }

   public function keywordSearch(){
       $goodsKeywordModel = new ShopGoodsKeyword();

       //从数据库查询数据
       $keywordList = $goodsKeywordModel->where([
           'user_id'    =>  $this->user_id
       ])->select();

       $this->scene('miniApp')->setData($keywordList)->output();
   }

   public function keywordDelete(){
        $keywordModel = new ShopGoodsKeyword();

        $res = $keywordModel->where([
            'keyword_name'  =>  $this->input['keyword_name'],
            'user_id'       =>  $this->user_id
        ])->delete();

        $res && $this->scene('miniApp')->setStatus(true)->setMsg('删除成功')->output();
   }
}