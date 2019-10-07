<?php


namespace filter;


use think\Controller;

class Output extends Controller
{
    protected $status;
    protected $msg;
    protected $data;
    protected $url;

    public $scene = 'validate'; //目前另一个是jump页面跳转

    public function __construct()
    {
        //输入参数判断应用场景
    }

    public function scene($scene){
        $this->scene = $scene;
        return $this;
    }

    public function setStatus($status){
        $this->status = $status;
        return $this;
    }

    public function setMsg($msg){
        $this->msg = $msg;
        return $this;
    }

    public function setData($data){
        $this->data = $data;
        return $this;
    }

    public function setUrl($url){
        $this->url = $url;
        return $this;
    }

    public function output(){

        //应用场景 验证器
        if($this->scene == 'form'){

            $res = [];

           $res['status'] = $this->status;
           $res['msg'] = $this->msg;
           $res['data'] = $this->data;
           $res['url'] = $this->url;

            echo json_encode($res);exit;
        }

        //应用场景 页面跳转
        if($this->scene == 'jump'){
            $this->status ? $this->success($this->msg,$this->url) : $this->error($this->msg,$this->url);
        }
    }
}