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

class ShopSpecSpec extends Output
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

        isset($data['spec_name'])   && $map['spec_name'] = ['like', "%{$data['spec_name']}%"];
        isset($data['category_id']) && $map['category_id'] = $data['category_id'];

        //从数据库查询数据
        $specList = $this->model->where($map)->paginate($rows,false,['query'=>$data]);

        $categoryList = db('shopSpecCategory')->select();

        //模板分页效果
        $page = $specList->render();

        $output = [
            'specList'          =>  $specList,
            'page'              =>  $page,
            'categoryList'      =>  $categoryList,
        ];

        return $output;
    }

    public function update($data){

        //图片为空，不进行更新
        if(!$data['spec_image_path']){
            unset($data['spec_image_path']);
        }

        $res = $this->validate->scene('update')->batch()->check($data);

        if($res == false){

            $this
                ->scene('form')
                ->setStatus(false)
                ->setMsg($this->validate->getError())
                ->output();
        }

        $res = $this->model->save($data,['spec_id'=>$data['spec_id']]);

        $res ?
            $this->scene('form')->setStatus(true)->setMsg('编辑成功')->output()
            :
            $this->scene('form')->setStatus(false)->setMsg('更新数据失败')->output();
    }

    public function getTemplateParamsAdd(){
        $categoryList = db('shopSpecCategory')->where([
            'category_status'   =>  1
        ])->select();
        $specList = $this->model->select();

        $output = [
            'categoryList'  =>  $categoryList,
            'specList'      =>  $specList
        ];

        return $output;
    }

    public function getTemplateParamsEdit($data){
        $categoryList = db('shopSpecCategory')->where([
            'category_status'   =>  1
        ])->select();
        $spec = $this->model->where($data)->find();

        $output = [
            'categoryList'  =>  $categoryList,
            'spec'          =>  $spec
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