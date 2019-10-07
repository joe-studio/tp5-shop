<?php
namespace joeStudio\shop\behavior;

use think\Request;

class Input
{
    public function run(&$params)
    {
        $require = Request::instance();

        $input = strtolower($require->method()) == 'post' ? input('post.') : input();

        if($_FILES){
            foreach($_FILES as $key => $uploadFile){

                // 获取表单上传文件 例如上传了001.jpg
                $file = request()->file($key);

                $image_path = 'uploads' . DS . 'shop' . DS . strtolower((Request::instance()->routeInfo())['rule'][1]);

                $value = '';

                if($file){
                    $info = $file->move(ROOT_PATH . 'public' . DS  . $image_path);

                    $info && $value = $image_path . DS . $info->getSaveName();
                }

                $input[$key] = $value;
            }

        }

        //实例化视图引擎
        $params =  $input;
    }
}