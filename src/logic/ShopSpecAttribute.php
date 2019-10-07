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

class ShopSpecAttribute extends Output
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

        isset($data['attribute_name'])   && $map['attribute_name'] = ['like', "%{$data['attribute_name']}%"];
        isset($data['spec_id']) && $map['spec_id'] = $data['spec_id'];

        //从数据库查询数据
        $attributeList = $this->model->where($map)->paginate($rows,false,['query'=>$data]);

        $specList = db('shopSpecSpec')->select();

        //模板分页效果
        $page = $attributeList->render();

        $output = [
            'attributeList'          =>  $attributeList,
            'page'              =>  $page,
            'specList'      =>  $specList,
        ];

        return $output;
    }

    public function update($data){

        //图片为空，不进行更新
        if(!$data['attribute_image_path']){
            unset($data['attribute_image_path']);
        }

        $res = $this->validate->scene('update')->batch()->check($data);

        if($res == false){

            $this
                ->scene('form')
                ->setStatus(false)
                ->setMsg($this->validate->getError())
                ->output();
        }

        $res = $this->model->save($data,['attribute_id'=>$data['attribute_id']]);

        $res ?
            $this->scene('form')->setStatus(true)->setMsg('编辑成功')->output()
            :
            $this->scene('form')->setStatus(false)->setMsg('更新数据失败')->output();
    }

    public function getTemplateParamsAdd(){
        $specList = db('shopSpecSpec')->select();
        $attributeList = $this->model->select();

        $output = [
            'specList'  =>  $specList,
            'attributeList'      =>  $attributeList
        ];

        return $output;
    }

    public function getTemplateParamsEdit($data){
        $specList = db('shopSpecSpec')->select();
        $attribute = $this->model->where($data)->find();

        $output = [
            'specList'  =>  $specList,
            'attribute'          =>  $attribute
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
}