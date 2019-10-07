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
use joeStudio\shop\model\ShopGoodsImage;

class ShopGoodsGoods extends Output
{

    public function __construct(){

    }

    public function insert($data){

        $res = $this->validate->scene('insert')->batch()->check($data);

        if($res == false){

            $this
                ->scene('form')
                ->setStatus(false)
                ->setMsg($this->validate->getError())
                ->output();
        }

        $res = $this->model->save($data);

        $res ?
            $this->scene('form')->setStatus(true)->setMsg('新增成功')->output()
            :
            $this->scene('form')->setStatus(false)->setMsg('插入数据失败')->output();
    }

    public function search($data){
        //筛选条件
        $map = [];
        $rows = isset($data['rows']) ? $data['rows'] : 10;

        isset($data['goods_name'])   && $map['goods_name'] = ['like', "%{$data['goods_name']}%"];
        isset($data['category_id']) && $map['category_id'] = $data['category_id'];
        isset($data['goods_status']) && $data['goods_status'] ? $map['goods_status']  = 0 : $map['goods_status']  = 1;

        //从数据库查询数据
        $goodsList = $this->model->where($map)->paginate($rows,false,['query'=>$data]);

        $categoryList = db('shopGoodsCategory')->select();

        //模板分页效果
        $page = $goodsList->render();

        $output = [
            'goodsList'          =>  $goodsList,
            'page'              =>  $page,
            'categoryList'      =>  $categoryList,
        ];

        return $output;
    }

    public function update($data){

        //图片为空，不进行更新
        if(!$data['goods_image_path']){
            unset($data['goods_image_path']);
        }

        $res = $this->validate->scene('update')->batch()->check($data);

        if($res == false){

            $this
                ->scene('form')
                ->setStatus(false)
                ->setMsg($this->validate->getError())
                ->output();
        }

        $res = $this->model->save($data,['goods_id'=>$data['goods_id']]);

        $res ?
            $this->scene('form')->setStatus(true)->setMsg('编辑成功')->output()
            :
            $this->scene('form')->setStatus(false)->setMsg('更新数据失败')->output();
    }

    public function getTemplateParamsAdd(){
        $categoryList = db('shopGoodsCategory')->select();
        $goodsList = $this->model->select();

        $output = [
            'categoryList'  =>  $categoryList,
            'goodsList'      =>  $goodsList
        ];

        return $output;
    }

    public function getTemplateParamsEdit($data){
        $categoryList = db('shopGoodsCategory')->select();
        $goods = $this->model->where($data)->find();

        $output = [
            'categoryList'  =>  $categoryList,
            'goods'          =>  $goods
        ];

        return $output;
    }

    public function trueDel($data)
    {

        $res = $this->model->destroy($data['id'],TRUE);

        $res ?
            $this->scene('form')->setStatus(true)->setMsg('删除成功')->output()
            :
            $this->scene('form')->setStatus(false)->setMsg('删除失败')->output();
    }

    public function getTemplateParamsImageList($data){

        $imageModel = new ShopGoodsImage();

        $image_list = $imageModel->where([
            'goods_id'  =>  $data['goods_id']
        ])->select();

        $output = [
            'image_list'    =>  $image_list,
            'goods_trashed_list'    =>[]
        ];

        return $output;
    }

}