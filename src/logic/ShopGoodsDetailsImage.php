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

class ShopGoodsDetailsImage extends Output
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

        foreach($data['image_list'] as $key => $value){

            $saveData[] = [
                'goods_id'   =>  $data['goods_id'],
                'image_path' =>  $value['image_url'],
                'image_sort' =>  $value['sort']
            ];
        }

        $res = $this->model->saveAll($saveData);

        $res ?
            $this->scene('form')->setStatus(true)->setMsg('新增成功')->output()
            :
            $this->scene('form')->setStatus(false)->setMsg('插入数据失败')->output();
    }

    public function search($data){
        //筛选条件
        $map = [];
        $rows = isset($data['rows']) ? $data['rows'] : 10;

        isset($data['goods_id']) && $map['goods_id'] = $data['goods_id'];

        //从数据库查询数据
        $imageList = $this->model->where($map)->paginate($rows,false,['query'=>$data]);

        //模板分页效果
        $page = $imageList->render();

        $output = [
            'imageList'          =>  $imageList,
            'page'              =>  $page
        ];

        return $output;
    }

    public function update($data){

        //图片为空，不进行更新
        if(!$data['image_path']){
            unset($data['image_path']);
        }

        $res = $this->validate->scene('update')->batch()->check($data);

        if($res == false){

            $this
                ->scene('form')
                ->setStatus(false)
                ->setMsg($this->validate->getError())
                ->output();
        }

        $res = $this->model->save($data,['details_image_id'=>$data['details_image_id']]);

        $res ?
            $this->scene('form')->setStatus(true)->setMsg('编辑成功')->output()
            :
            $this->scene('form')->setStatus(false)->setMsg('更新数据失败')->output();
    }

    public function getTemplateParamsAdd(){
        $categoryList = db('shopSpecCategory')->where([
            'category_status'   =>  1
        ])->select();
        $imageList = $this->model->select();

        $output = [
            'categoryList'  =>  $categoryList,
            'imageList'      =>  $imageList
        ];

        return $output;
    }

    public function getTemplateParamsEdit($data){

        $image = $this->model->where($data)->find();

        $output = [
            'image'          =>  $image
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

    public function imageUpload($data){

        $data = [
            'id'=>0,
            'url'=>$data['file'],
            'sort'=>0
        ];

        $this->scene('form')->setStatus(false)->setMsg('上传成功')->setData($data)->output();
    }
}