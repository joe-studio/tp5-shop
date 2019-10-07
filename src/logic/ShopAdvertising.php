<?php
/**
 * Created by dh2y.
 * Blog: http://blog.csdn.net/sinat_22878395
 * Date: 2018/4/26 0026 16:26
 * For: 登录模块
 */

namespace joeStudio\shop\logic;

use filter\Output;

class ShopAdvertising extends Output
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

        isset($data['advertising_status']) && $data['advertising_status'] ? $map['advertising_status']  = 0 : $map['advertising_status']  = 1;

        //从数据库查询数据
        $advertisingList = $this->model->where($map)->paginate($rows,false,['query'=>$data]);

        //模板分页效果
        $page = $advertisingList->render();

        $output = [
            'advertisingList'          =>  $advertisingList,
            'page'              =>  $page
        ];

        return $output;
    }

    public function update($data){

        //图片为空，不进行更新
        if(!$data['advertising_image_path']){
            unset($data['advertising_image_path']);
        }

        $res = $this->validate->scene('update')->batch()->check($data);

        if($res == false){

            $this
                ->scene('form')
                ->setStatus(false)
                ->setMsg($this->validate->getError())
                ->output();
        }

        $res = $this->model->save($data,['advertising_id'=>$data['advertising_id']]);

        $res ?
            $this->scene('form')->setStatus(true)->setMsg('编辑成功')->output()
            :
            $this->scene('form')->setStatus(false)->setMsg('更新数据失败')->output();
    }

    public function getRole($data){

        $advertising = $this->model->where($data)->find();

        $output = [
            'advertising'          =>  $advertising
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